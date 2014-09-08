<?php
include_once('lib.php');
//this is the only part you should need to change when setting up a new experiment. Also, read the readme.txt to figure out which textfiles you need to put in $path location.
    
    $path="/var/www/emotion.becs.aalto.fi/emotion_words/"; // set this to point to your Apache root directory
    
    //possible types at this moment are : form, video annotator, painting with words, painting with images, painting with audiofile
    $type =         'paintwords';       // $type has to be one of the following: "paintwords", "paintimages" (remember quotes) // TODO: add code for videos/audio
    $instrfile =    'instr_paint.txt';  // displayed after login, before stimuli, and at help-page
    $pgtexts =      'page_texts.txt';   // bits and bobs of text peppered around the system, see example page_texts.txt for explanation what should be found there
    $stimuli =      'words.txt';        // stimuli to be displayed
    $randomization = 1; //here you can decide if you want to show the stimuli always in order or randomized: 0 means that randomization is off and 1 means that it is on

// If you're not doing anything funky, you shouldn't need to change anything after this.
    
//these are common for all cases
    $allowedTypes = array("form", "video", "paintwords", "paintimages", "paintaudio");

    $instructionsfile=$instrfile;

    if (file_exists($instructionsfile)){
        $instructions=file_get_contents($instructionsfile);
    } else {
        $instructions = "There are no instructions defined.";
    }
    $stimulusfile = $stimuli;
    $Nstimuli=count(loadTxt($path.$stimulusfile,0)); // number of stimuli
    
    $pagetextfile = $pgtexts;
    if (file_exists($pagetextfile)){
        $pagetexts=loadPgTxt($pagetextfile); //this has all those little words that there are on the front page
    }else{
        $pagetexts = array(0 => "There are no page texts defined");
    }
    $title      =   $pagetexts['title' ];
    $tasklabel  =   $pagetexts['tasklabel'];
    
switch($type){
    case "form":
        // if form then we need a list of sentences ... TODO
        break;
    case "video":
        // if video we need a list of videofiles and ... TODO
        break;
    case "paintwords":
    case "paintimages":
        //if paintwords we need a file with all the words
	    $labels=array($pagetexts['left_label'],$pagetexts['right_label']);
        break;
}

?>
