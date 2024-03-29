<?php

//$nombre_usuario = $_REQUEST['nombre_usuario'];
//$contra_usuario = $_REQUEST['contra_usuario'];

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


$sentencia = $base_de_datos->query("select * from articulo order by id_articulo asc;");
$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//$sentencia = $base_de_datos->prepare("INSERT INTO demo (valor) VALUES (?);");
//$resultado = $sentencia->execute(['nuevo valor']); 

//$sentencia1 = $base_de_datos->query("select * FROM usuario WHERE nombre_usuario = '".$nombre_usuario."' and contra_usuario= '".$contra_usuario."'");
//$resultado1 = $sentencia1->fetchAll(PDO::FETCH_ASSOC);




/*Para ver variableeessss
echo "====================<pre>";
print_r($resultado[0]['valor']);
print_r($resultado[0]['id']);
echo("  ");
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="script/jquery-3.2.1.min.js"></script>

    <title>Inventario</title>
</head>
<body>

<header>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Acerca</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <p id ="titulo">Todos los articulos disponibles:</p>
    
<?php
    echo("<div class='container'>");
    for ($i = 0; $i < count($resultado); $i++) {
                
        echo("
           
        <div class='card'>
            <img src='img/".$resultado[$i]['imagen_articulo']."'>
            <h4>".$resultado[$i]['nombre_articulo']."</h4>
            <p>".$resultado[$i]['descripcion_articulo']."</p>
            <p>Comprar en: <a href='#'>".$resultado[$i]['precio_articulo']."</a>Bs.</p>
        </div>
                ");
        
        }
    echo("</div>");
?>



<button class="btn btn-success" id="guardar">Añadir</button>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Describe el artículo</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form id="frmajax" method="POST">
                    <label for="">Nombre del articulo:</label>
                    <input type="text" placeholder="Nombre" id="nombre" name="nombre" required>
                    <label for="">Describe el articulo:</label>
                    <input type="text" placeholder="Descripción" id="descripcion" name="descripcion" required>
                    <label for="">¿Cuál es el precio?:</label>
                    <input type="text" placeholder="Precio" id="precio" name="precio" required>
                    <label >¿Cuántos disponibles?:</label>
                    <input type="text" placeholder="Stock" id="stock" name="stock" required>
                    
                    <label >¿A qué categoria pertenece?:</label>
                    <select name="categoria" id="categoria">
                        <option value="1">Poleras</option>
                        <option value="option2">Opción 2</option>
                    </select>
                    <label for="">Selecciona la foto:</label>
                    <input type="file" id="imagen" name="imagen" required>
                    <input type="text" hidden name="imagenTxt" value="">
                <button id="btnGuardar">Guardar</button>
                </form>
                
            </div>
        </div>
    </div>
    <script src="script/app.js"></script>
</body>
</html>

