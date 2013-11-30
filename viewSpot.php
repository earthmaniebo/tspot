<! Doctype HTML>
<html>
<head>
	<title>Tspot | 
	<?php 
		include_once('connection.php');
	 	$spotID = $_GET['spotID'];
	 	$currentSpot = mysql_query("SELECT * FROM Spots, Regions, Admin WHERE Spots.RegionID=Regions.RegionID AND Spots.AdminID = Admin.AdminID AND SpotID = '$spotID'");	
	 	while($row = mysql_fetch_array($currentSpot))
	 	{
	 		$name = $row['Name'];
	 		echo $name;
	 	}
			 ?>
	</title>
	<?php include_once('headtags.php'); ?>
</head>

<body>

	<div id="container">
		<?php include_once('header.php'); ?>
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
			 	$spotID = $_GET['spotID'];
			 	$currentSpot = mysql_query("SELECT * FROM Spots, Regions, Admin WHERE Spots.RegionID=Regions.RegionID AND Spots.AdminID = Admin.AdminID AND SpotID = '$spotID'");
			 	
			 	while($row = mysql_fetch_array($currentSpot))
			 	{
			 		$username = $row["Username"];
			 		$name = $row['Name'];
      			$description = $row['Description'];
      			$location = $row['Location'];
      			$region = $row['RegionName'];
      			$source = $row['Source'];
      			$image = $row['Images'];
      			$tags = $row["Tags"];
      			$latitude = $row['Latitude'];
	      		$longitude = $row['Longitude'];
	      		
      			echo "<strong>" . $name . "</strong> | posted by " . $username . "<hr><br>";
      			echo "<center><img src='$image' width='600px' height='400px'/></center><br>";
      			echo "<strong>Location:</strong> " . $location . "<br>";
      			?>
      			<script>
						var latitude = <?php echo json_encode($latitude); ?>;
						var longitude = <?php echo json_encode($longitude); ?>;
						function initialize()
						{
						 var mapProp = {
						 center: new google.maps.LatLng(latitude,longitude),
						 zoom:10,
						 mapTypeId: google.maps.MapTypeId.ROADMAP
						  };
						  var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
						  
						  marker=new google.maps.Marker({
						  position:new google.maps.LatLng(latitude,longitude),
						  animation:google.maps.Animation.BOUNCE
						  });
						
						  marker.setMap(map);
						}
						
						function loadScript()
						{
						  var script = document.createElement("script");
						  script.type = "text/javascript";
						  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false&callback=initialize";
						  document.body.appendChild(script);
						}
						
						window.onload = loadScript;
					</script>
      			<?php
      			echo "<center><div id='googleMap' style='width:500px;height:380px;'></div></center><br>";
      			echo "<strong>Region:</strong> " . $region . "<br>";
      			echo "<p align='justify'>". $description . "</p>";
      			echo "<em>Source: " . $source . "</em>";
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
