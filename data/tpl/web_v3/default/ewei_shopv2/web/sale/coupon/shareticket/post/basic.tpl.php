<?php defined('IN_IA') or exit('Access Denied');?>
<div class="form-group">
	<label class="col-lg control-label">排序</label>
	<div class="col-sm-9 col-xs-12">
		<?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
		<input type="text" name="order" class="form-control" value="<?php  echo $item['order'];?>"  />
		<span class='help-block'>数字越大越靠前</span>
		<?php  } else { ?>
		<div class='form-control-static'><?php  echo $item['order'];?></div>
		<?php  } ?>
	</div>
</div>

<div class="form-group">
	<label class="col-lg control-label must">发券条件</label>
	<div class="col-sm-9 col-xs-12">
		<?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
		<div class="input-group">
			<input type='number' class='form-control' name='enough' value="<?php  echo $item['enough'];?>" data-rule-required="true"/>
			<span class="input-group-addon">元</span>
		</div>
		<span class='help-block'>单笔订单满足此金额发送，0为任意订单可发，发送条件不可重复</span>
		<?php  } else { ?>
		<div class='form-control-static'><?php  if($item['enough']>0) { ?>满 <?php  echo $item['enough'];?> 可用 <?php  } else { ?>不限制<?php  } ?></div>
		<?php  } ?>
	</div>
</div>


<div class="form-group">
	<label class="col-lg control-label">设置活动时间</label>
	<div class="col-xs-12 col-sm-8">
		<div class="input-group">
			<?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
			<label class="radio radio-inline">
				<input type="radio" name="expiration" value="1" <?php  if(intval($item['expiration']) ==1 ) { ?>checked="checked"<?php  } ?>> 是
			</label>
			<label class="radio radio-inline">
				<input type="radio" name="expiration" value="0" <?php  if(intval($item['expiration']) ==0) { ?>checked="checked"<?php  } ?>> 否
			</label>
			<?php  } else { ?>
			<div class='form-control-static'><?php  if(intval($item['expiration']) ==1 ) { ?>开启<?php  } else { ?>关闭<?php  } ?></div>
			<?php  } ?>
		</div>
	</div>
</div>

<div class="form-group presell_info" <?php  if(intval($item['expiration']) == 0) { ?>style="display:none"<?php  } ?> id="exptime">
<label class="col-lg control-label">活动有效期限</label>
<div class="col-sm-9 col-xs-12">
	<?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
	<div class="input-group">
            <span class="input-group-addon">
                开始时间
            </span>
		<?php echo tpl_form_field_date('starttime', !empty($item['starttime']) ? date('Y-m-d H:i',$item['starttime']) : date('Y-m-d H:i'),true)?>
            <span class="input-group-addon">
                结束时间
            </span>
		<?php echo tpl_form_field_date('endtime', !empty($item['endtime']) ? date('Y-m-d H:i',$item['endtime']) : date('Y-m-d H:i'),true)?>
	</div>
	<span class='help-block'></span>
	<?php  } else { ?>
	<div class='form-control-static'>
		<?php  if($item['expiration']==1) { ?> <?php  echo date('Y-m-d H:i',$item['starttime'])?> - <?php  echo date('Y-m-d H:i',$item['endtime'])?> <?php  } ?>
	</div>
	<?php  } ?>
</div>
</div>





<div class="form-group">
	<label class="col-lg control-label must">分享标题</label>
	<div class="col-sm-9 col-xs-12">
		<?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
		<input type="text" name="share_title" id="share_title" class="form-control" value="<?php  echo $item['sharetitle'];?>" data-rule-required="true"/>
		<span class='help-block'>分享标题的字数长度不能超过12</span>
		<?php  } else { ?>
		<div class='form-control-static'><?php  echo $item['share_title'];?></div>
		<?php  } ?>
	</div>
</div>

<div class="form-group">
	<label class="col-lg control-label">分享图标</label>
	<div class="col-sm-9 col-xs-12">
		<?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
		<?php  echo tpl_form_field_image2('share_icon', $item['shareicon'])?>
		<span class='help-block'>如果不选择，默认为店铺图标</span>
		<?php  } else { ?>
		<?php  if(!empty($item['share_icon'])) { ?>
		<a href='<?php  echo tomedia($item['shareicon'])?>' target='_blank'>
		<img src="<?php  echo tomedia($item['shareicon'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
		</a>
		<?php  } ?>
		<?php  } ?>
	</div>
</div>
<div class="form-group">
	<label class="col-lg control-label" must>分享描述</label>
	<div class="col-sm-9 col-xs-12">
		<?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
		<textarea name="share_desc" class="form-control" rows="5"><?php  echo $item['sharedesc'];?></textarea>
		<span class='help-block'>如果不填写，则使用系统随机描述</span>
		<?php  } else { ?>
		<div class='form-control-static'><?php  echo $item['share_desc'];?></div>
		<?php  } ?>
	</div>
</div>



