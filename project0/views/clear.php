<?php
   session_destroy();
   unset($_SESSION['t']);
   unset($_SESSION['it']);
   render("home");
?>
