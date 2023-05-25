<?php
header('Access-Control-Allow-Origin: *');

$a = [
    'nombre' => 'Juan',
    'apellido' => 'Perez',
    'edad' => 10
];
echo json_encode($a);
?>