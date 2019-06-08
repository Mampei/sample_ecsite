<?php

require_once 'Sample_RemoveTopColumn.php';

// 金額の計算

class Sample_PaymentCalculator
{
    /*  商品の合計金額を計算
    *
    *   @return 商品の合計金額
    */
    function calculateTotalPayment($db, $user_id)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "SELECT list_price, purchase_quantity FROM cart$user_id;";
        $result = $db->query($sql);
        
        $rs = $rtc->removeTopColumn($result);

        // 各商品の金額を加算
        foreach ($rs as $item){
            $payment += (int)$item[0] * (int)$item[1];
        }

        return $payment;
    }
    
    /* 各商品の値段を計算
    *
    *  @return 一つの商品の金額
    */
    function calculateEachPayment($db, $user_id, $item_id)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "SELECT list_price, purchase_quantity FROM cart$user_id WHERE item_id = '$item_id' LIMIT 1;";
        $result = $db->query($sql);

        $item = $rtc->removeTopColumn($result);

        $payment = (int)$item[0][0] * (int)$item[0][1];

        return $payment;
    }
}
