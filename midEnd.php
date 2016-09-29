<?php

$loginInfo=array("user"=>$_POST["User"], "pass"=>$_POST["Pass"]);
$userfields="user=".$_POST["User"]."&pass=".$_POST["Pass"]."&uuid=0xACA021";

$urlBack="https://web.njit.edu/~ejh7/backEnd.php";
$urlNJIT="https://cp4.njit.edu/cp/home/login";

//BACK END POST
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $urlBack);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $loginInfo);

$curlResult = curl_exec($ch);
curl_close($ch);
echo "$curlResult";

//NJIT POST
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $urlNJIT);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $userfields);
$response = curl_exec($ch);
curl_close($ch);

//Check for successful login
if(strpos($response, "loginok") === false){
	$result = "Unsuccessful Log on to NJIT";} 
else{
    $result = "Successful log on to NJIT";}

echo "<br>$result";
?>
