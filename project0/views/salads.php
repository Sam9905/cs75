<?php
    $doc=new DomDocument;
    $doc->validateOnParse=true;
    $doc->Load('shopmenu.xml');
    $s=simplexml_import_dom($doc);
    $total=$_SESSION['t'];
    $items=array();
    $items=$_SESSION['it'];
    foreach($s->salads->salad as $salad){
      if( isset($_GET[(string)$salad['name']]) ){
        if( isset($_GET[(string)$salad['name']."type"]) ){
          if($_GET[(string)$salad['name']."type"]==$salad->price[0]){
            $str="small";
          }else{
            $str="large";
          }
          $total=$total+(float)$_GET[(string)$salad['name']."type"];
          array_push($items,(string)$salad['name']." salad-".$str);
        }else{
          $total=$total+(float)$salad->price[0];
          array_push($items,(string)$salad['name']." salad-small");
        }
      }
    }
   $_SESSION['t'] =$total;
   $_SESSION['it'] =$items;

?>
<table width=100% cellspacing="50">
    <tr>
    <td class="box" weight=.7>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method='get'>
      <div><h1 style="float:left;">SALADS</h1>
      <h3 style="float:right"><input type="submit" value="add to cart"></h3></div>
      <br/>
      <ul> <input type='hidden' name='page' value='salads'> </li>
         <?php
            foreach($s->salads->salad as $salad){ ?>
              <li>
              <input type='checkbox' name='<?= $salad["name"] ?>' value='<?= $salad["name"] ?>'>
              <span><?php echo $salad['name'] ?></span></li>
              <div> Price :
              <input type='radio' name='<?= $salad["name"]."type" ?>'
               value='<?= $salad->price[0] ?>' >
               small = $ <?php echo $salad->price[0] ?>
               <input type='radio' name='<?= $salad["name"]."type" ?>'
                value='<?= $salad->price[1] ?>'>
               large = $ <?php echo $salad->price[1] ?>
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
