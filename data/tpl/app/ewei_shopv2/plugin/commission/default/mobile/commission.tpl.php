<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "<?php  echo $this->set['texts']['center']?>"; </script>
<script>
    document.documentElement.style.fontSize =document.documentElement.clientWidth/750*40 +"px";
</script>
<script src="//at.alicdn.com/t/font_82607_6xtuyfrxik6v42t9.js"></script>
<style type="text/css">
	.icon1 {
		width: .8rem; height: .8rem;
		vertical-align: -0.15em;
		fill: currentColor;
		overflow: hidden;
	}
</style>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<div class="fui-page fui-page-current page-commission-index ">
	<div class="fui-header">
		<div class="fui-header-left">
			<a class="back" onclick='location.back()'></a>
		</div>
		<div class="title"><?php  echo $this->set['texts']['center']?></div>
		<div class="fui-header-right"></div>
	</div>
    <div class='fui-content navbar'>
	<div class="headinfo">
	    <div class="userinfo" style="height: auto;">
			<div class='fui-list'>
				<div class='fui-list-media'><img src="<?php  echo $member['avatar'];?>" /></div>
				<div class='fui-list-info' style="width: 12rem">
				<div class='title'><?php  echo $member['nickname'];?> </div>
					<div class='text' ><?php  echo $this->set['texts']['up']?>: <?php  if(empty($up)) { ?>
						总店
						<?php  } else { ?>
						<?php  echo $up['nickname'];?>
						<?php  } ?>
						<br>
					</div>
					<div class='subtitle'  <?php  if($this->set['levelurl']!='') { ?>onclick='location.href="<?php  echo $this->set['levelurl']?>"'<?php  } ?>>
						<?php echo empty($level) ? ( empty($this->set['levelname'])?'普通等级':$this->set['levelname'] ) : $level['levelname']?>
						<?php  if($this->set['levelurl']!='') { ?><i class='icon icon-question' style='font-size:8px;'></i><?php  } ?>
					</div>
				</div>
			</div>
		<?php  if(empty($this->set['closemyshop'])) { ?>
			<a class="setbtn external" href="<?php  echo mobileUrl('commission/myshop/set')?>"><i class="icon icon-shezhi"></i></a>
		<?php  } ?>
	    </div>
	</div>

		<?php  if(empty($this->set['hideicode'])) { ?>
			<div class="fui-cell-group">
				<div class="fui-cell"style="    height: 2.85rem;">
					<div class="fui-cell-icon">
						<svg class="icon1" aria-hidden="true">
							<use xlink:href="#icon-yaoqingma"></use>
						</svg>
					</div>
					<div class="fui-cell-text">我的<?php  echo $this->set['texts']['icode']?>：  <?php  if(p('offic')) { ?><?php  echo $member['mobile'];?><?php  } else { ?><?php  echo $member['id'];?><?php  } ?>
					</div>
				</div>
			</div>
		<?php  } ?>

		<div class="userblock">
			<div class="line total new">
				<div class="num"><?php  echo number_format($member['commission_pay'],2)?></div>
				<div class="title"><?php  echo $this->set['texts']['commission_pay']?>(<?php  echo $this->set['texts']['yuan']?>)</div>
			</div>
			<div class="line usable new">

				<div class="text">
					<div class="num"><?php  echo number_format( $member['commission_ok'],2)?></div>
					<div class="title"><?php  echo $this->set['texts']['commission_ok']?>(<?php  echo $this->set['texts']['yuan']?>)</div>
				</div>
				<?php  if($cansettle) { ?>
				<a class="btn btn-warning external" href="<?php  echo mobileUrl('commission/withdraw')?>"><span style="line-height: 1"><?php  echo $this->set['texts']['commission']?><?php  echo $this->set['texts']['withdraw']?></span></a>
				<?php  } else { ?>
				<div class="btn btn-warning disabled" onclick="FoxUI.toast.show('满 <?php  echo $this->set['withdraw']?> <?php  echo $this->set['texts']['yuan']?>才能提现!')"><?php  echo $this->set['texts']['commission']?><?php  echo $this->set['texts']['withdraw']?></div>
				<?php  } ?>
			</div>
		</div>
	<div class="fui-block-group new col-2" style='overflow: hidden;'>
            <a class="fui-block-child new  external" href="<?php  echo mobileUrl('commission/withdraw')?>">
                <div class="icon " style="color: #ff4357;"><i class="icon icon-qian"></i></div>
                <div class="text new">
					<div class="title"><?php  echo $this->set['texts']['commission1']?></div>
                    <div class=""><span><?php  echo number_format($member['commission_total'],2)?></span> <?php  echo $this->set['texts']['yuan']?></div>
				</div>
            </a>
            <a class="fui-block-child new external" href="<?php  echo mobileUrl('commission/order')?>">
                <div class="icon" style="color: #9ec9f4;"><i class="icon icon-dingdan2"></i></div>
				<div class="text new">
					<div class="title"><?php  echo $this->set['texts']['order']?></div>
					<div class=""><span><?php  echo number_format($member['ordercount'],0)?></span> 笔</div>
				</div>
            </a>
            <a class="fui-block-child new  external" href="<?php  echo mobileUrl('commission/log')?>">
                <div class="icon" style="color: #ffbe2e;"><i class="icon icon-tixian1"></i></div>
				<div class="text new">
					<div class="title"><?php  echo $this->set['texts']['commission_detail']?></div>
					<div class=""><span><?php  echo number_format($member['applycount'],0)?></span> 笔</div>
				</div>
            </a>
            <a class="fui-block-child new  external" href="<?php  echo mobileUrl('commission/down')?>">
                <div class="icon "  style="color: #ff6e02;"><i class="icon icon-heilongjiangtubiao11"></i></div>
				<div class="text new">
					<div class="title"><?php  echo $this->set['texts']['mydown']?></div>
					<div class=""><span><?php  echo number_format($member['downcount'],0)?></span>人</div>
				</div>
            </a>

		<?php  if($hasdividend) { ?>
			<a class="fui-block-child new  external" href="<?php  echo mobileUrl('dividend')?>">
				<div class="icon "  style="color: #ff6e02;"><i class="icon icon-heilongjiangtubiao11"></i></div>
				<div class="text new">
					<div class="title"><?php  echo $plugin_dividend_set['texts']['center']?></div>
					<div class=""><span></span></div>
				</div>
			</a>
		<?php  } ?>
		<?php  if(p("offic")) { ?>
		<!--<a class="fui-block-child external" href="<?php  echo mobileUrl('commission/branch')?>">-->
			<!--<div class="icon text-orange"><i class="icon icon-store"></i></div>-->
			<!--<div class="title">我的分店</div>-->
			<!--<div class="text"><span></span></div>-->
		<!--</a>-->
		<!--<a class="fui-block-child external" href="<?php  echo mobileUrl('commission/branch/fans')?>">-->
			<!--<div class="icon text-orange"><i class="icon icon-person2"></i></div>-->
			<!--<div class="title">我的粉丝</div>-->
			<!--<div class="text"><span></span></div>-->
		<!--</a>-->
		<?php  } ?>

		<?php  if($hasglobonus) { ?>
		<!--<a class="fui-block-child external" href="<?php  echo mobileUrl('globonus')?>">-->
			<!--<div class="icon text-yellow"><i class="icon icon-profile"></i></div>-->
			<!--<div class="title"><?php  echo $plugin_globonus_set['texts']['center'];?></div>-->
			<!--<div class="text"></div>-->
		<!--</a>-->
		<?php  } ?>


		<?php  if($hasabonus) { ?>
		<!--<a class="fui-block-child external" href="<?php  echo mobileUrl('abonus')?>">-->
			<!--<div class="icon text-orange"><i class="icon icon-shengfen"></i></div>-->
			<!--<div class="title"><?php  echo $plugin_abonus_set['texts']['center'];?></div>-->
			<!--<div class="text"></div>-->
		<!--</a>-->
		<?php  } ?>

		<?php  if($hasauthor) { ?>
		<!--<a class="fui-block-child external" href="<?php  echo mobileUrl('author')?>">-->
			<!--<div class="icon text-orange"><i class="icon icon-profile"></i></div>-->
			<!--<div class="title"><?php  echo $plugin_author_set['texts']['center'];?></div>-->
			<!--<div class="text"></div>-->
		<!--</a>-->
		<?php  if($team_money>0) { ?>
		<!--<a class="fui-block-child external">-->
			<!--<div class="icon text-blue"><i class="icon icon-money"></i></div>-->
			<!--<div class="title">已获团队奖励</div>-->
			<!--<div class="text"><span><?php  echo $team_money;?></span> 元</div>-->
		<!--</a>-->
		<?php  } ?>
		<?php  } ?>

		<?php  if(!empty($plugin_author_set['team_open'])) { ?>
		<!--<a class="fui-block-child external" href="<?php  echo mobileUrl('author/team')?>">-->
			<!--<div class="icon text-red"><i class="icon icon-people2"></i></div>-->
			<!--<div class="title"><?php  echo $plugin_author_set['texts']['bonus_team'];?></div>-->
			<!--<div class="text"></div>-->
		<!--</a>-->
		<?php  } ?>

		<?php  if(!$this->set['closed_qrcode']) { ?>
            <!--<a class="fui-block-child external" href="<?php  echo mobileUrl('commission/qrcode')?>">-->
                <!--<div class="icon text-yellow"><i class="icon icon-qrcode"></i></div>-->
                <!--<div class="title">推广二维码</div>-->
                <!--<div class="text"></div>-->
            <!--</a>-->
		<?php  } ?>


	    <?php  if(empty($this->set['closemyshop'])) { ?>

	    <!--<a class="fui-block-child external" href="<?php  echo mobileUrl('commission/myshop/set')?>">-->
		<!--<div class="icon text-blue"><i class="icon icon-shopfill"></i></div>-->
		<!--<div class="title">小店设置</div>-->
		<!--<div class="text"></div>-->
	    <!--</a>-->
	    <?php  if($this->set['openselect']) { ?>
	    <!--<a class="fui-block-child external" href="<?php  echo mobileUrl('commission/myshop/select')?>">-->
		<!--<div class="icon text-blue"><i class="icon icon-apps"></i></div>-->
		<!--<div class="title">自选商品</div>-->
		<!--<div class="text"></div>-->
	    <!--</a>-->
	    <?php  } ?>
	    <?php  } ?>
	    <?php  if(!empty($this->set['rank']['status'])) { ?>
		  <!--<a class="fui-block-child external" href="<?php  echo mobileUrl('commission/rank');?>">-->
			    <!--<div class="icon text-orange"><i class="icon icon-rank"></i></div>-->
			    <!--<div class="title"><?php  echo $this->set['texts']['commission']?>排名</div>-->
			    <!--<div class="text"></div>-->
		 <!--</a>-->
	    <?php  } ?>

	</div>
		<?php  if(!$this->set['closed_qrcode']) { ?>
		<a class="fui-cell-group" href="<?php  echo mobileUrl('commission/qrcode')?>">
			<div class="fui-cell">
				<div class="fui-cell-icon ">
					<i class="icon icon-erweima1 text-yellow"></i>
				</div>
				<div class="fui-cell-text">推广二维码</div>
				<div class="fui-cell-remark" style="font-size: 0.5rem;"></div>
			</div>
		</a>
		<?php  } ?>
		<div class="fui-cell-group">
			<?php  if(empty($this->set['closemyshop'])) { ?>
			<a class="fui-cell" href="<?php  echo mobileUrl('commission/myshop/set')?>">
				<div class="fui-cell-icon ">
					<i class="icon icon-dianpu1 text-yellow"></i>
				</div>
				<div class="fui-cell-text"><?php  echo $this->set['texts']['shop']?>设置</div>
				<div class="fui-cell-remark" style="font-size: 0.5rem;"></div>
			</a>
			<?php  } ?>
			<?php  if($this->set['openselect']) { ?>
			<a class="fui-cell" href="<?php  echo mobileUrl('commission/myshop/select')?>">
				<div class="fui-cell-icon ">
					<i class="icon icon-shangcheng1 text-yellow"></i>
				</div>
				<div class="fui-cell-text">自选商品</div>
				<div class="fui-cell-remark" style="font-size: 0.5rem;"></div>
			</a>
			<?php  } ?>
			<?php  if(!empty($this->set['rank']['status'])) { ?>
			<a class="fui-cell" href="<?php  echo mobileUrl('commission/rank');?>">
				<div class="fui-cell-icon ">
					<i class="icon icon-paihang text-yellow"></i>
				</div>
				<div class="fui-cell-text"><?php  echo $this->set['texts']['commission']?>排名</div>
				<div class="fui-cell-remark" style="font-size: 0.5rem;"></div>
			</a>
			<?php  } ?>
			<?php  if(p("offic")) { ?>
			<a class="fui-cell" href="<?php  echo mobileUrl('commission/branch')?>">
				<div class="fui-cell-icon ">
					<i class="icon icon-store text-yellow"></i>
				</div>
				<div class="fui-cell-text">我的分店</div>
				<div class="fui-cell-remark" style="font-size: 0.5rem;"></div>
			</a>
			<a class="fui-cell" href="<?php  echo mobileUrl('commission/branch/fans')?>">
				<div class="fui-cell-icon ">
					<i class="icon icon-person2 text-yellow"></i>
				</div>
				<div class="fui-cell-text">我的粉丝</div>
				<div class="fui-cell-remark" style="font-size: 0.5rem;"></div>
			</a>
			<?php  } ?>
			<?php  if($hasglobonus) { ?>
			<a class="fui-cell" href="<?php  echo mobileUrl('globonus')?>">
				<div class="fui-cell-icon ">
					<i class="icon icon-gudong1 text-yellow"></i>
				</div>
				<div class="fui-cell-text"><?php  echo $plugin_globonus_set['texts']['center'];?></div>
				<div class="fui-cell-remark" style="font-size: 0.5rem;"></div>
			</a>
			<?php  } ?>
			<?php  if($hasabonus) { ?>
			<a class="fui-cell" href="<?php  echo mobileUrl('abonus')?>">
				<div class="fui-cell-icon ">
					<i class="icon icon--guoji-xianxing text-yellow"></i>
				</div>
				<div class="fui-cell-text"><?php  echo $plugin_abonus_set['texts']['center'];?></div>
				<div class="fui-cell-remark" style="font-size: 0.5rem;"></div>
			</a>
			<?php  } ?>
			<?php  if($hasauthor) { ?>
			<a class="fui-cell" href="<?php  echo mobileUrl('author')?>">
				<div class="fui-cell-icon ">
					<i class="icon icon-huiyuan3 text-yellow"></i>
				</div>
				<div class="fui-cell-text"><?php  echo $plugin_author_set['texts']['center'];?></div>
				<div class="fui-cell-remark" style="font-size: 0.5rem;"></div>
			</a>
			<?php  if($team_money>0) { ?>
			<a class="fui-cell">
				<div class="fui-cell-icon ">
					<i class="icon icon-qian1 text-yellow"></i>
				</div>
				<div class="fui-cell-text">已获团队奖励<?php  echo $team_money;?>元</div>
				<div class="fui-cell-remark" style="font-size: 0.5rem;"></div>
			</a>
			<?php  } ?>
			<?php  } ?>
		</div>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
    </div>

    <?php  $this->footerMenus()?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>