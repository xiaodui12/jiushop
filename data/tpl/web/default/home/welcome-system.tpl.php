<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<!--系统管理首页-->
<link href="./resource/css/shop.css" rel="stylesheet" type="text/css">
<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa fa-bullhorn alert-link">
        </i> 开通的不同版本可以使用不同的权限 <a href="./index.php?c=website&a=taocan-show" target="_blank" style="border-radius: 4px;width: 84%;padding: 4px;font-size: 14px;background-color: #00bc0c;border-color: #00bc0c;color: #FFF">套餐价格、包含应用套餐表</a>
</div>
<div class="portlet-body">
	<div class="row margin-bottom-10">
                    <?php  if(is_array($usergroups)) { foreach($usergroups as $item) { ?>
                    <div class="col-md-3">
                        <div class="pricing hover-effect">
                            <div class="pricing-head">
                                <h3><?php  echo $item["name"];?>
                                </h3>
                                <h4><i>￥</i><i><?php  echo $item['price'];?>元/年</i>
                                </h4>
                            </div>
                            <ul class="pricing-content list-unstyled" style="color:red">
							    <li>
                                    <i class="fa fa-tags"></i> 充值余额、购买应用优惠：<?php  echo $item['discount'];?>折
                                </li>
                                <li>
                                    <i class="fa fa-tags"></i> 可以自定义微系列的版权功能
                                </li>
                                <li>
                                    <i class="fa fa-tags"></i> 其它更功能
                                </li>
                            </ul>
                            <div class="pricing-footer">
                                <?php  if($_W['user']['groupid'] == $item['id']) { ?>
                                <p>
                                    <span class="label label-success">正在使用</span>
                                </p>
                                <?php  } ?>
                                <?php  if($_W['user']['groupid'] == $item['id']) { ?>
                                <p>
                                    <span class="label label-success">有效期：<?php  if($_W["user"]['endtime']) { ?><?php  echo date("Y-m-d H:i:s",$_W["user"]['endtime'])?><?php  } else { ?>永久使用<?php  } ?></span>
                                </p>
                                <a href="<?php  echo url('shop/buypackage', array('groupid' =>$item['id']))?>" class="btn yellow-crusta">
                                    立即续费 <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                                <?php  } else if($group['price'] >= $item['price']) { ?>
                                <a href="#" class="btn yellow-crusta">
                                    无需升级 <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                                <?php  } else { ?>
								<a href="<?php  echo url('shop/buypackage', array('groupid' =>$item['id']))?>" class="btn yellow-crusta">
                                    立即升级<i class="m-icon-swapright m-icon-white"></i>
                                </a>
                                <?php  } ?>
                            </div>
                        </div>
                    </div>
                    <?php  } } ?>
		</div>
</div>
<div class="welcome-container js-system-welcome" ng-controller="WelcomeCtrl" ng-cloak>
	<div class="row">
		<div class="col-sm-6">
			<div class="panel we7-panel account-stat">
				<div class="panel-heading">微信应用模块[数据不准，仅供参考]</div>
				<div class="panel-body we7-padding-vertical">
					<div class="col-sm-4 text-center">
						<div class="title">未安装应用</div>
						<div class="num">
							<a href="<?php  echo url('extension/module/prepared', array('account_type' => 1))?>" class="color-default">{{account_uninstall_modules_nums}}</a>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<div class="title">可升级应用</div>
						<div class="num">
						{{upgrade_module_nums.account_upgrade_module_nums}}
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<div class="title">应用总数</div>
						<div class="num">
							<a href="<?php  echo url('extension/module', array('account_type' => 1))?>" class="color-default">{{account_modules_total}}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel we7-panel account-stat">
				<div class="panel-heading">小程序应用模块[数据不准，仅供参考]</div>
				<div class="panel-body we7-padding-vertical">
					<div class="col-sm-4 text-center">
						<div class="title">未安装应用</div>
						<div class="num">
							<a href="<?php  echo url('extension/module/prepared', array('account_type' => 4))?>" class="color-default">{{wxapp_uninstall_modules_nums}}</a>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<div class="title">可升级应用</div>
						<div class="num">
						{{upgrade_module_nums.wxapp_upgrade_module_nums}}
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<div class="title">应用总数</div>
						<div class="num">
							{{wxapp_modules_total}}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="modal-loading" style="width:100%">
			<div style="text-align:center;background-color: transparent;">
				<img style="width:48px; height:48px; margin-top:10px;margin-bottom:10px;" src="resource/images/loading.gif" title="正在努力加载...">
			</div>
		</div>
	</div>
	<div class="panel we7-panel apply-list">
		<div class="panel-heading">
			<span class="pull-right">
				<a href="<?php  echo url('extension/module', array('account_type' => 1))?>" class="color-default">查看更多公众号应用</a>
				<span class="we7-padding-horizontal inline-block color-gray">|</span>
				<a href="<?php  echo url('system/module', array('account_type' => 4))?>" class="color-default">查看更多小程序应用</a>
			</span>
			可升级应用
		</div>
		<div class="panel-body">
			<a href="{{module.link}}" target="_blank" class="apply-item" ng-repeat="module in upgrade_module_list">
				<img src="{{module.logo}}" class="apply-img"/>
				<span class="text-over">{{module.title|limitTo:4}}</span>
				<span class="color-red">升级</span>
			</a>
			<div class="text-center" ng-if="upgrade_modules_show == 0">
				没有可升级的应用
			</div>
		</div>
	</div>
	<div class="panel we7-panel database">
		<div class="panel-heading">
			数据库备份提醒
		</div>
		<div class="panel-body clearfix">
			<div class="col-sm-9">
				<span class="day"><?php  echo $backup_days;?></span>
				<span class="color-default">天</span>
				没有备份数据库了,请及时备份!
			</div>
			<div class="col-sm-3 text-center">
				<a class="btn btn-default" href="<?php  echo url('system/database');?>">开始备份</a>
			</div>
		</div>
	</div>
</div>
<!--end 系统管理首页-->
<script type="text/javascript">
	$(function(){
		angular.module('systemApp').value('config', {
			notices: <?php echo !empty($notices) ? json_encode($notices) : 'null'?>,
			systemUpgradeUrl : "<?php  echo url('home/welcome/get_system_upgrade')?>",
			upgradeModulesUrl: "<?php  echo url('home/welcome/get_upgrade_modules')?>",
			moduleStatisticsUrl: "<?php  echo url('home/welcome/get_module_statistics')?>"
		});
		angular.bootstrap($('.js-system-welcome'), ['systemApp']);
	});
</script>	
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>