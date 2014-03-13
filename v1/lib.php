<?php
include('settings.php');
    
function makePresentation($pfpath){
    global $Nstimuli;
	global $randomization;
    $temp=array();
    $counter=0;
    for($c=0;$c<$Nstimuli;$c++)
    {
        $temp[$counter]=$c;
        $counter++;
    }
    if($randomization>0){
        shuffle($temp);
    }
    $pfh=fopen($pfpath,'w');     // presentation file handle
    foreach($temp as $line)
        fwrite($pfh,"$line\n");
    fclose($pfh);
}

function loadFolder($folder){
    $list=array();
    $allowed=array(
        "jpeg",
        "png",
        "gif",
        "jpg",
        "mp3",
        "flv",
        "JPEG",
        "PNG",
        "GIF",
        "JPG",
        "MP3",
        "FLV"
    );
    //List files in images directory
    $stat=exec("ls -t $folder",$files);
    foreach($files as $file)
    {
        if($file[0] == ".") continue;
        $temp=explode(".",$file);
        if(count($temp) == 2)
        {
            $extension=$temp[1];
            if(in_array($extension,$allowed))
                array_push($list,$file);
        }
    }
    return $list;
}

function loadTxt($file,$level){
    if(is_dir($file))
        return loadFolder($file);

    // the variable $level tells us if we have nested arrays, i.e. level 0 just a string, level 1 array split as |, level 2 array split as ,
    $fh=fopen($file,'r');
    if(!$fh)
	die("Invalid file ".$file);
    $list=array();
    while(!feof($fh)){   
    $line=trim(fgets($fh));
	if($line=="") continue;
        if($level==0)
            $out=$line;

        if($level>=1)
        {
            $arr=explode("|",$line);
            $out=$arr;
            if($level==2)
            {
                $tmparr=array();
                foreach($arr as $val)
                {
                    $subarr=explode(",",trim($val));
                    array_push($tmparr,$subarr);
                }
                $out=$tmparr;
            }
        }
        array_push($list,$out);
    }
    return $list;
}
    
    function loadPgTxt($file){
        if(is_dir($file))
            return loadFolder($file);
        $fh=fopen($file,'r');
        $list=array();
        while(!feof($fh))
        {
            $line = trim(fgets($fh));
            if(preg_match('/ \|\| /', $line)){
                $arr=preg_split('/ \|\| /',$line);
                $list[$arr[0]] = $arr[1];
            }
        }
        return $list;
    }
    
//finds a variable name in 'string' (enclosed in ##) and replaces it with var value
// var value comes from array, where the var name in string acts as a key
    function insertVarValues($string, $array){
        $output = '';
        $which = 2;
        $splices = preg_split('/##/',$string);
        foreach ($splices as $part){
            if ($which%2) {
                $output.=$array[$part];
            } else {
                $output.=$part;
            }
            $which++;
        }
        return $output;
    };
