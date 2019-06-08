<?php

require_once 'Sample_RemoveTopColumn.php';

// 商品の在庫・お届け時間を管理
class Sample_StockManager
{
    /* 商品の在庫数を表示
    *
    *  @return 在庫数
    */
    public function loadStock($db, $item_id)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "SELECT quantity FROM stock WHERE item_id = '$item_id';";
        $result = $db->query($sql);

        $stock = $rtc->removeTopColumn($result);

        return (int)$stock;
    }

    /* 商品のお届けにかかる時間を取得
    *n
    *  @return 配送時間
    */
    public function loadArrivalDate($db, $item_id)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "SELECT arrival_date FROM stock WHERE item_id = '$item_id';";
        $result = $db->query($sql);

        $arrival_date = $rtc->removeTopColumn($result);

        return $arrival_date;
    }
    
    /*  カートに入れた商品の購入数が在庫数を超えていないか調べる
    *
    *  @return エラーメッセージ or null
    */
    public function checkStock($db, $item_id, $purchase_quantity)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "SELECT quantity FROM stock WHERE item_id = '$item_id' LIMIT 1;";
        $result = $db->query($sql);

        $stock_quantity = $rtc->removeTopColumn($result);

        if ( (int)$stock_quantity < (int)$purchase_quantity ) {
            return Ethna::raiseNotice('在庫数を上回っています', E_SAMPLE_STOCK);
        }

        return null;
    }
    
    /* 購入後、在庫数を更新する
    *
    */
    public function updateStock($db, $item_id, $purchase_quantity)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "UPDATE stock SET quantity = quantity - $purchase_quantity WHERE item_id = '$item_id' LIMIT 1;";
        $result = $db->query($sql);
    }

}
