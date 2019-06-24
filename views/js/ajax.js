// Definimos la URL que vamos a solicitar via Ajax
var ajax_url = "http://mysite.com/json/data.json";

// Definimos los parámetros que vamos a enviar
var params = "parametro=valor&otro_parametro=otro_valor";

// Creamos un nuevo objeto encargado de la comunicación
var ajax_request = new XMLHttpRequest();

// Definimos como queremos realizar la comunicación
ajax_request.open( "POST", ajax_url, true );
// Ponemos las cabeceras de la solicitud como si fuera un formulario, necesario si se utiliza POST
ajax_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//Enviamos la solicitud junto con los parámetros
ajax_request.send( params );