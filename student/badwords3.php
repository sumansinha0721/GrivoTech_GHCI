<script=text/javascript>
function badWordFilter($data){
    $originals = array("douche","punch","damn");
    $replacements = array("fri","love","wow");
    $data = str_ireplace($originals,$replacements,$data);
    return $data;
}
<?php
//  $myData = document.getElementsByName("complain");
  var $myData = document.getElementByById("txtarea1");
  $cleaned = badWordFilter($myData);
  echo $cleaned;
 ?>
