<! Doctype HTML>
<html>
<head>
	<title>Tspot | Home</title>
	<?php include_once('headtags.php'); ?>
</head>

<body>

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
		
		<section id='imageSlider'>
			 <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <a href="viewSpot.php?spotID=1" ><img src="uploads/biri.jpg" title="Biri Rock Formations" /></a>
                <a href="viewSpot.php?spotID=2" ><img src="uploads/bucas.jpg" title="Bucas Grande Island" /></a>
                <a href="viewSpot.php?spotID=3" ><img src="uploads/gumasa.jpg" title="Gumasa White Beach" /></a>
                <a href="viewSpot.php?spotID=4" ><img src="uploads/cantilan.jpg" title="Charming Cantilan" /></a>
            </div>
        </div>
		</section>
		
		   <article id='preview'>
			<section id='left'>
			<h1>BOSS Charles BALITA?????</h1>
			</section>
						
			<section id='center'>
			
			</section>
			
			<section id='right'>
			
			</section>
		
			<div class='clear'></div>
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
