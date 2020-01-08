<?php
include('./vendor/autoload.php');
$inputVal  =  'kuldeep singh "PHP Professional".';
$encrypt   =  MyApp\cipher::encrypt($inputVal);
$decrypt   =  MyApp\cipher::decrypt($encrypt);
echo 'Input Value : '.$inputVal;
echo '<br />';
echo 'Encrypted Value : '.$encrypt;
echo '<br />';
echo 'Decrypted Value : '.$decrypt;
?>