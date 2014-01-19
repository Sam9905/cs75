<?php
require_once('../includes/helper.php');
render('header', array('title' => 'C$75 Finance'));
?>

<ul>
	<li><form method="POST" action="quote"> 
			Search for quote: <input type="text" name="param"/>
			<input type="submit" value="Search"/>
	    </form>
	</li>
	<li><a href="buy">Buy shares</a></li>
	<li><a href="sell">Sell shares</a></li>
	<li><a href="portfolio">View Portfolio</a></li>
	<li><a href="logout">Logout</a></li>
</ul>

<?php
render('footer');
?>
