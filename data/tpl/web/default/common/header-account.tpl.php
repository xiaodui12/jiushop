<?php defined('IN_IA') or exit('Access Denied');?><img src="<?php  echo tomedia('headimg_'.$_W['account']['acid'].'.jpg')?>?time=<?php  echo time()?>" class="head-logo">
<span class="font-lg"><?php  echo $_W['account']['name'];?></span>

<?php  if($_W['account']['level'] == 1 || $_W['account']['level'] == 3) { ?>
	<span class="label label-primary">订阅号</span><?php  if($_W['account']['level'] == 3) { ?><span class="label label-primary">已认证</span><?php  } ?>
<?php  } ?>
<?php  if($_W['account']['level'] == 2 || $_W['account']['level'] == 4) { ?>
	<span class="label label-primary">服务号</span> <?php  if($_W['account']['level'] == 4) { ?><span class="label label-primary">已认证</span><?php  } ?>
<?php  } ?>
<?php  if($_W['uniaccount']['isconnect'] == 0) { ?>
	<span class="tips-danger">
		<i class="wi wi-warning-sign"></i>未接入微信公众号
		<a href="<?php  echo url('account/post', array('uniacid' => $_W['account']['uniacid'], 'acid' => $_W['acid']))?>">立即接入</a>
	</span>
	<?php  } ?>
	<span class="pull-right"><a href="<?php  echo url('account/display')?>" class="color-default we7-margin-left"><i class="wi wi-cut color-default"></i>切换公众号</a></span>
<?php  if(permission_account_user_role($_W['uid'], $_W['uniacid']) != ACCOUNT_MANAGE_NAME_OPERATOR) { ?>
					<span class="pull-right"><a href="<?php  echo url('account/post', array('uniacid' => $_W['account']['uniacid'], 'acid' => $_W['acid']))?>"><i class="wi wi-appsetting"></i>公众号设置</a></span>
				<?php  } ?>
				<span class="pull-right" style ="margin-right:20px"><a href="<?php  echo url('home/welcome/ext', array('m' => 'we7_coupon'))?>"><i class="wi wi-redact"></i>卡券/门店/收银台设置</a></span>
				<span class="pull-right"><a href="<?php  echo url('utility/emulator');?>" target="_blank"><i class="wi wi-iphone"></i>模拟测试</a></span>