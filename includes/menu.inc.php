<ul>
			<li class="current_page_item"><a href="index.php">Home</a></li>
			
			<?php 
					if(isset($_SESSION['status']))
					{
						
						echo '<li><a href="logout.php">Logout</a></li>';
					}
                    else
                    {
                        echo '<li><a href="login.php">Login</a></li>';
                        echo '<li><a href="register.php">Register</a></li>';
					}
			?>
		
			
</ul>