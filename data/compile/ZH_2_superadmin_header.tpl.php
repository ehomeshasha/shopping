<? if(!defined('IN_SYSTEM')) exit('Access Denied'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Vlife | SuperAdmin Center</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?=$_G['siteurl']?>views/default/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?=$_G['siteurl']?>views/default/css/bootstrap-responsive.min.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?=$_G['siteurl']?>views/default/css/datepicker.css" type="text/css" rel="stylesheet">
<!--<link href="views/default/css/datepicker.less" type="text/css" rel="stylesheet/less">-->
<link href="<?=$_G['siteurl']?>views/default/css/common.css" type="text/css" rel="stylesheet">
<script src="<?=$_G['siteurl']?>views/default/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?=$_G['siteurl']?>views/default/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=$_G['siteurl']?>views/default/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?=$_G['siteurl']?>views/default/js/common.js" type="text/javascript"></script>
<script src="<?=$_G['siteurl']?>uploadify/jquery.uploadify.min.js" type="text/javascript" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?=$_G['siteurl']?>uploadify/uploadify.css">
<script type="text/javascript">
var controller = "<?=$_G['controller']?>";
var action = "<?=$_G['action']?>";
var site_url = "<?=$_G['siteurl']?>";
<? if(!empty($_G['message'])) { ?>
setTimeout(function() {
$("#message").fadeOut(1000);
}, 3000);
setTimeout(function() {
$(".clear_session").trigger('click');
}, 4000);
<? } ?>
</script>
</head>
<body>
<header>
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<div class="navbar">
<div class="navbar-inner">
<div class="brand">
<a href="index.php?home=user" style="color:#777;">SuperAdmin Center</a>
<a href="<?=$_G['siteurl']?>superadmin/index.php?home=login&act=logout"class="mrm">
<sub>
[Signout]
</sub>
</a>
</div>
<ul class="nav jznav">
<li class="<? if($_G['active_nav']['model'] == 'user') { ?>active<? } ?>"><a href="index.php?home=user">Users</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</header>
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<div class="tabbable">
<ul class="nav nav-tabs">
<li class="<? if($_G['active_nav']['value'] == 'user#index') { ?>active<? } ?>"><a href="index.php?home=user">UserList</a></li>
<li class="<? if($_G['active_nav']['value'] == 'user#post') { ?>active<? } ?>"><a href="index.php?home=user&amp;act=post">AddUser</a></li>
</ul>