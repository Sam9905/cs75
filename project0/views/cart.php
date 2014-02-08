
  <td class="cart">
      <h1>Hi, <?php echo ""?> </h1>
      <div>
        <h3>
          Items : <?php  foreach($_SESSION['it'] as $it){ echo $it."<br/>";} ?>
        </h3>
        <h3>Total: $<?php echo $_SESSION['t'] ; ?></h3>
      </div>
  </td>