<! Doctype HTML>
<html>
<head>
	<title>Tspot | Admin List</title>
	<?php include_once('headtags.php'); ?>
</head>

<body>

	<div id="container">
		<?php include_once('header.php'); include_once('connection.php');  ?>
		<nav>
			
			<div class='nav-wrap'>
			<div>
				<ul class='group' id='example-one'>
		            <a href='index.php'>Home</a> </li>
		            <li><a href='spots.php'>Spots</a></li>
		            <li><a href='reviews.php'>Travel Reviews</a></li>
		            <li><a href='about.php'>About</a></li>
		            <?php 
		            	if(isset($_SESSION['AdminID'])) {
								echo "<li><a href='controlPanel.php'>Control Panel</a></li>";		            	
		            	}
		            ?>
		            <div id="searchbar"><form action="search.php" method="GET" style="display:inline;"><input type="text"><input type="submit" value="Search"></form></div>
		        </ul>
		    </div>
		    </div>
		</nav>
		
		
		<article>
		<table cellpadding="5" cellspacing="5" align="center" >
		<?php
		echo "Welcome admin " . $_SESSION['Username'] . " | <a href='logout.php'>Logout</a><hr/>";
		if(isset($_SESSION['AdminID'])) 
		{
			
		
			if(isset($_GET['action']))
			{
				$adminID = $_GET["adminID"];
				$delete = mysql_query("DELETE FROM Admin WHERE AdminID='$adminID'");
				header("Location: adminList.php");		
			} 
			
			else 
			{
				$admin = mysql_query("SELECT * FROM Admin");
				echo "<th>Admin ID</th>
						<th>Username</th>";
				while($row = mysql_fetch_array($admin))
				{
					$adminID = $row["AdminID"];
					$username= $row["Username"];
					
					echo "<tr><td>$adminID</td><td>$username</td><td><form action='adminList.php' method='GET'><input type='hidden' value='$adminID' name='adminID'><input type='submit' name='action' value='Delete'></form></td></tr>";
				}
			}
		}
		
		else 
				echo "<center><h2>You must be logged in as admin to view this page!</h2></center>";
		?>
		</table>		
			
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
