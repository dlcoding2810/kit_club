<!DOCTYPE html>
<html>

<head>
    <title>Member-KIT</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="app/views/user/icon./all.css">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="app/views/user/css/member_css.css">
    <link rel="stylesheet" type="text/css" href="app/views/user/reponsive/reponsive_css.css">
    <script type="text/javascript" src="app/views/user/js/member_js.js">

    </script>
</head>

<body>
    <header class="main-header">
        <div class="name-clb">
            
            <span class="name"><img src="app/views/user/img./logo.jpg"><b>KIT </b>CLUB</span>
        </div>

    </header>

    <div class="col-md-2" id="menuLeft" style="overflow: auto">
        
    <div class="user-panel">
    <div class="pull-left img">
        
        <img src="public/img/<?=$_SESSION['user']['avatar']?>" class="img-sidebar" alt="user image">
    </div>
    <div class="pull-left info">
        <p><?=$_SESSION['user']['username']?></p>
        <a href="#"><i class="fa fa-circle "> member</i></a>
    </div>
</div>
<!-- sidebar menu: -->
<ul class="sidebar-menu">
    <li class="header">Member Temp</li>
    <li class="item-menu-dashboard">
        <a href="#" onclick="opentabs('dashBoard')">
            <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
    </li>

    <li class="item-menu-products">
        <a href="#" onclick="opentabs('account')">
            <i class="fas fa-user-edit"></i>
            <span>Tài khoản</span>
        </a>
    </li>
    <li class="item-menu-products">
        <a href="/kit_club/index.php?url=user/logout">
            <i class="fas fa-sign-out-alt"></i>
            <span>Đăng xuất</span>
        </a>
    </li>
</ul>
    </div>

    <div class="col-md-10 content" id="dashBoard">
        <script type="text/javascript">
            $('#dashBoard').load('app/views/user/dashBoard.html');
        </script>
    </div>

    <!--Cai dat tai khoan-->
    <div class="col-md-10 content " id="account">
        <script type="text/javascript">
            $('#account').load('app/views/user/account.php');
        </script>
    </div>

    <!-- Thông báo -->
    <div class="col-md-10 content" id="notify">
        <script type="text/javascript">
            $('#notify').load('app/views/user/notify.html');
        </script>
    </div>


    
    <!-- Dự án -->
    <div class="col-md-10 content " id="project">
       <script type="text/javascript">
            $('#project').load('app/views/user/project.html');
        </script>
    </div>

    

    <!-- show and hide menu -->
    <div class="icon-content">
        <i class="fas fa-align-justify" onclick="show()"></i>
    </div>
    <div class="icon-content-back">
        <i class="fas fa-times-circle" onclick="hide()"></i>
    </div>

</body>

</html>


<?php require('meeting.html'); ?>
<?php require('login_schedule_member.php'); ?>
<?php require('view_schedule_member.php'); ?>


