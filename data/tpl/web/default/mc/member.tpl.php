<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	.label{line-height: 1.8}
</style>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('mc/common', TEMPLATE_INCLUDEPATH)) : (include template('mc/common', TEMPLATE_INCLUDEPATH));?>
<?php  if($do == 'display') { ?>
<div class="alert we7-page-alert">
	<p><i class="wi wi-info-sign"></i> 当前会员总数:<strong class="text-danger"><?php  echo $stat['total'];?></strong>。今日新增会员:<strong class="text-danger"><?php  echo $stat['today'];?></strong>。昨日新增会员:<strong class="text-danger"><?php  echo $stat['yesterday'];?></strong>。<br></p>
	<p><strong class="text-danger">
		<i class="wi wi-info-sign"></i> 会员的总积分 = 账户积分 + 账户贡献. 会员所在的会员组是根据 "总积分的多少" 和 "会员组的变更规则" (<根据总积分多少自动升价> 或 <根据总积分多少只升不降>) 自动匹配.<br>
	</strong></p>
</div>
<div class="panel we7-panel" ng-app="member" ng-controller="display" ng-cloak>
	<div class="panel-heading">筛选</div>
	<div class="panel-body we7-padding">
		<form action="./index.php" method="get" class="we7-form" role="form">
			<input type="hidden" name="c" value="mc">
			<input type="hidden" name="a" value="member">
			<div class="form-group">
				<label class="col-sm-2 control-label">昵称/姓名/手机号码/openid</label>
				<div class="col-sm-5">
					<div class="input-group">
						<div class="input-group-btn">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								{{ searchMod == 2 ? '模糊' : '精准' }}
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" style="width: 10px;">
							<li><a href="javascript:;" ng-click="setSearchMod('2')">模糊</a></li>
							<li><a href="javascript:;" ng-click="setSearchMod('1')">精准</a></li>
						</ul>
							</div>
						<input type="text" class="form-control" name="username" value="<?php  echo $_GPC['username'];?>" />
						<input type="text" name="search_mod" ng-model="searchMod" style="display:none;"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">注册时间</label>
				<div class="col-sm-5">
					<?php  echo tpl_form_field_daterange('datelimit', array('start' => $_GPC['datelimit']['start'],'end' => $_GPC['datelimit']['end']), false)?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">所属用户组</label>
				<div class="col-sm-5">
					<select name="groupid" class="form-control">
						<option value="" selected="selected">不限</option>
						<?php  if(is_array($groups)) { foreach($groups as $group) { ?>
						<option value="<?php  echo $group['groupid'];?>"<?php  if($group['groupid'] == $_GPC['groupid']) { ?> selected="selected"<?php  } ?>><?php  echo $group['title'];?></option>
						<?php  } } ?>
					</select>
				</div>
				<div class="pull-right col-sm-5">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
					<input class="btn btn-primary" type="submit" name="export_submit" id="export_submit" value="导出">
					<a href="<?php  echo url('mc/member/add');?>" class="btn btn-primary">添加会员</a>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	angular.module('member', []).controller('display', function($scope) {
		$scope.searchMod = "<?php  echo $search_mod;?>";
		$scope.setSearchMod = function(type) {
			$scope.searchMod = type;
		};
	});
</script>
<form method="post" class="we7-form" id="form1">
			<table class="table we7-table table-hover vertical-middle">
				<input type="hidden" name="do" value="del" />
				<col width="40px"/>
				<col width="90px"/>
				<col width="150px"/>
				<col />
				<col />
				<col />
				<col width="90px"/>
				<col width="210px"/>
				<tr>
					<th class="text-left">删除</th>
					<th >会员编号</th>
					<th>昵称/真实姓名</th>
					<th>手机</th>
					<th >邮箱</th>
					<th class="text-left">余额/积分</th>
					<th >注册时间</th>
					<th class="text-right">操作</th>
				</tr>
				<?php  if(is_array($list)) { foreach($list as $li) { ?>
				<tr>
					<td style="overflow: hidden;">
						<input type="checkbox" we7-check-all="1" name="uid[]" id="uid-<?php  echo $li['uid'];?>" value="<?php  echo $li['uid'];?>" class="">
						<label for="uid-<?php  echo $li['uid'];?>">&nbsp;</label>
					</td>
					<td><?php  echo $li['uid'];?></td>
					<td>
						<?php  if($li['nickname']) { ?><?php  echo $li['nickname'];?><?php  } else { ?>未完善<?php  } ?>
						<br>
						<?php  if($li['realname']) { ?><?php  echo $li['realname'];?><?php  } else { ?>未完善<?php  } ?>
					</td>
					<td><?php  if($li['mobile']) { ?><?php  echo $li['mobile'];?><?php  } else { ?>未完善<?php  } ?></td>
					<td><?php  if($li['email_effective'] == 1) { ?><?php  echo $li['email'];?><?php  } else { ?>未完善<?php  } ?></td>
					<td class="text-left">
						<span class="label label-primary">余额：<?php  echo $li['credit2'];?></span>
						<br>
						<span class="label label-warning">积分：<?php  echo $li['credit1'];?></span>
					</td>
					<td ><?php  echo date('Y-m-d H:i',$li['createtime'])?></td>
					<td style="overflow:visible;">
						<div class="link-group">
							<a href="<?php  echo url('mc/member/base_information',array('uid' => $li['uid']))?>">管理设置</a>
							<a href="<?php  echo url('mc/member/del',array('uid' => $li['uid']))?>" onclick="return confirm('确定删除会员吗?')" title="删除" class="">删除</a>
						</div>
					</td>
				</tr>
				<?php  } } ?>
			</table>
			<div class="we7-margin-left">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
				<input type="checkbox" we7-check-all="1" id="check-all" name="uid[]" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});">
				<label for="check-all"> &nbsp;</label>
				<input type="submit" name="submit" class="btn btn-danger btn-submit" value="删除">
			</div>

	<div class="text-right">
		<?php  echo $pager;?>
	</div>
