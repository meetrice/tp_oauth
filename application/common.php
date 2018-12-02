<?php
if (!function_exists ('debuge')) {
    function debuge() {
        $numargs = func_num_args();
        $var = func_get_args();
        $makeexit = is_bool($var[count($var)-1])?$var[count($var)-1]:false;
        echo "<div style='text-align:left;background:#ffffff;border: 1px dashed #ff9933;font-size:11px;line-height:15px;font-family:'Lucida Grande',Verdana,Arial,'Bitstream Vera Sans',sans-serif;'><pre>";
        print_r ( $var );
        echo "</pre></div>";
        if ($makeexit) {
            echo '<div style="font-size:18px;float:right;">' . get_num_queries(). '/' . timer_stop(0, 3) . 'qps</div>';
            exit;
        }
    }
}