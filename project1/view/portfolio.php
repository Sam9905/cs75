<?php
require_once('../includes/helper.php');
render('header', array('title' => 'Portfolio'));
?>

<table>
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
    <tr>
        <th>Cash</th>
        <th>$<?= htmlspecialchars($cash) ?></th>
    </tr>
</table>

<?php
render('footer');
?>
