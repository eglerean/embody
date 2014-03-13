<?php
include_once('lib.php');
include_once('settings.php');
include('header.php');

if(array_key_exists('err',$_GET))
	$err=$_GET['err'];


if(isset($err))
{
    switch($err){    
        case 0:
            $msg=$pagetexts['rp_sex_err'];
            break;
        case 1:
            $msg=$pagetexts['rp_age_err'];
            break;
        case 2:
            $msg=$pagetexts['rp_weight_err'];
            break;
        case 3:
            $msg=$pagetexts['rp_height_err'];
            break;
        case 4:
            $msg=$pagetexts['rp_handedness_err'];
            break;
        case 5:
            $msg=$pagetexts['rp_education_err'];
            break;
	case 6:
	    $msg=$pagetexts['rp_ps1_err'];
	    break;
	case 7:
	    $msg=$pagetexts['rp_ps2_err'];
	    break;
	case 8:
	    $msg=$pagetexts['rp_ps3_err'];
	    break;
    }
    $errormsg="<br><div class=\"error\">$msg</div><br><br>";
}

?>
<div id="header">
<h1><?php echo $pagetexts['rp_title'];?></h1></div>
<div id="container">
<div style="padding-left:10px">
<style>
td{
    padding:10px;
    }
input{
    margin-right:3px;
    }
</style>
<br>
<i><?php echo $pagetexts['rp_text'];?></i>
<br>
<?php if(isset($errormsg)) echo $errormsg; ?>
<form method="POST" action="addme.php">
<table>
    <tr style="background:#ccc">
        <td style="width:200px"><?php echo $pagetexts['rp_sex'];?></td>
        <td>
            <input type="radio" name="sex" value="0"><?php echo $pagetexts['rp_male'];?>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="sex" value="1"><?php echo $pagetexts['rp_female'];?>
        </td>
    </tr>
    <tr style="background:#eee">
        <td style="width:200px"><?php echo $pagetexts['rp_age'];?></td>
        <td>
            <select name="age">
            <?php
                for($i=0;$i<100;$i++){
                    $str="";
                    if($i==18) $str=" SELECTED ";
                    echo "<option value=\"$i\"  $str>$i</option>";  
                }
            ?>
            </select>
        </td>
    </tr>
    <tr style="background:#ccc">
        <td style="width:200px"><?php echo $pagetexts['rp_weight'];?></td>
        <td>
            <select name="weight">
            <?php
                for($i=0;$i<200;$i++){
                    $str="";
                    if($i==70) $str=" SELECTED ";
                    echo "<option value=\"$i\"  $str>$i</option>";  
                }
            ?>
            </select> <?php echo $pagetexts['rp_kg'];?>
        </td>
    </tr>
    <tr style="background:#eee">
        <td style="width:200px"><?php echo $pagetexts['rp_height'];?></td>
        <td>
            <select name="height">
            <?php
                for($i=0;$i<300;$i++){
                    $str="";
                    if($i==170) $str=" SELECTED ";
                    echo "<option value=\"$i\"  $str>$i</option>";  
                }
            ?>
            </select> <?php echo $pagetexts['rp_cm'];?>
        </td>
    </tr>
    <tr style="background:#ccc">
        <td style="width:200px"><?php echo $pagetexts['rp_handedness'];?></td>
        <td>
            <input type="radio" name="hand" value="0"><?php echo $pagetexts['rp_left'];?>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="hand" value="1"><?php echo $pagetexts['rp_right'];?>
        </td>
    </tr>
    <tr style="background:#eee">
        <td style="width:200px"><?php echo $pagetexts['rp_education'];?></td>
        <td>
            <input type="radio" name="education" value="0"><?php echo $pagetexts['rp_edu1'];?> &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="education" value="1"><?php echo $pagetexts['rp_edu2'];?> &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="education" value="2"><?php echo $pagetexts['rp_edu3'];?> &nbsp;&nbsp;&nbsp;&nbsp;
        </td>
    </tr>
    <tr style="background:#eee">
        <td style="width:200px"><?php echo $pagetexts['rp_ps1'];?></td>
        <td>
            <input type="radio" name="psychologist" value="0"><?php echo $pagetexts['rp_n'];?>  &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="psychologist" value="1"><?php echo $pagetexts['rp_y'];?> &nbsp;&nbsp;&nbsp;&nbsp;
        </td>
    </tr>
    <tr style="background:#eee">
        <td style="width:200px"><?php echo $pagetexts['rp_ps2'];?></td>
        <td>
            <input type="radio" name="psychiatrist" value="0"><?php echo $pagetexts['rp_n'];?> &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="psychiatrist" value="1"><?php echo $pagetexts['rp_y'];?> &nbsp;&nbsp;&nbsp;&nbsp;
        </td>
    </tr>
    <tr style="background:#eee">
        <td style="width:200px"><?php echo $pagetexts['rp_ps3'];?></td>
        <td>
            <input type="radio" name="neurologist" value="0"><?php echo $pagetexts['rp_n'];?> &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="neurologist" value="1"><?php echo $pagetexts['rp_y'];?> &nbsp;&nbsp;&nbsp;&nbsp;
        </td>
    </tr>

</table>
<input type="submit" value="<?php echo $pagetexts['rp_title'];?>" style="margin-top:10px;width:320px;font-size:20px;">
</form>
