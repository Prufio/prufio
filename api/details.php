<?php
include 'include.php';
$a ='C7C40A6aDEA';
$b ='0xAdf72';
$api_url = 'https://api.polygonscan.com/api?module=stats&action=tokensupply&contractaddress='.$b.'D32E511eE00c6E0FF5D62Cd5'.$a.'&apikey='.$api_key_polygo;
$contents  = file_get_contents($api_url);
$array=json_decode($contents,true);
$array_result_real = $array["result"];
$strl = strlen($array_result_real)-18;
$real_token_p1 = substr($array_result_real,0, $strl); //1
$real_token_p2 = substr($array_result_real, -18);
$totalsupply = ($real_token_p1.".".$real_token_p2);

$q = htmlspecialchars($_GET["q"]);
if($q == "circulating"){

//address #dead
 list($totalcoins,$end_result_p1,$end_result_p2) = deadtoken ("0x000000000000000000000000000000000000dead", $totalsupply, $real_token_p1, $real_token_p2, $api_key_polygo);

//address #1
 list($a1,$a2,$a3) = deadtoken ("0x7c0823f1c216b80dc3a07d5896640bca64013613", $totalcoins,$end_result_p1,$end_result_p2, $api_key_polygo);

//address #2
 list($b1,$b2,$b3) = deadtoken ("0xa6aee6FC46aF26797cBF93c3314834185200eaC5", $a1,$a2,$a3, $api_key_polygo);

 //address #3
 list($c1,$c2,$c3) = deadtoken ("0xc20928FCEc429064407677CeF4FB0Fb35A5139B7", $b1,$b2,$b3, $api_key_polygo);
 
 
 //address #4
 list($circulatingpolygo,$d2,$d3) = deadtoken ("0x8c6F05cC6658F94Ed6a930D969Aa7D91F4Cd3007", $c1,$c2,$c3, $api_key_polygo);


}else if($q=="totalcoins"){
    list($totalcoins,$end_result_p1,$end_result_p2) = deadtoken ("0x000000000000000000000000000000000000dead", $totalsupply,$real_token_p1, $real_token_p2, $api_key_polygo);
}
function deadtoken($deadaddress, $totalsupply, $real_token_p1, $real_token_p2, $api_key_polygo) {
  $daed = 'https://api.polygonscan.com/api?module=account&action=tokenbalance&contractaddress=0xAdf72D32E511eE00c6E0FF5D62Cd5C7C40A6aDEA&address='.$deadaddress.'&tag=latest&apikey='.$api_key_polygo;
$contentsdaed  = file_get_contents($daed);
$arraydaed=json_decode($contentsdaed,true);
$array_resul_daed = $arraydaed["result"];
if($array_resul_daed!=0){
$zeronum = 18-strlen($array_resul_daed);
$zz;
$no_missing_zeros  = "true";
for ($i = 1; $i <= $zeronum; $i++) {
    $zz = $zz."0";
    $no_missing_zeros  = "false";
}
if($no_missing_zeros  == "true"){
    $strldaed = strlen($array_resul_daed)-18;
    $daed_token_p1 = substr($array_resul_daed,0, $strldaed);
    $daed_token_p2 = substr($array_resul_daed, -18);
}else{
    $daed_token_p1 = 0;
    $daed_token_p2 = $zz.''.(substr($array_resul_daed, -18));
}
if($real_token_p2 > $daed_token_p2){
    $end_result_p1 = bcsub($real_token_p1,$daed_token_p1);
    $end_result_p2 = bcsub($real_token_p2,$daed_token_p2);
    
}else if($real_token_p2 < $daed_token_p2){
    $end_result_p1 = bcsub($real_token_p1,$daed_token_p1)-1;
    $end_result_p2 = 1000000000000000000 - (bcsub($daed_token_p2,$real_token_p2));
    
}else if($real_token_p2 == $daed_token_p2){
    $end_result_p1 = bcsub($real_token_p1,$daed_token_p1);
    $end_result_p2 = 0;
}
$coinsnum = $end_result_p1.'.'.$end_result_p2;  
}else{
    $end_result_p1 = $real_token_p1;
    $end_result_p2 = $real_token_p2;
    $coinsnum = $totalsupply;
}
return array($coinsnum, $end_result_p1, $end_result_p2 );
}

        if($q=="circulating"){
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx circulating
include 'include.php';
$a2 ='11C4538';
$b2 ='0xa49811';
$api_url2 = 'https://api.etherscan.io/api?module=stats&action=tokensupply&contractaddress='.$b2.'140E1d6f653dEc28037Be0924C8'.$a2.'&apikey='.$api_key_erc20;
$contents2  = file_get_contents($api_url2);
$array2=json_decode($contents2,true);
$array_result_real2 = $array2["result"];
$strl2 = strlen($array_result_real2)-18;
$real_token_p12 = substr($array_result_real2,0, $strl2); //1
$real_token_p22 = substr($array_result_real2, -18);
$totalsupply2 = ($real_token_p12.".".$real_token_p22);



$q = htmlspecialchars($_GET["q"]);
if($q == "circulating"){

//address #dead
 list($totalcoins2,$end_result_p12,$end_result_p22) = deadtoken_erc20 ("0x000000000000000000000000000000000000dead", $totalsupply2, $real_token_p12, $real_token_p22, $api_key_erc20);

//address #1
 list($a1,$a2,$a3) = deadtoken_erc20 ("0x9f700203681b15c5618a6f51e01e9620b591208d", $totalcoins2,$end_result_p12,$end_result_p22, $api_key_erc20);

//address #2
 list($b1,$b2,$b3) = deadtoken_erc20 ("0xCc10F1D65Cf5b527aD2007178373728Bf348DedC", $a1,$a2,$a3, $api_key_erc20);

 //address #3
 list($c1,$c2,$c3) = deadtoken_erc20 ("0xc20928FCEc429064407677CeF4FB0Fb35A5139B7", $b1,$b2,$b3, $api_key_erc20);
 
 
 //address #4
 list($circulatingerc20,$d2,$d3) = deadtoken_erc20 ("0x8c6F05cC6658F94Ed6a930D969Aa7D91F4Cd3007", $c1,$c2,$c3, $api_key_erc20);
 
 
}

        echo "Circ. supply of polgyo = ".$circulatingpolygo;
        echo "<br />";
        echo "Circ. supply of erc20 = ".$circulatingerc20;
        $circulatingsum =  $circulatingpolygo + $circulatingerc20;
        echo "<br /> ";
        echo "Circ. polgyo + ecr20 = ";
        echo $circulatingsum; 

//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx end circulating   
         
             
        }else if($q=="totalcoins"){
            
$a3 ='811C4538';
$b3 ='0xa49';
$api_url3 = 'https://api.etherscan.io/api?module=stats&action=tokensupply&contractaddress='.$b3.'811140E1d6f653dEc28037Be0924C'.$a3.'&apikey='.$api_key_erc20;
$contents3  = file_get_contents($api_url3);
$array3=json_decode($contents3,true);
$array_result_real3 = $array3["result"];
$strl3 = strlen($array_result_real3)-18;
$real_token_p13 = substr($array_result_real3,0, $strl3); //1
$real_token_p23 = substr($array_result_real3, -18);
$totalsupply3 = ($real_token_p13.".".$real_token_p23);

$q3 = htmlspecialchars($_GET["q"]);
 if($q3=="totalcoins"){
    list($totalcoins23,$end_result_p13,$end_result_p23) = deadtoken_erc20 ("0x000000000000000000000000000000000000dead", $totalsupply3,$real_token_p13, $real_token_p23, $api_key_erc20);
}

             echo "Total supply of polygo = ".$totalcoins;
             echo "<br />";
             echo "Total supply of Erc20 = ". $totalcoins23;
             echo "<br />";
             $totalcoinsum = $totalcoins + $totalcoins23;
             echo "Total. polgyo + ecr20 = ";
             echo $totalcoinsum;
             
        }else if($q=="maxcoins"){
            
$a3 ='811C4538';
$b3 ='0xa49';
$api_url3 = 'https://api.etherscan.io/api?module=stats&action=tokensupply&contractaddress='.$b3.'811140E1d6f653dEc28037Be0924C'.$a3.'&apikey='.$api_key_erc20;
$contents3  = file_get_contents($api_url3);
$array3=json_decode($contents3,true);
$array_result_real3 = $array3["result"];

             echo "Max supply of polygo = ".$array_result_real;
             echo "<br />";
             echo "Max supply of Erc20 = ". $array_result_real3;
             echo "<br />";
            $maxcoins = $array_result_real + $array_result_real3;
            echo "Max polgyo + ecr20 = ";
            echo number_format($maxcoins, 0, '', '');
        }
        

        function deadtoken_erc20($deadaddress, $totalsupply3, $real_token_p1, $real_token_p2, $api_key_erc20) {
  $daed = 'https://api.etherscan.io/api?module=account&action=tokenbalance&contractaddress=0xa49811140E1d6f653dEc28037Be0924C811C4538&address='.$deadaddress.'&tag=latest&apikey='.$api_key_erc20;
$contentsdaed  = file_get_contents($daed);
$arraydaed=json_decode($contentsdaed,true);
$array_resul_daed = $arraydaed["result"];
if($array_resul_daed!=0){
$zeronum = 18-strlen($array_resul_daed);
$zz;
$no_missing_zeros  = "true";
for ($i = 1; $i <= $zeronum; $i++) {
    $zz = $zz."0";
    $no_missing_zeros  = "false";
}
if($no_missing_zeros  == "true"){
    $strldaed = strlen($array_resul_daed)-18;
    $daed_token_p1 = substr($array_resul_daed,0, $strldaed);
    $daed_token_p2 = substr($array_resul_daed, -18);
}else{
    $daed_token_p1 = 0;
    $daed_token_p2 = $zz.''.(substr($array_resul_daed, -18));
}
if($real_token_p2 > $daed_token_p2){
    $end_result_p1 = bcsub($real_token_p1,$daed_token_p1);
    $end_result_p2 = bcsub($real_token_p2,$daed_token_p2);
    
}else if($real_token_p2 < $daed_token_p2){
    $end_result_p1 = bcsub($real_token_p1,$daed_token_p1)-1;
    $end_result_p2 = 1000000000000000000 - (bcsub($daed_token_p2,$real_token_p2));
    
}else if($real_token_p2 == $daed_token_p2){
    $end_result_p1 = bcsub($real_token_p1,$daed_token_p1);
    $end_result_p2 = 0;
}
$coinsnum = $end_result_p1.'.'.$end_result_p2;  
}else{
    $end_result_p1 = $real_token_p1;
    $end_result_p2 = $real_token_p2;
    $coinsnum = $totalsupply3;
}
return array($coinsnum, $end_result_p1, $end_result_p2 );
}
?>
