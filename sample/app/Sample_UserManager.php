<?php

require_once 'Sample_RemoveTopColumn.php';

class Sample_UserManager
{
    /* ユーザ認証処理
    *
    *  @return 成功：ユーザ情報　失敗：エラーメッセージ
    */
    public function auth($db, $mailaddress, $password)
    {
        $rtc = new Sample_RemoveTopColumn();

        $sql = "SELECT user_id, user_name, password FROM users WHERE mailaddress = '$mailaddress';";
        $result = $db->query($sql);

        $user_data = $rtc->removeTopColumn($result);

        // 登録されているパスワードとフォーム値の一致を確認
        if (strcmp($password, $user_data[0][2]) !== 0){
            return Ethna::raiseNotice('メールアドレスまたはパスワードが正しくありません', E_SAMPLE_AUTH);
        }

        // ログイン時刻の登録
        $now = strftime('%Y-%m-%d %H:%M:%S');
        $sql = "UPDATE users set login_date='$now' WHERE mailaddress = '$mailaddress';";
        $db->query($sql);

        //成功時にはユーザ名を返す
        return $user_data;
    }

}
?>
