<?php
//QQ63779278
if (!defined('IN_IA')) {
	exit('Access Denied');
}

class Send_EweiShopV2Page extends PluginWebPage
{
	public function main()
	{
		global $_W;
		global $_GPC;
        $id=$_GPC["id"];


        foreach ($id as $val){
            pdo_update('ewei_shop_order', array('sell_status' => 1), array('id' => $id, 'uniacid' => $_W['uniacid'],"status"=>3));
		}
        show_json(1);

	}

}

?>
