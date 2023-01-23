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

    public function pridejZpravu(string $zprava): void
    {
        if(isset($_SESSION['zpravy']))
        {
            $_SESSION['zpravy'][] = $zprava;
        }else{
            $_SESSION['zpravy'] = array($zprava);
        }
    }
    public function vratZpravy(): array
    {
        if(isset($_SESSION['zpravy']))
        {
            $zpravy = $_SESSION['zpravy'];
            unset($_SESSION['zpravy']);
            return $zpravy;
        }else{
            return array();
        }
    }
}