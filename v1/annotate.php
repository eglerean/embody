<?php
include('settings.php');
include('lib.php');

include('header.php');

$userID=$_GET['userID'];
$p=$_GET['presentation'];
$next=explode('_',$p);
$clip='clips/'.$next[1].'.flv';
$outfile="./subjects/$userID/$p.csv";

$temp=explode("_",$p);
$category=$temp[0];
echo $categoryText[$category]."\n";

?>
<script src="AC_OETags.js" language="javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
// -----------------------------------------------------------------------------
// Globals
// Major version of Flash required
var requiredMajorVersion = 10;
// Minor version of Flash required
var requiredMinorVersion = 0;
// Minor version of Flash required
var requiredRevision = 0;
// -----------------------------------------------------------------------------
// -->
</script>

<script language="JavaScript" type="text/javascript">
<!--
// Version check for the Flash Player that has the ability to start Player Product Install (6.0r65)
var hasProductInstall = DetectFlashVer(6, 0, 65);

// Version check based upon the values defined in globals
var hasRequestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);

if ( hasProductInstall && !hasRequestedVersion ) {
	// DO NOT MODIFY THE FOLLOWING FOUR LINES
	// Location visited after installation is complete if installation is required
	var MMPlayerType = (isIE == true) ? "ActiveX" : "PlugIn";
	var MMredirectURL = window.location;
    document.title = document.title.slice(0, 47) + " - Flash Player Installation";
    var MMdoctitle = document.title;

	AC_FL_RunContent(
		"src", "playerProductInstall",
		"FlashVars", "MMredirectURL="+MMredirectURL+'&MMplayerType='+MMPlayerType+'&MMdoctitle='+MMdoctitle+"",
		"width", "900",
		"height", "600",
		"align", "middle",
		"id", "annotatorv2",
		"quality", "high",
		"bgcolor", "#000000",
		"name", "annotatorv2",
		"allowScriptAccess","sameDomain",
		"type", "application/x-shockwave-flash",
		"flashvars","videofile=clip.flv&slider=1&labelUP=paljon&labelDOWN=vahan&userid=testuser&outfilename=testfile",
		"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
} else if (hasRequestedVersion) {
	// if we've detected an acceptable version
	// embed the Flash Content SWF when all tests are passed
	AC_FL_RunContent(
			"src", "annotatorv2",
			"width", "900",
			"height", "600",
			"align", "middle",
			"id", "annotatorv2",
			"quality", "high",
			"bgcolor", "#000000",
			"name", "annotatorv2",
			"allowScriptAccess","sameDomain",
			"type", "application/x-shockwave-flash",
<?php			
			echo "\"flashvars\",\"videofile=";
			echo $clip;
			echo "&slider=1&labelUP=paljon&labelDOWN=vahan&userid=";
			echo $userID;
			echo "&outfilename=";
                        echo $outfile;
                        echo "&mainURL=";
                        $mainURL = urlencode("http://130.233.245.37/neurocinematics/localizer/session.php?userID=".$userID);
                        echo $mainURL;
                        echo "&introtext=none"; //.urlencode("When ready, click continue.");
                        echo "\",\n";
?>
			"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
  } else {  // flash is too old or we can't detect the plugin
    var alternateContent = 'Alternate HTML content should be placed here. '
  	+ 'This content requires the Adobe Flash Player. '
   	+ '<a href=http://www.adobe.com/go/getflash/>Get Flash</a>';
    document.write(alternateContent);  // insert non-flash content
  }
// -->
</script>
<noscript>
  	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
			id="annotatorv2" width="900" height="600"
			codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
			<param name="movie" value="annotatorv2.swf" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#000000" />
			<param name="allowScriptAccess" value="sameDomain" />
			<embed src="annotatorv2.swf" quality="high" bgcolor="#000000"
				width="900" height="600" name="annotatorv2" align="middle"
				play="true"
				loop="false"
				quality="high"
				allowScriptAccess="sameDomain"
				type="application/x-shockwave-flash"
				pluginspage="http://www.adobe.com/go/getflashplayer">
			</embed>
	</object>
</noscript>
</center>
