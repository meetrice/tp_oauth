<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>{$classDoc.title}-{$titleDoc}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="__STATIC__/hadmin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__STATIC__/hadmin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="__STATIC__/hadmin/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__STATIC__/hadmin/css/animate.css" rel="stylesheet">
    <style type="text/css">
.json-editor-blackbord{padding:5px 20px;}
a.json-toggle.collapsed:before{    left: -1.3em;}
        #json-input {
            display: block;
            width: 100%;
            height: 200px;
        }
        #translate {
            display: block;
            height: 28px;
            margin: 20px 0;
            border-radius: 3px;
            border: 2px solid;
            cursor: pointer;
        }
        #json-display {
            border: 1px solid #000;
            margin: 0;
            padding: 10px 20px;
        }
    </style>
    <!--markdown-->
    <link rel="stylesheet" type="text/css" href="__STATIC__/hadmin/css/plugins/markdown/bootstrap-markdown.min.css"/>
    <!--markdown-->
    <style>
        .markdown p img {
            max-width: 100%;
        }
    </style>

    <link href="__STATIC__/hadmin/css/style.css?v=4.1.0" rel="stylesheet">


</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row white-bg">

        <div class="ibox-content  ">
            <div class="text-center ">
                <h2 class="">{$classDoc.title}</h2>
                <h4>  版本：{$classDoc.version}</h4>
            </div>
        </div>
      
        <div class="col-xs-12">
            <div class="well" >
                {$classDoc.desc}
            </div>
            {notempty  name="classDoc.readme"}
                <div class="row" >
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins" style="border:1px #ccc solid;">
                            <div class="ibox-title" data-toggle="collapse" data-target="#markdown-class">
                                <h5>接口说明文档</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                      <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content markdown  collapse in" id="markdown-class">
                            {$classDoc.readme}
                            </div>
                        </div>
                    </div>
                </div>
            {/notempty}

               <div class="row"  style="margin-top: 30px;margin-bottom: 30px;">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins"  style="border:1px #ccc solid;">
                            <div class="ibox-title" data-toggle="collapse" data-target="#dir-class">
                                <h5>接口目录</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                      <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content  collapse in " id="dir-class">
                                                   <ul class="folder-list" style="padding: 0">
                                                    <?php $i=1; ?>
                            {foreach name="methodDoc" item="vo" key="k" }
                                <li><a href="#{$k}"><?php echo $i; $i++; ?> . {$vo.title}</a></li>
                            {/foreach}

                        </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>


    </div>
    <!--methodDoc-->
    <div  class="row" style="padding: 30px;">
        <?php $j=1; ?>
    {foreach name="methodDoc" item="vo" key="k" }
      
        <div id="{$k}" class="row" style="border: 1px  #ccc solid;margin-bottom: 20px;" >
            <div class="ibox float-e-margins">
                <div class="ibox-title" data-toggle="collapse" data-target="#content-{$k}" aria-expanded="true">
                       
                        <h5><strong><?php echo $j; $j++; ?> . {$vo.title}</strong></h5><span></span>
                   


                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div id="content-{$k}" class="ibox collapse in float-e-margins">
                <div class="ibox-content">
                    <div style="padding-top: 10px;padding-bottom: 10px;">接口说明: {$vo.desc}</div>
                    <div style="padding-top: 10px;padding-bottom: 10px;">接口地址:</div> 
                    <div class="well">
                        <span class="label label-success">{$vo.method|default=""}</span> {$classDoc.url}/{$vo.url}
                    </div>
                </div>
               
                <!--title,desc-->
                <!--readme-->
                {notempty  name="vo.readme"}
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" data-toggle="collapse" data-target="#markdown-{$k}">
                                <h5>详细说明</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content markdown collapse in" id="markdown-{$k}">
                                {$vo.readme}
                            </div>
                        </div>
                    </div>
                </div>
                {/notempty}


                <!--readme-->

                <!--request-->
                {notempty  name="vo.rules"}
                <div class="ibox-title" data-toggle="collapse" data-target="#data-{$k}">
                    <h5>请求参数</h5>
                    <div class="ibox-tools">
                        <a data-toggle="collapse" data-target="#sss" class="collapse-link">
                            <i data-toggle="collapse" class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div id="data-{$k}" class="ibox-content collapse in">
                    <div class="row row-lg">
                        <div class="col-sm-12">
                            <!-- Example Toolbar -->
                            <div class="example-wrap">
                                <div class="example">

                                    <table id="dataTable-{$k}" data-mobile-responsive="true">
                                        <thead>
                                        <tr>
                                            {foreach name="fieldMaps.data" item="data" key="datak" }
                                                <th data-field="{$datak}">{$data}</th>
                                            {/foreach}
                                        </tr>
                                        </thead>



                                    </table>
                                </div>
                            </div>
                            <!-- End Example Toolbar -->
                        </div>

                    </div>
                </div>
                {/notempty}
                <!--request-->
                <!--response-->
                {notempty  name="vo.return"}
                <div class="ibox-title" data-toggle="collapse" data-target="#return-{$k}">
                    <h5>返回参数</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i data-toggle="collapse" class="fa fa-chevron-up success"></i>
                        </a>
                    </div>
                </div>
                <div id="return-{$k}" class="ibox-content collapse in">
                    <div class="row row-lg">
                        <div class="col-sm-12">
                            <!-- Example Toolbar -->
                            <div class="example-wrap">
                                <div class="example">

                                    <table id="returnTable-{$k}" data-mobile-responsive="true">
                                        <thead>
                                        <tr>
                                            {foreach name="fieldMaps.return" item="returnv" key="returnk" }
                                                <th data-field="{$returnk}">{$returnv}</th>
                                            {/foreach}
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- End Example Toolbar -->
                        </div>

                    </div>
                </div>
                {/notempty}
                {notempty  name="vo.example"}
                  <div class="ibox-title" data-toggle="collapse" data-target="#example-{$k}">
                        <h5>返回示例</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i data-toggle="collapse" class="fa fa-chevron-up success"></i>
                            </a>
                        </div>
                    </div>
                    <div id="example-{$k}" class="ibox-content collapse in">
                        <div class="row row-lg">
                            <div class="col-sm-12">
                                <!-- Example Toolbar -->
                                <div class="example-wrap">
                                    <div class="example">
                                        <pre id="json-{$k}"></pre>
                                       
                                    </div>
                                </div>
                                <!-- End Example Toolbar -->
                            </div>

                        </div>
                    </div>
                {/notempty}
                <!--response-->
            </div>


        </div>
    {/foreach}
    <!--methodDoc-->

