

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
                        <h2>Post title</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum nam illum ipsum corporis voluptatibus, perspiciatis possimus vitae consequuntur. Voluptate quisquam reprehenderit sapiente cupiditate esse, consequuntur vel dicta culpa dolorem rerum.</p>
                    </div>

                    <!-- comments section -->
                    <div class="col-md-6 col-md-offset-3 comments-section">
                        <!-- comment form -->
                        <form class="clearfix" action="index.php" method="post" id="comment_form">
                            <h4>Post a comment:</h4>
                            <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                            <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
                        </form>

                        <!-- Display total number of comments on this post  -->
                        <h2><span id="comments_count">0</span> Comment(s)</h2>
                        <hr>
                        <!-- comments wrapper -->
                        <div id="comments-wrapper">
                            <div class="comment clearfix">
                                    <img src="profile.png" alt="" class="profile_pic">
                                    <div class="comment-details">
                                        <span class="comment-name">Melvine</span>
                                        <span class="comment-date">Apr 24, 2018</span>
                                        <p>This is the first reply to this post on this website.</p>
                                        <a class="reply-btn" href="#" >reply</a>
                                    </div>
                                    <div>
                                        <!-- reply -->
                                        <div class="comment reply clearfix">
                                            <img src="profile.png" alt="" class="profile_pic">
                                            <div class="comment-details">
                                                <span class="comment-name">Awa</span>
                                                <span class="comment-date">Apr 24, 2018</span>
                                                <p>Hey, why are you the first to comment on this post?</p>
                                                <a class="reply-btn" href="#">reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- // comments wrapper -->
                    </div>
                    <!-- // comments section -->
                </div>
            </div>
</body>
</html>
