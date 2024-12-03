<?php
/*Tenemos un sistema donde mostramos mensajes 
en distintos tipos de salida, como por consola, 
formato JSON y archivo TXT. Debes crear un programa 
donde se muestren todos estos tipos de salidas.

Para este propósito, aplica el patrón de diseño Strategy. */

//CREAR LA INTERFAZ strategy
interface Estrategia
{
    function mostrarMensaje();
}
//Clase del contexto (mensaje)
class Mensaje
{
    private $mensaje;
    //recibe un objeto del tipo Estrategia
    function __construct(Estrategia $mensaje)
    {
        $this->mensaje = $mensaje;
    }
    //Obtener el mensaje del objeto
    function getMensaje()
    {
        return "Mostrando mensaje: " . $this->mensaje->mostrarMensaje() . "\n";
    }
}
//Clase del mensaje en consola
class mensajeConsola implements Estrategia
{
    function mostrarMensaje()
    {
        return "Mensaje en consola";
    }
}
//Clase del mensaje en formato Json
class mensajeJSON implements Estrategia
{
    function mostrarMensaje()
    {
        return "Mensaje en formato JSON.json";
    }
}
//Clase del mensaje en formato txt
class mensajeTXT implements Estrategia
{
    function mostrarMensaje()
    {
        return "Mensaje en archivo de texto.txt";
    }
}

//EJEMPLO DE IMPLEMENTACION
//instanciar mensaje en consola
$mensajeConsola = new mensajeConsola();
//instanciar mensaje en json
$mensajeJson = new mensajeJSON();
//instanciar mensaje en txt
$mensajeTxt = new mensajeTXT();

//instanciar Mensaje general
$mostrarMensaje = new Mensaje($mensajeConsola);
echo $mostrarMensaje->getMensaje();

$mostrarMensaje = new Mensaje($mensajeJson);
echo $mostrarMensaje->getMensaje();

$mostrarMensaje = new Mensaje($mensajeTxt);
echo $mostrarMensaje->getMensaje();
