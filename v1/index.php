<?php
include_once('settings.php');
include_once('lib.php');

include('header.php');
?>
<div id ="header">
<div style="top:0px;float:right;margin-right:10px;color:#ccc"><a href="admin/index.php">Admin</a></div>
<h1><?php echo $title; ?></h1>
</div>

<div id="container">
<form id="intro" method="GET" action="session.php">
<?php

$login=$pagetexts['login-dialog'];
$register=$pagetexts['register'];
?>
    <br><br>
    <input style="font-size:12px;" name="userID" type="text" onclick="this.value=''" value="<?php echo $login;?>"> 
    <br><br><?php echo $register;?>
</form>


<?php
include('footer.php');
?>
