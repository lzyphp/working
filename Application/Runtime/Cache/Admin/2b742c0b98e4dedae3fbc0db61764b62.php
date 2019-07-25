<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="/Public/Admin/css/right.css">
        <link rel="stylesheet" href="/Public/Admin/css/reset.css">
        <script src="/Public/Admin/js/jquery.js"></script>
        <script>
            window.onload=function(){
                showtime();
            }
            var dateToString=function(num){
                return num<10?'0'+num:num;
            };
            function showtime(){
                var currentDate = new Date();
            year=dateToString(currentDate.getFullYear());
            month=dateToString(currentDate.getMonth()+1);
            date=dateToString(currentDate.getDate());
            hour=dateToString(currentDate.getHours());
            minute=dateToString(currentDate.getMinutes());
            document.getElementById("date").innerHTML=year+'年'+month+'月'+date+'日'+hour+':'+minute;
            };
        </script>
    </head>
    <body>
        <div id="main">
            <div id="header"><span id="msg">位置：</span>首页</div>
        <div>
            <ul id="mainContant">
                <li><img src="/Public/Admin/images/sun.png"><span id="msg">早上好，欢迎使用考勤管理系统</span></li>
                <li><img src="/Public/Admin/images/time.png"><span>您本次登录的时间：<span id="date"></span></span></li>
            </ul>
        </div>  
        </div>
    </body>
</html>