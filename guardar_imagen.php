<?php
if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
    $tempName = $_FILES["imagen"]["tmp_name"];
    $fileName = $_FILES["imagen"]["name"];
    $destination = "img/" . $fileName;

    if (move_uploaded_file($tempName, $destination)) {
        echo "Imagen guardada con éxito en: " . $destination;
    } else {
        echo "Error al guardar la imagen.";
    }
} else {
    echo "Error al cargar la imagen.";
}
?>
