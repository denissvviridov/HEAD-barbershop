<?php

class Container{


    public function twig() {
        $loader = new \Twig\Loader\FilesystemLoader('views/');
        $twig = new \Twig\Environment($loader);
        return $twig;
    }


    public function connectDB(){
        return new PDO('mysql:host=localhost;dbname=barber', 'root','qwerty1234');
    }
}