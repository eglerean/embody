<?php
include_once('settings.php');
include_once('lib.php');

$userID=$_POST['userID'];
$p=$_POST['presentation'];


$out="";

for($r=0;$r<count($skeleton);$r++)
{
        $line=$skeleton[$r];    // line has two arrays, [0] for the labels and [1] for the type 

        $type=trim($line[0]);
        $num=trim($line[1]);
	$T=strtoupper($type);
	if($type =="s")
	{
		$val=$_POST["$T$r"];
		if($val=="")    $val=-1;
		$out.=$val;
	}
	if($type == "m")
	{
		for($n=0;$n<$num;$n++)
		{
			$val=$_POST["$T$r"."_"."$n"];
			if($val=="")	$val=0;
			$out.=$val.",";
		}
		$out.=$_POST["T$r"];
	}
	$out.=",";
}

$file="./subjects/$userID/$p".".csv";
$fh = fopen($file, 'w') or die("<h1 style=\"background:red;color:white;\">Error while saving the data. Please contact enrico.glerean@aalto.fi</h1>");
fwrite($fh, $out);
fclose($fh);
$url="session.php?auto=1&userID=$userID"; 
header("Location: $url");
