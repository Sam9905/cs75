<?php
require_once('../includes/helper.php');
if (!isset($quote_data["symbol"]))
{
    // No quote data
    render('header', array('title' => 'Quote'));
    print "No symbol was provided, or no quote data was found.";
}
else
{
    // Render quote for provided quote data
    render('header', array('title' => 'Quote for '.htmlspecialchars($quote_data["symbol"])));
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
        <img src="http://3.bp.blogspot.com/--U6ZJBKgIS0/UvX5E8u2ftI/AAAAAAAAACA/UwUDchAHgPA/s1600/GoldStocks.jpg" alt="bonds and stocks" class="img-rounded img-responsive">
    </div>
    <div class="table-responsive col-md-4">
        <table class="table table-bordered table-hover table-condensed">
            <tr>
                <th>Symbol</th>
                <th>Name</th>
                <th>Last Trade</th>
            </tr>
            <tr>
                <td><?= htmlspecialchars($quote_data["symbol"]) ?></td>
                <td><?= htmlspecialchars($quote_data["name"]) ?></td>
                <td><?= htmlspecialchars($quote_data["last_trade"]) ?></td>
            </tr>
        </table>
    </div>
</div>

<?php
}

render('footer');
?>
