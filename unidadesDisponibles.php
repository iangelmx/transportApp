<?php

    require('./librerias/api.php');

    $api = new API_tmx();

    $unidadesDisponibles = $api->doQuery(" SELECT
    placas, chofer 
    FROM unidades")

?>