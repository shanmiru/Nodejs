<?php
error_reporting(0);
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


function g($s, $t, $r) {
  return explode($r, explode($t, $s)[1])[0];
}

if(!is_dir('cookie')) {
  mkdir('cookie');
}
$_SESSION['rotation'] = [
  'proxy' => 'gate.dc.smartproxy.com:7000',
  'pwd' => 'lemoncutie:asdzxc12'
];

function random($length = 10){
  $str = '';
  $_s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwyxz0123456789';
  $strlen = strlen($_s);
  for($x = $length; $x != 0; $x--){
    $str .= $_s[mt_rand(1, $strlen)-1];
  }
  return $str;
}

$list = $_GET['lista'];
$list = explode('|',$list);
$cc = $list[0];
$mm = $list[1];
$yyyy = $list[2];
$name= 'lloud kun'

$adyen_script = 'lemon_'.random().'.txt';
  $time = gmdate("Y-m-d\TH:i:s\Z");
  file_put_contents(($adyen_script), "const adyenEncrypt = require('node-adyen-encrypt')(25);
  const adyenKey = '10001|9972DA65FCD4A95BE157F53CA35AA7799F95E336BADE86BE16141218887EF24A813D0C2466B5CAB1593EA897F936446DE514E557F067A84138B8DD74CCFF38ABF826F440AF50F235CF33233091A257550588E9FA681A4D004E276610917F64BA16A90D776B9576CCDC51AFBF50D705E58166E924EDB86C6E8C741C19A151DF005D200E95337AA05ABA493275F5CA2EEBB1E5372B3C4FEA2718F2A06C79DFFBD4BF33C94A7AE96F8D81054F9DD8DE9C130A6E4E4293406064122D1656F88706D51ECC6F7A82C80141C05C18696475D89989398826A4AECB9D0BEFC451C7153CB5122177313372F740460064ED631C03474E749ABF1A3BABEBF6076E5F21FD233B';
  const options = {};
  const cardData = {
    number : '$cc',
    holderName : '$name',
    expiryMonth : '$mm',
    expiryYear : '$yyyy',
    generationtime : '$time'
  };
  const cseInstance = adyenEncrypt.createEncryption(adyenKey, options);
  const dataEncrypted = cseInstance.encrypt(cardData);
  console.log(dataEncrypted);");
  echo $encrypted = trim(shell_exec('node '.$adyen_script));
  unlink($adyen_script);

?>
