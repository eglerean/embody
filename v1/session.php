<?php
include_once('settings.php');
include_once('lib.php');
    
    $users=array();
    $subjDir=opendir('./subjects/');

    while (false !== ($f = readdir($subjDir))) {
        if($f == "." || $f == "..")
            continue;
        array_push($users,$f);
    }
    closedir($subjDir);
    $userID=$_GET['userID'];
    $helpful=array('user'=>"$userID");

//test for userID validity

    if($userID == ""){
        header("Location: index.php");
    }
    
    $found=0;
    foreach($users as $user){
        if($userID == $user)
            $found = 1;
    }
    
    if($found==0){    
		include('header.php');
        die(insertVarValues($pagetexts['uid_error'],$helpful));
    }
    
// WE HAVE THE SUBJECT, LET'S START THE SESSION

    // does the subject already have a presentation file?
    $pfpath='./subjects/'.$userID.'/presentation.txt';
    
    // if the file is missing generate it
    if(!(is_file($pfpath)))
    {
        makePresentation($pfpath);
    } 
    
    // load the presentation 
    $presentation=loadTxt($pfpath,0);
    
    // see how much has been done
    $done=0;
    $annpath='./subjects/'.$userID.'/';
    foreach($presentation as $p)
    {
        if(is_file($annpath.trim($p).".csv"))
        {
            $done++;
        }
    }
    
    $amount=$done/(count($presentation));
    $amount=floor($amount*10000)/10000; // round to two points after percent decimal
    $perc=100*$amount;
    
    //start adding contents
    $outtext='';
    $outtext.="<div id='header'>";
    $outtext.="<span style='font-size:14px;font-weight:bold;margin-left:10px;position:absolute;'>id: ".$userID."</span>";
    $outtext.="<div id='progress-bar' class='all-rounded'> <div id='progress-bar-percentage' class='all-rounded' style='width:".$perc."%'><span>".$perc."%</span>";
    $outtext.="</div></div></div><div id='container'>";
    
    //pick out header from pagetexts-file
    $outtext.="<h1>".insertVarValues($pagetexts['welcome'], $helpful)."</h1>";
    
    if($amount == 1){
        $outtext.=insertVarValues($pagetexts['thank-you'], $helpful);
    }else{
        $helpful['percentage'] = $perc;
    if($amount < 1)
    {
        
        //if there is a specifies welcome file, take that
        if(isset($welcome)) {
                $welcome=loadTxt($welcomefile,0);
        }
        $outtext.="<h2>".insertVarValues($pagetexts['instructions'], $helpful)."</h2>";
        
        //add instructions from file
        if(isset($instructions)) {
            $outtext.=$instructions;
        }
        
        $presentation=$presentation[$done];

        if (in_array($type, $allowedTypes)){
            $link = $type;
        } else {
            die("variable $type missing from settings.php");
        }

        if ($type=="paintwords" || $type=="paintimages"):
            $goto="paintannotate.php?perc=$perc&userID=$userID&presentation=$presentation";
        else:
            $goto=$link."annotate.php?perc=$perc&userID=$userID&presentation=$presentation";
        endif;
        $helpful['goto'] = $goto;
        $outtext.=insertVarValues($pagetexts['start'],$helpful);
    }
    }
$auto="";
if(array_key_exists('auto',$_GET))
	$auto=$_GET['auto'];
if($auto==1 && $amount!=1){
    header("Location: $goto");
    //echo "auto";
}
else
{
    include('header.php');
    echo $outtext;
    include('footer.php');
}
?>
