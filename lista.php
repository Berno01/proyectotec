<?php
header('Access-Control-Allow-Origin: *');

try {
    $base_de_datos = new PDO("pgsql:host=localhost;port=5432;dbname=tienda", 'postgres', '123');
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

$sentencia = $base_de_datos->query("select a.id_articulo, a.nombre_articulo, a.stock_articulo, a.id_categoria, c.nombre_categoria, a.precio_articulo from articulo a, categoria c order by nombre_articulo asc;");
$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//console.log($resultado);
echo json_encode($resultado);
$a = [
    'nombre' => 'Juan',
    'apellido' => 'Perez',
    'edad' => 10
];
//echo json_encode($a);

//insert into categoria (nombre_categoria) values ('Poleras');
//insert into articulo (nombre_articulo, stock_articulo, id_categoria) values ('Adidas F50', 5, 1);
?>




