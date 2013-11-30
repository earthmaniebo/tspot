<! Doctype HTML>
<html>
<head>
	<title>Tspot | Spots</title>
	<?php include_once('headtags.php'); ?>
</head>

<body>

	<div id="container">
		<?php include_once('header.php'); include_once('connection.php'); ?>
		<nav>
			
			<div class='nav-wrap'>
			<div>
				<ul class='group' id='example-one'>
		            <li><a href='index.php'>Home</a> </li>
		            <li class='current_page_item'><a href='spots.php'>Spots</a></li>
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
			 <?php 
				if(isset($_SESSION['AdminID']))
				{
					if(isset($_GET["action"]))
					{
						$spotID = $_GET["spotID"];
						$delete = mysql_query("DELETE FROM Spots WHERE SpotID='$spotID'");
						header("Location: spots.php"); 					
					}		
							
					else 
					{
						echo "<strong>Luzon</strong><hr>";
						$luzon = mysql_query("SELECT * FROM Spots WHERE RegionID=1");
					 	while($row = mysql_fetch_array($luzon))
						{
							$spotID = $row['SpotID'];
							$name = $row['Name'];
							$image = $row['Images'];
							
							echo "<a href='viewSpot.php?spotID=$spotID'><div class='gallery'><img src='$image' width='150px' height='150px'/><br>$name";
							if(isset($_SESSION['AdminID']))
								echo "<br><a href='editSpot.php?spotID=$spotID'><input type='button' value='Edit'></a><a href='spots.php?spotID=$spotID&action=delete'><input type='button' name='delete' value='Delete'></a>";
							
							echo"</div></a>";
						}
					
						echo "<div class='clear'></div><br><br>
			 			<strong>Visayas</strong><hr>";
			 			
			 			$visayas = mysql_query("SELECT * FROM Spots WHERE RegionID=2");
					 	while($row = mysql_fetch_array($visayas))
						{
							$spotID = $row['SpotID'];
							$name = $row['Name'];
							$image = $row['Images'];
							
							echo "<a href='viewSpot.php?spotID=$spotID'><div class='gallery'><img src='$image' width='150px' height='150px'/><br>$name";
							if(isset($_SESSION['AdminID']))
								echo "<br><a href='editSpot.php?spotID=$spotID'><input type='button' value='Edit'></a><a href='spots.php?spotID=$spotID&action=delete'><input type='button' name='delete' value='Delete'></a>";
							
							echo"</div></a>";
						}
						echo "<div class='clear'></div><br><br>
			 			<strong>Mindanao</strong><hr>";
			 			
					 	$mindanao = mysql_query("SELECT * FROM Spots WHERE RegionID=3");
					 	while($row = mysql_fetch_array($mindanao))
						{
							$spotID = $row['SpotID'];
							$name = $row['Name'];
							$image = $row['Images'];
							
							echo "<a href='viewSpot.php?spotID=$spotID'><div class='gallery'><img src='$image' width='150px' height='150px'/><br>$name";
							if(isset($_SESSION['AdminID']))
								echo "<br><a href='editSpot.php?spotID=$spotID'><input type='button' value='Edit'></a><a href='spots.php?spotID=$spotID&action=delete'><input type='button' name='delete' value='Delete'></a>";
							
							echo"</div></a>";
						}
					}
				}
			
				else 
				{
					echo "<strong>Luzon</strong><hr>";
					$luzon = mysql_query("SELECT * FROM Spots WHERE RegionID=1");
				 	while($row = mysql_fetch_array($luzon))
					{
						$spotID = $row['SpotID'];
						$name = $row['Name'];
						$image = $row['Images'];
						
						echo "<a href='viewSpot.php?spotID=$spotID'><div class='gallery'><img src='$image' width='150px' height='150px'/><br>$name";
						if(isset($_SESSION['AdminID']))
							echo "<br><a href='editSpot.php?spotID=$spotID'><input type='button' value='Edit'></a><a href='spots.php?spotID=$spotID&action=delete'><input type='button' name='delete' value='Delete'></a>";
						
						echo"</div></a>";
					}
				
					echo "<div class='clear'></div><br><br>
		 			<strong>Visayas</strong><hr>";
		 			
		 			$visayas = mysql_query("SELECT * FROM Spots WHERE RegionID=2");
				 	while($row = mysql_fetch_array($visayas))
					{
						$spotID = $row['SpotID'];
						$name = $row['Name'];
						$image = $row['Images'];
						
						echo "<a href='viewSpot.php?spotID=$spotID'><div class='gallery'><img src='$image' width='150px' height='150px'/><br>$name";
						if(isset($_SESSION['AdminID']))
							echo "<br><a href='editSpot.php?spotID=$spotID'><input type='button' value='Edit'></a><a href='spots.php?spotID=$spotID&action=delete'><input type='button' name='delete' value='Delete'></a>";
						
						echo"</div></a>";
					}
					echo "<div class='clear'></div><br><br>
		 			<strong>Mindanao</strong><hr>";
		 			
				 	$mindanao = mysql_query("SELECT * FROM Spots WHERE RegionID=3");
				 	while($row = mysql_fetch_array($mindanao))
					{
						$spotID = $row['SpotID'];
						$name = $row['Name'];
						$image = $row['Images'];
						
						echo "<a href='viewSpot.php?spotID=$spotID'><div class='gallery'><img src='$image' width='150px' height='150px'/><br>$name";
						if(isset($_SESSION['AdminID']))
							echo "<br><a href='editSpot.php?spotID=$spotID'><input type='button' value='Edit'></a><a href='spots.php?spotID=$spotID&action=delete'><input type='button' name='delete' value='Delete'></a>";
						
						echo"</div></a>";
					}		
				}
			 ?>
			 <div class="clear"></div><br><br>
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
