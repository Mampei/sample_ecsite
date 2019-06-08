<?php

require_once 'Sample_RemoveTopColumn.php';

// ユーザのお届け先情報の管理
class Sample_AddressManager
{
    /* ユーザのお届け先を登録
    *
    */
    public function storeUserAddress($db, $user_id, $postal_code, $xmpf, $address, $phone_number, $state)
    {
        $sql = "UPDATE users SET postal_code=$postal_code, xmpf='$xmpf', address='$address', phone_number='$phone_number', state=$state
                 WHERE user_id = '$user_id' ;";
        $result = $db->query($sql);
    }

    /* ユーザのお届け先情報を取得
    *
    * @return ユーザのお届け先情報
    */
    public function loadUserAddress($db, $user_id)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "SELECT postal_code, xmpf, address, phone_number FROM users WHERE user_id = '$user_id' LIMIT 1;";
        $result = $db->query($sql);

        $rs = $rtc->removeTopColumn($result);

        return $rs;
    }

    /* ユーザがお届け先が既登録か調べる
    *
    *  @return 既登録のフラグ
    */
    public function loadUserState($db, $user_id)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "SELECT state FROM users WHERE user_id = '$user_id' LIMIT 1;";
        $result = $db->query($sql);

        $rs = $rtc->removeTopColumn($result);

        return $rs[0][0];
    }
    
    /* ユーザのお届け先を削除
    *
    */
    public function deleteUserAddress($db, $user_id)
    {
        $sql = "UPDATE users SET postal_code='', xmpf='', address='', phone_number='', state=0 WHERE user_id = $user_id;";
        $result = $db->query($sql);
    }

}

?>