</form>
<?php  } ?>

<?php  if($do == 'add') { ?>
<form action="./index.php?c=mc&a=member&do=add" method="post" class="form-horizontal" role="form" id="form1">
	<div class="panel panel-info">
		<div class="panel-heading">添加会员</div>
		<div class="panel-body we7-padding">
			<div class="form-group">
				<label class="col-sm-2 control-label">会员姓名</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" name="realname" value="" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">手机号</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" name="mobile" value="" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">登录密码</label>
				<div class="col-sm-9 col-xs-12">
					<input type="password" name="password" value="" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">邮箱</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" name="email" value="" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">积分</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" name="credit1" value="0" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">余额</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" name="credit2" value="0" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">会员组</label>
				<div class="col-sm-9 col-xs-12">
					<select name="groupid" class="form-control">
						<?php  if(is_array($_W['account']['groups'])) { foreach($_W['account']['groups'] as $group) { ?>
						<option value="<?php  echo $group['groupid'];?>"><?php  echo $group['title'];?></option>
						<?php  } } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-9 col-xs-12">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
			<input type="hidden" name="form" value="<?php  echo $_W['token'];?>"/>
			<input type="submit" value="提交" class="btn btn-primary"/>
		</div>
	</div>
</form>
<script>
	require(['validator'], function(){
		$(function(){
			$('#form1').bootstrapValidator({
				fields: {
					realname: {
						validators: {
							notEmpty: {
								message: '姓名不能为空'
							}
						}
					},
					mobile: {
						validators: {
							notEmpty: {
								message: '手机不能为空'
							},
							regexp: {
								regexp: /1\d{10}/,
								message: '手机号格式不正确'
							},
							remote: {
								url: "<?php  echo url('mc/member/add');?>",
								data: function(validator) {
									return {
										type: 'mobile',
										data: validator.getFieldElements('mobile').val()
									};
								},
								message: '手机号已经被占用'
							}
						}
					},
					email: {
						validators: {
							regexp: {
								regexp: /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/i,
								message: '邮箱格式不正确'
							},
							remote: {
								url: "<?php  echo url('mc/member/add');?>",
								data: function(validator) {
									return {
										type: 'email',
										data: validator.getFieldElements('email').val()
									};
								},
								message: '邮箱已经被占用'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: '密码不能为空'
							},
							stringLength: {
								min: 8,
								max: 15,
								message: '密码最少为8位'
							}
						}
					},
					credit1: {
						validators: {
							regexp: {
								regexp: /^[0-9]\d*$/i,
								message: '积分格式不正确'
							}
						}
					},
					credit2: {
						validators: {
							regexp: {
								regexp: /^[0-9]\d*$/i,
								message: '余额格式不正确'
							}
						}
					}
				}
			});
		});
	});
</script>
<?php  } ?>

