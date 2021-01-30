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
            $created_at=$now;
            
            
			$query="insert into msgs(user_id,user_name,msg,created_at)
			values('$user_id','$user_name','$msg','$created_at')";
			
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