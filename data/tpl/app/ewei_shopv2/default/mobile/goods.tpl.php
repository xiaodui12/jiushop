<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='fui-page  fui-page-current page-goods-list'>
    <div class="fui-header">
	<div class="fui-header-left">
	    <a class="back"></a>
	</div>
	<div class="title">
		<form method="post">
				<div class="searchbar">
				<div class="search-input">
					<i class="icon icon-search"></i>
					<input type="search" id="search" placeholder="输入关键字..." value="<?php  echo $_GPC['keywords'];?>">
				</div>
				</div>
		</form>
	</div>
	<div class="fui-header-right" data-nomenu="true">
	    <a href="javascript:;"><i class="icon icon-sort" id="listblock" data-state="list"></i></a>
	</div>
    </div>
    <div class="sort">
	<div class="item on"><span class='text'>综合</span></div>
	<div class="item" data-order="sales"><span class='text'>销量</span></div>
	<div class="item item-price"  data-order="minprice"><span class='text'>价格</span>
	    <span class="sorting">
		<i class="icon icon-sanjiao2"></i>
		<i class="icon icon-sanjiao1"></i>

	    </span>
	</div>
	<div class="item"  data-order="filter"><span class='text'>筛选 <i class="icon icon-filter "></i></span> </div>
    </div>



    <div class="fui-content navbar">
	<div class='fui-content-inner'>
	    <div class='content-empty' style='display:none;'>
		<i class='icon icon-searchlist'></i><br/>暂时没有任何商品
	    </div>
	    <div class="fui-goods-group container block" id="goods-list-container"></div>
	    <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
	</div>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
    </div>

     <div class='fui-mask-m'></div>
     <div class="screen">
	<div class="attribute">
	    <div class="item">
		<div class="btn btn-default-o block" data-type="isrecommand"><i class="icon icon-check"></i> 推荐商品</div>
	    </div>
	    <div class="item">
		<div class="btn btn-default-o block" data-type="isnew"><i class="icon icon-check"></i> 新品上市</div>
	    </div>
	    <div class="item">
		<div class="btn btn-default-o block" data-type="ishot"><i class="icon icon-check"></i> 热卖商品</div>
	    </div>
	    <div class="item">
		<div class="btn btn-default-o block" data-type="isdiscount"><i class="icon icon-check"></i> 促销商品</div>
	    </div>
	    <div class="item">
		<div class="btn btn-default-o block" data-type="issendfree"><i class="icon icon-check"></i> 卖家包邮</div>
	    </div>
	    <div class="item">
		<div class="btn btn-default-o block" data-type="istime"><i class="icon icon-check"></i> 限时抢购</div>
	    </div>
	</div>
	<?php  if($catlevel!=-1 && $opencategory) { ?>
	<div class="title">选择分类</div>
	<div class="cate" data-catlevel="<?php  echo $catlevel;?>">
		<div class="item"  data-level="1">
		   <?php  if(is_array($allcategory['parent'])) { foreach($allcategory['parent'] as $c) { ?>
		   <nav data-id="<?php  echo $c['id'];?>"><?php  echo $c['name'];?></nav>
		   <?php  } } ?>
   	         </div>
		<?php  if($catlevel>=2) { ?>
		<div class="item" data-level="2"></div>
		<?php  } ?>
		<?php  if($catlevel>=3) { ?>
		<div class="item" data-level="3"></div>
		<?php  } ?>
	</div>
	<?php  } ?>
	<div class="btns">
	    <div class="cancel">取消筛选</div>
	    <div class="confirm">确认</div>
	</div>
    </div>

