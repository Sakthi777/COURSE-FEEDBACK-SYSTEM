<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$name=$y['name'];

if(!empty($_POST))
{
	$fc=$_POST['fc'];
	$sub1=$_POST['sub1'];
	$sub2=$_POST['sub2'];
    $sub3=$_POST['sub3'];
    $sub4=$_POST['sub4'];
    $sub5=$_POST['sub5'];
    $sub6=$_POST['sub6'];
    $sub7=$_POST['sub7'];
	$faculty_id = uniqid();
	$u=mysqli_query($al,"insert into course(course_id,department,s1,s2,s3,s4,s5,s6,s7) values('$faculty_id','$fc','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7')");
	if($u==true)
	{
		?>
        <script type="application/javascript">
		alert('Successfully added');
		</script>
        <?php }
}
		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Course Feedback System</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="topHeader">
KARPAGAM COLLEGE OF ENGINEERING<br />
    <span class="tag">COURSE FEEDBACK SYSTEM</span>
</div>
<br>
<br>
<br>
<br>

<div id="content" align="center">
<br>
<br>
<span class="SubHead">Add Course</span>
<br>
<br>
<form method="post" action="" >
<div id="table">
	<div class="tr">
		<div class="td">
        	<label>Department : </label>
        </div>
        <div class="td">
			<input type="text" name="fc" size="25" required placeholder="Enter Department Name" />
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>Subject I : </label>
        </div>
        <div class="td">
			<input type="text" name="sub1" size="25" required placeholder="Enter Subject" />
        </div>
    </div>
    
    <div class="tr">
		<div class="td">
        	<label>Subject II : </label>
        </div>
        <div class="td">
			<input type="text" name="sub2" size="25" required placeholder="Enter Subject" />
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>Subject III : </label>
        </div>
        <div class="td">
			<input type="text" name="sub3" size="25" required placeholder="Enter Subject" />
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>Subject IV : </label>
        </div>
        <div class="td">
			<input type="text" name="sub4" size="25" required placeholder="Enter Subject" />
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>Subject V : </label>
        </div>
        <div class="td">
			<input type="text" name="sub5" size="25" required placeholder="Enter Subject" />
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>Subject VI : </label>
        </div>
        <div class="td">
			<input type="text" name="sub6" size="25" required placeholder="Enter Subject" />
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>Subject VII : </label>
        </div>
        <div class="td">
			<input type="text" name="sub7" size="25" required placeholder="Enter Subject" />
        </div>
    </div>
</div>
		
        <div class="tdd">
        	<input type="submit" value="ADD COURSE" />
        </div>
    
<br>
<br>

    
    
    
    <span class="SubHead">Manage Course</span>
    <br>
<br>

	<table border="0" cellpadding="3" cellspacing="3">
    <tr style="font-weight:bold;">
    <td>Sr. No.</td>
    <td>Name</td>
    <td>Sub I</td>
    <td>Sub II</td>
    <td>Sub III</td>
    <td>Sub IV</td>
    <td>Delete</td>
    
    </tr>
    <?php
	$sr=1;
	$h=mysqli_query($al,"select * from course");
	while($j=mysqli_fetch_array($h))
	{
		?>
        <tr>
        <td><?php echo $sr;$sr++;?></td>
        <td><?php echo $j['department'];?></td>
        <td><?php echo $j['s1'];?></td>
        <td><?php echo $j['s2'];?></td>
        <td><?php echo $j['s3'];?></td>
        <td><?php echo $j['s4'];?></td>
     
        <td align="center"><a href="delete.php?del=<?php echo $j['id'];?>" onClick="return confirm('Are you sure?')" style="text-decoration:none;font-size:18px;color:rgba(255,0,4,1.00);">[x]</a></td> 
        </tr>
     <?php } ?>
     </table>
     <br>
     <table border="0" cellpadding="3" cellspacing="3">
    <tr style="font-weight:bold;">
    <td>Sub V</td>
    <td>Sub VI</td>
    <td>Sub VII</td>
    <td>Delete</td>
    
    </tr>
    <?php
	$sr=1;
	$h=mysqli_query($al,"select * from course");
	while($j=mysqli_fetch_array($h))
	{
		?>
        <tr>
        <td><?php echo $j['s5'];?></td>
        <td><?php echo $j['s6'];?></td>
        <td><?php echo $j['s7'];?></td>
        <td align="center"><a href="delete.php?del=<?php echo $j['id'];?>" onClick="return confirm('Are you sure?')" style="text-decoration:none;font-size:18px;color:rgba(255,0,4,1.00);">[x]</a></td> 
        </tr>
     <?php } ?>
     </table>
<input type="button" onClick="window.location='home.php'" value="BACK">
<br>
<br>
</div>
</form>


<br>
<br>
<br>

<br>
<br>

</div>
</body>
</html>