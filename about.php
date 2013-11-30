<! Doctype HTML>
<html>
<head>
	<title>Tspot | About</title>
	<?php include_once('headtags.php'); ?>
	<script
	src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
	</script>
	
	
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
		            <li class='current_page_item'><a href='about.php'>About</a></li>
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
