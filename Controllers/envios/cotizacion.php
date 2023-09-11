<?php

$de = $_POST['de'];
$wi = $_POST['wi'];
$he = $_POST['he'];
$we = $_POST['we'];
$ori = $_POST['ori'];
$des = $_POST['des'];

$po = array();
$po ['depth'] = $de;
$po ['width'] = $wi;
$po ['height'] = $he;
$po ['weight'] = $we;
$po ['origin'] = array('codePostal' => $ori);
$po ['destination'] = array('codePostal' => $des);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://app.enviosperros.com/api/v1/shipping/rates');
// DEVUELVE EL VALOR DE LA TRANSFERENCIA COMO UN STRING 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// true para hacer un HTTP POST normal. 
curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($po));


$headers = array();
$headers[] = 'Authorization: Bearer 2ycwqQ5ff2vfIA3hAseObiUH7o3D17ogyIA30LEW';
$headers[] = 'Content-Type: application/json';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

//echo (json_decode($result,true));

$res = json_decode($result, true);

echo json_encode($res);

curl_close($ch);

/*while ($row = array($res)) {
    echo "<p>" . $row[0] . "</p>\n";  
}*/


