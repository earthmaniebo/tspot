<! Doctype HTML>
<html>
<head>
	<title>Tspot | Edit Spot</title>
	<?php include_once('headtags.php'); ?>
	
	<script type="text/javascript">
	function InputVal() {
		var Name = document.getElementById('spotName');
		var Description = document.getElementById('description');
		var Location = document.getElementById('location');
		var Latitude = document.getElementById('lat');
		var Longitude = document.getElementById('long');
		var Source = document.getElementById('source');
		var Image = document.getElementById('file');
		var Tags = document.getElementById('tags');
		 				   
		 				if(Name.value == "" || Description.value == "" || Location.value == "" || Latitude.value = "" || Longitude.value = "" || Source.value == "" || Image.value == "" || Tags.value == "") {
		   alert("Please fill in all the required fields.");
		   return false;
		}
	}
    </script>
</head>

<body>

	<div id="container">
		<?php include_once('header.php'); include_once('connection.php');  ?>
		<nav>
			
			<div class='nav-wrap'>
			<div>
				<ul class='group' id='example-one'>
		            <li><a href='index.php'>Home</a> </li>
		            <li><a href='spots.php'>Spots</a></li>
		            <li><a href='reviews.php'>Travel Reviews</a></li>
		            <li><a href='about.php'>About</a></li>
		            <?php 
		            	if(isset($_SESSION['AdminID'])) {
								echo "<li class='current_page_item'><a href='controlPanel.php'>Control Panel</a></li>";		            	
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
      		if(isset($_POST['edit']))
      		{
      			$uploaddir = 'uploads/';
             	$uploadfile = $uploaddir . basename($_FILES['file']['name']);
      			
      			if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) 
      			{
      				$adminID = $_SESSION['AdminID'];
      				$spotID = $_POST['spotID'];
	      			$name = $_POST['spotName'];
	      			$description = $_POST['description'];
	      			$location = $_POST['location'];
	      			$latitude = $_POST['latitude'];
	      			$longitude = $_POST['longitude'];
	      			$regionID = $_POST['RegionID'];
	      			$source = $_POST['source'];
	      			$image = "uploads/" . $_FILES["file"]["name"];
	      			$tags = $_POST["tags"];
	      			
	      			$update = "UPDATE Spots SET AdminID = '$adminID', Name = '$name', Description = '$description', Location = '$location', Latitude = '$latitude', Longitude = '$longitude', RegionID = '$regionID', Source = '$source', Images = '$image', Tags = '$tags' WHERE SpotID = '$spotID'";
	      			
	      			$run = mysql_query($update);
            
                  if($run) 
                     echo "<center><h2>Spot successfuly updated!</h2></center>";
                 
                  else
                     echo "error";
                     
                }
      		}	
			     
			   else {
			   	$spotID = $_GET["spotID"];
	      		$currentSpot = mysql_query("SELECT * FROM Spots, Regions, Admin WHERE Spots.RegionID=Regions.RegionID AND Spots.AdminID = Admin.AdminID AND SpotID = '$spotID'");
	      		
	      		while($row = mysql_fetch_array($currentSpot))
				 	{
				 		$spotID = $row['SpotID'];
				 		$username = $row["Username"];
				 		$name = $row['Name'];
	      			$description = $row['Description'];
	      			$location = $row['Location'];
	      			$latitude = $row['Latitude'];
	      			$longitude = $row['Longitude'];
	      			$region = $row['RegionName'];
	      			$source = $row['Source'];
	      			$image = $row['Images'];
	      			$tags = $row["Tags"];
	      			
	      			$regions = mysql_query("SELECT * FROM Regions");
	      			
	      			echo "
			      		<center>
							<form action='editSpot.php' method='post' enctype='multipart/form-data'>
							<input type='hidden' name='spotID' id='spotID' value='$spotID'>
								<table>
									<tr>
										<td>Name:</td><td><input type='text' name='spotName' id='spotName' value='$name'></td>
									</tr>
									<tr>
										<td><span id='description'>Description</span>:</td><td><textarea rows='5' cols='28' id='description 'name='description'>$description</textarea></td>
									</tr>
									<tr>
										<td>Location:</td><td><input type='text' name='location' id='location' value='$location'></td>
									</tr>
									<tr>
										<td>Latitude:</td><td><input type='text' name='latitude' id='latitude' value='$latitude'></td>
									</tr>
									<tr>
										<td>Longitude:</td><td><input type='text' name='longitude' id='longitude' value='$longitude'></td>
									</tr>							
									";
									echo "<tr><td>Region:</td> <td><select name='RegionID'>";
									while($row = mysql_fetch_array($regions))
									{
										$RegionID = $row['RegionID'];
										$Name= $row['RegionName'];
										
										echo "<option value='" . $RegionID . "'>" . $Name . "</option>";
									}
										echo "
									</tr>
									<tr>
										<td>Source:</td><td><input type='text' name='source' id='source' value='$source'></td>
									</tr>
									<tr>
										<td>Image:</td>
			                     <td><input type='file' name='file' id='file'><td>
			                  </tr>
			                  <tr>
										<td>Tags:</td><td><input type='text' name='tags' id='tags' value='$tags'></td>
									</tr>
									<tr>
										<td></td><td align='right'><input type='submit' name='edit' id='edit value='Edit Spot' onclick='return InputVal();'></td>
									</tr>
								</table>
							</form>			
						   </center>
						<div class='clear'></div>";
	      		}		   
			   }	
			}
			
			else 
				echo "<center><h2>You must be logged in as admin to view this page!</h2></center>";
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
