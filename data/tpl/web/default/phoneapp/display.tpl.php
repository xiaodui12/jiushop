<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="panel panel-cut">
	<div class="panel-heading">
		<span class="panel-heading-left">
			<i class="wi wi-small-routine" style="font-size: 24px; margin-right: 10px; vertical-align:middle;"></i>选择APP
		</span>
		<div class="pull-right font-default">
			
				<?php  if(!empty($account_info['phoneapp_limit']) && (!empty($account_info['founder_phoneapp_limit']) && $_W['user']['owner_uid'] || empty($_W['user']['owner_uid'])) || $_W['isfounder'] && !user_is_vice_founder()) { ?>
				<a href="<?php  echo url('phoneapp/manage/create_display')?>" class="color-default"><i class="wi wi-registersite"></i>新建APP</a>
				<?php  } ?>
			

			

			<a href="<?php  echo url('account/manage', array('account_type' => ACCOUNT_TYPE_PHONEAPP_NORMAL))?>" class="color-default"><i class="wi wi-wechatstatistics"></i>APP管理</a>
		</div>
	</div>
	<div class="panel-body" id="js-phoneapp-account-display" ng-controller="AccountDisplayPhoneappCtrl" ng-cloak>
		<?php  if(!$_W['isfounder'] && !empty($account_info['phoneapp_limit'])) { ?>
		<div class="alert alert-warning hidden">
			温馨提示：
			<i class="fa fa-info-circle"></i>
			Hi，<span class="text-strong"><?php  echo $_W['username'];?></span>，您所在的会员组： <span class="text-strong"><?php  echo $account_info['group_name'];?></span>，
			账号有效期限：<span class="text-strong"><?php  echo date('Y-m-d', $_W['user']['starttime'])?> ~~ <?php  if(empty($_W['user']['endtime'])) { ?>无限制<?php  } else { ?><?php  echo date('Y-m-d', $_W['user']['endtime'])?><?php  } ?></span>，
			可创建 <span class="text-strong"><?php  echo $account_info['maxphoneapp'];?> </span>个APP，已创建<span class="text-strong"> <?php  echo $account_info['phoneapp_num'];?> </span>个，还可创建 <span class="text-strong"><?php  echo $account_info['phoneapp_limit'];?> </span>个APP。
		</div>
		<?php  } ?>
		<?php  if(!empty($pager)) { ?>
		<div class="cut-header">
			<form action="./index.php" method="get">
				<input type="hidden" name="c" value="phoneapp">
				<input type="hidden" name="a" value="display">
				<input type="text" name="letter" ng-model="activeLetter" ng-style="{'display': 'none'}">
				<div class="cut-search">
					<div class="input-group pull-left">
						<input class="form-control" name="keyword" value="<?php  echo $_GPC['keyword'];?>" type="text" placeholder="请输入APP名称" >
						<span class="input-group-btn"><button class="btn btn-default button"><i class="fa fa-search"></i></button></span>
					</div>
				</div>
			</form>
		</div>
		<?php  } ?>
		<?php  if(!empty($pager)) { ?>
		<ul class="letters-list cut-wechat-letters">
			<li ng-repeat="letter in alphabet" ng-style="{'background-color': letter == activeLetter ? '#ddd' : 'none'}" ng-class="{'active': letter == activeLetter}" ng-click="searchModule(letter)">
				<a href="javascript:;" ng-bind="letter"></a>
			</li>
		</ul>
		<?php  } ?>
		<div class="cut-list clearfix">
			<div class="item wxapp-list-item" ng-repeat="list in phoneapp_lists" ng-if="phoneapp_lists">
				<div class="content">
					<img ng-src="{{list.logo}}" class="icon" onerror="this.src='./resource/images/nopic-107.png'">
					<div class="name text-over" ng-bind="list.name"></div>
				</div>
				<div class="version">
					<span class="name">版本</span>
					<div class="version-detail" ng-bind="list.current_version.version"></div>
				</div>
				<div class="mask">
					<a ng-href="{{links.switch}}&uniacid={{list.uniacid}}&version_id={{list.current_version.id}}" class="entry">
						<div>进入APP <i class="wi wi-angle-right"></i></div>
					</a>
					<?php  if(!permission_check_account_user('see_user_profile_account_num')) { ?>
					<a ng-href="{{links.welcome}}uniacid={{list.uniacid}}" onclick="return ajaxopen(this.href);" class="home-show" title="添加到首页常用功能">
						<i class="wi wi-eye"></i>
					</a>
					<?php  } ?>
					<a href="javascript:;" class="cut-btn" ng-click="showVersions($event)">
						<i class="wi wi-changing-over"></i>
					</a>

				</div>
				<div class="cut-select" ng-mouseleave="hideSelect($event)" ng-if="list.versions">
					<div class="arrow-left"></div>
					<div class="cut-item">
						<a href="javascript:;">
							<div class="detail" ng-repeat="version in list.versions">
								<div class="text-over"><span class="wi wi-small-routine"></span>{{version.version}}</div>
								<a class="cut-select-mask" href="{{links.switch}}&uniacid={{list.uniacid}}&multiid={{version.multiid}}&version_id={{version.id}}">
									<div class="entry">选择进入 <i class="wi wi-angle-right"></i></div>
								</a>
							</div>
						</a>
					</div>

					<!--<div class="cut-select-pager">-->
						<!--<a href="{{links.more_version}}&uniacid={{list.uniacid}}" class="more color-default">更多 >></a>-->
					<!--</div>-->
				</div>
			</div>
			<div class="text-center we7-padding-vertical message-page"  ng-if="!phoneapp_lists && !activeLetter">
				<div class="icon"><span class="wi wi-sad"></span></div>
				<div class="message-state">您还没有创建APP</div>
				
				<?php  if(!empty($account_info['phoneapp_limit']) || $_W['isfounder'] && !user_is_vice_founder()) { ?>
				<div><a class="btn btn-primary" href="<?php  echo url('phoneapp/manage/create_display')?>">新建APP</a></div>
				<?php  } ?>
				
				

			</div>
			<div class="text-center we7-padding-vertical" ng-if="!phoneapp_lists && activeLetter">
				暂无数据
			</div>
		</div>
		<div class="text-right">
			<?php  echo $pager;?>
		</div>
	</div>
</div>
<script>
	angular.module('phoneApp').value('config', {
		'phoneapp_lists': <?php echo !empty($phoneapp_lists) ? json_encode($phoneapp_lists) : 'null'?>,
		'activeLetter' : <?php echo !empty($_GPC['letter']) ? json_encode($_GPC['letter']) : 'null'?>,
		'links': {
			'switch': "<?php  echo url('phoneapp/display/switch')?>",
			'more_version' : "<?php  echo url('phoneapp/version/display')?>",
			'welcome': "<?php  echo url('home/welcome/add_welcome')?>",
		},
	});
	angular.bootstrap($('#js-phoneapp-account-display'), ['phoneApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>