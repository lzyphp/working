<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/jquery.dialog.css" />
<link rel="stylesheet" href="/Public/Admin/css/index.css" />
<title>单位考勤管理系统</title>
</head>

<body>
<div id="container">
  <div id="hd">
    <div class="hd-wrap ue-clear">
      <div class="top-light"></div>
      <h1 class="logo"></h1>
      <div class="login-info ue-clear">
        <div class="welcome ue-clear" style="width: 180px;"><span>欢迎您,管理员</span><a href="javascript:;" class="user-name"><?php echo (session('u_username')); ?></a></div>
      </div>
      <div class="toolbar ue-clear"> <a href="<?php echo U('index');?>" class="home-btn">首页</a> <a href="javascript:;" class="quit-btn exit"></a> </div>
    </div>
  </div>
  <div id="bd">
    <div class="wrap ue-clear">
      <div class="sidebar">
        <h2 class="sidebar-header">
          <p>功能导航</p>
        </h2>
        <ul class="nav">
          <li class="office current">
              <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>部门管理</span><i class="icon"></i></a></div>
              <ul class="subnav">
                <li><a href="javascript:;" date-src="<?php echo U('Dept/showList');?>">部门列表</a></li>
                <li><a href="javascript:;" date-src="<?php echo U('Dept/add');?>">添加部门</a></li>
              </ul>
          </li>
          <li class="agency">
              <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>员工管理</span><i class="icon"></i></a></div>
              <ul class="subnav">
                <li><a href="javascript:;" date-src="<?php echo U('Emp/showList');?>">员工列表</a></li>
                <li><a href="javascript:;" date-src="<?php echo U('Emp/add');?>">添加员工</a></li>
              </ul>
          </li>
          <li class="system">
              <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>系统管理</span><i class="icon"></i></a></div>
              <ul class="subnav">
                  <li><a href="javascript:;" date-src="<?php echo U('System/index');?>">上下班时间设置</a></li>
                  <li><a href="javascript:;" date-src="<?php echo U('System/stat');?>">考勤统计</a></li>
              </ul>
          </li>
        </ul>
      </div>
      <div class="content">
        <iframe src="<?php echo U('home');?>" id="iframe" width="100%" height="100%" frameborder="0"></iframe>
      </div>
    </div>
  </div>
  <div id="ft" class="ue-clear">
    <div class="ft-left"> </div>
    <div class="ft-right"> </div>
  </div>
</div>
<div class="exitDialog">
  <div class="dialog-content">
    <div class="ui-dialog-icon"></div>
    <div class="ui-dialog-text">
      <p class="dialog-content">你确定要退出系统？</p>
      <p class="tips">如果是请点击“确定”，否则点“取消”</p>
      <div class="buttons">
        <input type="button" class="button long2 ok" value="确定" />
        <input type="button" class="button long2 normal" value="取消" />
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/core.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.dialog.js"></script>
<script type="text/javascript" src="/Public/Admin/js/index.js"></script>
</html>