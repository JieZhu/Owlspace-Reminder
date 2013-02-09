<?php

  /*
   * Function to get Owlspace Data, given Netid/Pass
   */
  function getOwlspaceData($netid, $pass) {
    $command = 'python ../python/get_stuffs.py ' . $netid . ' ' . $pass;
    $data = system($command, $retval);

    echo $data;

    return $data;
  }

  echo 'starting call';
  echo getOwlspaceData("yz34","zHOUYANSEN2006");
  echo 'ending call';
?>