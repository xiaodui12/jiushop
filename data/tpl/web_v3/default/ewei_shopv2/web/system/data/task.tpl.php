<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php  if($task_mode==1) { ?>
<style type="text/css">
    .task-mode {
            display:none;
    }
</style>
<?php  } ?>
<div class="page-header">当前位置：<span class="text-primary">计划任务</span></div>

<div class="page-content">
    <form id="dataform" action="" method="post" class="form-horizontal form-validate">

        <div class="form-group">
            <div class="col-lg control-label">计划任务模式</div>
            <div class="col-sm-9 col-xs-12">
                <label class="radio-inline">
                    <input type="radio" value="0"  name="task_mode" <?php  if($task_mode==0) { ?>checked<?php  } ?>  onclick="$('.task-mode').show()"/> 默认模式
                </label>
                <label class="radio-inline">
                    <input type="radio" value="1"   name="task_mode" <?php  if($task_mode==1) { ?>checked<?php  } ?> onclick="$('.task-mode').hide()"/> 系统模式
                </label>
                <span class='help-block'>如果选择系统模式，需要配置操作系统的计划任务,如果没有配置，则不会进行自动收货等计划任务</span>
            </div>
        </div>

        <div class="form-group task-mode">
            <label class="col-lg control-label">自动关闭未付款订单</label>
            <div class="col-sm-9 col-xs-12">
                <div class="input-group fixsingle-input-group">
                    <input type="text" name="closeorder_time" class="form-control" value="<?php  echo $closeorder_time;?>" />
                    <div class="input-group-addon">分钟</div>
                </div>
                <span class='help-block'>执行自动关闭未付款订单操作的间隔时间，如果为空默认为 60分钟 执行一次关闭到期未付款订单</span>
            </div>
        </div>

        <div class="form-group task-mode">
            <label class="col-lg control-label">即将关闭未付款订单前发送用户通知</label>
            <div class="col-sm-9 col-xs-12">
                <div class="input-group fixsingle-input-group">
                    <input type="text" name="willcloseorder_time" class="form-control" value="<?php  echo $willcloseorder_time;?>" />
                    <div class="input-group-addon">分钟</div>
                </div>
                <span class='help-block'>即将关闭未付款订单前发送用户通知的操作的间隔时间，如果为空默认为 20分钟 执行一次操作</span>
            </div>
        </div>

        <div class="form-group task-mode">

            <label class="col-lg control-label">自动收货</label>
            <div class="col-sm-9 col-xs-12">

                <div class="input-group fixsingle-input-group">
                    <input type="text" name="receive_time" class="form-control" value="<?php  echo $receive_time;?>" />
                    <div class="input-group-addon">分钟</div>
                </div>
                <span class='help-block'>执行自动收货操作的间隔时间，如果为空默认为 60分钟 执行一次自动收货</span>

            </div>
        </div>


        <div class="form-group task-mode">
            <label class="col-lg control-label">优惠券自动返利</label>
            <div class="col-sm-9 col-xs-12">

                <div class="input-group fixsingle-input-group">
                    <input type="text" name="couponback_time" class="form-control" value="<?php  echo $couponback_time;?>" />
                    <div class="input-group-addon">分钟</div>
                </div>
                <span class='help-block'>自动优惠券返利执行间隔时间，如果为空默认为 60分钟 执行一次关自动优惠券返利</span>

            </div>
        </div>

        <div class="form-group task-mode">
            <label class="col-lg control-label">拼团未付款订单自动取消</label>
            <div class="col-sm-9 col-xs-12">

                <div class="input-group fixsingle-input-group">
                    <input type="text" name="groups_order_cancelorder_time" id="groups_order_cancelorder_time" class="form-control" value="<?php  echo $groups_order_cancelorder_time;?>" />
                    <div class="input-group-addon">分钟</div>
                </div>
                <span class='help-block'>自动取消未付款订单执行间隔时间，如果为空默认为 60分钟 执行一次取消未付款订单</span>

            </div>
        </div>
        <div class="form-group task-mode">
            <label class="col-lg control-label">拼团失败自动退款</label>
            <div class="col-sm-9 col-xs-12">

                <div class="input-group fixsingle-input-group">
                    <input type="text" name="groups_team_refund_time" id="groups_team_refund_time" class="form-control" value="<?php  echo $groups_team_refund_time;?>" />
                    <div class="input-group-addon">分钟</div>
                </div>
                <span class='help-block'>拼团失败自动退款执行间隔时间，如果为空默认为 60分钟 执行一次自动退款</span>

            </div>
        </div>
        <div class="form-group task-mode">
            <label class="col-lg control-label">拼团自动收货</label>
            <div class="col-sm-9 col-xs-12">

                <div class="input-group fixsingle-input-group">
                    <input type="text" name="groups_receive_time" id="groups_receive_time" class="form-control" value="<?php  echo $groups_receive_time;?>" />
                    <div class="input-group-addon">分钟</div>
                </div>
                <span class='help-block'>拼团发货自动收货执行间隔时间，如果为空默认为 60分钟 执行一次自动收货</span>

            </div>
        </div>
        <div class="form-group task-mode">
            <label class="col-lg control-label">商品自动全返</label>
            <div class="col-sm-9 col-xs-12">

                <div class="input-group fixsingle-input-group">
                    <input type="text" name="fullback_receive_time" id="fullback_receive_time" class="form-control" value="<?php  echo $fullback_receive_time;?>" />
                    <div class="input-group-addon">分钟</div>
                </div>
                <span class='help-block'>商品自动全返执行间隔时间，如果为空默认为 60分钟 执行一次商品全返</span>

            </div>
        </div>
        <div class="form-group task-mode">
            <label class="col-lg control-label">商品自动上下架</label>
            <div class="col-sm-9 col-xs-12">

                <div class="input-group fixsingle-input-group">
                    <input type="text" name="status_receive_time" id="status_receive_time" class="form-control" value="<?php  echo $status_receive_time;?>" />
                    <div class="input-group-addon">分钟</div>
                </div>
                <span class='help-block'>商品自动上下架执行间隔时间，如果为空默认为 60分钟 执行一次商品上下架</span>

            </div>
        </div>


        <div class="form-group">
            <label class="col-lg control-label"></label>
            <div class="col-sm-9">
                <input  type="submit" value="提交" class="btn btn-primary" />

            </div>
        </div>

    </form>
</div>
    <script type="text/javascript">

        $(function () {

            $('.checkline-all').click(function () {
                var checked = $(this).get(0).checked;

                var name = $(this).val();
                $(":checkbox[name='" + name + "[]']").each(function () {
                    $(this).get(0).checked = checked;
                })
            })
            $("#groups_order_cancelorder_time").keyup(function(){
                var val = parseInt(Math.abs($(this).val()));
                if(val >= 1){
                    return true;
                }else{
                    val = 0;
                }
                $(this).val(val);
            })
            $("#groups_team_refund_time").keyup(function(){
                var val = parseInt(Math.abs($(this).val()));
                if(val >= 1){
                    return true;
                }else{
                    val = 0;
                }
                $(this).val(val);
            })
            $("#groups_receive_time").keyup(function(){
                var val = parseInt(Math.abs($(this).val()));
                if(val >= 1){
                    return true;
                }else{
                    val = 0;
                }
                $(this).val(val);
            })
        })

        $('form').submit(function () {

            if ($("#wechatid").val() == '') {
                tip.msgbox.err("请选择要清除的公众号!");
                $('form').attr('stop', 1);
                return false;
            }

            $('form').removeAttr('stop');
            return true;

        });

    </script>

    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

