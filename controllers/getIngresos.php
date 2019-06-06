<?php
require('./../librerias/api.php');

$api = new API_tmx();

$res = $api->doQuery("SELECT * FROM ingresos_unidades ORDER BY idUnidad, mes;");

$unidad = array();

$meses = array();
$ingresos = array();

$monthNum  = 3;
//$dateObj   = DateTime::createFromFormat('!m', $monthNum)->format('F');
//$monthName = $dateObj->format('F'); // March
$unidad[1] = array(
    'meses' => array(),
    'ingresos' => array(),
);
$unidad[3] = array(
    'meses' => array(),
    'ingresos' => array()
);

foreach($res as $row){
    array_push( $unidad[ $row['idUnidad'] ]['meses'], DateTime::createFromFormat('!m', $row['mes'])->format('F') );
    array_push( $unidad[ $row['idUnidad'] ]['ingresos'], $row['ingreso']);
}

$salida = array(
    'meses' => $meses,
    'ingresos' => $ingresos
);

echo json_encode( $unidad );

?>