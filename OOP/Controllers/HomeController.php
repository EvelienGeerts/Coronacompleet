<?php


class HomeController
{
    public function index()
    {
        $view = new RenderView('Home');
        $view->set('title', 'Home');
        $view->set('content', 'Welkom op deze pagina, navigeer hieronder verder.');

        $view->render();
    }
}