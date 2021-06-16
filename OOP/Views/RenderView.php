<?php

class RenderView
{
    protected string $template;
    protected array $data;
// initiliseerd de template met superglobal construct
    public function __construct($template)
    {
        $this->template = $template;
    }
//Set de waardes in een array voor de extract methode
    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }
//Vult de waarde van key in een array die vervolgens gebruikt wordt in de extraxt methode
    public function get($key)
    {
        return $this->data[$key];
    }

    public function render() : void
    {
        if ( ! file_exists( 'Views/' . $this->template . '.php' ) )
            throw new Exception( "De template " . $this->template . " bestaat niet..." );
// importeerd variabelen van een array in een tabel
        extract($this->data);

        require_once ( $this->template . '.php');
    }
}

