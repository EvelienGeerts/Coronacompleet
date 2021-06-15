<?php

require_once('Views/RenderView.php');
//Algemene controller bij het opvragen van de URL
class Controller
{
    protected string $controller;
    protected string $action;
    protected int $index;

// initialisatie van de attributen 
    public function __construct( string $controller, string $action, int $index = -1 )
    {
        if ( ! file_exists( 'Controllers/' . $controller . 'Controller.php' ) )
            throw new Exception( "Controller " . $controller . " bestaat niet..." );

        $this->controller = $controller . "Controller";
        $this->action = $action;
        $this->index = $index;

        require_once ( $controller . 'Controller.php' );
    
    }

    public function run() : void
    {
        if ( class_exists( $this->controller ) )
        {
            $controller = new $this->controller();

            if ( method_exists( $controller, $this->action ) )
            {
                $controller->{$this->action}($this->index);
            }
        }
    }

}