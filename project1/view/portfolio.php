<?php
require_once('../includes/helper.php');
render('header', array('title' => 'Portfolio'));
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
        <img src="../images/bondstock.jpg" alt="bonds and stocks" class="img-rounded img-responsive">
    </div>
    <div class="table-responsive col-md-4">
        <table class="table table-bordered table-hover table-condensed">
            <tr>
                <th>Symbol</th>
                <th>Shares</th>
            </tr>
        <?php
        foreach ($holdings as $holding)
        {
            print "<tr>";
            print "<td>" . htmlspecialchars($holding["symbol"]) . "</td>";
            print "<td>" . htmlspecialchars($holding["shares"]) . "</td>";
            print "</tr>";
        }
        ?>
            <tr class="warning">
                <th>Cash</th>
                <th>$<?= htmlspecialchars($cash) ?></th>
            </tr>
        </table>
    </div>
</div>
<?php
render('footer');
?>
