<?php

  /*
   * Function to get Owlspace Data, given Netid/Pass
   */
  function getOwlspaceData($netid, $pass) {
    $data = system('python ' . $netid . $pass, $retval);
  }

?>