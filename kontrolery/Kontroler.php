<?php

abstract class Kontroler
{
    protected array $data = array();
    protected string $pohled = "";
    protected array $hlavicka = array('titulek' => '', 'klicova_slova' => '', 'popis' => '');

    

    public function vypisPohled(): void
    {
        if($this->pohled)
        {
            extract($this->data);
            require("pohledy/" . $this->pohled . ".phtml");
        }
    }

    public function presmeruj(string $url): never
    {
        header("Location /$url");
        header("Connection: close");
        exit;
    }
    abstract function zpracuj(array $parametry) : void;
}