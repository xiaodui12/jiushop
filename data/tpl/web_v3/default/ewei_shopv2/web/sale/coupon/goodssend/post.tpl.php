<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary"><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>发放任务 </span>
</div>

<div class="page-content">
    <?php if(cv('sale.coupon')) { ?>
    <div class="page-sub-toolbar">
        <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('sale/coupon/goodssend/edit')?>"><i class='fa fa-plus'></i> 添加任务</a>
    </div>
    <?php  } ?>
    <form <?php if( ce('sale.coupon' ,$item) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
    <div class="tab-content ">
        <div class="tab-pane active">
            <div class="panel-body">

                <div class="form-group">
                    <?php if( ce('sale.coupon' ,$item) ) { ?>
                    <label class="col-lg control-label">选择商品</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_selector('goodsid',array(
                    'preview'=>false,
                        'readonly'=>true,
                        'multi'=>0,
                        'value'=>null,
                        'url'=>webUrl('sale/coupon/querygoods'),
                        'items'=>$goods,
                        'buttontext'=>'选择商品',
                        'placeholder'=>'请选择商品')
                        )
                        ?>
                    </div>
                    <?php  } else { ?>
                    <?php  if(!empty($goods)) { ?>
                    <?php  if(is_array($goods)) { foreach($goods as $item) { ?>
                    <a href="<?php  echo tomedia($item['thumb'])?>" target='_blank'>
                        <img src="<?php  echo tomedia($item['thumb'])?>" style='width:100px;border:1px solid #ccc;padding:1px'  onerror="this.src='../addons/ewei_shopv2/static/images/nopic.png'" />
                    </a>
                    <?php  } } ?>
                    <?php  } else { ?>
                    暂无商品
                    <?php  } ?>
                    <?php  } ?>

                </div>

                <div class="form-group">
                    <?php if( ce('sale.coupon' ,$item) ) { ?>
                    <label class="col-lg control-label">选择优惠券</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_selector('couponid',array(
                                'preview'=>false,
                        'readonly'=>true,
                        'multi'=>0,
                        'value'=>null,
                        'url'=>webUrl('sale/coupon/querycoupons'),
                        'items'=>$coupon,
                        'buttontext'=>'选择优惠券',
                        'placeholder'=>'请选择优惠券')
                        )
                        ?>
                    </div>
                    <?php  } else { ?>
                    <?php  if(!empty($coupon)) { ?>
                    <a href="<?php  echo tomedia($coupon['thumb'])?>" target='_blank'>
                        <img src="<?php  echo tomedia($coupon['thumb'])?>" style='width:100px;border:1px solid #ccc;padding:1px'  onerror="this.src='../addons/ewei_shopv2/static/images/nopic.png'" />
                    </a>
                    <?php  } else { ?>
                    暂无商品
                    <?php  } ?>
                    <?php  } ?>
                </div>



                <div class="form-group ">
                    <label class="col-lg control-label must">发送数量</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if( ce('sale.coupon' ,$item) ) { ?>
                        <div class="input-group">
                            <!--<select class='form-control '  id="sendnum" name="sendnum" >
                                <option value="1" <?php  if($item['sendnum']=='1') { ?> selected<?php  } ?>>1</option>
                                <option value="2" <?php  if($item['sendnum']=='2') { ?> selected<?php  } ?>>2</option>
                                <option value="3" <?php  if($item['sendnum']=='3') { ?> selected<?php  } ?>>3</option>
                                <option value="4" <?php  if($item['sendnum']=='4') { ?> selected<?php  } ?>>4</option>
                                <option value="5" <?php  if($item['sendnum']=='5') { ?> selected<?php  } ?>>5</option>
                            </select>-->
                            <input type='text' class='form-control' id="sendnum" name="sendnum"  value="<?php  echo $item['sendnum'];?>" />
                            <span class="input-group-addon">张</span>
                        </div>
                        <span class="help-block image-block" style="display: block;">当用户购买此商品时,赠送几张指定的优惠券，最高不能超过50张</span>
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $item['sendnum'];?></div>
                        <?php  } ?>
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-lg control-label must">剩余数量</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if( ce('sale.coupon' ,$item) ) { ?>
                        <div class="input-group fixsingle-input-group">
                            <input type='text' class='form-control' name='num' value="<?php  echo $item['num'];?>" />
                            <span class="input-group-addon">张</span>
                        </div>
                        <span class="help-block image-block" style="display: block;">当剩余数量小于发送数量时,发送任务停止</span>
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $item['num'];?></div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg control-label">限时设置</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if( ce('sale.package' ,$item) ) { ?>
                        <div class="input-group">
                            <?php echo tpl_form_field_eweishop_daterange('sendtime', array('starttime'=>date('Y-m-d', empty($item['starttime'])? time(): intval($item['starttime'])),'endtime'=>date('Y-m-d', empty($item['endtime'])? time(): intval($item['endtime']))));?>
                        </div>
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  echo date('Y-m-d H',$item['starttime'])?> - <?php  echo date('Y-m-d H',$item['endtime'])?></div>
                        <?php  } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg control-label must">发送节点</label>
                    <div class="col-xs-12 col-sm-8">
                        <div class="input-group">
                            <?php if( ce('sale.coupon' ,$item) ) { ?>
                            <label class="radio radio-inline">
                                <input type="radio" name="sendpoint" value="1" <?php  if(intval($item['sendpoint']) ==1 ) { ?>checked="checked"<?php  } ?>> (推荐)订单完成后（包括子订单内所有订单收货后）发送优惠券
                            </label>
                            <label class="radio radio-inline">
                                <input type="radio" name="sendpoint" value="2" <?php  if(intval($item['sendpoint']) ==2 ) { ?>checked="checked"<?php  } ?>> 订单付款后发送优惠券
                            </label>
                            <?php  } else { ?>
                            <div class='form-control-static'><?php  if(intval($item['sendpoint']) ==1 ) { ?>(推荐)订单完成后（包括子订单内所有订单收货后）发送优惠券<?php  } else if(intval($item['sendpoint']) ==2) { ?>订单付款后发送优惠券<?php  } ?></div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg control-label must">状态</label>
                    <div class="col-xs-12 col-sm-8">
                        <div class="input-group">
                            <?php if( ce('sale.coupon' ,$item) ) { ?>
                            <label class="radio radio-inline">
                                <input type="radio" name="status" value="1" <?php  if(intval($item['status']) ==1 ) { ?>checked="checked"<?php  } ?>> 开启
                            </label>
                            <label class="radio radio-inline">
                                <input type="radio" name="status" value="0" <?php  if(intval($item['status']) ==0) { ?>checked="checked"<?php  } ?>> 关闭
                            </label>
                            <?php  } else { ?>
                            <div class='form-control-static'><?php  if(intval($item['status']) ==1 ) { ?>开启<?php  } else { ?>关闭<?php  } ?></div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php if( ce('sale.coupon' ,$item) ) { ?>
    <div class="form-group">
        <label class="col-lg control-label"></label>
        <div class="col-sm-9 col-xs-12">
            <input type="submit"  value="提交" class="btn btn-primary" />
            <a class="btn btn-default" href="<?php  echo webUrl('sale/coupon/goodssend')?>">返回列表</a>
        </div>
    </div>
    <?php  } ?>
    </form>

</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>