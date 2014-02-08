<?php
    $doc=new DomDocument;
    $doc->validateOnParse=true;
    $doc->Load('shopmenu.xml');
    $s=simplexml_import_dom($doc);

	$total=$_SESSION['t'];
	$items=array();
	$items=$_SESSION['it'];
    foreach($s->pizzas->pizza as $pizza){
      if( isset($_GET[(string)$pizza['name']]) ){
        if( isset($_GET[(string)$pizza['name']."type"]) ){
          if($_GET[(string)$pizza['name']."type"]==$pizza->price[0]){
            $str="small";
          }else{
            $str="large";
          }
          $total=$total+(float)$_GET[(string)$pizza['name']."type"];
          array_push($items,(string)$pizza['name']." pizza-".$str);
        }else{
          $total=$total+(float)$pizza->price[0];
          array_push($items,(string)$pizza['name']." pizza-small");
        }
      }
    }
	 $_SESSION['t'] =$total;
	 $_SESSION['it'] =$items;
?>

   <table width=100% cellspacing="50">
    <tr>
    <td class="box" weight=.7>
      <form action=" <?php $_SERVER['PHP_SELF'] ?> " method='get' >
      <div><h1 style="float:left;" >PIZZAS</h1>
      <h3 style="float:right"><input type="submit" value="add to cart"></h3></div>
      <br/>
      <ul>
			<li> <input type='hidden' name='page' value='pizzas'> </li>
         <?php
            foreach($s->pizzas->pizza as $pizza){ ?>
              <li>
              <input type='checkbox' name='<?= $pizza["name"] ?>' value='<?= $pizza["name"] ?>'>
              <span><?php echo $pizza['name'] ?></span></li>
              <div> Price :
              <input type='radio' name='<?= $pizza["name"]."type" ?>'
               value='<?= $pizza->price[0] ?>' >
               small = $ <?php echo $pizza->price[0] ?>
               <input type='radio' name='<?= $pizza["name"]."type" ?>'
                value='<?= $pizza->price[1] ?>'>
               large = $ <?php echo $pizza->price[1] ?>
            <?php }
         ?>
      </ul>
      </form>
      <form action="<?php $_SERVER['PHP_SELF'] ?> ">
		 <input type='hidden' name='page' value='final'> 
        <h3 style="float:center"><input type="submit" value="finalise"></h3>
      </form>
	  <form action="<?php $_SERVER['PHP_SELF'] ?> ">
		 <input type='hidden' name='page' value='clear'> 
        <h3 style="float:center"><input type="submit" value="clear all"></h3>
      </form>
    </td>
    <?php require('cart.php'); ?>
    </tr>
   </table>