</div>
</div>


<!-- 全局js -->
<script src="__STATIC__/hadmin/js/jquery.min.js?v=2.1.4"></script>
<script src="__STATIC__/hadmin/js/bootstrap.min.js?v=3.3.6"></script>


<!-- Bootstrap table -->
<script src="__STATIC__/hadmin/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="__STATIC__/hadmin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="__STATIC__/hadmin/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>

<!-- simditor -->
<script type="text/javascript" src="__STATIC__/hadmin/js/plugins/markdown/markdown.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/js/plugins/markdown/to-markdown.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/js/plugins/markdown/bootstrap-markdown.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/js/plugins/markdown/bootstrap-markdown.zh.js"></script>
<script type="text/javascript" src="__STATIC__/hadmin/js/jquery.json-editor.min.js"></script>

<script>
    //获取class md

    $.get("__ROOT__{$classDoc.readme}", function (data) {
        $('#markdown-class').html(markdown.toHTML(data))
    });



</script>
{foreach name="methodDoc" item="vo" key="k" }

    <script>
        (function (document, window, $) {
            'use strict';


            (function () {
                var dataTableUrl =  "{:url('tableData',['id'=>$classDoc.id,'method'=>$k,'dataType'=>'data'])}";
                var returnTableUrl =  "{:url('tableData',['id'=>$classDoc.id,'method'=>$k,'dataType'=>'return'])}";
                $('#dataTable-{$k}').bootstrapTable({
                    url:dataTableUrl,
                    search: true,
                    showRefresh: false,
                    showToggle: true,
                    showColumns: true,
                    iconSize: 'outline',
                    icons: {
                        refresh: 'glyphicon-repeat',
                        toggle: 'glyphicon-list-alt',
                        columns: 'glyphicon-list'
                    }
                });

                $('#returnTable-{$k}').bootstrapTable({
                    url:returnTableUrl,
                    search: true,
                    showRefresh: false,
                    showToggle: true,
                    showColumns: true,
                    iconSize: 'outline',
                    icons: {
                        refresh: 'glyphicon-repeat',
                        toggle: 'glyphicon-list-alt',
                        columns: 'glyphicon-list'
                    }
                });
            })();

            {notempty  name="vo.example"}
        
var {$k}editor = new JsonEditor('#json-{$k}', {$vo.example});
        
         {/notempty}
 


        })(document, window, jQuery);
    </script>

    <script>
        //获取method md

        $.get("__ROOT__{$vo.readme}", function (data) {
            $('#markdown-{$k}').html(markdown.toHTML(data))
        });

    </script>
{/foreach}



</body>

</html>
