<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .modal-header h2 {
            margin: 0;
        }

        .modal-body input[type="file"] {
            margin-bottom: 10px;
        }

        .modal-body button {
            display: block;
            margin-left: auto;
            background-color: #4CAF50;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .close {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button id="myButton">Abrir Ventana</button>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Llenar Campos</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <input type="file" id="imagen" required>
                <input type="text" placeholder="Nombre" id="nombre" required>
                <input type="text" placeholder="Descripción" id="descripcion" required>
                <input type="text" placeholder="Precio" id="precio" required>
                <button id="guardar">Guardar</button>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myButton");
        var span = document.getElementsByClassName("close")[0];
        var guardarBtn = document.getElementById("guardar");

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        guardarBtn.onclick = function() {
            var imagenFile = document.getElementById("imagen").files[0];
            var nombre = document.getElementById("nombre").value;
            var descripcion = document.getElementById("descripcion").value;
            var precio = document.getElementById("precio").value;

            var formData = new FormData();
            formData.append("imagen", imagenFile);
            formData.append("nombre", nombre);
            formData.append("descripcion", descripcion);
            formData.append("precio", precio);

            fetch("guardar_imagen.php", {
                method: "POST",
                body: formData
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(data) {
                console.log(data);
                modal.style.display = "none";
            })
            .catch(function(error) {
                console.error(error);
            });
        };
    </script>
</body>
</html>
