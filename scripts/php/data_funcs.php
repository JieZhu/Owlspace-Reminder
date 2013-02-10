<?php

  /*
   * Function to get Owlspace Data, given Netid/Pass
   */
  function getOwlspaceData($netid, $pass, $aaron) {
    if($aaron)
      $command = 'C:\python27\python ../python/get_stuffs.py ' . $netid . ' ' . $pass;
    else
      $command = 'python ../python/get_stuffs.py ' . $netid . ' ' . $pass;

    $data = exec($command, $retval);

    return $data;
  }

  /*
   * Makes table for website, given netid/pass
   */
  function makeTable($netid, $pass) {
    $dataJSON = getOwlspaceData($netid,$pass, 1);

    $returnString = "";

    $data = json_decode($dataJSON, true);

    $keys = array_keys($data);

    echo '<table class="table">';
    // go through and make table
    foreach (array_keys($data) as $index => $classKey) {
      foreach (array_keys($data[$classKey]) as $index => $assignmentKey) {
        echo '<tr>';
        echo '<td>', $classKey, '</td>';
        echo '<td>', $assignmentKey, '</td>';
        echo '<td>', $data[$classKey][$assignmentKey], '</td>';
        echo '</tr>';
      }
    }
    echo '</table>';

    
  }

  makeTable("yz34","zHOUYANSEN2006");
?>