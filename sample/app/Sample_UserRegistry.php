<?php

require_once 'Sample_RemoveTopColumn.php';

// ユーザを登録
class Sample_UserRegistry
{
    /* ユーザの名前・メールアドレス・パスワードを登録
    *
    *  @return ユーザID
    */
    public function storeUserData($db, $user_name, $user_kana, $mailaddress, $password)
    {
        $rtc = new Sample_RemoveTopColumn();

        $now = strftime('%Y-%m-%d %H:%M:%S');
        $sql = "INSERT INTO users(user_name, user_name_kana, mailaddress, password, register_date, login_date) 
                values('$user_name', '$user_kana', '$mailaddress', '$password', '$now', '$now');";
        $db->query($sql);

        $sql = "SELECT user_id FROM users WHERE mailaddress = '$mailaddress' LIMIT 1;";
        $result = $db->query($sql);
        
        $user_id = $rtc->removeTopColumn($result);
        
        return $user_id;
    }

    /* メールアドレスとパスワードの重複チェック
    *
    *  @return null or error message
    */
    public function checkDuplication($db, $value, $flag)
    {
        $flag_m = 1; // メールアドレス
        $flag_p = 2; // パスワード

        // メールアドレスの重複を確認
        if ($flag === $flag_m){
            $sql = "SELECT * FROM users WHERE mailaddress = '$value' LIMIT 1;";
            $result =& $db->query($sql);
            $rs = explode("\n", $result);
            $rs[1] = rtrim($rs[1]);

            if ($rs[1] === ''){
                return null;
            }else{
                return Ethna::raiseNotice('そのメールアドレスは既に登録されています', E_SAMPLE_CDMAIL);
            }
        
        // パスワードの重複を確認
        }else{
            $sql = "SELECT * FROM users WHERE password = '$value' LIMIT 1;";
            $result =& $db->query($sql);
            $rs = explode("\n", $result);
            $rs[1] = rtrim($rs[1]);

            if ($rs[1] === ''){
                return null;
            }else{
                return Ethna::raiseNotice('そのパスワードは既に使用されています', E_SAMPLE_CDPASS);
            }
        
        return null;
        }
    }

    public function storeUserAddress($db, $user_id, $postal_code, $xmpf, $address, $phone_number, $state)
    {
        $sql = "UPDATE users SET postal_code=$postal_code, xmpf='$xmpf', address='$address', phone_number='$phone_number', state=$state
                 WHERE user_id = $user_id LIMIT 1;";
        $result = $db->query($sql);
    }

    public function loadUserAddress($db, $user_id)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "SELECT postal_code, xmpf, address, phone_number FROM users WHERE user_id = '$user_id' LIMIT 1;";
        $result = $db->query($sql);

        $rs = $rtc->removeTopColumn($result);

        return $rs;
    }

    public function loadUserState($db, $user_id)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "SELECT state FROM users WHERE user_id = '$user_id' LIMIT 1;";
        $result = $db->query($sql);

        $rs = $rtc->removeTopColumn($result);

        return $rs[0][0];
    }

}
?>

