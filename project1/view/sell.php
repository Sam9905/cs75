<?php
require_once('../includes/helper.php');
render('header', array('title' => 'Sell'));
?>

                <p class="navbar-text navbar-right">Signed In</a></p>
            <button type="button" class="btn btn-warning navbar-btn navbar-right" href="logout">Logout</button>
        </div>
    </div>
</div>
<br/>
<br/>
<br/>
<br/>
<div class="row">
    <div class="col-md-4 col-md-offset-1">
        <img src="http://3.bp.blogspot.com/-D2qQGjKwAuU/UvX5DeWKOuI/AAAAAAAAABw/mltAVD-o_Mo/s1600/invest.jpg" alt="invest" class="img-rounded img-responsive">
    </div>
    <div class="col-md-4 col-md-offset-1">
      	<form role="form" method="POST" action="sell"> 
			<?php
			foreach($holdings as $holding)
				print htmlspecialchars($holding["symbol"]).
			 	"<div class='radio'><input type='radio' name='symbol' value='{$holding["symbol"]}'/></div>" ;
		    ?>
			<button type="submit" class="btn btn-success">Sell</button>
		</form>
    </div>
</div>


<?php
render('footer');
?> 