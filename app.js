function ejecutarAjax(){
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState === XMLHttpRequest.DONE){
    if(xmlhttp.status == 200){
        document.getElementById('contenido').innerHTML=
        xmlhttp.responseText;
    }
    else if(xmlhttp.status == 400){
        alert('Error 400')
    }
    else{
        console.log(xmlhttp.response);
    }
  }
};

xmlhttp.open("GET", "http://localhost/lista.php", true);
xmlhttp.send();
}
 
function ejecutarAjax2(){
    fetch("http://localhost/lista.php")
    .then(( response ) => {
        return response.json()
        //return response.text()
    }).then( data =>{
        console.log( data )

    document.getElementById("nombre").value = data.nombre;
    document.getElementById("apellido").value = data.apellido;
    document.getElementById("edad").value = data.edad;
})
.catch( error =>{
    console.log( error );
})
}