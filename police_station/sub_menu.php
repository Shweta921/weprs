<?php
session_start();
require_once("includes/config.php");

if(!isset($_SESSION['UserName']))
{
header("Location:index.php");
}
else
{
	$name=$_SESSION['UserName'];
}

$branch=$_SESSION['branch'];
$s="SELECT * FROM `login` WHERE `UserName` = '$name' AND `Branch`=$branch";

$r=mysql_query($s);
if(!$r)
{
	echo mysql_error();
}
$flag1=0;
$flag2=0;

	while($d=mysql_fetch_row($r))
	{
		if($d[2]==4)
		{
			$flag1=1;
		}
		if($d[2]==1 || $d[2]==2 || $d[2]==3)
		{
			$flag2=1;
		}
	}
?>
<div id="admin">

        <div class="row " id="font3">
        	<?php
			if($flag1==1)
			{
			?>
            <div class="col-md-2 text-center">
                <a href="<?php echo $_SESSION['base_url']?>/admin/addadmin.php"><strong>Add Admin</strong></a>
            </div>
            
            <?php
			}
			if($flag2==1)
			{
			?>
            <div class="col-md-2">
                <a href="<?php echo $_SESSION['base_url']?>/admin/adminlist.php"><strong>Admin List</strong></a>
            </div>
             <?php
			 }
			 ?>
        </div> 
       <?php
	   if($flag1==0 AND $flag2==0)
	   {
	   	echo "Do not have the authority to access this section...";
	   }
	   ?>
 
</div>


<div id="Staff">
<?php
$branch=$_SESSION['branch'];
$s="SELECT * FROM `login` WHERE `UserName` = '$name' AND `Branch`=$branch";
$r=mysql_query($s);
if(!$r)
{
	echo mysql_error();
}
$flag1=0;
$flag2=0;
$flag3=0;
$flag4=0;
	while($d=mysql_fetch_row($r))
	{
		if($d[2]==102 || $d[2]==103 || $d[2]==104 || $d[2]==105 || $d[2]==106 || $d[2]==107  || $d[2]==902227 )
		{
			$flag1=1;
		}
		else if($d[2]==108 || $d[2]==902227 )
		{
			$flag2=1;
		}
		else if($d[2]==109 || $d[2]==110 || $d[2]==902227 )
		{
			$flag3=1;	
		}
		else if($d[2]==111 || $d[2]==112 || $d[2]==113 || $d[2]==902227 )
		{
			$flag4=1;
		}
	}

?>
    <div class="row" id="font3">
    <?php
    if($flag1==1)
	{
	?>
        <div class="col-md-2 text-center">
            <a href="<?php echo $_SESSION['base_url']?>/staff/add-department.php?id=0"><strong> Add Department</strong></a>
        </div>
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/staff/add-staff.php"><strong>Add Staff</strong></a>
        </div>
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/staff/view-staff.php"><strong>View Staff </strong></a>
        </div>
       <!-- <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/staff/assign-incharge.php"><strong>Assign Incharge</strong></a>
        </div>-->
        <?php }?>
	</div>
    <?php
    if($flag1==0 AND $flag2==0 AND $flag3==0 AND $flag4==0)
		{
		echo "Do not have the authority to access this section...";
		}
		?>
</div>
<!--
<div id="Payroll">
    <div class="row" id="font3">
        <div class="col-md-2 text-center">
            <a href="<?php echo $_SESSION['base_url']?>/payroll/payroll/create-annual-leave.php"><strong>Create Annual Leave</strong></a>
        </div>
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/payroll/payroll/create-allowance.php"><strong>Create Allowance Type</strong></a>
        </div>
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/payroll/payroll/create-deduction.php"><strong>Create Deduction</strong></a>
        </div>
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/payroll/payroll/create-loan.php"><strong>Create Loan</strong></a>
        </div>
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/payroll/payroll/create-pf.php"><strong>Create PF</strong></a>
        </div>
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/payroll/payroll/create-tax.php"><strong>Create Tax</strong></a>
        </div>
     </div>
     <br/>
     <div class="row" id="font3">     
        <div class="col-md-2 text-center">
            <a href="<?php echo $_SESSION['base_url']?>/staff/assign-incharge.html"><strong>Assign Incharge</strong></a>
        </div>
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/staff/assign-incharge.html"><strong>Assign Incharge</strong></a>
        </div>
    </div>
</div>-->

<!--=========================================-->


<div id="Salary">
<?php
$branch=$_SESSION['branch'];
$s="SELECT * FROM `login` WHERE `UserName` = '$name' AND `Branch` = $branch";
$r=mysql_query($s);
if(!$r)
{
	echo mysql_error();
}
$flag1=0;

	while($d=mysql_fetch_row($r))
	{
		if($d[2]==902227)
		{
			$flag1=1;
		}
		
	}

