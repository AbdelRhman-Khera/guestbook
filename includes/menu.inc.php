<ul>
			<li class="current_page_item"><a href="">Home</a></li>
			
			<?php 
					if(isset($_SESSION['status']))
					{
						
						echo '<li><a href="">Logout</a></li>';
					}
                    else
                    {
						echo '<li><a href="">Login</a></li>';
					}
					{
						echo '<li><a href="register.php">Register</a></li>';
					}
			?>
		
			
</ul>