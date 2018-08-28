<?php

namespace Think\Template\TagLib;

use Think\Template\TagLib;

/**
 * Html标签库驱动
 */
class Mtag extends TagLib
{
    // 标签定义
    protected $tags = array(
        'mhaha'        => ['attr' => '']
    );

    public function tagMhaha($tag, $content){
        $parseStr =  '<div class="input-group"> ';
           $parseStr .= $content;
        $parseStr .=  '</div>';
        return $parseStr;
    }

}
