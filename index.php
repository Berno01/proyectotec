<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </head>

    <body>
        <h1>AJAX</h1>
        <hr>
        

        <button onclick="ejecutarAjax()">Ejecutar</button>
        

        <label>Nombre</label>
        <input id="nombre_articulo">

        <label>Categoria</label>
        <input id="categoria">

        <label>Stock</label>
        <input id="stock">

        <label>Precio</label>
        <input id="precio">


        <button onclick="ejecutarAjax2()">Ejecutar</button>


        <hr/>
        <div id="contenido" style="width: 300px; height: 200px; background-color:silver;">
        </div>


        <div class="container mt-3">
       
            <table class="table table-dark table-hover" id="tablaArticulo">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Categoria</th>
                  <th>Precio</th>
                  <th>Stock</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>John</td>
                  <td>Doe</td>
                  <td>200</td>
                  <td>30</td>
                  <td>X  E</td>
                </tr>

               
                
              </tbody>
            </table>



            



          </div>

        <script src="js/app.js"></script>
    </body>

</html>
