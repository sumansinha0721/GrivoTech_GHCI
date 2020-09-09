
<?php
function badWordFilter($data){
    $originals = array("douche","punch","damn");
    $replacements = array("fri","love","wow");
    $data = str_ireplace($originals,$replacements,$data);
    return $data;
}
$myData = "Hi douche, damn I want to punch you for a good cause!";
$cleaned = badWordFilter($myData);
echo $cleaned;
?>