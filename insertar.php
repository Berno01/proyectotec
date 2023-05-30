<?php
//$conexion=mysql_connect('localhost', 'root', 'pruebas');
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$categoria=$_POST['categoria'];
$stock=$_POST['stock'];
$imagenTxt="klk";

$contraseña = "123";
$usuario = "postgres";
$nombreBaseDeDatos = "tienda";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "localhost";
$puerto = "5432";
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

//Guardamos la imagen en nuestro serv
if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
    $tempName = $_FILES["imagen"]["tmp_name"];
    $fileName = $_FILES["imagen"]["name"];
    $destination = "img/" . $fileName;
    
    if (move_uploaded_file($tempName, $destination)) {
        echo "Imagen guardada con éxito en: " . $destination;
        $sentencia = $base_de_datos->query("insert into articulo (nombre_articulo, 
        stock_articulo, id_categoria, precio_articulo, descripcion_articulo, imagen_articulo)
        values ('".$nombre."', ".$stock.", ".$categoria.", ".$precio.", '".$descripcion."', '".$fileName."')");
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    } else {
        echo "Error al guardar la imagen.";
    }
} else {
    echo "Error al cargar la imagen.";
}






//$sql="insert into articulo () values()"

?>