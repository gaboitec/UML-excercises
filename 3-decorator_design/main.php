<?php
/*Crear un programa donde sea posible añadir diferentes 
armas a ciertos personajes de videojuegos. Debes utilizar 
al menos dos personajes para este ejercicio.

Para llevar a cabo esta tarea, aplica el patrón de diseño Decorator.*/

//Crear interfaz base para el personaje y decorador
interface IAtaquePersonaje
{
    function atacar();
}
//Creamos la clase del personaje pistolero
class Pistolero implements IAtaquePersonaje
{
    protected $personaje = "Pistolero";

    function atacar()
    {
        //La funcion implementada de la interfaz muestra el personaje
        echo "\nPersonaje: " . $this->personaje;
    }
}
//Creamos la clase del personaje guerrero
class Guerrero implements IAtaquePersonaje
{
    protected $personaje = "Guerrero";

    function atacar()
    {
        //la funcion implementada de la interfaz muestra el personaje
        echo "\nPersonaje: " . $this->personaje;
    }
}
//Creamos la clase para el decorador que se usaran para las armas
class Decorator implements IAtaquePersonaje
{
    protected $personaje;
    protected $arma;
    //Recibe un objeto del tipo interfaz IAtaquePersonaje
    function __construct(IAtaquePersonaje $personaje, $arma)
    {
        $this->personaje = $personaje;
        $this->arma = $arma;
    }

    function atacar()
    {
        /*La funcion implementada de la interfaz muestra 
        la funcion "ataque" del objeto*/
        echo $this->personaje->atacar();
    }
}
//Clase Arma que hereda a Decorator
class AgregarArma extends Decorator
{

    function atacar()
    {
        /*La funcion heredada muestra la funcion ataque del padre 
        (ataque del objeto) + el tipo de arma*/
        echo parent::atacar() . " ataca con " . $this->arma;
    }
}

//EJEMPLOS DE USO:
//Personaje 1 guerrero
$personaje1 = new Guerrero;
$personaje1->atacar();
//agregar armas
$arma1 = new AgregarArma($personaje1, "Arco y flechas");
$arma1->atacar();
$arma2 = new AgregarArma($personaje1, "Lanza misiles");
$arma2->atacar();
$arma3 = new AgregarArma($personaje1, "Lanza llamas");
$arma3->atacar();

//personaje 2 pistolero
$personaje2 = new Pistolero;
$personaje2->atacar();
//agregar armas
$arma4 = new AgregarArma($personaje2, "Cuchillo");
$arma4->atacar();
$arma5 = new AgregarArma($personaje2, "Lanza papas");
$arma5->atacar();
