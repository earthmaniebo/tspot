<!Doctype HTML>
<html>
<head>
	<title>Tspot | Add Admin</title>
	<?php include_once('headtags.php'); ?>
   
	<script type="text/javascript" >
		function InputVal() 
		{
			var username = document.getElementById('username');
			var password = document.getElementById('password');
			var cnfPassword = document.getElementById('cnfPassword');
			
			var passwordVal = password.value;
			var passwordLength = passwordVal.length;
			
			if(passwordLength < 6)
			{
				alert("Password must at least contains 6 characters");
				return false;
			}
			
			if(password.value != cnfPassword.value)
			{
				alert("Password did not match!");
				return false;		
			}
			
			if(username.value == "" || password.value == "" || cnfPassword.value == "") {
				alert("Please fill in all the required fields.");
				return false;
			}
		}
	</script>   
</head>
<body>
	<?php 
		require_once('connection.php');
	?>
	<div id="container">
		<?php include_once('header.php'); ?>
		<nav>
			<div class='nav-wrap'>
				<ul class='group' id='example-one'>
		            <a href='index.php'>Home</a> </li>
		            <li><a href='spots.php'>Spots</a></li>
		            <li><a href='reviews.php'>Travel Reviews</a></li>
		            <li><a href='about.php'>About</a></li>
		            <?php 
		            	if(isset($_SESSION['AdminID'])) {
								echo "<li class='current_page_item'><a href='controlPanel.php'>Control Panel</a></li>";		            	
		            	}
		            ?>
		        </ul>
		    </div>
		</nav>
		
		<article>
		<?php
			if(isset($_SESSION['AdminID']))
			{
				if(isset($_POST['register']))
				{
					$UserName = mysql_real_escape_string($_REQUEST["username"]);
					$Password = mysql_real_escape_string($_REQUEST["password"]);	
					$EncryptedPass = md5($Password);
					
					$sql = "INSERT INTO Admin(Username, Password) VALUES ('$UserName', '$EncryptedPass')";
					$run = mysql_query($sql);
					
					if($run) 
					{
						echo "<center><h2>Successful!</h2></center>";
					}
				
					else 
					{
						echo "<center><h1>ERROR</h1></center>";
					}
					mysql_close();
				}
			
				else 
				{
					echo "Welcome admin " . $_SESSION['Username'] . " | <a href='logout.php'>Logout</a><hr/>
					<center><form action='addAdmin.php' method='POST'><table>
						<tr><td>Username:</td><td><input type='text' name='username' id='username'></td></tr>
						<tr><td>Password:</td><td><input type='password' name='password' id='password'></td></tr>
						<tr><td>Confirm Password:</td><td><input type='password' name='cnfPassword' id='cnfPassword'></td></tr>
						<tr><td></td><td align='right'><input type='submit' value='Register' name='register' onclick='return InputVal();'></td></tr>			
					</table>		
					</form></center>";			
				}
			}
		
			else 
			{
				echo "<center><h2>You must be logged in as admin to view this page!</h2></center>";
			}
		?>
		</article>
		
		<?php include_once('footer.php'); ?>
	</div>
</body>
</html>