<div class="form-group">
	<label class="col-lg control-label">使用统一优惠券</label>
	<div class="col-xs-12 col-sm-8">
		<div class="input-group">
			<?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
			<label class="radio radio-inline">
				<input type="radio" name="issync" value="0" <?php  if(intval($item['issync']) ==0) { ?>checked="checked"<?php  } ?>> 是
			</label>
			<label class="radio radio-inline">
				<input type="radio" name="issync" value="1" <?php  if(intval($item['issync']) ==1 ) { ?>checked="checked"<?php  } ?>> 否
			</label>
			<?php  } else { ?>
			<div class='form-control-static'><?php  if(intval($item['status']) ==1 ) { ?>开启<?php  } else { ?>关闭<?php  } ?></div>
			<?php  } ?>
		</div>
	</div>
</div>

<div>
	<div class="form-group">
		<?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
		<label class="col-lg control-label must" id="stitle">选择优惠券</label>
		<div class="col-sm-9 col-xs-12" id="share1">
			<?php  echo tpl_selector('couponid',array('required'=>false,'multi'=>1,'type'=>'coupon_share','autosearch'=>1, 'preview'=>true,'url'=>webUrl('sale/coupon/querycplist'),'text'=>'couponname','items'=>$coupons_pay,'readonly'=>true,'buttontext'=>'选择优惠券','placeholder'=>'请选择优惠券'))?>
		</div>

		<?php  } else { ?>

		<?php  if(!empty($item)) { ?>
		<table class="table">
			<thead>
			<tr>
				<th style='width:100px;'>优惠券名称</th>
				<th style='width:200px;'></th>
				<th></th>
				<th>优惠券数量</th>
			</tr>
			</thead>
			<tbody id="param-items" class="ui-sortable">
			<?php  if(is_array($coupon)) { foreach($coupon as $row) { ?>
			<tr class='multi-product-item' data-id="<?php  echo $row['id'];?>">
				<input type='hidden' class='form-control img-textname' readonly='' value="<?php  echo $row['couponname'];?>">
				<input type='hidden' value="<?php  echo $row['id'];?>" name="couponid[]">
				<td style='width:80px;'>
					<img src="<?php  echo tomedia($row['thumb'])?>" style='width:70px;border:1px solid #ccc;padding:1px'>
				</td>
				<td style='width:220px;'><?php  echo $row['couponname'];?></td>
				<td>
					<input class='form-control valid' type='text' disabled value="<?php  echo $item['coupontotal'];?>" name="coupontotal<?php  echo $row['id'];?>">
				</td>
				<td>
					<input class='form-control valid' type='text' disabled value="<?php  echo $item['couponlimit'];?>" name="couponlimit<?php  echo $row['id'];?>">
				</td>
			</tr>
			<?php  } } ?>
			</tbody>
		</table>
		<?php  } else { ?>
		暂无优惠券
		<?php  } ?>
		<?php  } ?>
	</div>

	</div>


<div class="sync_n" <?php  if(intval($item['issync']) == 0) { ?>style="display:none"<?php  } else if(intval($item['issync']) == 1) { ?>style="display:block"<?php  } ?>>

	<div class="form-group">
		<?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
		<label class="col-lg control-label must">被分享人优惠券</label>
		<div class="col-sm-9 col-xs-12" id="share2">
			<?php  echo tpl_selector('couponids',array('required'=>false,'multi'=>1,'type'=>'coupon_shares','autosearch'=>1, 'preview'=>true,'url'=>webUrl('sale/coupon/querycplist'),'text'=>'couponname','items'=>$coupons_share,'readonly'=>true,'buttontext'=>'选择优惠券','placeholder'=>'请选择优惠券'))?>
		</div>
		<?php  } else { ?>

		<?php  if(!empty($item)) { ?>
		<table class="table">
			<thead>
			<tr>
				<th style='width:100px;'>优惠券名称</th>
				<th style='width:200px;'></th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody id="param-itemsss" class="ui-sortable">
			<?php  if(is_array($coupon)) { foreach($coupon as $row) { ?>
			<tr class='multi-product-item' data-id="<?php  echo $row['id'];?>">
				<input type='hidden' class='form-control img-textname' readonly='' value="<?php  echo $row['couponname'];?>">
				<input type='hidden' value="<?php  echo $row['id'];?>" name="couponids[]">
				<td style='width:80px;'>
					<img src="<?php  echo tomedia($row['thumb'])?>" style='width:70px;border:1px solid #ccc;padding:1px'>
				</td>
				<td style='width:220px;'><?php  echo $row['couponname'];?></td>
				<td>
					<input class='form-control valid' type='text' disabled value="<?php  echo $item['coupontotal'];?>" name="coupontotal<?php  echo $row['id'];?>">
				</td>
				<td>
					<input class='form-control valid' type='text' disabled value="<?php  echo $item['couponlimit'];?>" name="couponlimit<?php  echo $row['id'];?>">
				</td>
			</tr>
			<?php  } } ?>
			</tbody>
		</table>
		<?php  } else { ?>
		暂无优惠券
		<?php  } ?>
		<?php  } ?>
	</div>
</div>




<div class="form-group">
	<label class="col-lg control-label">状态</label>
	<div class="col-xs-12 col-sm-8">
		<div class="input-group">
			<?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
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

