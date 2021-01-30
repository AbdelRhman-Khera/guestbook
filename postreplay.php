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
			$user_id=$_SESSION['u_id'];
			$user_name=$_SESSION['name'];
			$msg_id=$_POST['msg_id'];
            $created_at=$now;
            
            
			$query="insert into replies(user_id,user_name,replay,created_at,msg_id)
			values('$user_id','$user_name','$msg','$created_at','$msg_id')";
			
            mysqli_query($conn,$query) or die("Can't Execute Query...");
            header("location:msg.php?sid=".$_POST['msg_id']);
			
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