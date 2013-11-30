<! Doctype HTML>
<html>
<head>
	<title>Tspot | Control Panel</title>
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
      	if(isset($_SESSION['AdminID'])) {
      		echo "Welcome admin " . $_SESSION['Username'] . " | <a href='logout.php'>Logout</a><hr/>";
	      	echo " 
				<center><div id='spots'>
					<a href='spots.php' ><section>
						<img src='images/mountain.ico' width='100px' height='100px'> View Spots
					</section></a>
					
					<a href='addSpot.php' ><section>
						<img src='images/addspot.png' width='100px' height='100px'> Add New Spot
					</section></a>
				</div>
				
				<div class='clear'></div>			
				
				<div id='reviews'>
					<a href='reviews.php' ><section>
						<img src='images/viewreviews.png' width='100px' height='100px'>View Reviews
					</section></a>
					
					<a href='addReview.php' ><section>
						<img src='images/addreview.png' width='100px' height='100px'> Add a Review
					</section></a>
				</div>
				
				<div class='clear'></div>
				
				<div id='admin'>
					<a href='adminList.php' ><section>
						<img src='images/viewadmins.png' width='100px' height='100px'> View Admins
					</section></a>
					
					<a href='addAdmin.php' ><section>
						<img src='images/newadmin.png' width='100px' height='100px'>Add New Admin
					</section></a>
				</div>
				
				<div class='clear'></div></center>";
			}
			
			else 
				echo "<center><h2>You must be logged in as admin to view this page!</h2></center>";
		?>
			
		</article>
		<br><br><br>
		<?php include_once('footer.php'); ?>
	</div>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    </body>
</html>
