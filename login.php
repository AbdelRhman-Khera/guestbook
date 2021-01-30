

<!DOCTYPE html >

<html >
<head>
		<?php
			include("includes/head.inc.php");
		?>
</head>

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
									<h1 class="title">Login</h1>
						
									<div class="entry">
									<br><br>
										<?php
											if(isset($_GET['error']))
											{
												echo '<font color="red">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
											
											if(isset($_GET['ok']))
											{
												echo '<font color="blue">success</font>';
												echo '<br><br>';
											}
										
										?>
									
										<table>
											<form action="process_login.php" method="POST">
												<tr>
													<td><b>email :</b>&nbsp;&nbsp;</td>
													<td><input type='email' size="30" maxlength="30" name='email' required>
                                                    <input type="hidden" name="csrf_token" value="<?php
                                                    echo $_SESSION['token']; ?>">

                                                    </td>
												
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Password :</b>&nbsp;&nbsp;</td>
													<td><input type='password' name='password' size="30" required></td>
													 
												</tr>
												
												<tr><td>&nbsp;</tr>
											
												<tr>
													<td colspan='2' align='center'>
														<input type='submit' value="  login  ">
													</td>
												</tr>
											</form>
										</table>
									</div>
									
								</div>
					
					
							</div>
				
						<!-- end content -->
						
						
						<!-- end sidebar -->
					<div style="clear: both;">&nbsp;</div>
				</div>
			<!-- end page -->
			
</body>
</html>
