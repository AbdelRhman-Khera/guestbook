<?php 

require('includes/config.php');
if(isset($_SESSION['status']))
{
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['msg']))
		{
			$msg[]="msg required";
        }
        
        // check the validation of csrf token
        if (!hash_equals($_SESSION['token'], $_POST['csrf_token'])) {
            $msg.="<li>Please try again later";
        }
		
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
			
			$now = date("Y-m-d H:i:s"); 
            $msg=$_POST['msg'];
            $id=$_POST['msg_id'];
            $updated_at=$now;
            
			$query="update msgs set msg = '$msg' , updated_at = '$now' where id='$id'";
			
            mysqli_query($conn,$query) or die("Can't Execute Query...");
            header("location:index.php");
			
		}
	
	}
	else
	{
		header("location:index.php");
    }
}else{
    header("location:login.php");
}
			
?>