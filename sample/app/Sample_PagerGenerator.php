<?php

class PagerGenerator
{
    /**
    *
    * ページャの作成
    *
    * @access public
    * @return void
    */
    function getPager(){
        //echo $this->total;
        //$pager = Ethna_Util::getDirectLinkList($this->total, $this->offset, $this->count);
        /*$next = $this->offset + $this->count;
        if($next < $this->total){
            $last = ceil($this->total / $this->count);
            $this->af->setApp('hasnext', true);
            $this->af->setApp('next', $next);
            $this->af->setApp('last', ($last * $this->count) - $this->count);
        }
        $prev = $this->offset - $this->count;
        if($this->offset - $this->count >= 0){
            $this->af->setApp('hasprev', true);
            $this->af->setApp('prev', $prev);
        }
        $this->af->setApp('current', $this->offset);
        $this->af->setApp('link', 'localhost');
        $this->af->setApp('pager', $pager);*/
    }
}
