<?php
require_once('../includes/helper.php');
render('header', array('title' => 'C$75 Finance'));
?>

<ul>
	<li><a href="../html/index.php?page=quote&param=GOOG">Get quote for Google</a></li>
	<li><a href="../html/index.php?page=portfolio">View Portfolio</a></li>
	<li><a href="../html/index.php?page=logout">Logout</a></li>
</ul>

<?php
render('footer');
?>
