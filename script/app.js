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