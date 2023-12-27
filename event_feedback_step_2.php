<?php
include "configASL.php";
session_start();
if(isset($_POST['roll']))
{
	$_SESSION['roll']=$_POST['roll'];
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student & Event Feedback System</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="topHeader">
KARPAGAM COLLEGE OF ENGINEERING<br />
    <span class="tag">EVENT FEEDBACK SYSTEM</span>
</div>
<br>
<br>
<br>
<br>

<div id="content" align="center">
<br>
<br>
<span class="SubHead">Feedback Step II</span>
<form method="post" action="event_feedback_step_3.php" >
<div id="table"> 
    <div class="tr">
		<div class="td">
        	<label>Roll No : </label>
        </div>
        <div class="td">
			<input type="text" disabled size="5" value="<?php echo $_SESSION['roll'];?>" />
        </div>
    </div>
     <div class="tr">
     <div class="td">
        	<label>Resource Person : </label>
        </div>
        <div class="td">

     <div class="td">
			<select name="faculty_id" required>
            <option value="NA" disabled selected> - - Select Resource Person - -</option>
            <?php
			$x=mysqli_query($al,"select * from faculty");
			while($y=mysqli_fetch_array($x))
			{
			 ?>
             <option value="<?php echo $y['faculty_id'];?>"><?php echo $y['name'];?></option>
             <?php } ?>
                </select>
        </div>
      </div>
</div>
</div>
		
        <div class="tdd">
        	<input type="button" onClick="window.location='event_feedback.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onClick="window.location='exit.php'" value="EXIT">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="NEXT" />
        </div>
    
    <br>
</div>
</form>
<br>

</body>
</html>