<?php  if($do == 'credit_setting') { ?>
<div id="js-profile-credit" ng-controller="creditCtrl" ng-cloak>
	<table class="table we7-table table-hover vertical-middle">
		<col width="140px " />
		<col />
		<col width="140px" />
		<tr>
			<th class="text-left" colspan="4">支付参数</th>
		</tr>
		<tr>
			<td >credit1</td>
			<td>{{ creditSetting.credit1.title }}</td>
			<td>
				<label>
					<input name="" class="form-control" type="checkbox"  style="display: none;">
					<div ng-class="credit.enabled == 1 ? 'switch switchOn' : 'switch'" style="opacity : 0.3"></div>
				</label>
			</td>
			<td class="pull-right"><div class="link-group"><a href="javascript:;" ng-click="editCreditName('credit1')">设置名称</a></div></td>
		</tr>
		<tr>
			<td >credit2</td>
			<td>{{ creditSetting.credit2.title }}</td>
			<td>
				<label>
					<input name="" class="form-control" type="checkbox"  style="display: none;">
					<div ng-class="credit.enabled == 1 ? 'switch switchOn' : 'switch'" style="opacity : 0.3"></div>
				</label>
			</td>
			<td class="pull-right"><div class="link-group"><a href="javascript:;" ng-click="editCreditName('credit2')">设置名称</a></div></td>
		</tr>
		<tr>
			<td >credit3</td>
			<td>{{ creditSetting.credit3.title }}</td>
			<td>
				<label>
					<input name="" class="form-control" type="checkbox"  style="display: none;">
					<div ng-class="creditSetting.credit3.enabled == 1 ? 'switch switchOn' : 'switch'"  ng-click="changeEnabled('credit3')"></div>
				</label>
			</td>
			<td class="pull-right"><div class="link-group"><a href="javascript:;" ng-click="editCreditName('credit3')">设置名称</a></div></td>
		</tr>
		<tr>
			<td >credit4</td>
			<td>{{ creditSetting.credit4.title }}</td>
			<td>
				<label>
					<input name="" class="form-control" type="checkbox"  style="display: none;">
					<div ng-class="creditSetting.credit4.enabled == 1 ? 'switch switchOn' : 'switch'"  ng-click="changeEnabled('credit4')"></div>
				</label>
			</td>
			<td class="pull-right"><div class="link-group"><a href="javascript:;" ng-click="editCreditName('credit4')">设置名称</a></div></td>
		</tr>
		<tr>
			<td >credit5</td>
			<td>{{ creditSetting.credit5.title }}</td>
			<td>
				<label>
					<input name="" class="form-control" type="checkbox"  style="display: none;">
					<div ng-class="creditSetting.credit5.enabled == 1 ? 'switch switchOn' : 'switch'"  ng-click="changeEnabled('credit5')"></div>
				</label>
			</td>
			<td class="pull-right"><div class="link-group"><a href="javascript:;" ng-click="editCreditName('credit5')">设置名称</a></div></td>
		</tr>
	</table>

	<table class="table we7-table table-hover table-form">
		<col width="140px " />
		<col />
		<col width="140px" />
		<tr>
			<th class="text-left" colspan="3">积分策略</th>
		</tr>
		<tr>
			<td >基本和营销</td>
			<td>
				{{ creditSetting[tactics.activity].title }}
			</td>
			<td class="text-center">
				<div class="link-group"><a href="javascript:;" ng-click="editCreditTactics('activity')">更改</a></div>
			</td>
		</tr>
		<tr>
			<td >交易和支付(余额)</td>
			<td>
				{{ creditSetting[tactics.currency].title }}
			</td>
			<td class="text-center">
				<div class="link-group"><a href="javascript:;" ng-click="editCreditTactics('currency')">更改</a></div>
			</td>
		</tr>
	</table>

	<div class="modal fade" id="credit-name" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">设置积分名称</div>
				</div>
				<div class="modal-body">
					<div class="we7-form">
						<div class="form-group">
							<div class="form-controls">
								<input type="text" name="" class="form-control" ng-model="creditTitle" placeholder="输入积分名称">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="setCreditName()" data-dismiss="modal">确定</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="tactics" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">设置积分策略</div>
				</div>
				<div class="modal-body">
					<div class="we7-form">
						<div class="form-group">
							<div class="form-controls">
								<select ng-model="tactics.activity" ng-if="activeTacticsType == 'activity'" class="form-control">
									<option ng-repeat="credit in enabledCredit" value="{{ credit }}" ng-selected="credit == tactics.activity">{{ creditSetting[credit].title }}</option>
								</select>

								<select ng-model="tactics.currency" ng-if="activeTacticsType == 'currency'" class="form-control">
									<option ng-repeat="credit in enabledCredit" value="{{ credit }}" ng-selected="credit == tactics.currency">{{ creditSetting[credit].title }}</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="setCreditTactics()" data-dismiss="modal">确定</button>
				</div>
			</div>
		</div>
	</div>

</div>

<script>
	angular.module('profileApp').value('config', {
		'creditSetting' : <?php  echo json_encode($credit_setting)?>,
		'enabledCredit' : <?php  echo json_encode($enable_credit)?>,
		'activity' : "<?php  echo $credit_tactics['activity'];?>",
		'currency' : "<?php  echo $credit_tactics['currency'];?>",
		'saveCreditSetting' : "<?php  echo url('mc/member/save_credit_setting')?>",
		'saveTacticsSetting' : "<?php  echo url('mc/member/save_tactics_setting')?>"
	});
	angular.bootstrap($('#js-profile-credit'), ['profileApp']);
</script>
<?php  } ?>

