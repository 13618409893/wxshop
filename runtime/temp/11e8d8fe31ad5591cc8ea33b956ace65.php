<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\phpStudy\PHPTutorial\WWW\wxshop\public/../application/admin\view\category\index.html";i:1518582832;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>分类管理</title>
    <meta name="keywords" content="分类管理">
    <meta name="description" content="分类管理">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/ajaxfileupload.js"></script>
    <link href="/static/admin/css/admin.css" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="<?php if(input('tab',1) == 1): ?>active<?php endif; ?>"><a data-toggle="tab" href="#tab-1" aria-expanded="true">分类列表</a></li>
                        <li class="<?php if(input('tab',1) == 2): ?>active<?php endif; ?>"><a data-toggle="tab" href="#tab-2" aria-expanded="false">添加新分类</a></li>
                        <li id="showtab" class="<?php if(input('tab',1) == 3): ?>active<?php endif; ?>"><a data-toggle="tab" href="#tab-3" style="<?php if(input('tab',1) != 3): ?>display:none<?php endif; ?>" aria-expanded="false">编辑分类</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane <?php if(input('tab',1) == 1): ?>active<?php endif; ?>">
                            <div class="panel-body">
                                <form method="post" class="form-horizontal" action="<?php echo url('index'); ?>" data-type="ajax">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="10%">排序</th>
                                                    <th width="15%">分类ID</th>
                                                    <th width="25%">分类名称</th>
                                                    <th width="15%">图片</th>
                                                    <th width="10%">首页显示</th>
                                                    <th width="25%">操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="sort[<?php echo $vo['id']; ?>]" class="form-control" value="<?php echo $vo['sort']; ?>">
                                                        </td>
                                                        <td><?php echo $vo['id']; ?></td>
                                                        <td style="text-align:left"><?php echo $vo['name']; ?></td>
                                                        <td><?php if($vo['img'] != ''): ?><img src="/uploads/<?php echo $vo['img']; ?>" alt="<?php echo $vo['name']; ?>" width="36"><?php endif; ?></td>
                                                        <td><?php echo $vo['pid']==0?($vo['is_show_index'] ? '是' : '否') : ''; ?></td>
                                                        <td>
                                                            <?php if($vo['pid'] == '0'): ?>
                                                                <a href="<?php echo url('index',['pid'=>$vo['id'], 'tab'=>2]); ?>" title="添加子分类"><i class="fa fa-plus text-navy"></i></a>&nbsp;&nbsp;
                                                            <?php endif; if($vo['pid'] != '0'): ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
                                                            <a href="<?php echo url('index',['id'=>$vo['id'], 'tab'=>3]); ?>" title="编辑"><i class="fa fa-edit text-navy"></i></a>&nbsp;&nbsp;
                                                            <a name="delete" href="<?php echo url('delete',['id'=>$vo['id']]); ?>" title="删除"><i class="fa fa-trash-o text-navy"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">提交</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane <?php if(input('tab',1) == 2): ?>active<?php endif; ?>">
                            <div class="panel-body">
                                <form method="post" class="form-horizontal" action="<?php echo url('add'); ?>" data-type="ajax">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">分类名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" name='name' class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">上级分类</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" name="pid">
                                                <option value="0" selected>≡ 作为顶级分类 ≡</option>
                                                <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <option value="<?php echo $vo['id']; ?>" <?php echo !empty($vo['pid'])?'disabled' : ''; if(input('pid',0) == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">分类图片</label>
                                        <div class="col-sm-10">
                                            <div id="file-pretty">
                                                <input id="file_path" name="file" type="file" class="form-control" style="display:none">
                                                <div class="input-append input-group">
                                                    <span class="input-group-btn">
                                                        <button id="btn_path" type="button" class="btn btn-white">选择图片</button>
                                                    </span>
                                                    <input id="info_path" type="text" name='img' class="form-control input-large" value="">
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                $(function(){
                                                    $('#btn_path').click(function(){
                                                        $("#file_path").click();
                                                    });

                                                    //异步上传
                                                    $("body").delegate("#file_path", 'change', function(){
                                                        var filepath = $("input[name='file']").val();
                                                        var arr = filepath.split('.');
                                                        var ext = arr[arr.length-1];//图片后缀

                                                        if('gif|jpg|png|bmp'.indexOf(ext)>=0){
                                                            $.ajaxFileUpload({
                                                               url: '<?php echo url('upload_image'); ?>',
                                                               type: 'post',
                                                               data: { name: 'file' },
                                                               secureuri: false,
                                                               fileElementId: 'file_path',
                                                               dataType: 'json',
                                                               success: function (data, status) {
                                                                   $('#info_path').val(data);
                                                                   $('#info_path').focus();
                                                               },
                                                               error: function (data, status, e){
                                                                   layer.alert('上传失败');
                                                               }
                                                            });
                                                        }else{
                                                            // 清空file
                                                            $('#file_path').val('');
                                                            layer.alert('请上传合适的图片类型');
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">首页显示</label>
                                        <div class="col-sm-10">
                                            <div class="radio i-checks">
                                                <label><input type="radio" value="1" name="is_show_index" checked><i></i> 是</label>
                                                <label><input type="radio" value="0" name="is_show_index"><i></i> 否</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">排序</label>
                                        <div class="col-sm-10">
                                            <input type="text" name='sort' class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">提交</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane <?php if(input('tab',1) == 3): ?>active<?php endif; ?>">
                            <div class="panel-body">
                                <form method="post" class="form-horizontal" action="<?php echo url('edit'); ?>" data-type="ajax">
                                    <input type="hidden" name="tab" value="3">
                                    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">分类名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" name='name' class="form-control" value="<?php echo $info['name']; ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">上级分类</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" name="pid">
                                                <option value="0" selected>≡ 作为顶级分类 ≡</option>
                                                <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <option value="<?php echo $vo['id']; ?>" <?php echo !empty($vo['pid'])?'disabled' : ''; ?> <?php echo $info['pid']==$vo['id']?'selected' : ''; ?>><?php echo $vo['name']; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">分类图片</label>
                                        <div class="col-sm-10">
                                            <div id="file-pretty">
                                                <input id="file_path_edit" name="file" type="file" class="form-control" style="display:none">
                                                <div class="input-append input-group">
                                                    <span class="input-group-btn">
                                                        <button id="btn_path_edit" type="button" class="btn btn-white">选择图片</button>
                                                    </span>
                                                    <input id="info_path_edit" type="text" name='img' class="form-control input-large" value="<?php echo $info['img']; ?>">
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                $(function(){
                                                    $('#btn_path_edit').click(function(){
                                                        $("#file_path_edit").click();
                                                    });

                                                    //异步上传
                                                    $("body").delegate("#file_path_edit", 'change', function(){
                                                        var filepath = $("input[name='file']").val();
                                                        var arr = filepath.split('.');
                                                        var ext = arr[arr.length-1];//图片后缀

                                                        if('gif|jpg|png|bmp'.indexOf(ext)>=0){
                                                            $.ajaxFileUpload({
                                                               url: '<?php echo url('upload_image'); ?>',
                                                               type: 'post',
                                                               data: { name: 'file' },
                                                               secureuri: false,
                                                               fileElementId: 'file_path_edit',
                                                               dataType: 'json',
                                                               success: function (data, status) {
                                                                   $('#info_path_edit').val(data);
                                                                   $('#info_path_edit').focus();
                                                               },
                                                               error: function (data, status, e){
                                                                   layer.alert('上传失败');
                                                               }
                                                            });
                                                        }else{
                                                            // 清空file
                                                            $('#file_path_edit').val('');
                                                            layer.alert('请上传合适的图片类型');
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">首页显示</label>
                                        <div class="col-sm-10">
                                            <div class="radio i-checks">
                                                <label><input type="radio" value="1" name="is_show_index" <?php echo !empty($info['is_show_index'])?'checked' : ''; ?>><i></i> 是</label>
                                                <label><input type="radio" value="0" name="is_show_index" <?php echo !empty($info['is_show_index'])?'' : 'checked'; ?>><i></i> 否</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">排序</label>
                                        <div class="col-sm-10">
                                            <input type="text" name='sort' class="form-control" value="<?php echo $info['sort']; ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">提交</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/admin/js/content.min.js?v=1.0.0"></script>
    <script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/layer_hplus.js"></script>
    <script src="/static/admin/js/plugins/prettyfile/bootstrap-prettyfile.js"></script>
    <script src="/static/admin/js/plugins/cropper/cropper.min.js"></script>
    <script src="/static/admin/js/demo/form-advanced-demo.min.js"></script>
    <script src="/static/admin/js/plugins/layer/laydate/laydate.js"></script>
</body>

</html>