?>
    <div class="row" id="font3">
    <?php if($flag1==1)
	{?>
 
 
            <!--<div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/salary/salary.php"><strong>Add Salary</strong></a>
        </div>
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/salary/view-salary.php"><strong>View Salary</strong></a>
        </div>-->
       
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/salary/add-monthly.php"><strong>Add Monthly</strong></a>
        </div>

        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/salary/bulk_monthly.php"><strong>Bulk Monthly</strong></a>
        </div>
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/salary/view-monthly.php"><strong>View Monthly</strong></a>
        </div>
       <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/salary/delete_monthly.php"><strong>Delete Monthly</strong></a>
        </div> 
		<div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/salary/salary_slip.php"><strong>Salary Slip</strong></a>
        </div>
     <?php }
		?>
    </div>
    <?php
    if($flag1==0)
    {
	echo "Do not have the authority to access this section...";
    }
	?>
</div>



<div id="Payroll">
<?php
$branch=$_SESSION['branch'];
$s="SELECT * FROM `login` WHERE `UserName` = '$name' AND `Branch` = $branch";
$r=mysql_query($s);
if(!$r)
{
	echo mysql_error();
}
$flag1=0;

	while($d=mysql_fetch_row($r))
	{
		if($d[2]==902227)
		{
			$flag1=1;
		}
		
	}

?>
    <div class="row" id="font3">
    <?php if($flag1==1)
	{?>
 		<div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/salary/payroll_register.php"><strong>Payroll Register</strong></a>
        </div>
 	  <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/salary/bank_register.php"><strong>Bank Register</strong></a>
        </div>
      <?php }
		?>
    </div>
    <?php
    if($flag1==0)
    {
	echo "Do not have the authority to access this section...";
    }
	?>
</div>





<div id="Attendance">
<?php
$branch=$_SESSION['branch'];
$s="SELECT * FROM `login` WHERE `UserName` = '$name' AND `Branch`=$branch";
$r=mysql_query($s);
if(!$r)
{
	echo mysql_error();
}
$flag1=0;
$flag2=0;
$flag3=0;
$flag4=0;
$flag5=0;
$flag6=0;
$flag7=0;
$flag8=0;
$flag9=0;
	while($d=mysql_fetch_row($r))
	{
		if($d[2]==256)
		{
			$flag1=1;
		}
		if($d[2]==257)
		{
			$flag2=1;
		}
		if($d[2]==258)
		{
			$flag3=1;
		}
		if($d[2]==259)
		{
			$flag4=1;
		}
		if($d[2]==260)
		{
			$flag5=1;
		}
		if($d[2]==261)
		{
			$flag6=1;
		}
		if($d[2]==262)
		{
			$flag7=1;
		}
		if($d[2]==263)
		{
			$flag8=1;
		}
		if($d[2]==264)
		{
			$flag9=1;
		}
	}

?>

    <div class="row" id="font3" >
    <?php
	if($flag1==1)
	{
	?>
       <!-- <div class="col-md-2 text-center">
            <a href="<?php //echo $_SESSION['base_url']?>/attendance/attendance-slip.php"><strong> Attendance Slips</strong></a>
        </div>-->
        <?php
        }
		if($flag2==1)
		{
		?>
       
       
      
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/attendance/staff-attendance.php"><strong> Staff Attendance</strong></a>
        </div>
        <?php
        }
		if($flag5==1)
		{
		?>
        <div class="col-md-2 ">
            <a href="<?php echo $_SESSION['base_url']?>/attendance/edit-staff-attendance.php"><strong> Edit Staff Attendance </strong></a>
        </div>
        <?php
        }
		
		if($flag7==1)
		{
		?>
      
         <?php
        }
		if($flag8==1)
		{
		?>
        <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/attendance/employee-report.php"><strong>  Employee Report</strong></a>
        </div>
         <?php
        }
		if($flag9==1)
		{
		?>
         <div class="col-md-2">
            <a href="<?php echo $_SESSION['base_url']?>/attendance/staff-report.php"><strong>  Staff  Report</strong></a>
        </div>
        <?php
        }
		?>
    </div>
    <?php
    if($flag1==0 AND $flag2==0 AND $flag3==0 AND $flag4==0 AND $flag5==0 AND $flag6==0 AND $flag7==0 AND $flag8==0 AND $flag9==0)
		{
		echo "Do not have the authority to access this section...";
		}
		?>
</div>


    
    
</div>