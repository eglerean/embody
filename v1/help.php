<?php
include_once('settings.php');
include('header.php');
echo "<div id='container'>";
echo "<h1>".$pagetexts['instructions']."</h1><br><br>";
echo "<div style='margin-left:20px;margin-right:20px;align:'justify';>";
if(isset($ohjeet))
	echo $ohjeet;
else
	include($instructionsfile);
include('footer.php');
