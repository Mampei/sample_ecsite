<?php

require_once 'Sample_RemoveTopColumn.php';

// カート情報の登録・取得・更新・削除を行う
class Sample_CartManager
{
    public function createCart($db, $user_id)
    {
        $sql = "CREATE table IF NOT EXISTS cart$user_id (user_id int(11) NOT NULL default '0', item_id int(11) NOT NULL default '0',
                    item_name varchar(63) NOT NULL default '', list_price decimal(10,0) NOT NULL default '0',
                    image_url varchar (255) NOT NULL default '', purchase_quantity int(11) NOT NULL default '0',
                    add_date datetime NOT NULL default '0000-00-00 00:00:00');";
        $result = $db->query($sql);
    }

    /* 商品をカートに保存する
    *
    */
    public function storeCart($db, $user_id, $item_id, $item_name, $list_price, $image_url)
    {
        $now = strftime('%Y-%m-%d %H:%M:%S');
        $sql = "INSERT INTO cart$user_id(user_id, item_id, item_name, list_price, image_url, add_date) 
                SELECT '$user_id', '$item_id', '$item_name', '$list_price', '$image_url', '$now' FROM dual
                WHERE NOT EXISTS (SELECT * FROM cart$user_id WHERE item_id = $item_id) LIMIT 1;";
        $result = $db->query($sql);
    }

    /* 商品の個数を加算
    *
    */
    public function addItemQuantity($db, $user_id, $item_id, $purchase_quantity)
    {
        $sql = "UPDATE cart$user_id SET purchase_quantity = purchase_quantity + $purchase_quantity WHERE item_id = $item_id LIMIT 1;";
        $result = $db->query($sql);
    }

    /* 商品の個数を更新
    *
    */
    public function updateItemQuantity($db, $user_id, $item_id, $purchase_quantity)
    {
        $sql = "UPDATE cart$user_id SET purchase_quantity = $purchase_quantity WHERE item_id = $item_id LIMIT 1;";
        $result = $db->query($sql);
    }

    /* カート情報を取得
    *
    *  @return カート情報の二次元配列
    */
    public function loadCart($db, $user_id)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "SELECT * FROM cart$user_id;";
        $result = $db->query($sql);

        $rs = $rtc->removeTopColumn($result);

        if ($rs == null){
            return Ethna::raiseNotice('お客様のショッピングカートに商品はありません', E_SAMPLE_CART);
        }

        return $rs;
    }

    /* カートの一つの商品を削除
    *
    */
    public function deleteCartItem($db, $user_id, $item_id)
    {
        $sql = "DELETE FROM cart$user_id WHERE item_id = '$item_id' LIMIT 1;";
        $result = $db->query($sql);
    }

    /* カートを削除
    *
    */
    public function deleteCart($db, $user_id)
    {
        $sql = "DROP table IF EXISTS cart$user_id;";
        $db->query($sql);
    }

}
