<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">
    当前位置：<span class="text-primary"><?php  if(!empty($level['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>会员等级<?php  if(!empty($level['id'])) { ?>(<?php  echo $level['levelname'];?>)<?php  } ?></span>
</div>

<div class="page-content">
    <div class="page-sub-toolbar">
        <span class=''>
            <?php if(cv('member.level.add')) { ?>
                <a class="btn btn-primary btn-sm" href="<?php  echo webUrl('member/level/add')?>">添加新会员等级</a>
            <?php  } ?>
        </span>
    </div>
    <form <?php if( ce('member.level' ,$level) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php  echo $level['id'];?>" />
        <?php  if($id!='default') { ?>
            <div class="form-group">
                <label class="col-lg control-label">等级</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('member.level' ,$level) ) { ?>
                    <select  name="level" class="form-control tp_is_default" style="width:90px;">
                        <?php  if(is_array($level_array)) { foreach($level_array as $key => $value) { ?>
                        <option value="<?php  echo $value;?>" <?php  if($level['level']==$value) { ?>selected<?php  } ?>><?php  echo $value;?></option>
                        <?php  } } ?>
                    </select>

                    <span class='help-block'>数字越大等级越高</span>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $level['level'];?></div>
                    <?php  } ?>
                </div>
            </div>
        <?php  } ?>
        <div class="form-group">
            <label class="col-lg control-label must"> <?php  if($id=='default') { ?>默认<?php  } ?>等级名称</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('member.level' ,$level) ) { ?>
                <input type="text" name="levelname" class="form-control" value="<?php  echo $level['levelname'];?>" data-rule-required="true" />
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $level['levelname'];?></div>
                <?php  } ?>
            </div>
        </div>
        <?php  if($id!='default') { ?>
            <div class="form-group" <?php  if($id=='default') { ?>style="display: none;"<?php  } ?>>
            <label class="col-lg control-label">升级条件</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('shop.adv' ,$item) ) { ?>
                <label class='radio-inline'>
                    <input type='radio' name='buygoods' value='0' onclick="chose(0)" <?php  if($level['buygoods']==0) { ?>checked<?php  } ?> /> 订单金额/数量
                </label>
                <label class='radio-inline'>
                    <input type='radio' name='buygoods' value='1' onclick="chose(1)"  <?php  if($level['buygoods']==1) { ?>checked<?php  } ?> /> 购买指定商品
                </label>

                <label class='radio-inline'>
                    <input type='radio' name='buygoods' value='2' onclick="chose(2)"  <?php  if($level['buygoods']==2) { ?>checked<?php  } ?> /> 购买指定分类商品
                </label>
                <?php  } else { ?>
                <div class='form-control-static'><?php  if(empty($item['enabled'])) { ?>隐藏<?php  } else { ?>显示<?php  } ?></div>
                <?php  } ?>
            </div>
        </div>
            <div class="form-group" >
                <label class="col-lg control-label"></label>
                <div class="col-sm-9 col-xs-12" id="typeone" <?php  if($level['buygoods']=='1'||$level['buygoods']=='2') { ?>style="display:none"<?php  } ?> >
                    <?php if( ce('member.level' ,$level) ) { ?>
                        <div class='input-group fixsingle-input-group'>
                            <?php  if(empty($set['shop']['leveltype'])) { ?>
                                <span class='input-group-addon'>完成订单金额满</span>
                                <input type="text" name="ordermoney" class="form-control" value="<?php  echo $level['ordermoney'];?>" />
                                <span class='input-group-addon'>元</span>
                            <?php  } ?>
                            <?php  if($set['shop']['leveltype']==1) { ?>
                                <span class='input-group-addon'>完成订单数量满</span>
                                <input type="text" name="ordercount" class="form-control" value="<?php  echo $level['ordercount'];?>" />
                                <span class='input-group-addon'>个</span>
                            <?php  } ?>
                        </div>
                        <span class='help-block'>会员升级条件，不填写默认为不自动升级, 设置<a href="<?php  echo webUrl('sysset/member')?>">【会员升级依据】</a> </span>
                    <?php  } else { ?>
                        <div class='form-control-static'>
                            <?php  if(empty($shopset['leveltype'])) { ?>
                            <?php  if($level['ordermoney']>0) { ?>
                            完成订单金额满 <?php  echo $level['ordermoney'];?>元
                            <?php  } else { ?>
                            不自动升级
                            <?php  } ?>
                            <?php  } ?>
                            <?php  if($shopset['leveltype']==1) { ?>
                            <?php  if($level['ordercount']>0) { ?>
                            完成订单数量满 <?php  echo $level['ordercount'];?>个
                            <?php  } else { ?>
                            不自动升级
                            <?php  } ?>
                            <?php  } ?>
                        </div>
                    <?php  } ?>
                </div>
                <div class="col-sm-9 col-xs-12" id="typetwo" <?php  if($level['buygoods']!='1') { ?>style="display:none"<?php  } ?>>
                    <div class=' fixsingle-input-group' style="width: 800px;">
                        <div class="col-sm-9 col-xs-12">
                            <?php  echo tpl_selector('goodsids',array(
                             'preview'=>true,
                            'multi'=>1,
                            'nokeywords'=>true,
                            'autosearch'=>1,
                            'value'=>$item['title'],
                            'url'=>webUrl('goods/query'),
                            'items'=>$goods,
                            'buttontext'=>'选择商品',
                            'placeholder'=>'请选择商品')
                            )
                            ?>
                        </div>
                    </div>
                <div class="col-sm-9">
                    <span class='help-block'>会员升级条件，不填写默认为不自动升级, 设置<a href="<?php  echo webUrl('sysset/member')?>">【会员升级依据】</a> </span>
                </div>
                </div>
<div class="col-sm-9 col-xs-12" id="typethree" <?php  if($level['buygoods']!='2') { ?>style="display:none"<?php  } ?>>
<div class=' fixsingle-input-group' style="width: 800px;">
    <div class="col-sm-9 col-xs-12">
        <?php $condition_cates=empty($level['condition_cates'])?[]: explode(",", $level['condition_cates']);?>
        <select id="cates"  name='condition_cates[]' class="form-control select2" style='width:605px;' multiple='' data-placeholder="请选择分类" >
            <?php  if(is_array($category)) { foreach($category as $c) { ?>
            <option value="<?php  echo $c['id'];?>" <?php  if(is_array($condition_cates) &&  in_array($c['id'],$condition_cates)) { ?>selected<?php  } ?>><?php  echo $c['name'];?></option>
            <?php  } } ?>
        </select>
        <label class="control-label">
            购买分类中商品次数
        </label>

        <select name="condition_cates_number" class="form-control select2" >
            <?php  for($index=1;$index<=10;$index++){?>
            <option value="<?php  echo $index;?>" <?php  if($level['condition_cates_number']==$index) { ?>selected<?php  } ?>><?php  echo $index;?></option>
            <?php }?>
        </select>
    </div>
</div>
<div class="col-sm-9">
    <span class='help-block'>会员升级条件，不填写默认为不自动升级, 设置<a href="<?php  echo webUrl('sysset/member')?>">【会员升级依据】</a> </span>
</div>
</div>

            </div>
        <?php  } ?>
        <div class="form-group">
    <label class="col-lg control-label">折扣类型</label>
    <div class="col-sm-9 col-xs-12">
        <div class="input-group">
            <label class="radio radio-inline">
                <input type="radio" name="discount_type" onchange="change_discount()" value="0" <?php  if(intval($level['discount_type']) !=1) { ?>checked="checked"<?php  } ?>> 折扣
            </label>
            <label class="radio radio-inline">
                <input type="radio" name="discount_type"  onchange="change_discount()" value="1" <?php  if(intval($level['discount_type']) ==1 ) { ?>checked="checked"<?php  } ?>> 分类购买权限
            </label>
        </div>
    </div>
</div>
        <div class="form-group">
            <label class="col-lg control-label">折扣</label>
            <div class="col-sm-9 col-xs-12" id="discount_type_0" style="<?php  if(intval($level['discount_type']) ==1) { ?>display:none<?php  } ?>">
                <?php if( ce('member.level' ,$level) ) { ?>
                    <div class="input-group fixsingle-input-group">
                        <input type="text" name="discount" class="form-control" value="<?php  echo $level['discount'];?>" />
                        <div class="input-group-addon">折</div>
                    </div>
                    <span class='help-block'>请输入0.1~10之间的数字,值为空代表不设置折扣</span>
                <?php  } else { ?>
                    <div class='form-control-static'>
                        <?php  if(empty($level['discount'])) { ?>
                        不打折
                        <?php  } else { ?>
                        <?php  echo $level['discount'];?>折
                        <?php  } ?>
                    </div>
                <?php  } ?>
            </div>
            <div class="col-sm-9 col-xs-12" id="discount_type_1"  style="<?php  if(intval($level['discount_type']) !=1) { ?>display:none<?php  } ?>">
                <?php $discount_type_cate=empty($level['discount_type_cate'])?[]: explode(",", $level['discount_type_cate']);?>
                <select id="discount_type"  name='discount_type_cate[]' class="form-control select2" style='width:605px;' multiple='' data-placeholder="请选择分类" >
                    <?php  if(is_array($category)) { foreach($category as $c) { ?>
                    <option value="<?php  echo $c['id'];?>" <?php  if(is_array($discount_type_cate) &&  in_array($c['id'],$discount_type_cate)) { ?>selected<?php  } ?>><?php  echo $c['name'];?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>
        <div class="form-group" <?php  if($id=='default') { ?>style="display: none;"<?php  } ?>>
            <label class="col-lg control-label">状态</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('shop.adv' ,$item) ) { ?>
                    <label class='radio-inline'>
                        <input type='radio' name='enabled' value='1' <?php  if($level['enabled']==1) { ?>checked<?php  } ?> /> 启用
                    </label>
                    <label class='radio-inline'>
                        <input type='radio' name='enabled' value='0' <?php  if($level['enabled']==0) { ?>checked<?php  } ?> /> 禁用
                    </label>
                <?php  } else { ?>
                    <div class='form-control-static'><?php  if(empty($item['enabled'])) { ?>隐藏<?php  } else { ?>显示<?php  } ?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group"></div>
        <div class="form-group">
            <label class="col-lg control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('member.level' ,$level) ) { ?>
                    <input type="submit" value="提交" class="btn btn-primary"  />
                <?php  } ?>
                <input type="button" name="back" onclick='history.back()' <?php if(cv('member.level.add|member.level.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />
            </div>
        </div>
    </form>

</div>
<script type="text/javascript">
   function chose(num){
       if (num == 0){
           $("#typeone").show();
           $("#typetwo").hide();
           $("#typethree").hide();
       }else if(num == 1){
           $("#typeone").hide();
           $("#typetwo").show();
           $("#typethree").hide();
       }else{
           $("#typeone").hide();
           $("#typetwo").hide();
           $("#typethree").show();
       }
   }
   function change_discount() {
       var discount_type=$("[name=discount_type]:checked").val();
       $("#discount_type_1,#discount_type_0").hide()

       $("#discount_type_"+discount_type).show();
   }
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
