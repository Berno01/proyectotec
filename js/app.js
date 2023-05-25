function ejecutarAjax(){
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() 
{
  if (this.readyState === XMLHttpRequest.DONE)
  {
    if(xmlhttp.status == 200){
        document.getElementById('contenido').innerHTML= xmlhttp.responseText;
        console.log();




        // Objeto JSON codificado en una variable (reemplaza con tu variable)
        var miVariable = xmlhttp.responseText;

        // Obtener la referencia a la tabla
        var tabla = document.getElementById("tablaArticulo");
        var tbody = tabla.getElementsByTagName("tbody")[0];

        // Convertir la variable JSON en un objeto JavaScript
        var datos = JSON.parse(miVariable);

        // Generar las filas y celdas de la tabla
        for (var i = 0; i < datos.length; i++) {
            var fila = document.createElement("tr");

            var celdaNombre = document.createElement("td");
            celdaNombre.textContent = datos[i].nombre_articulo;
            fila.appendChild(celdaNombre);

            var celdaCategoria = document.createElement("td");
            celdaCategoria.textContent = datos[i].nombre_categoria;
            fila.appendChild(celdaCategoria);

            var celdaPrecio = document.createElement("td");
            celdaPrecio.textContent = datos[i].precio_articulo;
            fila.appendChild(celdaPrecio);

            var celdaStock = document.createElement("td");
            celdaStock.textContent = datos[i].stock_articulo;
            fila.appendChild(celdaStock);

            tbody.appendChild(fila);
        }





    }
    else if(xmlhttp.status == 400){
        alert('Error 400')
    }
    else{
        console.log(xmlhttp.response);
    }
  }
};

xmlhttp.open("GET", "http://localhost/proyectotec/lista.php", true);
xmlhttp.send();
}
 
function ejecutarAjax2(){
    fetch("http://localhost/proyectotec/lista.php")
    .then(( response ) => {
        return response.json()
        //return response.text()
    }).then( data =>{
        console.log( data );
        console.log( data[0] );
        

    document.getElementById("nombre_articulo").value = data[0].nombre_articulo;
    document.getElementById("categoria").value = data[0].nombre_categoria;
    document.getElementById("stock").value = data[0].stock_articulo;
    document.getElementById("precio").value = data[0].precio_articulo;
})
.catch( error =>{
    console.log( error );
})
}