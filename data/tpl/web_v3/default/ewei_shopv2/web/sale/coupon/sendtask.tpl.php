<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
    .table_kf {display: none;}
    .table_kf.active {display: table-footer-group;}
</style>
<div class="page-header">
    当前位置：<span class="text-primary">   满额送券 </span>
</div>
    <div class="page-content">
        <div class="page-toolbar">
                <?php if(cv('sale.coupon')) { ?>
                    <?php  if($data['isopensendtask']==1) { ?>
                        <a class='btn btn-danger btn-sm' href="<?php  echo webUrl('sale/coupon/sendtask/closetask')?>"><i class='fa fa-close'></i> 关闭功能</a>
                    <?php  } else { ?>
                        <a class='btn btn-warning btn-sm' href="<?php  echo webUrl('sale/coupon/sendtask/opentask')?>"><i class='fa fa-plus'></i> 开启功能</a>
                    <?php  } ?>
                    <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('sale/coupon/sendtask/add')?>"><i class='fa fa-plus'></i> 添加任务</a>
                <?php  } ?>
        </div>
        <ul class="nav nav-arrow-next nav-tabs" id="myTab" >
            <li style="position: relative;">
                <a href="<?php  echo webUrl('sale/coupon/shareticket')?>">分享发券</a>
                <span style="position:absolute;right: 9px;top: -7px;"><img src="../addons/ewei_shopv2/static/images/new.png" alt="" ></span>
            </li>
            <li style="position: relative;">
                <a href="<?php  echo webUrl('sale/coupon/setticket')?>">新人发券</a>
                <span style="position:absolute;right: 9px;top: -7px;"><img src="../addons/ewei_shopv2/static/images/new.png" alt="" ></span>
            </li>
            <li class="active" >
                <a href="<?php  echo webUrl('sale/coupon/sendtask')?>">满额送券</a>
            </li>
            <li >
                <a href="<?php  echo webUrl('sale/coupon/goodssend')?>">购物送券</a>
            </li>
            <li >
                <a href="<?php  echo webUrl('sale/coupon/usesendtask')?>">用券送券</a>
            </li>
        </ul>
        <form action="" method="post">
            <?php  if(count($sendtasks)>0) { ?>
            <table class="table table-hover table-responsive">
                <thead class="navbar-inner">
                <tr>
                    <th>满足价格</th>
                    <th style="width: 120px">优惠券名称</th>
                    <th>赠送数量</th>
                    <th  style="width: 200px">活动时间</th>
                    <th>剩余数量</th>
                    <th>状态</th>
                    <th style="width:65px">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($sendtasks)) { foreach($sendtasks as $item) { ?>
                <tr>
                    <td>
                        <?php  echo $item['enough'];?>
                    </td>
                    <td>
                        <?php  echo $item['couponname'];?>
                    </td>
                    <td>
                        <?php  echo $item['sendnum'];?>
                    </td>
                    <td>
                        <?php  echo date("Y-m-d ", $item['starttime'])?> - <?php  echo date("Y-m-d", $item['endtime'])?>
                    </td>
                    <td>
                        <?php  echo $item['num'];?>
                    </td>
                    <td>
                        <?php  if($item['status']==1) { ?>开启<?php  } else { ?>关闭<?php  } ?>
                    </td>
                    <td  style="overflow:visible;position:relative">
                        <?php if(cv('sale.coupon')) { ?>
                        <a  class='btn btn-default btn-sm btn-operation btn-op' href="<?php  echo webUrl('sale.coupon.sendtask/edit', array('id' => $item['id'],'page'=>$page))?>">
                             <span data-toggle="tooltip" data-placement="top" data-original-title=" <?php if(cv('sale.coupon')) { ?>编辑<?php  } else { ?>查看<?php  } ?>">
								<i class='icow icow-bianji2'></i>
						   </span>
                            </a>
                        <?php  } ?>
                        <?php if(cv('sale.coupon')) { ?>
                        <a  class='btn btn-default btn-sm btn-operation btn-op' data-toggle='ajaxRemove' href="<?php  echo webUrl('sale.coupon.sendtask/delete', array('id' => $item['id']))?>" data-confirm='确认要删除吗?？'>
                            <span data-toggle="tooltip" data-placement="top" data-original-title="删除">
								<i class='icow icow-shanchu1'></i>
						   </span>
                        </a>
                        <?php  } ?>
                    </td>
                </tr>
                <?php  } } ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td style="text-align: right" colspan="7">
                            <?php  echo $pager;?>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <?php  } else { ?>
            <div class='panel panel-default'>
                <div class='panel-body' style='text-align: center;padding:30px;'>
                    暂时没有任何优惠券!
                </div>
            </div>
            <?php  } ?>
        </form>
    </div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
