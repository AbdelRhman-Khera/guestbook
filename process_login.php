<?php 

require('includes/config.php');
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['email']))
		{
			$msg[]="No such email";
		}
		
		if(empty($_POST['password']))
		{
			$msg[]="Password Incorrect........";
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
			
			$email=$_POST['email'];
			
            $q="select * from users where email='$email'";
			
			$res=mysqli_query($conn,$q) or die("wrong query");
			
			$row=mysqli_fetch_assoc($res);
			
			if(!empty($row))
			{
				if(password_verify ( $_POST['password'], $row['password'] ))
				{
					$_SESSION=array();
					$_SESSION['email']=$row['email'];
					$_SESSION['name']=$row['name'];
					$_SESSION['u_id']=$row['id'];
					$_SESSION['auth_token']=$row['token'];
					$_SESSION['status']=true;
					
                    header("location:index.php");
				}
				
				else
				{
					echo 'Incorrect Password....';
				}
			}
			else
			{
				echo 'Invalid User';
			}
		}
	
	}
	else
	{
		header("location:index.php");
	}
			
?>