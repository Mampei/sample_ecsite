<?php

require_once 'Sample_RemoveTopColumn.php';

class Sample_ItemSearch
{
    /* 商品名で検索
    *
    *  @return 各商品の情報の多次元配列
    */
    public function searchItem($db, $item_name, $detail_flag)
    {
        $rtc = new Sample_RemoveTopColumn();

        if ($detail_flag == 0){
        // itemのひらがな/カタカナそれぞれのフリガナも用意
        // 漢字は非対応...
        
        // データベースを検索
        // カテゴリーで一致するレコードがあるか調べる

            if ($item_name == null){
                return Ethna::raiseNotice('$item_nameに一致する商品はありませんでした', E_SAMPLE_SEARCH);
            }
            // カテゴリー名で検索
            $sql1 = "SELECT category_id FROM category WHERE category_name LIKE '%$item_name%';";
            $result1 = $db->query($sql1);

            $category_id = $rtc->removeTopColumn($result1);

            // 会社名で検索
            $sql2 = "SELECT publisher_id FROM publisher WHERE publisher_name LIKE '%$item_name%';";
            $result2 = $db->query($sql2);

            $publisher_id = $rtc->removeTopColumn($result2);

            // 商品名で検索
            $sql = "SELECT * FROM item WHERE category_id = '$category_id' OR publisher_id = '$publisher_id' OR item_name LIKE '%$item_name%';";
            $result = $db->query($sql);

            $table = $rtc->removeTopColumn($result);

            if ($table == null){
                return Ethna::raiseNotice($item_name.'に一致する商品はありませんでした', E_SAMPE_SEARCH);
            }

            return $table;
        
        }else{
            // 詳細フラグの場合は一つの商品の情報を取得
            $sql = "SELECT * FROM item WHERE item_id = '$item_name' LIMIT 1;";
            $result = $db->query($sql);

            $record = $rtc->removeTopColumn($result);

            return $record;
        }
    }
}
?>
