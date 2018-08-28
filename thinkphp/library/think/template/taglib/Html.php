<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Think\Template\TagLib;

use Think\Template\TagLib;
use think\Db;

/**
 * Html标签库驱动
 */
class Html extends TagLib
{
    // 标签定义
    protected $tags = array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'editor'   => array('attr' => 'id,name,style,width,height,type', 'close' => 1),
        'select'   => array('attr' => 'name,options,values,output,multiple,id,size,first,change,selected,dblclick', 'close' => 0),
        'grid'     => array('attr' => 'id,pk,style,action,actionlist,show,datasource', 'close' => 0),
        'list'     => array('attr' => 'id,pk,style,action,actionlist,show,datasource,checkbox', 'close' => 0),
        'imagebtn' => array('attr' => 'id,name,value,type,style,click', 'close' => 0),
        'checkbox' => array('attr' => 'name,checkboxes,checked,separator', 'close' => 0),
        'radio'    => array('attr' => 'name', 'close' => 0),
        'breadcrumb' => array('attr' => 'name','close' =>0),
        'dateselect' => array('attr' => 'name','close' =>0),
        'combo' => array('attr' => 'name','close' =>0),
        'select2' => array('attr' => 'name','close' =>0),
        'combotree' => array('attr' => 'name','close' =>0),
        'category' => array('attr' => 'name','close' =>0),
        'combogroup' => array('attr' => 'name','close' =>0),
        'gridselect' => array('attr' => 'name,','close' =>0),
        'textfrom' => array('attr' => 'name,','close' =>0),
        'textselect' => array('attr' => 'name,','close' =>0),
        'ueditorselect' => array('attr' => 'name,','close' =>0),
        'ueditor' => array('attr' => 'name,','close' =>0),
        'autocomplete' => array('attr' => 'name,','close' =>0),
        'field'        => ['attr' => ''],
        'panel'        => ['attr' => ''],
        'switch'        => array('attr' => 'name','close' =>0),
        'dict'        => array('attr' => 'name','close' =>0),
        'input'        => array('attr' => 'name','close' =>0),
        'textplain'        => array('attr' => 'name','close' =>0),
        'upload'        => array('attr' => 'name','close' =>0),
        'hidden'        => array('attr' => 'name','close' =>0),
        'serial'        => array('attr' => 'id,name','close' =>0),
        'serialsimple'        => array('attr' => 'id,name','close' =>0),
        'inputgroup'        => array('attr' => 'name','close' =>0),
        'textarea'        => array('attr' => 'name','close' =>0),
        'password'        => array('attr' => 'name','close' =>0),
        'formgroupfront'        => ['attr' => ''],
    );

    public function tagFormgroupfront($tag, $content){
        $class  = isset($tag['class']) ? $tag['class'] : '';
        $icon  = isset($tag['icon']) ? $tag['icon'] : '';
        $label  = isset($tag['label']) ? $tag['label'] : '';
        $title  = isset($tag['title']) ? $tag['title'] : '';


        $parseStr =  '<div class="input-group"> ';
        $parseStr .=  '<div class="input-group input-group-icon">';
        $parseStr .=  '<span class="input-group-addon '.$class.'" title="'.$title.'">';
        $parseStr .=  '<span class="icon '.$icon.'" aria-hidden="true"></span> '.$label.'';
        $parseStr .=  '</span>';
        $parseStr .= $content;
        $parseStr .=  '</div>';
        $parseStr .=  '</div>';
        return $parseStr;
    }


    public function tagPassword($tag, $content){
        $name  = $tag['name'];
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $placeholder    = isset($tag['placeholder']) ? $tag['placeholder'] : '';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $parseStr =  '<input type="password" name="'.$name.'" ';
        if ($required=='true')      {$parseStr .= ' required';}
        if (!empty($placeholder))   {$parseStr .= ' placeholder="'.$placeholder.'" title="'.$placeholder.'" ';}
        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}
        $parseStr .=  ' autocomplete="off" class="layui-input">';
        return $parseStr;
    }

    public function tagCombotree($tag, $content){
        $name  = $tag['name'];
        // $ctype  = $tag['ctype'];
        $ctype    = isset($tag['ctype']) ? $tag['ctype'] : '';
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $parseStr = '<?php  $'.$name.'category = think\Db::name(\'category\')->where(\'ctype\', \''.$ctype.'\')->select(); ?>';

        $parseStr .=  ' <?php $'.$name.'arr = data2array($'.$name.'category, \'id\', \'name\');   ?>';
        $parseStr .=  "            <div class=\"layui-unselect layui-form-select\">\n";
        $parseStr .=  "               <div class=\"layui-select-title\">\n";
        $parseStr .=  "                   <input type=\"text\" readonly autocomplete=\"off\" class=\"layui-input layui-unselect\" ";
        if ($required=='true') {$parseStr .= ' required ';}
        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}
        $parseStr .= 'value="<?php if(isset($vo[\''.$name.'\'])  and $vo[\''.$name.'\']!=0): echo $'.$name.'arr[$vo[\''.$name.'\']]; endif;?>">';
        $parseStr .=  "                   <input type=\"hidden\" name=\"".$name."\" ";
        $parseStr .= 'value="<?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php endif;?>">';
        $parseStr .=  "                   <i class=\"layui-edge\"></i>\n";
        $parseStr .=  "               </div>\n";
        $parseStr .=  "           </div>\n";
        $parseStr .=  "           <div class=\"menuContent\">\n";
        $parseStr .=  "               <ul id=\"".$name."_tree\" class=\"ztree\"></ul>\n";
        $parseStr .=  "           </div>\n";

        return $parseStr;
    }

