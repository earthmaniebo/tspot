<! Doctype HTML>
<html>
<head>
	<title>Tspot | Add Spot</title>
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
      		if(isset($_POST['add']))
      		{
      			$uploaddir = 'uploads/';
             	$uploadfile = $uploaddir . basename($_FILES['file']['name']);
      			
      			if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) 
      			{
      				$adminID = $_SESSION['AdminID'];
	      			$name = $_POST['spotName'];
	      			$description = $_POST['description'];
	      			$location = $_POST['location'];
	      			$latitude = $_POST['latitude'];
	      			$longitude = $_POST['longitude'];
	      			$regionID = $_POST['RegionID'];
	      			$source = $_POST['source'];
	      			$image = "uploads/" . $_FILES["file"]["name"];
	      			$tags = $_POST["tags"];
	      			
	      			$insert = "INSERT INTO Spots (AdminID, Name, Description, Location, Latitude, Longitude, RegionID, Source, Images, Tags) VALUES ('$adminID', '$name', '$description', '$location', '$latitude', '$longitude', '$regionID', '$source', '$image', '$tags')";
	      			
	      			$run = mysql_query($insert);
            
                  if($run) 
                     echo "<center><h2>Spot successfuly added!</h2></center>";
                 
                  else
                     echo "Error";
	      		}
      		}	
      		
      		else 
      		{
	      		$regions = mysql_query("SELECT * FROM Regions");
	      		echo "Welcome admin " . $_SESSION['Username'] . " | <a href='logout.php'>Logout</a><hr/>";
		      	echo "
		      		<center>
						<form action='addSpot.php' method='post' enctype='multipart/form-data'>
							<table>
								<tr>
									<td>Name:</td><td><input type='text' name='spotName' id='spotName'></td>
								</tr>
								<tr>
									<td><span id='description'>Description</span>:</td><td><textarea rows='5' cols='28' id='description 'name='description'></textarea></td>
								</tr>
								<tr>
									<td>Location:</td><td><input type='text' name='location' id='location'></td>
								</tr>		
								<tr>
									<td>Latitude:</td><td><input type='text' name='latitude' id='latitude'></td>
								</tr>
								<tr>
									<td>Longitude:</td><td><input type='text' name='longitude' id='longitude'></td>
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
									<td>Source:</td><td><input type='text' name='source' id='source'></td>
								</tr>
								<tr>
									<td>Image:</td>
		                     <td><input type='file' name='file' id='file'><td>
		                  </tr>
		                  <tr>
									<td>Tags:</td><td><input type='text' name='tags' id='tags'></td>
								</tr>
								<tr>
									<td></td><td align='right'><input type='submit' name='add' id='add' value='Add Spot' onclick='return InputVal();'></td>
								</tr>
							</table>
						</form>			
					   </center>
					<div class='clear'></div>";
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
