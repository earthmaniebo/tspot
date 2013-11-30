<! Doctype HTML>
<html>
<head>
	<title>Tspot | Add Review</title>
	<?php include_once('headtags.php'); ?>
	
	<script type="text/javascript">
	function InputVal() {
				var Title = document.getElementById('title');
            var Content = document.getElementById('content');
            var Source = document.getElementById('source');
    				   
 				if(Title.value == "" || Content.value == "" || Source.value == "") {
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
      			
   				$adminID = $_SESSION['AdminID'];
   				$title = $_POST['title'];
   				$spotID= $_POST['SpotID'];
      			$content= $_POST['content'];
      			$source = $_POST['source'];
      			
      			$insert = "INSERT INTO Reviews (SpotID, AdminID, Title, Content, Source) VALUES ('$spotID', '$adminID', '$title', '$content', '$source')";
      			
      			$run = mysql_query($insert);
         
              if($run) 
                 echo "<center><h2>Review successfuly added!</h2></center>";
              
              else
                  echo "Error";
               
	      		
      		}	
      		
      		else 
      		{
	      		$spots = mysql_query("SELECT * FROM Spots");
	      		echo "Welcome admin " . $_SESSION['Username'] . " | <a href='logout.php'>Logout</a><hr/>";
		      	echo "
		      		<center>
						<form action='addReview.php' method='post' enctype='multipart/form-data'>
							<table>";
								echo "<tr><td>Choose a spot to review:</td> <td><select name='SpotID'>";
								while($row = mysql_fetch_array($spots))
								{
									$SpotID = $row['SpotID'];
									$Name= $row['Name'];
									
									echo "<option value='" . $SpotID . "'>" . $Name . "</option>";
								}
									echo "
								</tr>
								<tr>
									<td>Title:</td><td><input type='text' name='title' id='title'></td>
								</tr>
								<tr>
									<td>Content:</td><td><textarea rows='5' cols='31' id='content' name='content'></textarea></td>
								</tr>
								<tr>
									<td>Source:</td><td><input type='text' name='source' id='source'></td>
								</tr>
								<tr>
									<td></td><td align='right'><input type='submit' name='add' id='add' value='Add Review' onclick='return InputVal();'></td>
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
