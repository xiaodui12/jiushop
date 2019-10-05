<?php

if (!defined('IN_IA')) {
	exit('Access Denied');
}

class Refresh_EweiShopV2Page extends MobilePage
{

	public function main(){

        global $_W;
        global $_GPC;
        $data = m('common')->getPluginset('commission');
//        $over_time=time()-(3600*24)*intval($data["rebatetime"]);
        $over_time=time();


		$sql='select o.* from ims_ewei_shop_order  o LEFT JOIN ims_ewei_shop_order_goods og on o.id=og.orderid '.
			'where o.couponid>0 and o.status>1 and o.createtime<:createtime and o.uniacid=:uniacid';

        $orders=pdo_fetchall($sql,array( ':uniacid' => $_W['uniacid'],':createtime'=>$over_time));


       $commission= p("commission");

        foreach ($orders as $key=>$order)
		{
			if($commission){
                ($commission->orderFinishTaskBycoupon($order));
			}

		}
		exit;

	}
}

?>
