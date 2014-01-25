<?php
require_once('../includes/helper.php');
render('header', array('title' => 'Buy'));
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
        <img src="../images/man.jpg" alt="money" class="img-rounded img-responsive">
    </div>
    <div class="col-md-4 col-md-offset-1">
      	<form role="form" method="POST" action="buy"> 
      		<div class="form-group">
      			<label>Symbol:</label>
      			<input type="text" class="form-control" name="symbol" placeholder="Type Symbol"/>
      		</div>
      		<div class="form-group">
      			<label>Number of shares :</label>
      			<input type="text" class="form-control" name="shares" placeholder="Type number of shares"/>
      		</div>
			<button type="submit" class="btn btn-success">Buy</button>
		</form>
    </div>
</div>

<?php
render('footer');
?>