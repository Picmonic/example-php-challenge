<?php
  //Error checking
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(-1);

  //include header
  include('resources/templates/header.php');
  echo '<div>';
 
  //require commits table builder
  include('resources/github.php');
  echo '</div>';

  //require footer
  include('resources/templates/footer.php');  
?>