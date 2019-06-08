<?php
class Sample_RemoveTopColumn
{
    public function removeTopColumn($result)
    {
        // 先頭にあるカラム名群の削除
        $record = explode("\n", $result);
        array_shift($record);
        array_pop($record);

        if($record[0] == null){
            return null;
        }

        $i = 0;
        mb_regex_encoding('UTF-8');
        // レコードの各カラムを二次元配列へ格納
        foreach ($record as $row){
            $tmp = rtrim($row);

            if(strpos($tmp, ',') !== false){
                $table[] = mb_split(',', $tmp);
            }else{
                $table = $tmp;
            }
        }
        return $table;
    }
}
