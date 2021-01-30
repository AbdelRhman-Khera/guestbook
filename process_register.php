<?php
	require('includes/config.php');
	
	if(!empty($_POST))
	{
        $msg="";
        
		//check if inputs is empty
		if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cpassword']))
		{
			$msg.="<li>Please full fill all requirement";
		}
		//check if password equal confirmed password
		if($_POST['password']!=$_POST['cpassword'])
		{
			$msg.="<li>Please Enter your Password Again.....";
		}
		
		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
		{
			$msg.="<li>Please Enter Your Valid Email Address...";
		}
		
		
		if(strlen($_POST['password'])>10)
		{
			$msg.="<li>Please Enter Your Password in limited Format....";
		}
		
		if(is_numeric($_POST['name']))
		{
			$msg.="<li>Name must be in String Format...";
		}
		
		if($msg!="")
		{
			header("location:register.php?error=".$msg);
        }
        // check the validation of csrf token
        if (!hash_equals($_SESSION['token'], $_POST['csrf_token'])) {
            $msg.="<li>Please try again later";
        }
		else
		{
            $now = date("Y-m-d H:i:s"); 
            $name=$_POST['name'];
			$email=$_POST['email'];
			$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
            $token=bin2hex(random_bytes(32));
            $created_at=$now;
            
            
			$query="insert into users(name,email,password,token,created_at)
			values('$name','$email','$password','$token','$created_at')";
			
            mysqli_query($conn,$query) or die("Can't Execute Query...");

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
					$_SESSION['status']=true;
					
                    header("location:index.php");
                }
            }
		}
	}
	else
	{
		header("location:index.php");
	}
?>