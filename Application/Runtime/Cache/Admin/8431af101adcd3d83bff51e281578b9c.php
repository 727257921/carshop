<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_PUC;?>/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_PUC;?>/css/main.css"/>
    <script type="text/javascript" src="<?php echo ADMIN_PUC;?>/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/carshop/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/carshop/Public/ueditor/ueditor.all.min.js"></script>
    <script src="/carshop/Public/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_PUC;?>/js/jquery-1.4.2.min.js"></script>
<!--     <script src="/carshop/Public/dialog/dialog/layer.js"></script>
    <script src="/carshop/Public/dialog/dialog.js"></script> -->
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <!-- <script type="text/javascript" charset="utf-8" src="/carshop/Public/ueditor/lang/zh-cn/zh-cn.js"></script> -->
</head>
<body> 
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="<?php echo U('index/index');?>" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="<?php echo U('index/index');?>">首页</a></li>
                <li><a href="<?php echo U('Home/index/index');?>" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="/carshop/index.php/Admin/Admin/edit/id/<?php echo session('id');?>">欢迎您：<?php echo session('rolename'); echo session('username');?></a></li>
                <li><a href="/carshop/index.php/Admin/Admin/edit/id/<?php echo session('id');?>">修改密码</a></li>
                <li><a href="/carshop/index.php/Admin/Admin/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div> 
<div class="container clearfix">
        <div class="sidebar-wrap">
    <div class="sidebar-title">
        <h1>菜单</h1>
    </div>
    <div class="sidebar-content">
        <ul class="sidebar-list">
            <li>
                <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                <ul class="sub-menu">
                    <li><a href="<?php echo U('Cate/list');?>"><i class="icon-font">&#xe008;</i>分类管理</a></li>
                    <li><a href="<?php echo U('Admin/Article/list');?>"><i class="icon-font">&#xe005;</i>博文管理</a></li>
                    <li><a href="design.html"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                    <li><a href="design.html"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                    <li><a href="<?php echo U('Admin/Link/list');?>"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                    <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                <ul class="sub-menu">
                    <li><a href="<?php echo U('Admin/list');?>"><i class="icon-font">&#xe017;</i>管理员管理</a></li>
                    <li><a href="<?php echo U('System/list');?>"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                    <li><a href="/carshop/index.php/Admin/Privilege/list"><i class="icon-font">&#xe037;</i>权限列表</a></li>
                    <li><a href="/carshop/index.php/Admin/Role/list"><i class="icon-font">&#xe046;</i>角色列表</a></li>
                    <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                    <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                    <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Admin/Index/index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">角色管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/carshop/index.php/Admin/Role/add" class="btn btn-primary btn2"><i class="icon-font"></i>新增角色</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i><input form="myform" formaction="/carshop/index.php/Admin/Role/bdel" type="submit" class="btn btn-primary btn2" value="批量删除" /></a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" id='check' type="checkbox"></th>
                            <th>ID</th>
                            <th>角色名称</th>
                            <th>角色权限</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc">
                            <?php if($vo['id'] != 1): ?><input name="ids[]" value="<?php echo ($vo["id"]); ?>" class="check" type="checkbox"><?php endif; ?>
                            </td>
                            
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["rolename"]); ?></td>
                            <td>
                            <?php if($vo['pri_id_list'] == '*'): ?>所有权限
                            <?php else: ?>
                            <?php echo ($vo["pri_name"]); endif; ?>
                            </td>
                            <td>
                                <a class="link-update" href="/carshop/index.php/Admin/Role/edit/id/<?php echo ($vo["id"]); ?>">修改</a>
                               <?php if($vo['id'] != 1): ?><a class="link-del" onclick="return confirm('确定删除此角色吗？');" href="/carshop/index.php/Admin/Role/del/id/<?php echo ($vo["id"]); ?>">删除</a><?php endif; ?>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="list-page"><div><?php echo ($page); ?></div></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
<script type="text/javascript">
    $("#check").click(function(){
        if($(this).attr("checked"))
        {
            $(".check").attr("checked","checked")
        }else
        {
            $(".check").removeAttr("checked")
        }
    })
</script>