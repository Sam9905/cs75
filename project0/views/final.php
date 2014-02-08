<?php
   if(isset($_SESSION['it'])){
     $to="sb@sth.com";
     $subject="order";
     $order=" ";
     foreach($_SESSION['it'] as $it){
        $order=$order."<br/>".$it;
     }
	 $total=$_SESSION['t'];
     $body="You have ordered :".$order.". <br/><br/> Price :$ ".$total;
     $headers="From:sb@sth.com";
     mail($to,$subject,$body,$headers);
   }else{
     $body="Ordered something to finalise";
   }
   
   session_destroy();
   unset($_SESSION['t']);
   unset($_SESSION['it']);
?>
<div class="box" style="font-size:20px; text-align:center">
 <?php echo $body; ?>
</div>