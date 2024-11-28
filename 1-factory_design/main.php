<?php
//SE CREA LA INTERFAZ PARA LOS PERSONAJES
interface iPersonaje
{
    //Se definen funciones ATAQUE, VELOCIDAD y TIPO
    //van a ser diferentes para cada personaje
    function ataque();
    function velocidad();
    function tipo();
}

//Se crea la clase para el personaje Esqueleto
class Esqueleto implements iPersonaje
{
    function ataque()
    {
        //Nivel de ataque
        return 1;
    }

    function velocidad()
    {
        //Nivel de velocidad
        return 2;
    }

    function tipo()
    {
        //Retorna el tipo de personaje
        return 'Esqueleto';
    }
}

//Se crea la clase para el personaje Zomi
class Zombi implements iPersonaje
{
    function ataque()
    {
        //Nivel de ataque
        return 3;
    }

    function velocidad()
    {
        //Nivel de velocidad
        return 3;
    }

    function tipo()
    {
        //Retorna el tipo de personaje
        return "Zombi";
    }
}

//Se crea la clase para crear el PERSONAJE DEPENDIENDO DEL NIVEL
//va a retornar instancias del tipo iPersonaje
class PersonajeNivel
{
    //Funcion que recibe el nivel
    static function crearPersonaje($nivel)
    {
        //Si el nivel es "facil"
        if ($nivel === "facil")
            //Retorna una nueva instancia "Esqueleto"
            return new Esqueleto();
        //Si el nivel es "dificil"
        else if ($nivel === "dificil")
            //Retorna una nueva instancia "Zombi"
            return new Zombi();
        //Si no existe el nivel
        else echo "Nivel invlálido \n";
    }
}

//Se define la variable que contiene el nivel
$nivel = "dificil"; //CAMBIAR A "facil"/"dificil" PARA CREAR PERSONAJES DIFERENTES
//Se instancia un nuevo personaje que depende del nivel, en una variable
$personaje = PersonajeNivel::crearPersonaje($nivel);

//se imprimen los datos
print("Nuevo personaje <<{$personaje->tipo()}>> creado para nivel <<$nivel>> \n");
print("Nivel de ataque: {$personaje->ataque()} \n");
print("Nivel de ataque: {$personaje->velocidad()} \n");
