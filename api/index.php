<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Max-Age: 9000000");
header("Access-Control-Allow-Headers: *");
include 'include.php';

function http_request($url){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}  

$q = htmlspecialchars($_GET["q"]);

if($q=="totalcoins"){
        $ur1 = http_request( $website_url. "/data.php?q=totalcoins");
$j1 = json_decode($ur1, true);
print $j1;
 
}else if($q=="circulating"){
           $ur1 = http_request( $website_url. "/data.php?q=circulating");
$j1 = json_decode($ur1, true);
print $j1;
  
}else if($q=="maxcoins"){
           $ur1 = http_request( $website_url. "/data.php?q=maxcoins");
//$j1 = json_decode($ur1, true);
print $ur1;
  
}

?>