<?php  if($do == 'register_setting') { ?>
	<form id="payform" action="<?php  echo url('mc/member/register_setting')?>" method="post" class="we7-form form">
		<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">会员注册设置</label>
					<div class="col-sm-9 col-xs-12">
							<input id="radio-1" type="radio" name="passport[focusreg]" value="1" <?php  if(!empty($register_setting['focusreg'])) { ?> checked="checked"<?php  } ?>/>
						<label for="radio-1">
						会员手动注册
						</label>
							<input id="radio-2" type="radio" name="passport[focusreg]" value="0" <?php  if(empty($register_setting['focusreg'])) { ?> checked="checked"<?php  } ?>/>
						<label for="radio-2">

						系统自动注册
						</label>
						<span class="help-block">当设置为"系统自动注册"，用户从微信进入系统时，当模块使用"checkauth"验证用户身份时，可以在非登录状态下直接使用模块功能。</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">身份验证项</label>
					<div class="col-sm-9 col-xs-12">
						<input id="radio-3"  type="radio" name="passport[item]" value="mobile" <?php  if($register_setting['item'] == 'mobile') { ?>
						checked="checked"<?php  } ?>/>
						<label for="radio-3">
						手机注册
						</label>
							<input id="radio-4" type="radio" name="passport[item]" value="email" <?php  if($register_setting['item'] == 'email') { ?> checked="checked"<?php  } ?>/>
						<label for="radio-4">
						邮箱注册
						</label>
							<input id="radio-5" type="radio" name="passport[item]" value="random" <?php  if($register_setting['item'] == 'random' || empty($register_setting['item'])) { ?> checked="checked"<?php  } ?>/>
						<label for="radio-5">

						二者都行
						</label>
						<span class="help-block">该项设置用户注册时用户名的格式,如果设置为:"邮箱注册",系统会判断用户的注册名是否是邮箱格式</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">强制验证手机号/邮箱</label>
					<div class="col-sm-9 col-xs-12">
						<input id="radio-6" type="radio" name="passport[audit]" value="1" <?php  if($register_setting['audit'] == 1) { ?> checked="checked"<?php  } ?>/>
						<label for="radio-6">是</label>
						<input id="radio-7" type="radio" name="passport[audit]" value="0" <?php  if(empty($register_setting['audit'])) { ?> checked="checked"<?php  } ?>/>
						<label for="radio-7">否</label>
						<span class="help-block">设置强制验证手机号/邮箱，用户在注册的时候，系统会给用户的手机或邮箱发送验证码，以验证手机或邮箱的有效性</span>
					</div>
				</div>
				<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">短信模版ID</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" name="passport[smsid]" class="form-control" value="<?php  echo $register_setting['smsid'];?>" />
                            <div class="help-block">此项填写短信验证码模版ID（支持阿里大于，模版变量：${verify}），<a href="./index.php?c=fournet&a=msg&">移步全局打印机设置</a></div>
						</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">身份验证方式</label>
					<div class="col-sm-9 col-xs-12">
						<input id="radio-8" type="radio" name="passport[type]" value="code" <?php  if($register_setting['type'] == 'code') { ?> checked="checked"<?php  } ?>/>
						<label for="radio-8">随机密码</label>
						<input id="radio-9" type="radio" name="passport[type]" value="password" <?php  if($register_setting['type'] == 'password' || empty($passport['type'])) { ?> checked="checked"<?php  } ?>/>
						<label for="radio-9">固定密码</label>
						<input id="radio-10" type="radio" name="passport[type]" value="hybird" <?php  if($register_setting['type'] == 'hybird') { ?> checked="checked"<?php  } ?>/>
						<label for="radio-10">混合密码</label>
						<span class="help-block">使用邮箱或者手机号+密码来登录系统</span>
						<span class="help-block">随机密码方式: 采用发送验证码的方式, 用户不需要记录密码. 在微信以外的渠道登录系统时, 需要输入手机或邮箱+验证码来进入系统</span>
						<span class="help-block">固定密码方式: 采用设置密码的方式, 用户在首次使用时设置固定的访问密码. 在微信以外的渠道登录系统时, 需要输入手机或邮箱+密码来进入系统</span>
						<span class="help-block">混合密码方式: 混合使用两种验证方式, 用户可以自己选择是否设置访问密码. 如果设置了访问密码, 那么登录是可以使用手机或邮箱+随机密码或固定密码来进入系统</span>
						<span class="help-block"><strong>注意: 使用随机密码或者混合密码时, 必须先 <a href="<?php  echo url('profile/notify');?>" target="_blank">设置邮件</a> 或<a href="<?php  echo url('cloud/sms')?>">短信</a></strong> 选项</strong></span>
					</div>
				</div>
			</div>
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
