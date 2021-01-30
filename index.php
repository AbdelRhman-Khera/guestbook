
<?php

?>
<!DOCTYPE html >

<html >
<head>
		<?php
			include("includes/head.inc.php");
		?>
</head>
<style>
form button { margin: 5px 0px; }
textarea { display: block; margin-bottom: 10px; }
/*post*/
.post { border: 1px solid #ccc; margin-top: 10px; }
/*comments*/
.comments-section { margin-top: 10px; border: 1px solid #ccc; }
.comment { margin-bottom: 10px; }
.comment .comment-name { font-weight: bold; }
.comment .comment-date {
	font-style: italic;
	font-size: 0.8em;
}
.comment .reply-btn, .edit-btn { font-size: 0.8em; }
.comment-details { width: 91.5%; float: left; }
.comment-details p { margin-bottom: 0px; }
.comment .profile_pic {
	width: 35px;
	height: 35px;
	margin-right: 5px;
	float: left;
	border-radius: 50%;
}
/*replies*/
.reply { margin-left: 30px; }
.reply_form {
	margin-left: 40px;
	display: none;
}
#comment_form { margin-top: 10px; }
</style>

<body>
			<!-- start header -->
				<div id="header">
					<div id="menu">
						<?php
							include("includes/menu.inc.php");
						?>
					</div>
				</div>
				
			<!-- end header -->
			
			<!-- start page -->

				<div id="page">
					<!-- start content -->
					<div id="content">
						<div class="post">
							<h1 class="title">Welcome  
							<?php 
								if(isset($_SESSION['status']))
								{
									echo $_SESSION['name']; 
								}
								else
								{	
									echo 'to guestbook';
								}
							?>
							</h1>
			
						
					</div>
					<!-- end content -->
					<div style="clear: both;">&nbsp;</div>
				</div>
			<!-- end page -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 post">
                    
                    <form class="clearfix" action="postmsg.php" method="post" id="comment_form">
                            <h4>Post a message:</h4>
                            <?php
                                if(isset($_GET['error']))
                                {
                                    echo '<font color="red">'.$_GET['error'].'</font>';
                                    echo '<br><br>';
                                }
                            
                            ?>
                            <textarea name="msg" id="comment_text" class="form-control" cols="30" rows="3" required></textarea>
                            <input type="hidden" name="csrf_token" value="<?php
                                                    echo $_SESSION['token']; ?>">
                            <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit message</button>
                    </form>
                    </div>
                    <?php
                     $q="select * from msgs ORDER by created_at desc";
			
                     $res=mysqli_query($conn,$q) or die("wrong query");
                     
                     while ($row=mysqli_fetch_assoc($res)) {
                         echo '<div class="col-md-6 col-md-offset-3 post">';
                         echo '<h2>'.$row['user_name'].'</h2>';
                         echo '<p>'.$row['msg'].'</p>';
                         echo '</hr><a href="msg.php?sid='.$row['id'].'">replay</a></br>';
                         if (isset($_SESSION['status'])) {

                             if ($row['user_id'] == $_SESSION['u_id']) {
                                echo '</hr><a href="deletemsg.php?sid='.$row['id'].'">delete</a></br>';
                             }
                         }
                         
                         echo '</div>';
                     }
                    ?>
                    
                </div>
            </div>
</body>
</html>
