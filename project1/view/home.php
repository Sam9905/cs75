<?php
require_once('../includes/helper.php');
render('header', array('title' => 'C$75 Finance'));
?>


			<p class="navbar-text navbar-right">Signed In</a></p>
			<a class="btn btn-warning navbar-btn navbar-right" href="logout">Logout</a>
		</div>
	</div>
</div>
<br/>
<br/>
<br/>
<br/>
<div class="container">
	<div class="jumbotron" style="background-image:url(http://4.bp.blogspot.com/-bc7LBT39LHM/UvX4El05xEI/AAAAAAAAABo/GzenV-oZQkY/s1600/backblack.jpg);">
		<h1 style="color:#FFCC00;">Stocks and Shares</h1>
		<p style="color:#FFCC00;">Invest your money</p>
		<a class="btn btn-success" href="portfolio">View Portfolio</a>
	</div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-4">
		<h3>Search for QUOTE</h3>
		<form role="form" method="POST" action="quote"> 
			<div class="form-group">
				<input class="form-control" type="text" name="param" placeholder="Type in Symbol"/>
			</div>
			<button type="submit" value="Search" class="btn btn-success">Search</button>
	    </form>
	</div>
	<div class="col-md-4">
		<h3>You can buy shares</h3>
		<a class="btn btn-success" href="buy">Buy shares</a>
	</div>
	<div class="col-md-4">
		<h3>You can sell shares</h3>
		<a class="btn btn-success" href="sell">Sell shares</a>
	</div>
</div>
</div>
<?php
render('footer');
?>
