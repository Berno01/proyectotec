var modal = document.getElementById("myModal");
        var btn = document.getElementById("guardar");
        var span = document.getElementsByClassName("close")[0];
        var guardarBtn = document.getElementById("btnGuardar");

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
            var stock = document.getElementById("stock").value;
            var categoria = document.getElementById("categoria").value;
            
            var formData = new FormData();
            formData.append("imagen", imagenFile);
            formData.append("nombre", nombre);
            formData.append("descripcion", descripcion);
            formData.append("precio", precio);
            formData.append("stock", stock);
            formData.append("categoria", categoria);
            

            fetch("insertar.php", {
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
/*
$(document).ready(function(){

    $('#btnGuardar').click(function(){
        var datos = $('#frmajax').serialize();
        
        $.ajax({
            type:"POST",
            url:"insertar.php",
            data: datos,
            success: function(r){
                if(r==1){
                    alert("se agrego calidad");
                }
                else
                {
                    alert("no se agrego nada pana");
                }
            }
        });
        return false;

    });
});
*/