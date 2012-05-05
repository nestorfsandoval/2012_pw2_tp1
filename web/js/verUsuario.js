$(function()
{
    obtener_valor('usr');
}); 

function obtener_valor(variable) 
{
    var encontrado = "desconocido";
    params = location.search.substr(1).split("&");
    for (var i = 0, total = params.length; i < total; i ++)
    if (params[i].split("=")[0] == variable)
    {
        encontrado = unescape(params[i].split("=")[1]);
    }
	console.log(encontrado);
    $("#usuario").html(encontrado);
 }