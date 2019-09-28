<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
	当前位置：
	<span class="text-primary"><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>活动</span>
</div>

<div class="page-content">
	<div class="page-sub-toolbar">
		<?php if(cv('sale.coupon.shareticket.add')) { ?>
			<a class='btn btn-primary btn-sm' href="<?php  echo webUrl('sale/coupon/shareticket/add')?>"><i class='fa fa-plus'></i>添加活动</a>
		<?php  } ?>
	</div>
	<div class="alert alert-primary">
		<p>说明：</p>
		<p>分享发券条件：订单金额达到此条件即可触发活动，每个条件金额仅能为唯一金额，不可重复设置。</p>
		<p>分享标题项为必填项。</p>
		<p>优惠券设置：添加活动时，可设置统一优惠券，也可设置分享人优惠券和被分享人优惠券，最多可选择三张优惠券，每张优惠券的每人领取数量不能超过三张且优惠券须在有效期内。此处发放的优惠券数量不影响库存！</p>
	</div>
	<form <?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>action="" method='post'<?php  } ?> class='form-horizontal form-validate'>
		<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
	 	<input type="hidden" name="tab" id='tab' value="<?php  echo $_GPC['tab'];?>" />
				<div class="tab-content">
					<div class="tab-pane  <?php  if($_GPC['tab']=='basic' || empty($_GPC['tab'])) { ?>active<?php  } ?>" id="tab_basic"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sale/coupon/shareticket/post/basic', TEMPLATE_INCLUDEPATH)) : (include template('sale/coupon/shareticket/post/basic', TEMPLATE_INCLUDEPATH));?></div>
				</div>
				<div class="form-group"></div>
				<div class="form-group">
						<label class="col-lg control-label"></label>
						<div class="col-sm-9 col-xs-12">
							 <?php if( ce('sale.coupon.shareticket' ,$item) ) { ?>
								<input type="submit" name="submit" value="提交" class="btn btn-primary"  />

							<?php  } ?>
						   <input type="button" name="back" onclick='history.back()' <?php if( ce('sale.coupon' ,$item) ) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />
						</div>
				</div>
	</form>
</div>
<script language='javascript'>
      require(['bootstrap'],function(){
             $('#myTab a').click(function (e) {
                 e.preventDefault();
                $('#tab').val( $(this).attr('href'));
                 $(this).tab('show');
             })
			  $("input[name='payrand']").change(function(){
				  if($(this).val() == '0'){
					  $('#couponshow').css('display','none');
				  }else if($(this).val() == '1'){
					  $('#couponshow').css('display','block');
				  }
			  });
			  $("input[name='expiration']").change(function(){
				  if($(this).val() == '0'){
					  $('#exptime').css('display','none');
				  }else if($(this).val() == '1'){
					  $('#exptime').css('display','block');
				  }
			  });
			  $("input[name='sharerand']").change(function(){
				  if($(this).val() == '0'){
					  $('#couponshow1').css('display','none');
				  }else if($(this).val() == '1'){
					  $('#couponshow1').css('display','block');
				  }
			  });

		  $("input[name='issync']").change(function(){
			  if($(this).val() == '0'){
				  $('.sync_n').css('display','none');
				  $('#stitle').text('选择优惠券');
			  }else if($(this).val() == '1'){
				  $('.sync_n').css('display','block');
				  $('#stitle').text('分享人优惠券');
			  }
		  });

     });

    function showbacktype(type){

        $('.backtype').hide();
        $('.backtype' + type).show();
    }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