public function tagCategory($tag, $content){
        $name  = $tag['name'];
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';

        $parseStr =  "            <div class=\"layui-unselect layui-form-select\">\n";
        $parseStr .=  "               <div class=\"layui-select-title\">\n";
        $parseStr .=  "                   <input type=\"text\" readonly autocomplete=\"off\" class=\"layui-input layui-unselect\" ";
        if ($required=='true') {$parseStr .= ' required ';}
        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}
        $parseStr .= 'value="<?php if(isset($vo[\''.$name.'\'])  and $vo[\''.$name.'\']!=0): echo $category[$vo[\''.$name.'\']]; endif;?>">';
        $parseStr .=  "                   <input type=\"hidden\" name=\"".$name."\" ";
        $parseStr .= 'value="<?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php endif;?>">';
        $parseStr .=  "                   <i class=\"layui-edge\"></i>\n";
        $parseStr .=  "               </div>\n";
        $parseStr .=  "           </div>\n";
        $parseStr .=  "           <div class=\"menuContent\">\n";
        $parseStr .=  "               <ul id=\"".$name."_tree\" class=\"ztree\"></ul>\n";
        $parseStr .=  "           </div>\n";

        return $parseStr;
    }

    public function tagUpload($tag, $content){
        $name  = $tag['name'];
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $caption    =isset($tag['caption']) ? $tag['caption'] : '上传';
        $parseStr =  '<input type="hidden" name="'.$name.'" vtype="photos" ';
        if ($required=='true') {$parseStr .= ' required ';}
        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}
        $parseStr .= 'value="<?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'|default=""}<?php else:?><?php endif;?>">';
        $parseStr .= "            <blockquote class=\"layui-elem-quote layui-quote-nm previewquote\">\n";
        $parseStr .= "               <div class=\"previewarea\"></div>\n";
        $parseStr .= "           </blockquote>\n";
        $parseStr .= "           <button type=\"button\" class=\"layui-btn uploadatn\">".$caption."</button>\n";
        return $parseStr;
    }


    public function tagTextselect($tag, $content){
        $name  = $tag['name'];
        $readonly    = isset($tag['readonly']) ? $tag['readonly'] : '';
        $rows    = isset($tag['rows']) ? $tag['rows'] : '3';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $placeholder  = isset($tag['placeholder']) ? $tag['placeholder'] : '';
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $value  = isset($tag['value']) ? $tag['value'] : '';
        $dict  = isset($tag['dict']) ? $tag['dict'] : '';
        $multiselect  = isset($tag['multiselect']) ? $tag['multiselect'] : '1';

        $parseStr = '<div class="input-group textselect">';

        $parseStr .= '    <textarea name="'.$name.'"  class="layui-textarea form-control custom-control"  placeholder="'.$placeholder.'" ';
        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}
        if ($readonly) {$parseStr .= ' readonly ';}
        if ($required=='true') {$parseStr .= ' required ';}
        if (!empty($rows)) {$parseStr .= ' rows= "'.$rows.'"';}

        $parseStr .= ' >';
        $parseStr .= '<?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php else:?>'.$value.'<?php endif;?>';

        $parseStr .= '</textarea>';
        $parseStr .= '    <span class="input-group-addon btn" grid-select="/admin/dict/gridselect.html?type='.$dict.'&rows=6" showindex="2" multiselect="'.$multiselect.'">';
        $parseStr .= '        <i class="layui-icon">&#xe608;</i>';
        $parseStr .= '    </span>';
        $parseStr .= '</div>';


        return $parseStr;
    }
    public function tagUeditorselect($tag, $content){
        $name  = $tag['name'];
        $readonly    = isset($tag['readonly']) ? $tag['readonly'] : '';
        $id    = isset($tag['id']) ? $tag['id'] : '';
        $rows    = isset($tag['rows']) ? $tag['rows'] : '3';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $placeholder  = isset($tag['placeholder']) ? $tag['placeholder'] : '';
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $value  = isset($tag['value']) ? $tag['value'] : '';
        $dict  = isset($tag['dict']) ? $tag['dict'] : '';
        $multiselect  = isset($tag['multiselect']) ? $tag['multiselect'] : '1';

        $parseStr = '<div class="input-group textselect">';

        $parseStr .= '    <textarea id="'.$id.'" name="'.$name.'"  class="layui-textarea form-control custom-control"  placeholder="'.$placeholder.'" ';
        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}
        if ($readonly) {$parseStr .= ' readonly ';}
        if ($required=='true') {$parseStr .= ' required ';}
        if (!empty($rows)) {$parseStr .= ' rows= "'.$rows.'"';}

        $parseStr .= ' >';
        $parseStr .= '<?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php else:?>'.$value.'<?php endif;?>';

        $parseStr .= '</textarea>';
        $parseStr .= '    <span class="input-group-addon btn" ueditor-select="/admin/dict/gridselect.html?type='.$dict.'&rows=6" showindex="2" multiselect="'.$multiselect.'">';
        $parseStr .= '        <i class="layui-icon">&#xe608;</i>';
        $parseStr .= '    </span>';
        $parseStr .= '</div>';


        return $parseStr;
    }
    public function tagUeditor($tag, $content){
        $name  = $tag['name'];
        $readonly    = isset($tag['readonly']) ? $tag['readonly'] : '';
        $id    = isset($tag['id']) ? $tag['id'] : '';
        $rows    = isset($tag['rows']) ? $tag['rows'] : '3';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $placeholder  = isset($tag['placeholder']) ? $tag['placeholder'] : '';
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $value  = isset($tag['value']) ? $tag['value'] : '';

        $parseStr = '    <textarea id="'.$id.'" name="'.$name.'"  class="layui-textarea form-control custom-control"  placeholder="'.$placeholder.'" ';
        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}
        if ($readonly) {$parseStr .= ' readonly ';}
        if ($required=='true') {$parseStr .= ' required ';}
        if (!empty($rows)) {$parseStr .= ' rows= "'.$rows.'"';}

        $parseStr .= ' >';
        $parseStr .= '<?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php else:?>'.$value.'<?php endif;?>';

        $parseStr .= '</textarea>';


        return $parseStr;
    }

    public function tagSwitch($tag, $content){
        $name  = $tag['name'];

        $readonly    = isset($tag['readonly']) ? $tag['readonly'] : '';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $placeholder  = isset($tag['placeholder']) ? $tag['placeholder'] : '';
        $layfilter  = isset($tag['layfilter']) ? $tag['layfilter'] : '';
        $required    = isset($tag['required']) ? $tag['required'] : '';

        $parseStr =  '<input type="checkbox" lay-skin="switch" name="'.$name.'" ';

        if ($readonly)              {$parseStr .= ' readonly ';}
        if (!empty($verify))        {$parseStr .= ' lay-verify="'.$verify.'"';}
        if (!empty($placeholder))   {$parseStr .= 'placeholder="'.$placeholder.'" title="'.$placeholder.'" ';}
        if (!empty($layfilter))     {$parseStr .= ' lay-filter="'.$layfilter.'"';}
        if ($required=='true')      {$parseStr .= ' required ';}

        $parseStr .= ' <?php if(isset($vo[\''.$name.'\']) && intval($vo[\''.$name.'\']) == "1" ):?>checked<?php endif;?>>';

        return $parseStr;
    }
    public function tagDict($tag, $content)
    {
        $name  = $tag['name']; //表单名标识
        $value = sysconfig($name);
        $parseStr =$value;
        return $parseStr;
    }
    /*
     * value 默认值,
     * 支持session 格式 value=':sessiom("user.id")'
     * 支持get 格式 value=':get("id")'
     */
    public function tagHidden($tag, $content){
        $name  = $tag['name'];
        $id  =  isset($tag['id']) ? $tag['id'] : '';
        $value  = isset($tag['value']) ? $tag['value'] : '';


        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $layfilter  = isset($tag['layfilter']) ? $tag['layfilter'] : '';
        $required    = isset($tag['required']) ? $tag['required'] : '';


        if (0 === strpos($value, ':session')) {
            preg_match('/\("(.*?)"\)/', $value, $match);
            $handle = $match[1];
            $value  = session($handle);
        }elseif (0 === strpos($value, ':get')) {
            preg_match('/\("(.*?)"\)/', $value, $match);
            $handle = $match[1];
            $value =  '<?php echo \think\Request::instance()->get("'.$handle.'"); ?> ';
        }
        $parseStr =  '<input type="hidden" name="'.$name.'" ';
        if (!empty($id)) {
            $parseStr .= ' id="'.$id.'" ';
        }
        if (!empty($verify))        {$parseStr .= ' lay-verify="'.$verify.'"';}
        if (!empty($layfilter))     {$parseStr .= ' lay-filter="'.$layfilter.'"';}
        if ($required=='true')      {$parseStr .= ' required ';}

        $parseStr .= 'value=\'<?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php else:?>'.$value.'<?php endif;?>\'>';
        return $parseStr;
    }
    /*
     * 序列生成器字段,至少要有两种 busi / simple 一种是业务相关序号,基本格式为
     * 1.两位年份(2)+公司缩写(2)+经营类型(自营,代理 1)+业务分类(2)+部门(2)+人员(2)+该公司部门人员下的自增ID(4)
     * 2.公司缩写(2)+业务分类(2)+随机号(6) 紧急2018-02-13 11:50
     * 注意: 标签属性不能叫tag
     */
    public function tagSerial($tag, $content){
        $name  = $tag['name'];
        $readonly    = isset($tag['readonly']) ? $tag['readonly'] : '';
        $table    = isset($tag['table']) ? $tag['table'] : '';
        $busi    = isset($tag['busi']) ? $tag['busi'] : '';
        $type  = isset($tag['type']) ? $tag['type'] : '';

        if(!empty($type) && $type=='simple') {

        }else{
            $db = Db::name($table);
            $pk = $db->getPk() ? $db->getPk() : 'id';
        }

        $required    = isset($tag['required']) ? $tag['required'] : '';

        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $placeholder  = isset($tag['placeholder']) ? $tag['placeholder'] : '';

        $parseStr =  '<input type="text" name="'.$name.'" ';
        if (!empty($verify))        {$parseStr .= 'lay-verify="'.$verify.'"';}
        if ($readonly)              {$parseStr .= ' readonly ';}
        if ($required=='true')      {$parseStr .= ' required ';}
        $parseStr .= 'placeholder="'.$placeholder.'" title="'.$placeholder.'" autocomplete="off" class="layui-input"';
        $parseStr .= 'value="<?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php else:?>';
        if(!empty($type) && $type=='simple') {
            $parseStr .= '{:idgensimple("'.$busi.'")}';
        }else{
            $parseStr .= '{:idgen("'.$table.'","'.$pk.'","'.$busi.'")}';
        }

//        $parseStr .= '{:idgen("'.$table.'","'.$pk.'","'.$busi.'")}';
        $parseStr .= '<?php endif;?>">';

        return $parseStr;
    }

    public function tagSerialsimple($tag, $content){
        $name  = $tag['name'];
        $readonly    = isset($tag['readonly']) ? $tag['readonly'] : '';
        $busi    = isset($tag['busi']) ? $tag['busi'] : '';



        $required    = isset($tag['required']) ? $tag['required'] : '';

        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $placeholder  = isset($tag['placeholder']) ? $tag['placeholder'] : '';

        $parseStr =  '<input type="text" name="'.$name.'" ';
        if (!empty($verify))        {$parseStr .= 'lay-verify="'.$verify.'"';}
        if ($readonly)              {$parseStr .= ' readonly ';}
        if ($required=='true')      {$parseStr .= ' required ';}
        $parseStr .= 'placeholder="'.$placeholder.'" title="'.$placeholder.'" autocomplete="off" class="layui-input"';
        $parseStr .= 'value="<?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php else:?>';

            $parseStr .= '{:idgensimple("'.$busi.'")}';


        $parseStr .= '<?php endif;?>">';

        return $parseStr;
    }

    public function tagTextarea($tag, $content){
        $name  = $tag['name'];
        $type    = isset($tag['type']) ? $tag['type'] : '';
        $rows    = isset($tag['rows']) ? $tag['rows'] : '3';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $placeholder  = isset($tag['placeholder']) ? $tag['placeholder'] : '';
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $class  = isset($tag['class']) ? $tag['class'] : '';


        $parseStr =  '<textarea name="'.$name.'" ';

        if (!empty($verify))        {$parseStr .= ' lay-verify="'.$verify.'"';}
        if ($required=='true')      {$parseStr .= ' required ';}
        if (!empty($placeholder))   {$parseStr .= ' placeholder="'.$placeholder.'" title="'.$placeholder.'" ';}



        $parseStr .= ' rows="'.$rows.'" class="layui-textarea form-control custom-control ';
        if ($class) {
            $parseStr .= $class;
        }

        $parseStr .= '"><?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php endif;?></textarea>';

        return $parseStr;
    }
    public function tagInputgroup($tag, $content){
        $name  = $tag['name'];
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $placeholder  = isset($tag['placeholder']) ? $tag['placeholder'] : '';
        $addontype  = isset($tag['addontype']) ? $tag['addontype'] : 'plane';
        $addon  = isset($tag['addon']) ? $tag['addon'] : '';
        $class  = isset($tag['class']) ? $tag['class'] : '';
        $on  = isset($tag['on']) ? $tag['on'] : '';
        $required    = isset($tag['required']) ? $tag['required'] : '';

        $parseStr =  '<div class="input-group"> ';
        $parseStr .=  '<input type="text" name="'.$name.'"  id="'.$name.'" ';
        if (!empty($verify)) {
            $parseStr .= 'lay-verify="'.$verify.'"';
        }
        if (!empty($on)) {
            $parseStr .= ' onkeyup="'.$on.'" onmouseup="'.$on.'"';
        }
        if ($required=='true') {$parseStr .= ' required ';}
        if (!empty($placeholder))   {$parseStr .= ' placeholder="'.$placeholder.'" title="'.$placeholder.'" ';}

        $parseStr .= ' autocomplete="off" class="layui-input" value="<?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php endif;?>">';
        if ($addontype=='plane') {
            $parseStr .= '<span class="input-group-addon">'.$addon.'</span>';
        }
        $parseStr .= '</div>';
        return $parseStr;
    }
    /*
     * {input name="type"  placeholder="请输入类型"  value=':tbVal("category","name",isset($_GET["category"])?$_GET["category"]:"")'}
     */
    public function tagInput($tag, $content){
        $name  = $tag['name'];
        $readonly    = isset($tag['readonly']) ? $tag['readonly'] : '';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $placeholder  = isset($tag['placeholder']) ? $tag['placeholder'] : '';
        $value  = isset($tag['value']) ? $tag['value'] : '';
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $class  = isset($tag['class']) ? $tag['class'] : '';
        $on  = isset($tag['on']) ? $tag['on'] : '';
        $cus=0;
        // 处理session默认值
        if (0 === strpos($value, ':session')) {
            preg_match('/\("(.*?)"\)/', $value, $match);
            $handle = $match[1];
            $value  = session($handle);
        //处理get标签
        }elseif (0 === strpos($value, ':get(')) {
            preg_match('/\("(.*?)"\)/', $value, $match);
            $handle = $match[1];
            $value = isset($_GET[$handle]) ? $_GET[$handle] : '';
        //处理变量
        }elseif (0 === strpos($value, '$')) {
            preg_match('/\$(.*)/', $value, $match);
            $handle = $match[1];
            $value ='<?php echo isset($'.$handle.')?$'.$handle.':"";?>';
        //处理各种函数 :function($varible)
        }elseif (0 === strpos($value, ':')) {
            preg_match('/:(.*)/', $value, $match);
            preg_match('/\((.*?)\)/', $value, $varib);
            $handle = $match[1];
            $cus=1;

            $value ='<?php echo '.$handle.';?>';
        }

        $parseStr =  '<input type="text" spellcheck="false" name="'.$name.'" ';
        if (!empty($verify))        {$parseStr .= ' lay-verify="'.$verify.'" ';}
        if ($required=='true')      {$parseStr .= ' required ';}
        if ($readonly)              {$parseStr .= ' readonly ';}
        if (!empty($placeholder))   {$parseStr .= ' placeholder="'.$placeholder.'" title="'.$placeholder.'" ';}

        $parseStr .= ' autocomplete="off" class="layui-input ';
        if ($class) {
            $parseStr .= $class;
        }

        if (!empty($on)) {
            $parseStr .= 'onkeypress="'.$on.'" onkeyup="'.$on.'" onmouseup="'.$on.'"';
        }
        $parseStr .= '"';
        if ($cus===1) {
            $parseStr .= ' value="'.$value.'">';

        } else {
            $parseStr .= ' value="<?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php else:?>'.$value.'<?php endif;?>">';

        }

        return $parseStr;
    }



    public function tagTextplain($tag, $content){
        $name  = $tag['name'];
        $value  = isset($tag['value']) ? $tag['value'] : '';
        $cus=0;
        // 处理session默认值
        if (0 === strpos($value, ':session')) {
            preg_match('/\("(.*?)"\)/', $value, $match);
            $handle = $match[1];
            $value  = session($handle);
            //处理get标签
        }elseif (0 === strpos($value, ':get(')) {
            preg_match('/\("(.*?)"\)/', $value, $match);
            $handle = $match[1];
            $value = isset($_GET[$handle]) ? $_GET[$handle] : '';
            //处理变量
        }elseif (0 === strpos($value, '$')) {
            preg_match('/\$(.*)/', $value, $match);
            $handle = $match[1];
            $value ='<?php echo isset($'.$handle.')?$'.$handle.':"";?>';
            //处理各种函数 :function($varible)
        }elseif (0 === strpos($value, ':')) {
            preg_match('/:(.*)/', $value, $match);
            preg_match('/\((.*?)\)/', $value, $varib);
            $handle = $match[1];
            $cus=1;

            $value ='<?php echo '.$handle.';?>';
        }

        $parseStr =  ' ';
        if ($cus===1) {
            $parseStr .= $value;
        } else {
            $parseStr .= ' <?php if(isset($vo[\''.$name.'\'])  ):?>{$vo.'.$name.'}<?php else:?>'.$value.'<?php endif;?>';
        }
        $parseStr .= $value;
        return $parseStr;
    }


    public function tagPanel($tag, $content){
        $title  = isset($tag['title']) ? $tag['title'] : '窗口';
        $parseStr = "                    <div class=\"panel panel-default \">\n";
        $parseStr .= "                       <div class=\"panel-heading\">\n";
        $parseStr .= "                           <div class=\"panel-heading-btn\">\n";
        $parseStr .= "                               <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-circle btn-default\"\n";
        $parseStr .= "                                  data-click=\"panel-expand\"><i class=\"fa fa-expand\"></i></a>\n";
        $parseStr .= "                               <a href=\"javascript:;\" class=\"btn btn-xs btn-icon btn-circle btn-warning\"\n";
        $parseStr .= "                                  data-click=\"panel-collapse\"><i class=\"fa fa-minus\"></i></a>\n";
        $parseStr .= "                           </div>\n";
        $parseStr .= "                           <h4 class=\"panel-title\">".$title."</h4>\n";
        $parseStr .= "                       </div>\n";
        $parseStr .= "                       <div class=\"panel-body\">\n";
//        $parseStr .= "                          <div class=\"layui-form-item layui-box\">\n";
        $parseStr .= $content;
//        $parseStr .= "                        </div>\n";
        $parseStr .= "                        </div>\n";
        $parseStr .= "                   </div>\n";
        return $parseStr;
    }

    /*
     * {field type="block" label="头像"}
     */
    public function tagField($tag, $content)
    {
//        $label   = $tag['label'];
        $label  = isset($tag['label']) ? $tag['label'] : '';
        $class  = isset($tag['class']) ? $tag['class'] : '';
        $labelclass  = isset($tag['labelclass']) ? $tag['labelclass'] : '';
        $type  = isset($tag['type']) ? $tag['type'] : '';
        $title  = isset($tag['title']) ? $tag['title'] : '';
        $help  = isset($tag['help']) ? $tag['help'] : '';
        $ta= $type=='block'?"layui-form-item":"layui-inline";
        $tb= $type=='block'?"layui-input-block":"layui-input-inline";
        $parseStr =  "                                <div class='".$ta." ".$class."'>\n";
        if (!empty($label))   {$parseStr .= "                                   <label class=\"layui-form-label ".$labelclass."\" title='".$title."'>$label</label>\n";}
        $parseStr .= "                                   <div class='".$tb."''>\n";
        $parseStr .= $content;
        $parseStr .= "                                    </div>\n";
//        if($type!='block') {
            $parseStr .= "  <div class=\"layui-form-mid layui-word-aux\">$help</div>\n";
//        }
        $parseStr .= "                               </div>\n";
        return $parseStr;
    }
    public function tagGridselect($tag, $content)
    {
        $name  = $tag['name']; //名称
        $table  = $tag['table']; //名称
        $id  = $tag['id']; //名称
        $labelfield  = $tag['labelfield']; //名称
        $title    = isset($tag['title']) ? $tag['title'] : '请在弹窗选择';
        $winsize    = isset($tag['winsize']) ? $tag['winsize'] : '800px,500px';
        $showindex    = isset($tag['showindex']) ? $tag['showindex'] : '1';
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $url    = isset($tag['url']) ? $tag['url'] : '';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';

        $parseStr='<div class="input-group">';
        $parseStr .= '<input type="text" grid-select="'.$url.'" winsize="'.$winsize.'" showindex="'.$showindex.'"';
        $parseStr .= 'value="<?php if(isset($vo[\''.$name.'\'])&&$vo[\''.$name.'\']!=\'\'):?>{:label(\''.$table.'\', \''.$id.'=\"\'.$vo.'.$name.'.\'\"\' ,\''.$labelfield.'\')}<?php endif; ?>"';
        $parseStr .= 'title="'.$title.'" placeholder="'.$title.'"';
        if ($required=='true')  {$parseStr .= ' required ';}
        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}
        $parseStr .= ' readonly ';
        $parseStr .= 'class="layui-input gridselectinput">';
        $parseStr .= ' <input type="hidden"   name="'.$name.'" value=\'{$vo.'.$name.'|default=""}\'>';
        $parseStr .= '<span class="input-group-btn">';
        $parseStr .= '<button grid-select=\''.$url.'\'';
        $parseStr .= 'winsize="'.$winsize.'" showindex="'.$showindex.'"';
        $parseStr .= 'class="layui-btn layui-btn-primary gridselect" type="button">';
        $parseStr .= '<i class="layui-icon">&#xe65f;</i>';
        $parseStr .= '</button>';
        $parseStr .= '</span>';
        $parseStr .= '</div>';
        return $parseStr;
    }

    public function tagTextfrom($tag, $content)
    {
        $name  = $tag['name']; //名称
        $table  = $tag['table']; //名称
        $id  = $tag['id']; //名称
        $labelfield  = $tag['labelfield']; //名称
        $title    = isset($tag['title']) ? $tag['title'] : '请在弹窗选择';
        $winsize    = isset($tag['winsize']) ? $tag['winsize'] : '800px,500px';
        $showindex    = isset($tag['showindex']) ? $tag['showindex'] : '1';
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $url    = isset($tag['url']) ? $tag['url'] : '';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';

        $parseStr='';
//        $parseStr .= '<input type="text" grid-select="'.$url.'" winsize="'.$winsize.'" showindex="'.$showindex.'"';
        $parseStr .= '<?php if(isset($vo[\''.$name.'\'])&&$vo[\''.$name.'\']!=\'\'):?>{:label(\''.$table.'\',\''.$id.'=\'.$vo.'.$name.',\''.$labelfield.'\')}<?php endif; ?>';
//        $parseStr .= 'title="'.$title.'" placeholder="'.$title.'"';
//        if ($required=='true')  {$parseStr .= ' required ';}
//        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}
//        $parseStr .= ' readonly ';
//        $parseStr .= 'class="layui-input gridselectinput">';
//        $parseStr .= ' <input type="hidden"   name="'.$name.'" value=\'{$vo.'.$name.'|default=""}\'>';
//        $parseStr .= '<span class="input-group-btn">';
//        $parseStr .= '<button grid-select=\''.$url.'\'';
//        $parseStr .= 'winsize="'.$winsize.'" showindex="'.$showindex.'"';
//        $parseStr .= 'class="layui-btn layui-btn-primary gridselect" type="button">';
//        $parseStr .= '<i class="layui-icon">&#xe65f;</i>';
//        $parseStr .= '</button>';
//        $parseStr .= '</span>';
        return $parseStr;
    }

    /**
     * 用法
     * {breadcrumb name='个人中心/修改密码' /}
     * @param $tag
     * @param $content
     * @return string
     * @autor: meetrice
     */
    public function tagBreadcrumb($tag, $content)
    {
        $tags = '';
        if(isset($tag['name']) && !empty($tag['name']))
        {
            $tags = explode('/',$tag['name']);
        }
        $parseStr =  '<ol class="breadcrumb pull-right"><li> <a class="maincolor" data-load="{:url("index")}">首页</a></li>' ;
        if(!empty($tags))
        {
            foreach($tags as $vo)
            {
                $parseStr .= "<li>{$vo}</li>";
            }
        }
        $parseStr .= '</ol>';
        return $parseStr;
    }

    /*
     * 日期选框标签
     * 用法： {dateselect name='validdtae' format='yyyy-MM-dd HH:mm:ss' type='datetime' min='2017-10-12'}
     * 来源参考 http://www.layui.com/laydate/
     * */
    public function tagDateselect($tag, $content)
    {
        $name  = $tag['name']; //名称
        $format  = $tag['format']; //名称
        $type    = isset($tag['type']) ? $tag['type'] : '';
        $min    = isset($tag['min']) ? $tag['min'] : '';
        $max    = isset($tag['max']) ? $tag['max'] : '';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $class  = isset($tag['class']) ? $tag['class'] : '';

        $parseStr =  '<input type="text" name="'.$name.'" ';

        if (!empty($verify))    {$parseStr .= 'lay-verify="'.$verify.'"';}

        if ($required=='true')  {$parseStr .= ' required ';}

        $parseStr .= 'placeholder="'.$format.'" autocomplete="off" class="date ';

        if ($class) {
            $parseStr .= $class;
        }else{
            $parseStr .= ' layui-input';
        }
        $parseStr .=' " value="<?php if(isset($vo[\''.$name.'\']) and strtotime($vo[\''.$name.'\']) >0 ):?>{$vo.'.$name.'}<?php endif;?>">';
        $parseStr.="<script> laydate.render({elem: 'input[name=\"$name\"]'";
        if (!empty($type)) {
            $parseStr.=",type:'$type'";
        }
        if (!empty($min)) {
            $parseStr.=",min:'$min'";
        }
        if (!empty($max)) {
            $parseStr.=",max:'$max'";
        }
        $parseStr.="}); </script>";
        return $parseStr;
    }

    public function tagAutocomplete($tag, $content)
    {
        $name  = $tag['name'];
        $placeholder  = $tag['placeholder'];
        $key  = $tag['key'];
        $required    = isset($tag['required']) ? $tag['required'] : '';

        $parseStr =  '<input type="text" name="'.$name.'" class="layui-input" ';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';

        if (!empty($placeholder))   {$parseStr .= ' title="'.$placeholder.'" placeholder="'.$placeholder.'" ';}
        if ($required=='true')      {$parseStr .= ' required ';}
        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}

        $parseStr .= ' value="<?php if(isset($vo[\''.$name.'\']) ):?>{$vo.'.$name.'}<?php endif;?>">';

        $parseStr.= "                                        <script>\n";
        $parseStr.= "                                            $(function () {\n";
        $parseStr.= "                                           require(['jqueryui'], function () {\n";

        $parseStr.= "                                               $('input[name=\"$name\"]').autocomplete({\n";
        $parseStr.= "                                                   source: function( request, response ) {\n";
        $parseStr.= "                                                       $.ajax({\n";
        $parseStr.= "                                                           url: '{:url(\"admin/dict/rest\")}?key=$key',\n";
        $parseStr.= "                                                           data: {q: request.term},\n";
        $parseStr.= "                                                           success: function( data ) {\n";
        $parseStr.= "                                                               response( data );\n";
        $parseStr.= "                                                           }\n";
        $parseStr.= "                                                       });\n";
        $parseStr.= "                                                   },appendTo: \".layui-form\"";
        $parseStr.= "                                               });\n";
        $parseStr.= "                                           });\n";
        $parseStr.= "                                           });\n";
        $parseStr.= "                                       </script>\n";
        return $parseStr;
    }

    /*
     * 下拉框标签
     * 用法： {combo name='ucode' db='Employee' id='employee_id' label='name' filter='category=16'}
     * 来源参考 http://www.layui.com/laydate/
     * */
    public function tagCombo($tag, $content)
    {
        $db  = $tag['db']; //数据表
        $id  = $tag['id']; //id字段
        $label  = $tag['label']; //名称字段
        // $class  = $tag['class']; 
        $class    = isset($tag['class']) ? $tag['class'] : '';//表单名标识
        $name    = isset($tag['name']) ? $tag['name'] : '';//表单名标识
        $filter    = isset($tag['filter']) ? $tag['filter'] : '';//表过滤
        $title    = isset($tag['title']) ? $tag['title'] : '';//表过滤
        $layfilter    = isset($tag['layfilter']) ? $tag['layfilter'] : '';//表过滤
        $required    = isset($tag['required']) ? $tag['required'] : '';
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';

        $parseStr = '<select name="' . $name . '" ';
        if($class!="")      {$parseStr .= ' class="'.$class.'" ';}
        if($layfilter!="")      {$parseStr .= ' lay-filter="'.$layfilter.'" ';}
        if ($required=='true')  {$parseStr .= ' required ';}
        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}

        $parseStr .= 'lay-search><option value="">';
        $parseStr .= $title;
        $parseStr .= '</option>';
        $parseStr .= '<?php  $volist = think\Db::name(\'' . $db . '\')';
        if($filter!=""){
            $parseStr .= '->where(\''.$filter.'\')';
        }
        $parseStr .= '->select(); ?>';
        $parseStr .= '<?php  if(is_array($volist) || $volist instanceof \think\Collection || $volist instanceof \think\Paginator): ?>';
        $parseStr .= '<?php  foreach($volist as $key=>$val) : ?>';
        $parseStr .= '<?php  if($val[\''.$id.'\'] == (isset($vo[\''.$name.'\'])&&$vo[\''.$name.'\']!=\'\'?$vo[\''.$name.'\']:-1)): ?>';
        $parseStr .='<option selected value="{$val["'.$id.'"]}">{$val["'.$label.'"]}</option>';
        $parseStr .= '<?php else: ?>';
        $parseStr .= '<option  value="{$val["'.$id.'"]}">{$val["'.$label.'"]}</option>';
        $parseStr .= '<?php endif; ?>';
        $parseStr .= '<?php endforeach; ?>';
        $parseStr .= '<?php endif; ?>';
        $parseStr .='</select>';

        return $parseStr;
    }


    public function tagSelect2($tag, $content)
    {
//        $db  = $tag['db']; //数据表
        $db  =  isset($tag['db']) ? $tag['db'] : ''; //数据表
        $id  =  isset($tag['id']) ? $tag['id'] : ''; //数据表
//        $label  = $tag['label']; //名称字段
        $label  = isset($tag['label']) ? $tag['label'] : ''; //名称字段
//        $name  = $tag['name']; //表单名标识
        $name    = isset($tag['name']) ? $tag['name'] : '';//表单名标识
        $multiple    = isset($tag['multiple']) ? $tag['multiple'] : '';//表单名标识
        $style    = isset($tag['style']) ? $tag['style'] : '';//表单名标识
        $class    = isset($tag['class']) ? $tag['class'] : '';//表单名标识
        $id    = isset($tag['id']) ? $tag['id'] : '';//表单名标识
        $filter    = isset($tag['filter']) ? $tag['filter'] : '';//表过滤
        $title    = isset($tag['title']) ? $tag['title'] : '';//表过滤
        $required    = isset($tag['required']) ? $tag['required'] : '';

        $parseStr = '<select name="' . $name . '" style="'.$style.'" ';
        if ($required=='true')  {$parseStr .= ' required ';}
        if (!empty($multiple)) {$parseStr .= ' multiple="'.$multiple.'" ';}
        if (!empty($class)) {$parseStr .= ' class="'.$class.'" ';}
        if (!empty($id)) {$parseStr .= ' id="'.$id.'" ';}

        $parseStr .= ' lay-ignore><optgroup label="'.$title.'"></optgroup>';
        if (!empty($db) && !empty($label)){


          $parseStr .='<option value=""></option>';
            $parseStr .= '<?php  $volist = think\Db::name(\'' . $db . '\')';
            if($filter!=""){
                $parseStr .= '->where(\''.$filter.'\')->order(\'sort\')';
            }
            $parseStr .= '->where(\'mchtoken\', \''.session("user.mchtoken").'\')->select(); ?>';
            $parseStr .= '<?php  if(is_array($volist) || $volist instanceof \think\Collection || $volist instanceof \think\Paginator): ?>';
            $parseStr .= '<?php  foreach($volist as $key=>$val) : ?>';
            $parseStr .= '<?php  if($val[\''.$id.'\'] == (isset($vo[\''.$name.'\'])&&$vo[\''.$name.'\']!=\'\'?$vo[\''.$name.'\']:-1)): ?>';
            $parseStr .='<option selected value="{$val["'.$id.'"]}">';

            if(strpos($label,',')){
                $labs = explode(",",$label);
                if (is_array($labs)) {
                    $i = 0;
                    $len = count($labs);
                    foreach ($labs as $v) {
                        if ($i == $len - 1) {
                            $parseStr .='{$val["'.$v.'"]}';
                        }else{
                            $parseStr .='{$key+1}|{$val["'.$v.'"]}|';
                        }
                        $i++;
                    }
                }
            }else{
                $parseStr .='{$key+1}|{$val["'.$label.'"]}';
            }

            $parseStr .='</option>';
            $parseStr .= '<?php else: ?>';
            $parseStr .= '<option  value="{$val["'.$id.'"]}">';


            if(strpos($label,',')){
                $labs = explode(",",$label);
                if (is_array($labs)) {
                    $i = 0;
                    $len = count($labs);
                    foreach ($labs as $v) {
                        if ($i == $len - 1) {
                            $parseStr .='{$val["'.$v.'"]}';
                        }else{
                            $parseStr .='{$key+1}|{$val["'.$v.'"]}|';
                        }
                        $i++;
                    }
                }
            }else{
                $parseStr .='{$key+1}|{$val["'.$label.'"]}';
            }
            $parseStr .= '</option>';
            $parseStr .= '<?php endif; ?>';
            $parseStr .= '<?php endforeach; ?>';
            $parseStr .= '<?php endif; ?>';

        }
        $parseStr .='</select>';

        return $parseStr;
    }

    public function tagCombogroup($tag, $content)
    {
        $db  = $tag['db']; //数据表
        $id  = $tag['id']; //id字段
        $label  = $tag['label']; //名称字段
        $name  = $tag['name']; //表单名标识
        $filter    = isset($tag['filter']) ? $tag['filter'] : '';//表过滤
        $title    = isset($tag['title']) ? $tag['title'] : '';//表过滤
        $layfilter    = isset($tag['layfilter']) ? $tag['layfilter'] : '';//表过滤
        $verify    =isset($tag['verify']) ? $tag['verify'] : '';
        $required    = isset($tag['required']) ? $tag['required'] : '';


        $parseStr = '<select name="' . $name . '" ';
        if($layfilter!="")      {$parseStr .= ' lay-filter="'.$layfilter.'" ';}
        if ($required=='true')  {$parseStr .= ' required ';}
        if (!empty($verify)) {$parseStr .= ' lay-verify="'.$verify.'" ';}

        $parseStr .= 'lay-search><option value="">';
        $parseStr .= $title;
        $parseStr .= '</option>';
        $parseStr .= '<?php  $volist = think\Db::name(\'' . $db . '\')';
        if($filter!=""){
            $parseStr .= '->where(\''.$filter.'\')';
        }
        $parseStr .= '->select(); ?>';
        $parseStr .= '<?php  if(is_array($volist) || $volist instanceof \think\Collection || $volist instanceof \think\Paginator): ?>';
        $parseStr .= '<?php  foreach($volist as $key=>$val) : ?>';
        $parseStr .= '<?php  if($val[\''.$id.'\'] == (isset($vo[\''.$name.'\'])&&$vo[\''.$name.'\']!=\'\'?$vo[\''.$name.'\']:-1)): ?>';
        $parseStr .='<option selected value="{$val["'.$id.'"]}">{$val["'.$label.'"]}</option>';
        $parseStr .= '<?php else: ?>';
        $parseStr .= '<option  value="{$val["'.$id.'"]}">{$val["'.$label.'"]}</option>';
        $parseStr .= '<?php endif; ?>';
        $parseStr .= '<?php endforeach; ?>';
        $parseStr .= '<?php endif; ?>';
        $parseStr .='</select>';

        return $parseStr;
    }

    /**
     * editor标签解析 插入可视化编辑器
     * 格式： <html:editor id="editor" name="remark" type="FCKeditor" style="" >{$vo.remark}</html:editor>
     * @access public
     * @param array $tag 标签属性
     * @return string|void
     */
    public function _editor($tag, $content)
    {
        $id     = !empty($tag['id']) ? $tag['id'] : '_editor';
        $name   = $tag['name'];
        $style  = !empty($tag['style']) ? $tag['style'] : '';
        $width  = !empty($tag['width']) ? $tag['width'] : '100%';
        $height = !empty($tag['height']) ? $tag['height'] : '320px';
        $conent    =   $tag['content'];
        $type = $tag['type'];
        switch (strtoupper($type)) {
            case 'FCKEDITOR':
                $parseStr = '<!-- 编辑器调用开始 --><script type="text/javascript" src="__ROOT__/Public/Js/FCKeditor/fckeditor.js"></script><textarea id="' . $id . '" name="' . $name . '">' . $content . '</textarea><script type="text/javascript"> var oFCKeditor = new FCKeditor( "' . $id . '","' . $width . '","' . $height . '" ) ; oFCKeditor.BasePath = "__ROOT__/Public/Js/FCKeditor/" ; oFCKeditor.ReplaceTextarea() ;function resetEditor(){setContents("' . $id . '",document.getElementById("' . $id . '").value)}; function saveEditor(){document.getElementById("' . $id . '").value = getContents("' . $id . '");} function InsertHTML(html){ var oEditor = FCKeditorAPI.GetInstance("' . $id . '") ;if (oEditor.EditMode == FCK_EDITMODE_WYSIWYG ){oEditor.InsertHtml(html) ;}else	alert( "FCK必须处于WYSIWYG模式!" ) ;}</script> <!-- 编辑器调用结束 -->';
                break;
            case 'FCKMINI':
                $parseStr = '<!-- 编辑器调用开始 --><script type="text/javascript" src="__ROOT__/Public/Js/FCKMini/fckeditor.js"></script><textarea id="' . $id . '" name="' . $name . '">' . $content . '</textarea><script type="text/javascript"> var oFCKeditor = new FCKeditor( "' . $id . '","' . $width . '","' . $height . '" ) ; oFCKeditor.BasePath = "__ROOT__/Public/Js/FCKMini/" ; oFCKeditor.ReplaceTextarea() ;function resetEditor(){setContents("' . $id . '",document.getElementById("' . $id . '").value)}; function saveEditor(){document.getElementById("' . $id . '").value = getContents("' . $id . '");} function InsertHTML(html){ var oEditor = FCKeditorAPI.GetInstance("' . $id . '") ;if (oEditor.EditMode == FCK_EDITMODE_WYSIWYG ){oEditor.InsertHtml(html) ;}else	alert( "FCK必须处于WYSIWYG模式!" ) ;}</script> <!-- 编辑器调用结束 -->';
                break;
            case 'EWEBEDITOR':
                $parseStr = "<!-- 编辑器调用开始 --><script type='text/javascript' src='__ROOT__/Public/Js/eWebEditor/js/edit.js'></script><input type='hidden'  id='{$id}' name='{$name}'  value='{$conent}'><iframe src='__ROOT__/Public/Js/eWebEditor/ewebeditor.htm?id={$name}' frameborder=0 scrolling=no width='{$width}' height='{$height}'></iframe><script type='text/javascript'>function saveEditor(){document.getElementById('{$id}').value = getHTML();} </script><!-- 编辑器调用结束 -->";
                break;
            case 'NETEASE':
                $parseStr = '<!-- 编辑器调用开始 --><textarea id="' . $id . '" name="' . $name . '" style="display:none">' . $content . '</textarea><iframe ID="Editor" name="Editor" src="__ROOT__/Public/Js/HtmlEditor/index.html?ID=' . $name . '" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" style="height:' . $height . ';width:' . $width . '"></iframe><!-- 编辑器调用结束 -->';
                break;
            case 'UBB':
                $parseStr = '<script type="text/javascript" src="__ROOT__/Public/Js/UbbEditor.js"></script><div style="padding:1px;width:' . $width . ';border:1px solid silver;float:left;"><script LANGUAGE="JavaScript"> showTool(); </script></div><div><TEXTAREA id="UBBEditor" name="' . $name . '"  style="clear:both;float:none;width:' . $width . ';height:' . $height . '" >' . $content . '</TEXTAREA></div><div style="padding:1px;width:' . $width . ';border:1px solid silver;float:left;"><script LANGUAGE="JavaScript">showEmot();  </script></div>';
                break;
            case 'KINDEDITOR':
                $parseStr = '<script type="text/javascript" src="__ROOT__/Public/Js/KindEditor/kindeditor.js"></script><script type="text/javascript"> KE.show({ id : \'' . $id . '\'  ,urlType : "absolute"});</script><textarea id="' . $id . '" style="' . $style . '" name="' . $name . '" >' . $content . '</textarea>';
                break;
            default:
                $parseStr = '<textarea id="' . $id . '" style="' . $style . '" name="' . $name . '" >' . $content . '</textarea>';
        }

        return $parseStr;
    }

    /**
     * imageBtn标签解析
     * 格式： <html:imageBtn type="" value="" />
     * @access public
     * @param array $tag 标签属性
     * @return string|void
     */
    public function _imageBtn($tag)
    {
        $name  = $tag['name']; //名称
        $value = $tag['value']; //文字
        $id    = isset($tag['id']) ? $tag['id'] : ''; //ID
        $style = isset($tag['style']) ? $tag['style'] : ''; //样式名
        $click = isset($tag['click']) ? $tag['click'] : ''; //点击
        $type  = empty($tag['type']) ? 'button' : $tag['type']; //按钮类型

        if (!empty($name)) {
            $parseStr = '<div class="' . $style . '" ><input type="' . $type . '" id="' . $id . '" name="' . $name . '" value="' . $value . '" onclick="' . $click . '" class="' . $name . ' imgButton"></div>';
        } else {
            $parseStr = '<div class="' . $style . '" ><input type="' . $type . '" id="' . $id . '"  name="' . $name . '" value="' . $value . '" onclick="' . $click . '" class="button"></div>';
        }

        return $parseStr;
    }

    /**
     * imageLink标签解析
     * 格式： <html:imageLink type="" value="" />
     * @access public
     * @param array $tag 标签属性
     * @return string|void
     */
    public function _imgLink($tag)
    {
        $name  = $tag['name']; //名称
        $alt   = $tag['alt']; //文字
        $id    = $tag['id']; //ID
        $style = $tag['style']; //样式名
        $click = $tag['click']; //点击
        $type  = $tag['type']; //点击
        if (empty($type)) {
            $type = 'button';
        }
        $parseStr = '<span class="' . $style . '" ><input title="' . $alt . '" type="' . $type . '" id="' . $id . '"  name="' . $name . '" onmouseover="this.style.filter=\'alpha(opacity=100)\'" onmouseout="this.style.filter=\'alpha(opacity=80)\'" onclick="' . $click . '" align="absmiddle" class="' . $name . ' imgLink"></span>';

        return $parseStr;
    }

    /**
     * select标签解析
     * 格式： <html:select options="name" selected="value" />
     * @access public
     * @param array $tag 标签属性
     * @return string|void
     */
    public function tagSelect($tag)
    {
//        var_dump($tag);die;
        $name       = $tag['name'];
        $options    = $tag['options'];
        $values     = $tag['values'];
        $output     = $tag['output'];
        $multiple   = $tag['multiple'];
        $id         = $tag['id'];
        $size       = $tag['size'];
        $first      = $tag['first'];
        $selected   = $tag['selected'];
        $style      = $tag['style'];
        $ondblclick = $tag['dblclick'];
        $onchange   = $tag['change'];

        if (!empty($multiple)) {
            $parseStr = '<select id="' . $id . '" name="' . $name . '" ondblclick="' . $ondblclick . '" onchange="' . $onchange . '" multiple="multiple" class="' . $style . '" size="' . $size . '" >';
        } else {
            $parseStr = '<select id="' . $id . '" name="' . $name . '" onchange="' . $onchange . '" ondblclick="' . $ondblclick . '" class="' . $style . '" >';
        }
        if (!empty($first)) {
            $parseStr .= '<option value="" >' . $first . '</option>';
        }
        if (!empty($options)) {
            $parseStr .= '<?php  foreach($' . $options . ' as $key=>$val) { ?>';
            if (!empty($selected)) {
                $parseStr .= '<?php if(!empty($' . $selected . ') && ($' . $selected . ' == $key || in_array($key,$' . $selected . '))) { ?>';
                $parseStr .= '<option selected="selected" value="<?php echo $key ?>"><?php echo $val ?></option>';
                $parseStr .= '<?php }else { ?><option value="<?php echo $key ?>"><?php echo $val ?></option>';
                $parseStr .= '<?php } ?>';
            } else {
                $parseStr .= '<option value="<?php echo $key ?>"><?php echo $val ?></option>';
            }
            $parseStr .= '<?php } ?>';
        } else if (!empty($values)) {
            $parseStr .= '<?php  for($i=0;$i<count($' . $values . ');$i++) { ?>';
            if (!empty($selected)) {
                $parseStr .= '<?php if(isset($' . $selected . ') && ((is_string($' . $selected . ') && $' . $selected . ' == $' . $values . '[$i]) || (is_array($' . $selected . ') && in_array($' . $values . '[$i],$' . $selected . ')))) { ?>';
                $parseStr .= '<option selected="selected" value="<?php echo $' . $values . '[$i] ?>"><?php echo $' . $output . '[$i] ?></option>';
                $parseStr .= '<?php }else { ?><option value="<?php echo $' . $values . '[$i] ?>"><?php echo $' . $output . '[$i] ?></option>';
                $parseStr .= '<?php } ?>';
            } else {
                $parseStr .= '<option value="<?php echo $' . $values . '[$i] ?>"><?php echo $' . $output . '[$i] ?></option>';
            }
            $parseStr .= '<?php } ?>';
        }
        $parseStr .= '</select>';
        return $parseStr;
    }

    /**
     * checkbox标签解析
     * 格式： <html:checkbox checkboxes="" checked="" />
     * @access public
     * @param array $tag 标签属性
     * @return string|void
     */
    public function tagCheckbox($tag)
    {
        $name      = $tag['name'];
        $checkboxesstr    = isset($tag['checkboxes']) ? $tag['checkboxes'] : ''; //指定值
        $checked    = isset($tag['checked']) ? $tag['checked'] : ''; //默认选中
        $dict    = isset($tag['dict']) ? $tag['dict'] : ''; //如果有dict，则优先dict

        $strTemp="<?php\n";
        if (!empty($checkboxesstr)) {
            $strTemp.= "           \$radios = json_decode('{".$checkboxesstr."}', true);\n";
        }

        if (!empty($dict)) {
            $strTemp.= "           \$db = think\Db::name('Dict');\n";
            $strTemp.= "           \$radios = \$db->where('type', '".$dict."')->select();\n";
        }
        $strTemp.= "        \$check = isset(\$vo['".$name."']) ? \$vo['".$name."']:'".$checked."';\n";
        $strTemp.= "       foreach (\$radios as \$key => \$val) {\n";
        if (!empty($dict)) {

            $strTemp.="\$checkedstr = in_array(\$val['dkey'],explode(',',\$check))?'checked':'';";
            $strTemp.= " \$titlestr = \$val['dvalue'];\n";
        }else{
            $strTemp.= " \$checkedstr = (\$key==\$check)?'checked':''; \n";
            $strTemp.= " \$titlestr = \$val;\n";
        }
        $strTemp.="?>\n";
        $strTemp.= "<input type=\"checkbox\" name=\"".$name."[]\" value=\"<?php echo \$key;?>\" <?php echo \$checkedstr;?>  title=\"<?php echo \$titlestr;?>\" >";
        $strTemp.="<?php\n";
        $strTemp.= "       }\n";
        $strTemp.="?>\n";
        return $strTemp;
    }

    /**
     * radio标签解析
     * 格式1：
     * {radio name="gender" radios='"男":1,"女":2' checked="男" }
     * {radio name="gender" radios='"男":1,"女":2' checked="0" dict="sex" }
     * @access public
     * @param array $tag 标签属性
     * @return string|void
     */
    public function tagRadio($tag)
    {
        $name      = $tag['name'];
        $radiosstr    = isset($tag['radios']) ? $tag['radios'] : ''; //指定值
        $checked    = isset($tag['checked']) ? $tag['checked'] : ''; //默认选中
        $dict    = isset($tag['dict']) ? $tag['dict'] : ''; //如果有dict，则优先dict

        $strTemp="<?php\n";
        if (!empty($radiosstr)) {
        $strTemp.= "           \$radios = json_decode('{".$radiosstr."}', true);\n";
        }
        if (!empty($dict)) {
        $strTemp.= "           \$db = think\Db::name('Dict');\n";
        $strTemp.= "           \$radios = \$db->where('type', '".$dict."')->select();\n";
        }
        $strTemp.= "        \$check = isset(\$vo['".$name."']) ? \$vo['".$name."']:'".$checked."';\n";
         $strTemp.= "       foreach (\$radios as \$key => \$val) {\n";
        if (!empty($dict)) {
            $strTemp.= " \$checkedstr = (\$val['dkey']==\$check)?'checked':'';\n";
            $strTemp.= " \$titlestr = \$val['dvalue'];\n";
        }else{
            $strTemp.= " \$checkedstr = (\$key==\$check)?'checked':''; \n";
            $strTemp.= " \$titlestr = \$val;\n";
        }
        $strTemp.="?>\n";
        $strTemp.= "<input type=\"radio\" name=\"".$name."\" value=\"<?php echo \$key;?>\" <?php echo \$checkedstr;?>  title=\"<?php echo \$titlestr;?>\" >";
        $strTemp.="<?php\n";
         $strTemp.= "       }\n";
        $strTemp.="?>\n";

        //字符串要用双引号,双引号可以支持转义
        // $前加\可转义



//        if (!empty($radiosstr)) {
//            $radios = json_decode('{'.$radiosstr.'}', true);
//        }
//        if (!empty($dict)) {
//            $db = Db::name('Dict');
//            $radios = $db->where('type', $dict)->select();
//
//        }
//        $strTemp='';
//
//        $check = isset($vo['gender']) ? $vo['gender']:$checked;
//        foreach ($radios as $key => $val) {
//            $checkedstr = (!empty($dict))?(($val['dkey']==$check)?'checked':''): (($key==$check)?'checked':'');
//            $strTemp .= '<input type="radio" name="' . $name . '" value="'.$key.'" '.$checkedstr.' title="' .  ((!empty($dict))?$val['dvalue']: $val) . '">'  ;
//        }
        return $strTemp;
    }

    /**
     * list标签解析
     * 格式： <html:grid datasource="" show="vo" />
     * @access public
     * @param array $tag 标签属性
     * @return string
     */
    public function _grid($tag)
    {
        $id         = $tag['id']; //表格ID
        $datasource = $tag['datasource']; //列表显示的数据源VoList名称
        $pk         = empty($tag['pk']) ? 'id' : $tag['pk']; //主键名，默认为id
        $style      = $tag['style']; //样式名
        $name       = !empty($tag['name']) ? $tag['name'] : 'vo'; //Vo对象名
        $action     = !empty($tag['action']) ? $tag['action'] : false; //是否显示功能操作
        $key        = !empty($tag['key']) ? true : false;
        if (isset($tag['actionlist'])) {
            $actionlist = explode(',', trim($tag['actionlist'])); //指定功能列表
        }

        if (substr($tag['show'], 0, 1) == '$') {
            $show = $this->tpl->get(substr($tag['show'], 1));
        } else {
            $show = $tag['show'];
        }
        $show = explode(',', $show); //列表显示字段列表

        //计算表格的列数
        $colNum = count($show);
        if (!empty($action)) {
            $colNum++;
        }

        if (!empty($key)) {
            $colNum++;
        }

        //显示开始
        $parseStr = "<!-- Think 系统列表组件开始 -->\n";
        $parseStr .= '<table id="' . $id . '" class="' . $style . '" cellpadding=0 cellspacing=0 >';
        $parseStr .= '<tr><td height="5" colspan="' . $colNum . '" class="topTd" ></td></tr>';
        $parseStr .= '<tr class="row" >';
        //列表需要显示的字段
        $fields = array();
        foreach ($show as $val) {
            $fields[] = explode(':', $val);
        }

        if (!empty($key)) {
            $parseStr .= '<th width="12">No</th>';
        }
        foreach ($fields as $field) {
//显示指定的字段
            $property = explode('|', $field[0]);
            $showname = explode('|', $field[1]);
            if (isset($showname[1])) {
                $parseStr .= '<th width="' . $showname[1] . '">';
            } else {
                $parseStr .= '<th>';
            }
            $parseStr .= $showname[0] . '</th>';
        }
        if (!empty($action)) {
//如果指定显示操作功能列
            $parseStr .= '<th >操作</th>';
        }
        $parseStr .= '</tr>';
        $parseStr .= '<volist name="' . $datasource . '" id="' . $name . '" ><tr class="row" >'; //支持鼠标移动单元行颜色变化 具体方法在js中定义

        if (!empty($key)) {
            $parseStr .= '<td>{$i}</td>';
        }
        foreach ($fields as $field) {
            //显示定义的列表字段
            $parseStr .= '<td>';
            if (!empty($field[2])) {
                // 支持列表字段链接功能 具体方法由JS函数实现
                $href = explode('|', $field[2]);
                if (count($href) > 1) {
                    //指定链接传的字段值
                    // 支持多个字段传递
                    $array = explode('^', $href[1]);
                    if (count($array) > 1) {
                        foreach ($array as $a) {
                            $temp[] = '\'{$' . $name . '.' . $a . '|addslashes}\'';
                        }
                        $parseStr .= '<a href="javascript:' . $href[0] . '(' . implode(',', $temp) . ')">';
                    } else {
                        $parseStr .= '<a href="javascript:' . $href[0] . '(\'{$' . $name . '.' . $href[1] . '|addslashes}\')">';
                    }
                } else {
                    //如果没有指定默认传编号值
                    $parseStr .= '<a href="javascript:' . $field[2] . '(\'{$' . $name . '.' . $pk . '|addslashes}\')">';
                }
            }
            if (strpos($field[0], '^')) {
                $property = explode('^', $field[0]);
                foreach ($property as $p) {
                    $unit = explode('|', $p);
                    if (count($unit) > 1) {
                        $parseStr .= '{$' . $name . '.' . $unit[0] . '|' . $unit[1] . '} ';
                    } else {
                        $parseStr .= '{$' . $name . '.' . $p . '} ';
                    }
                }
            } else {
                $property = explode('|', $field[0]);
                if (count($property) > 1) {
                    $parseStr .= '{$' . $name . '.' . $property[0] . '|' . $property[1] . '}';
                } else {
                    $parseStr .= '{$' . $name . '.' . $field[0] . '}';
                }
            }
            if (!empty($field[2])) {
                $parseStr .= '</a>';
            }
            $parseStr .= '</td>';

        }
        if (!empty($action)) {
//显示功能操作
            if (!empty($actionlist[0])) { //显示指定的功能项
                $parseStr .= '<td>';
                foreach ($actionlist as $val) {
                    if (strpos($val, ':')) {
                        $a = explode(':', $val);
                        if (count($a) > 2) {
                            $parseStr .= '<a href="javascript:' . $a[0] . '(\'{$' . $name . '.' . $a[2] . '}\')">' . $a[1] . '</a>&nbsp;';
                        } else {
                            $parseStr .= '<a href="javascript:' . $a[0] . '(\'{$' . $name . '.' . $pk . '}\')">' . $a[1] . '</a>&nbsp;';
                        }
                    } else {
                        $array = explode('|', $val);
                        if (count($array) > 2) {
                            $parseStr .= ' <a href="javascript:' . $array[1] . '(\'{$' . $name . '.' . $array[0] . '}\')">' . $array[2] . '</a>&nbsp;';
                        } else {
                            $parseStr .= ' {$' . $name . '.' . $val . '}&nbsp;';
                        }
                    }
                }
                $parseStr .= '</td>';
            }
        }
        $parseStr .= '</tr></volist><tr><td height="5" colspan="' . $colNum . '" class="bottomTd"></td></tr></table>';
        $parseStr .= "\n<!-- Think 系统列表组件结束 -->\n";
        return $parseStr;
    }

    /**
     * list标签解析
     * 格式： <html:list datasource="" show="" />
     * @access public
     * @param array $tag 标签属性
     * @return string
     */
    public function _list($tag)
    {
        $id         = $tag['id']; //表格ID
        $datasource = $tag['datasource']; //列表显示的数据源VoList名称
        $pk         = empty($tag['pk']) ? 'id' : $tag['pk']; //主键名，默认为id
        $style      = $tag['style']; //样式名
        $name       = !empty($tag['name']) ? $tag['name'] : 'vo'; //Vo对象名
        $action     = 'true' == $tag['action'] ? true : false; //是否显示功能操作
        $key        = !empty($tag['key']) ? true : false;
        $sort       = 'false' == $tag['sort'] ? false : true;
        $checkbox   = $tag['checkbox']; //是否显示Checkbox
        if (isset($tag['actionlist'])) {
            if (substr($tag['actionlist'], 0, 1) == '$') {
                $actionlist = $this->tpl->get(substr($tag['actionlist'], 1));
            } else {
                $actionlist = $tag['actionlist'];
            }
            $actionlist = explode(',', trim($actionlist)); //指定功能列表
        }

        if (substr($tag['show'], 0, 1) == '$') {
            $show = $this->tpl->get(substr($tag['show'], 1));
        } else {
            $show = $tag['show'];
        }
        $show = explode(',', $show); //列表显示字段列表

        //计算表格的列数
        $colNum = count($show);
        if (!empty($checkbox)) {
            $colNum++;
        }

        if (!empty($action)) {
            $colNum++;
        }

        if (!empty($key)) {
            $colNum++;
        }

        //显示开始
        $parseStr = "<!-- Think 系统列表组件开始 -->\n";
        $parseStr .= '<table id="' . $id . '" class="' . $style . '" cellpadding=0 cellspacing=0 >';
        $parseStr .= '<tr><td height="5" colspan="' . $colNum . '" class="topTd" ></td></tr>';
        $parseStr .= '<tr class="row" >';
        //列表需要显示的字段
        $fields = array();
        foreach ($show as $val) {
            $fields[] = explode(':', $val);
        }
        if (!empty($checkbox) && 'true' == strtolower($checkbox)) {
//如果指定需要显示checkbox列
            $parseStr .= '<th width="8"><input type="checkbox" id="check" onclick="CheckAll(\'' . $id . '\')"></th>';
        }
        if (!empty($key)) {
            $parseStr .= '<th width="12">No</th>';
        }
        foreach ($fields as $field) {
//显示指定的字段
            $property = explode('|', $field[0]);
            $showname = explode('|', $field[1]);
            if (isset($showname[1])) {
                $parseStr .= '<th width="' . $showname[1] . '">';
            } else {
                $parseStr .= '<th>';
            }
            $showname[2] = isset($showname[2]) ? $showname[2] : $showname[0];
            if ($sort) {
                $parseStr .= '<a href="javascript:sortBy(\'' . $property[0] . '\',\'{$sort}\',\'' . ACTION_NAME . '\')" title="按照' . $showname[2] . '{$sortType} ">' . $showname[0] . '<eq name="order" value="' . $property[0] . '" ><img src="__PUBLIC__/images/{$sortImg}.gif" width="12" height="17" border="0" align="absmiddle"></eq></a></th>';
            } else {
                $parseStr .= $showname[0] . '</th>';
            }

        }
        if (!empty($action)) {
//如果指定显示操作功能列
            $parseStr .= '<th >操作</th>';
        }

        $parseStr .= '</tr>';
        $parseStr .= '<volist name="' . $datasource . '" id="' . $name . '" ><tr class="row" '; //支持鼠标移动单元行颜色变化 具体方法在js中定义
        if (!empty($checkbox)) {
            //    $parseStr .= 'onmouseover="over(event)" onmouseout="out(event)" onclick="change(event)" ';
        }
        $parseStr .= '>';
        if (!empty($checkbox)) {
//如果需要显示checkbox 则在每行开头显示checkbox
            $parseStr .= '<td><input type="checkbox" name="key"	value="{$' . $name . '.' . $pk . '}"></td>';
        }
        if (!empty($key)) {
            $parseStr .= '<td>{$i}</td>';
        }
        foreach ($fields as $field) {
            //显示定义的列表字段
            $parseStr .= '<td>';
            if (!empty($field[2])) {
                // 支持列表字段链接功能 具体方法由JS函数实现
                $href = explode('|', $field[2]);
                if (count($href) > 1) {
                    //指定链接传的字段值
                    // 支持多个字段传递
                    $array = explode('^', $href[1]);
                    if (count($array) > 1) {
                        foreach ($array as $a) {
                            $temp[] = '\'{$' . $name . '.' . $a . '|addslashes}\'';
                        }
                        $parseStr .= '<a href="javascript:' . $href[0] . '(' . implode(',', $temp) . ')">';
                    } else {
                        $parseStr .= '<a href="javascript:' . $href[0] . '(\'{$' . $name . '.' . $href[1] . '|addslashes}\')">';
                    }
                } else {
                    //如果没有指定默认传编号值
                    $parseStr .= '<a href="javascript:' . $field[2] . '(\'{$' . $name . '.' . $pk . '|addslashes}\')">';
                }
            }
            if (strpos($field[0], '^')) {
                $property = explode('^', $field[0]);
                foreach ($property as $p) {
                    $unit = explode('|', $p);
                    if (count($unit) > 1) {
                        $parseStr .= '{$' . $name . '.' . $unit[0] . '|' . $unit[1] . '} ';
                    } else {
                        $parseStr .= '{$' . $name . '.' . $p . '} ';
                    }
                }
            } else {
                $property = explode('|', $field[0]);
                if (count($property) > 1) {
                    $parseStr .= '{$' . $name . '.' . $property[0] . '|' . $property[1] . '}';
                } else {
                    $parseStr .= '{$' . $name . '.' . $field[0] . '}';
                }
            }
            if (!empty($field[2])) {
                $parseStr .= '</a>';
            }
            $parseStr .= '</td>';

        }
        if (!empty($action)) {
//显示功能操作
            if (!empty($actionlist[0])) { //显示指定的功能项
                $parseStr .= '<td>';
                foreach ($actionlist as $val) {
                    if (strpos($val, ':')) {
                        $a = explode(':', $val);
                        if (count($a) > 2) {
                            $parseStr .= '<a href="javascript:' . $a[0] . '(\'{$' . $name . '.' . $a[2] . '}\')">' . $a[1] . '</a>&nbsp;';
                        } else {
                            $parseStr .= '<a href="javascript:' . $a[0] . '(\'{$' . $name . '.' . $pk . '}\')">' . $a[1] . '</a>&nbsp;';
                        }
                    } else {
                        $array = explode('|', $val);
                        if (count($array) > 2) {
                            $parseStr .= ' <a href="javascript:' . $array[1] . '(\'{$' . $name . '.' . $array[0] . '}\')">' . $array[2] . '</a>&nbsp;';
                        } else {
                            $parseStr .= ' {$' . $name . '.' . $val . '}&nbsp;';
                        }
                    }
                }
                $parseStr .= '</td>';
            }
        }
        $parseStr .= '</tr></volist><tr><td height="5" colspan="' . $colNum . '" class="bottomTd"></td></tr></table>';
        $parseStr .= "\n<!-- Think 系统列表组件结束 -->\n";
        return $parseStr;
    }
}
