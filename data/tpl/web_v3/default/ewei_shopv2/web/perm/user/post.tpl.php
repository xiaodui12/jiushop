<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
 
<div class="page-header">
    <span>当前位置：<span class="text-primary"><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>操作员 <small><?php  if(!empty($item['id'])) { ?>修改【<?php  echo $item['username'];?>】<?php  } ?></small></span></span>

</div>
<div class="page-content">
    <div class="page-sub-toolbar">
        <span class=''>
            <?php if(cv('perm.user.add')) { ?>
                <a class="btn btn-primary btn-sm" href="<?php  echo webUrl('perm/user/add')?>">添加新操作员</a>
            <?php  } ?>
        </span>
    </div>
    <form id="dataform" action="" method="post" class="form-horizontal form-validate" >
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />

                 <div class="form-group">
                     <label class="col-lg control-label must">操作员用户名</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if( ce('perm.user' ,$item) ) { ?>
                        <input type="text" name="username" class="form-control" value="<?php  echo $item['username'];?>" <?php  if(!empty($item)) { ?>readonly<?php  } ?> data-rule-required=true autocomplete="off" />
	    <span class='help-block'>不能输入 系统现有用户!  只能新增 权限才能生效. 新增的从这里可以修改</span>
                               <?php  } else { ?>
                               <div class='form-control-static'><?php  echo $item['username'];?></div>
                               <?php  } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg control-label must">操作员密码</label>
                    <div class="col-sm-9 col-xs-12">
                              <?php if( ce('perm.user' ,$item) ) { ?>
                        <input type="password" name="password" class="form-control" value="" autocomplete="off" <?php  if(empty($item['password'])) { ?>data-rule-required='true' <?php  } ?>/>
                          <?php  } else { ?>
                               <div class='form-control-static'>********</div>
                               <?php  } ?>
                    </div>
                </div>


                 <div class="form-group">
                    <label class="col-lg control-label">所属角色</label>
                    <div class="col-sm-9 col-xs-12">
                         <?php if( ce('perm.user' ,$item) ) { ?>
                        <input type='hidden' id='userid' name='roleid' value="<?php  echo $role['id'];?>" />
                        <div class='input-group'>
                            <input type="text" name="user" maxlength="30" value="<?php  echo $role['rolename'];?>" id="user" class="form-control" readonly />
                            <div class='input-group-btn'>
                                <button class="btn btn-default" type="button" onclick="popwin = $('#modal-module-menus1').modal();">选择角色</button>
                                <button class="btn btn-danger" type="button" onclick="$('#userid').val('');$('#user').val('');">清除选择</button>
                            </div>
                        </div>
						<span class='help-block'>如果您选择了角色，则此用户本身就继承了此角色的所有权限</span>
                        <div id="modal-module-menus1"  class="modal fade" tabindex="-1">
                            <div class="modal-dialog" style='width: 920px;'>
                                <div class="modal-content">
                                    <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择角色</h3></div>
                                    <div class="modal-body" >
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="keyword" value="" id="search-kwd1" placeholder="请输入角色名称" />
                                                <span class='input-group-btn'><button type="button" class="btn btn-default" onclick="search_users();">搜索</button></span>
                                            </div>
                                        </div>
                                        <div id="module-menus1" style="padding-top:5px;"></div>
                                    </div>
                                    <div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
                                </div>

                            </div>
                        </div>
                          <?php  } else { ?>
                               <div class='form-control-static'><?php  echo $user['username'];?></div>
                               <?php  } ?>
                    </div>
                </div>
        <?php  if(p('mmanage')) { ?>
        <div class="form-group">
            <label class="col-lg control-label">绑定微信号</label>
            <div class="col-sm-10 col-xs-12">
                <?php if( ce('perm.user' ,$item) ) { ?>
                <?php  echo tpl_selector('openid',array('key'=>'openid','text'=>'nickname', 'thumb'=>'avatar','multi'=>0,'placeholder'=>'昵称/姓名/手机号','buttontext'=>'选择商城用户', 'items'=>$member,'url'=>webUrl('member/query') ))?>
                <?php  } else { ?>
                <div class="input-group multi-img-details container">
                    <div class="multi-item">
                        <img class="img-responsive img-thumbnail" src="<?php  echo $member['avatar']?>" />
                        <div class="img-nickname"><?php  echo $member['nickname'];?></div>
                    </div>
                </div>
                <?php  } ?>
                <div class="form-control-static">提示: 操作员绑定微信号后，使用手机端管理后台时可以直接授权登录</div>
            </div>
        </div>
        <?php  } ?>

        <div class="form-group">
            <label class="col-lg control-label">操作员姓名</label>
            <div class="col-sm-10  col-xs-12">
                <?php if( ce('perm.user' ,$item) ) { ?>
                <input type="text" name="realname" class="form-control" value="<?php  echo $item['realname'];?>" />
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['realname'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">操作员电话</label>
            <div class="col-sm-10  col-xs-12">
                <?php if( ce('perm.user' ,$item) ) { ?>
                <input type="text" name="mobile" class="form-control" value="<?php  echo $item['mobile'];?>" />
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['mobile'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">操作员状态</label>
            <div class="col-sm-10  col-xs-12">
                <?php if( ce('perm.user' ,$item) ) { ?>
                <label class='radio-inline'>
                    <input type='radio' name='status' value='1' <?php  if($item['status']==1) { ?>checked<?php  } ?> /> 启用
                </label>
                <label class='radio-inline'>
                    <input type='radio' name='status' value='0' <?php  if($item['status']==0) { ?>checked<?php  } ?> /> 禁用
                </label>
                <?php  } else { ?>
                <div class='form-control-static'><?php  if($item['status']==1) { ?>启用<?php  } else { ?>禁用<?php  } ?></div>
                <?php  } ?>
            </div>
        </div>
        
                 <?php if( ce('perm.user' ,$item) ) { ?>
                 <div class="form-group">
                    <label class="col-lg control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <span class='form-control-static'>用户可以在此角色权限的基础上附加其他权限</span>
                    </div>
                </div>
                 <?php  } ?>

                <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('perm/perms', TEMPLATE_INCLUDEPATH)) : (include template('perm/perms', TEMPLATE_INCLUDEPATH));?>
                 <?php if( ce('perm.user' ,$item) ) { ?>
                 <?php  } else { ?>
                 <script language='javascript'>
                     $(function(){
                         $(':checkbox').attr('disabled',true);
                     })
                     </script>
                     <?php  } ?>
                <div class="form-group"></div>
                 <div class="form-group">
                    <label class="col-lg control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                         <?php if( ce('perm.user' ,$item) ) { ?>
                            <input type="hidden" name="uid" value="<?php  echo $item['uid'];?>" />
                        <input type="submit" value="提交" class="btn btn-primary" />

                        <?php  } ?>
                       <input type="button" name="back" onclick='history.back()' <?php if(cv('perm.user.add|perm.user.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />
                    </div>
                </div>

    </form>
</div>
<script language='javascript'>

    function search_users() {
        $("#module-menus1").html("正在搜索....")
        $.get('<?php  echo webUrl("perm/role/query")?>', {
            keyword: $.trim($('#search-kwd1').val())
        }, function(dat){
            $('#module-menus1').html(dat);
        });
    }
    function select_role(o) {
        $("#userid").val(o.id);
        $("#user").val( o.rolename );
        var perms = o.perms2.split(',');


        $(':checkbox').removeAttr('disabled').removeAttr('checked').each(function(){

            var _this = $(this);
            var perm = '';
            if( _this.data('group') ){
                perm+=_this.data('group');
            }
            if( _this.data('parent') ){
                if (_this.data('parent') != 'text') {
                    perm += "." + _this.data('parent');
                }else if(_this.data('parent') == 'text' && _this.data('group') == 'goods'){
                    perm = _this.val();
                }
            }
            if( _this.data('son') ){
                if (_this.data('son') != 'text') {
                    perm += "." + _this.data('son');
                }
            }
            if( _this.data('grandson') ){
                if (_this.data('grandson') != 'text') {
                    perm += "." + _this.data('grandson');
                }
            }
            if( $.arrayIndexOf(perms,perm)!=-1){
                $(this).attr('disabled',true).get(0).checked =true;
            }

        });
        $(".close").click();
    }
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
 