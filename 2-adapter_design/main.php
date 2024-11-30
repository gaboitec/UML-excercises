<?php
/*
Estamos trabajando con distintas versiones
de sistemas operativos Windows 7 y Windows 10.
Al compartir archivos como Word, Excel, Power Point,
surgen problemas al abrirlos en Windows 10 debido a
la falta de compatibilidad con la versión Windows 7.
Debes crear un programa donde Windows 10 pueda aceptar
estos archivos independientemente de que sean de versiones anteriores.

Para ello, aplica el patrón de diseño Adapter.
*/

//Interface del archivo antigo para windows 7
interface IDocWind7
{
    function leerArchvivo();
}
//Clase windows 7 que implementa la interfaz
class DocWin7 implements IDocWind7
{
    function leerArchvivo()
    {
        echo "Leyendo archivo antiguo \n";
    }
}
/*clase para windows 10 que no implementa la interfaz
porque "no son formatos compatibles"*/
class DocWin10
{
    function leerArchvivo()
    {
        echo "Leyendo archivo nuevo \n";
    }
}
//Clase Adaptador que si implementa la interfaz (formato) del archivo antiguo
class Adaptador implements IDocWind7
{
    //Propiedad para usarla en el sistema nuevo
    private $archivo;
    //constructor de un archivo antiguo
    function __construct(IDocWind7 $archivo)
    {
        /*La variable toma el dato del archivo antiguo
        para implementarla al sistema nuevo*/
        $this->archivo = $archivo;
    }
    /*Método que extrae (Logica) los datos del archivo
    usando los recursos del archivo antiguo*/
    function LeerArchvivo()
    {
        $this->archivo->leerArchvivo();
    }
}
//Instanciar archivo antiguo en el sistema antiguo(win7)
$viejoWin7 = new DocWin7();
//Leer el archivo antiguo
$viejoWin7->leerArchvivo();

//Instanciar el archivo nuevo en el sistema nuevo(win10)
$nuevoWin10 = new DocWin10();
//Leer el archivo nuevo
$nuevoWin10->leerArchvivo();

//Instanciar el archivo antiguo en el sistema nuevo
$viejoWin10 = new Adaptador($viejoWin7);
//Leer archivo antiguo
$viejoWin10->leerArchvivo();
