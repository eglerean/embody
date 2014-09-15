<?php 
include('settings.php');
echo "<pre>"
echo "Performing installation checks for emBODY tool";
echo "current folder: ".getcwd();
echo "folder specified in settings.php: ".$path;
// checks that $path folder exists on the server
if(!strcmp(getcwd(),'$path'))
	echo "\t ERROR: it looks like the two folders do not match!";
