<! Doctype HTML>
<html>
<head>
	<title>Tspot | Admin Login</title>
	<?php include_once('headtags.php'); ?>
	<script type="text/javascript" >
		function InputVal() 
		{
			var username = document.getElementById('username');
			var password = document.getElementById('password');
			
			var passwordVal = password.value;
			var passwordLength = passwordVal.length;
			
			if(passwordLength < 6)
			{
				alert("Password must at least contains 6 characters");
				return false;
			}
			
			if(username.value == "" || password.value == "") {
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
			<div>
				<ul class='group' id='example-one'>
		            <li class='current_page_item'><a href='index.php'>Home</a> </li>
		            <li><a href='spots.php'>Spots</a></li>
		            <li><a href='reviews.php'>Travel Reviews</a></li>
		            <li><a href='about.php'>About</a></li>
		            <div id="searchbar"><form action="search.php" method="GET" style="display:inline;"><input type="text"><input type="submit" value="Search"></form></div>
		        </ul>
		    </div>
		    </div>
		</nav>
		
		<article>
		<?php 
			if(!isset($_SESSION['AdminID']))
			{
				if(isset($_POST['login'])) 
				{
					$login = mysql_query("SELECT * FROM Admin WHERE (Username = '" . mysql_real_escape_string($_POST['username']) . "') and (Password = '" . mysql_real_escape_string(md5($_POST['password'])) . "')");
					
					while($row = mysql_fetch_array($login))
					{
						if(mysql_real_escape_string(md5($_POST['password'])) == $row['Password'])
						{
							$testLogin = true;
							$_SESSION['AdminID'] = $row['AdminID'];
							$_SESSION['Username'] = $row['Username'];
							header('Location: controlPanel.php');
						}
					}	
					
					if($testLogin == false)
						{
							echo "Admin Login<hr><center><form action='login.php' method='POST'>
							<table>
								<tr><td>Username:</td><td><input type='text' name='username' id='username'></td></tr>
								<tr><td>Password:</td><td><input type='password' name='password' id='password'></td></tr>
								<tr><td></td><td align='right'><input type='submit' value='Login' name='login' onclick='return InputVal();'></td></tr>			
							</table>			
							</form>
							<h4>Invalid login!</h4></center>";
						}
				}
			
				else 
				{
					echo "Admin Login<hr><center><form action='login.php' method='POST'>
					<table>
						<tr><td>Username:</td><td><input type='text' name='username' id='username'></td></tr>
						<tr><td>Password:</td><td><input type='password' name='password' id='password'></td></tr>
						<tr><td></td><td align='right'><input type='submit' value='Login' name='login' onclick='return InputVal();'></td></tr>			
					</table>			
					</form></center>";				
				}	
			}
		
			else 
			{
				header('Location: controlPanel.php');
			}
		?>
		</article>
		
		<?php include_once('footer.php'); ?>
	</div>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    </body>
</html>