<script type='text/html' id='tpl_goods_list_promotion'>
    <%each list as g%>
	<div class="fui-goods-item" data-goodsid="<%g.id%>" data-type="<%g.type%>">
		<a <%if g.bargain>0%>href="<?php  echo mobileUrl('bargain/detail')?>&id=<%g.bargain%>"<%/if%><%if g.bargain<=0 && g.type!=9%>href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.id%>"<%else%>href="<?php  echo mobileUrl('cycelbuy/goods/detail')?>&id=<%g.id%>" <%/if%>>
		    <div class="image" data-lazy-background="<%g.thumb%>">

				<?php  if(!empty($_W['shopset']['shop']['saleout'])) { ?>
				<%if g.total<=0%><div class="salez" style="background-image: url('<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>'); "></div><%/if%>
				<?php  } else { ?>
				<%if g.total<=0%><div class="salez" style="background-image: url('<?php  echo '../addons/ewei_shopv2/static/images/shouqin.png'?>'); "></div><%/if%>
				<?php  } ?>

				<!--分销佣金-->
				<%if g.cansee>0 && g.seecommission>0%>
				<div class="goods-Commission"><%g.seetitle || "预计最高佣金"%>￥<%g.seecommission%> </div>
				<%/if%>
			</div>
        </a>

		<div class="detail">
			<a <%if g.bargain>0%>href="<?php  echo mobileUrl('bargain/detail')?>&id=<%g.bargain%>"<%/if%><%if g.bargain<=0 && g.type!=9%>href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.id%>"<%else%>href="<?php  echo mobileUrl('cycelbuy/goods/detail')?>&id=<%g.id%>" <%/if%>>
		           <div class="name"><%if g.type == 9%><span class="cycle-tip">周期购</span><%/if%> <%g.title%></div>
		   </a>
			 <div style="line-height:0.7rem;height:0.7rem;color:#b2b2b2;font-size:0.6rem;margin-top: .2rem;text-decoration: line-through"><%if g.productprice > 0%><%g.productprice%><% /if %></div>
		    <div class="price" style="margin-top: 0">
			   <span class="text">￥<%g.minprice%></span>
				<%if g.levelbuy ==0 || g.groupbuy==0 %>

				<%else%>
	           		<span class="buy<%if g.bargain >0%> bargain-btn<%/if%>" data-type="<%g.type%>" ><%if g.bargain >0%>砍价活动<%else%>购买<%/if%></span>
				<%/if%>


	       </div>
	 	</div>
	 	<!-- <div class="salez" style="background-image: url('<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>'); "></div> -->
		<!--<a <%if g.bargain>0%>href="<?php  echo mobileUrl('bargain/detail')?>&id=<%g.bargain%>"<%else%>href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.id%>"<%/if%>>-->
		 <?php  if(!empty($_W['shopset']['shop']['saleout'])) { ?>
		 <!--<%if g.total<=0%><div class="salez" style="background-image: url('<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>'); "></div><%/if%>-->
		 <?php  } else { ?>
		 <!--<%if g.total<=0%><div class="salez" style="background-image: url('<?php  echo '../addons/ewei_shopv2/static/images/shouqin.png'?>'); "></div><%/if%>-->
		 <?php  } ?>
		<!--</a>-->
	</div>
    <%/each%>
</script>

<script id="tpl_cate_list" type="text/html">
	<div class="item">
	   <%each category as c%>
		<nav class="on"><%c.catname%></nav>
            <%/each%>
        </div>
</script>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/picker', TEMPLATE_INCLUDEPATH)) : (include template('goods/picker', TEMPLATE_INCLUDEPATH));?>
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/wholesalePicker', TEMPLATE_INCLUDEPATH)) : (include template('goods/wholesalePicker', TEMPLATE_INCLUDEPATH));?>
    <script language="javascript">
	  window.category = false;
	  <?php  if($catlevel!=-1) { ?>
	      window.category = <?php  echo json_encode($allcategory)?>;
	  <?php  } ?>
	   require(['biz/goods/list'], function (modal) {
                modal.init({
					page: "1",
					keywords: "<?php  echo $_GPC['keywords'];?>",
					isrecommand: "<?php  echo $_GPC['isrecommand'];?>",
					ishot: "<?php  echo $_GPC['ishot'];?>",
					isnew: "<?php  echo $_GPC['isnew'];?>",
					isdiscount: "<?php  echo $_GPC['isdiscount'];?>",
					issendfree: "<?php  echo $_GPC['issendfree'];?>",
					istime: "<?php  echo $_GPC['istime'];?>",
					cate: "<?php  echo $_GPC['cate'];?>",
					order: "<?php  echo $_GPC['order'];?>",
					by: "<?php  echo $_GPC['by'];?>",
					merchid: "<?php  echo $_GPC['merchid'];?>",
					frommyshop: "<?php  echo intval($_GPC['frommyshop'])?>"
				});
            });</script>
    <?php  $this->footerMenus()?>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<script language='javascript'>
    $(function () {
        setTimeout(function () {
            var width = window.screen.width *  window.devicePixelRatio;
            var height = window.screen.height *  window.devicePixelRatio;
            var h = document.body.offsetHeight *  window.devicePixelRatio;
            //  微信版本6.6.7
            if(h == 1923){
                $(".fui-navbar,.cart-list,.fui-footer,.fui-content.navbar").removeClass('iphonex');
                return;
            }

            if(height==2436 && width==1125){
                $(".fui-navbar,.cart-list,.fui-footer,.fui-content.navbar").addClass('iphonex')
            }
        },600)
    })
</script>