<?php
/**
 * [WECHAT 2017]
 * [WECHAT  a free software]
 */
defined('IN_IA') or exit('Access Denied');

load()->model('module');
load()->model('wxapp');

$dos = array('design_method', 'post', 'get_wxapp_modules', 'getpackage','jy_wxapp','module_binding');
$do = in_array($do, $dos) ? $do : 'post';
$_W['page']['title'] = '小程序 - 新建版本';
$account_info = permission_user_account_num();
if ($do == 'jy_wxapp') {
	global $_W,$_GPC;
	load()->model('cloud');
	$secret=$_W['setting']['api_check']['secret'];
	if(IMS_FAMILY=='v'){
		itoast('认证失败！非付费会员，无法使用该功能.');
	}
	$checktime = $_W['setting']['api_check']['time'] + 24 * 3600;
	if(empty($secret) || $checktime < TIMESTAMP){
		$pars = array();
		$pars['host'] = $_SERVER['HTTP_HOST'];
		$pars['family'] = IMS_FAMILY;
		$pars['version'] = IMS_VERSION;
		$pars['release'] = IMS_RELEASE_DATE;
		$pars['key'] = $_W['setting']['site']['key'];
		$pars['password'] = md5($_W['setting']['site']['key'] . $_W['setting']['site']['token']);
		$pars['method'] = 'module1.api_secret';
		$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
		$secret = $dat['content'];
		$data['key'] = $_W['setting']['site']['key'];
		$data['family'] = IMS_FAMILY;
		$data['secret'] = $secret;
		$data['time'] = TIMESTAMP;
		if(empty($secret)){
			itoast('认证失败！没有获取到数据.');
		}elseif($secret==3){
			itoast('认证失败！非付费会员，无法使用该功能.');
		}else{
			setting_save($data, 'api_check');
		}
	}
	$params=array(
		'uid'=>$_W['uid'],
		'key'=>$_W['setting']['site']['key'],
		'time'=>TIMESTAMP,
	);
	$str='';
	foreach($params as $key=>$value){
		$str.=$key.'='.$value;
	}
	$str.=$secret;
	$sign=md5($str);
	if($_W['ishttps']){
		$url= 'https://demo.jinyunweb.com/manage/index.php?plugin=core&action=wxapp.api&from=api';
	}else{
		$url= 'http://demo.jinyunweb.com/manage/index.php?plugin=core&action=wxapp.api&from=api';
	}
	$url.='&uid='.$_W['uid'];
	$url.='&key='.$_W['setting']['site']['key'];
	$url.='&time='.TIMESTAMP;
	$url.='&sign='.$sign;
	$url.='&host='.$_SERVER['HTTP_HOST'];
	template('wxapp/jy_wxapp');
}
if ($do == 'design_method') {

	$uniacid = intval($_GPC['uniacid']);
	template('wxapp/design-method');
}
if ($do == 'post') {
	$uniacid = intval($_GPC['uniacid']);
	$design_method = intval($_GPC['design_method']);
	$create_type = intval($_GPC['create_type']);

	$version_id  = intval($_GPC['version_id']);
	$isedit  =  $version_id > 0 ? 1 : 0;
	if ($isedit) {
		$wxapp_version = wxapp_version($version_id);
	}
	if (empty($design_method)) {
		itoast('请先选择要添加小程序类型', referer(), 'error');
	}
	if ($design_method == WXAPP_TEMPLATE) {
		itoast('拼命开发中。。。', referer(), 'info');
	}

	if (checksubmit('submit')) {

		if ($account_info['wxapp_limit'] <= 0 && empty($uniacid) && !$_W['isfounder']) {
			iajax(-1, '创建的小程序已达上限！');
		}
		if ($design_method == WXAPP_TEMPLATE && empty($_GPC['choose']['modules'])) {
			iajax(2, '请选择要打包的模块应用', url('wxapp/post'));
		}
		if (!preg_match('/^[0-9]{1,2}\.[0-9]{1,2}(\.[0-9]{1,2})?$/', trim($_GPC['version']))) {
			iajax('-1', '版本号错误，只能是数字、点，数字最多2位，例如 1.1.1 或1.2');
		}
				if (empty($uniacid)) {
			if (empty($_GPC['name'])) {
				iajax(1, '请填写小程序名称', url('wxapp/post'));
			}
			$account_wxapp_data = array(
				'name' => trim($_GPC['name']),
				'description' => trim($_GPC['description']),
				'original' => trim($_GPC['original']),
				'level' => 1,
				'key' => trim($_GPC['appid']),
				'secret' => trim($_GPC['appsecret']),
				'type' => ACCOUNT_TYPE_APP_NORMAL,
			);
			$uniacid = wxapp_account_create($account_wxapp_data);
			if (is_error($uniacid)) {
				iajax(3, '添加小程序信息失败', url('wxapp/post'));
			}
		} else {
			$wxapp_info = wxapp_fetch($uniacid);
			if (empty($wxapp_info)) {
				iajax(4, '小程序不存在或是已经被删除', url('wxapp/post'));
			}
		}

						$wxapp_version = array(
			'uniacid' => $uniacid,
			'multiid' => '0',
			'description' => trim($_GPC['description']),
			'version' => trim($_GPC['version']),
			'modules' => '',
			'design_method' => $design_method,
			'quickmenu' => '',
			'createtime' => TIMESTAMP,
			'template' => $design_method == WXAPP_TEMPLATE ? intval($_GPC['choose']['template']) : 0,
						'type' => 0
		);
		
			if (!in_array($create_type, array(WXAPP_CREATE_DEFAULT, WXAPP_CREATE_MODULE, WXAPP_CREATE_MUTI_MODULE))) {
				$create_type = WXAPP_CREATE_DEFAULT;
			}
			$wxapp_version['type'] = $create_type;
		
				if ($design_method == WXAPP_TEMPLATE) {
			$multi_data = array(
				'uniacid' => $uniacid,
				'title' => $account_wxapp_data['name'],
				'styleid' => 0,
			);
			pdo_insert('site_multi', $multi_data);
			$wxapp_version['multiid'] = pdo_insertid();
		}

				if (!empty($_GPC['choose']['modules'])) {
			$select_modules = array();
			foreach ($_GPC['choose']['modules'] as $post_module) {
				$module = module_fetch($post_module['module']);
				if (empty($module)) {
					continue;
				}

				$select_modules[$module['name']] = array('name' => $module['name'],
					'newicon' => $post_module['newicon'],
					'version' => $module['version'], 'defaultentry'=>$post_module['defaultentry']);
			}

			$wxapp_version['modules'] = serialize($select_modules);
		}

				if (!empty($_GPC['quickmenu'])) {
			$quickmenu = array(
				'color' => $_GPC['quickmenu']['bottom']['color'],
				'selected_color' => $_GPC['quickmenu']['bottom']['selectedColor'],
				'boundary' => $_GPC['quickmenu']['bottom']['boundary'],
				'bgcolor' => $_GPC['quickmenu']['bottom']['bgcolor'],
				'show' => $_GPC['quickmenu']['show'] == 'true' ? 1 : 0,
				'menus' => array(),
			);
			if (!empty($_GPC['quickmenu']['menus'])) {

				foreach ($_GPC['quickmenu']['menus'] as $row) {
					$quickmenu['menus'][] = array(
						'name' => $row['name'],
						'icon' => $row['defaultImage'],
						'selectedicon' => $row['selectedImage'],
						'url' => $row['module']['url'],
						'defaultentry' => $row['defaultentry']['eid'],
					);
				}
			}

			$wxapp_version['quickmenu'] = serialize($quickmenu);
		}
		if ($isedit) {
			$msg = '小程序修改成功';
			pdo_update('wxapp_versions', $wxapp_version, array('id'=>$version_id, 'uniacid'=>$uniacid));
		} else {
			$msg = '小程序创建成功';
			pdo_insert('wxapp_versions', $wxapp_version);
		}
		iajax(0, $msg, url('wxapp/display/switch', array('uniacid' => $uniacid)));
	}
	if (!empty($uniacid)) {
		$wxapp_info = wxapp_fetch($uniacid);
	}
	template('wxapp/post');
}

if ($do == 'get_wxapp_modules') {
	$wxapp_modules = wxapp_support_wxapp_modules();
	foreach ($wxapp_modules as $name => $module) {
		if ($module['issystem']) {
			$path = '/framework/builtin/'.$module['name'];
		} else {
			$path = '../addons/'.$module['name'];
		}
		$icon = $path.'/icon-custom.jpg';
		if (!file_exists($cion)) {
			$icon = $path.'/icon.jpg';
			if (!file_exists($icon)) {
				$icon = './resource/images/nopic-small.jpg';
			}
		}
		$module['logo'] = $icon;
	}
	iajax(0, $wxapp_modules, '');
}


if ($do == 'module_binding') {
	$modules = $_GPC['modules'];
	if (empty($modules)) {
		iajax(1, '参数无效');
		return;
	}
	$modules = explode(',', $modules);
	$modules = array_map(function($item) {
		return trim($item);
	}, $modules);

	$modules = table('module')->with(array('bindings' => function($query){
		return $query->where('entry', 'cover');
	}))->where('name', $modules)->getall();

	$modules = array_filter($modules, function($module){
		return count($module['bindings']) > 0;
	});
	iajax(0, $modules);
}

