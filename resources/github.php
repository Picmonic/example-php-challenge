<?php
  //Autoload all the packages
  require_once('vendor/autoload.php');

  //Create new Github Api Client
  $client = new \Github\Client();

  //Find store and count joyent Commits, doesnt paginate
  $commits = $client->api('repo')->commits()->all('joyent', 'node', array('sha' => 'master'));
  $commitsLength = count ($commits);

  //prints table headers
  echo '<table><tr><th>Name</th><th>Commit ID</th></tr>';

  //loops over commits array and prints table row
  for($i=0; $i<$commitsLength; $i++){
    //sets bg color of row if SHA ends in numeric char
    $colorChar = is_numeric(substr($commits[$i]["sha"], -1));
    $color = "black";
    
    if($colorChar == 1){
      $color="blue";
    }//ends if

    //prints table row
    echo '<tr class="'. $color . '">';
    echo '<td>' . $commits[$i]["commit"]['committer']['name'] . '</td>';
    echo '<td>' . $commits[$i]["sha"] . '</td>';
    echo '</tr>';
  }//ends for loop
  echo '</table>';
?>