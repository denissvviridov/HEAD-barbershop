<?php

class Error404 extends Container  {

    public function index()
    {
        $twig = $this->twig();
        $html = $twig->render('admin/pages/error404.twig');
        echo $html;
    }
}