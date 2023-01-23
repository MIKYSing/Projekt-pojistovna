<?php
mb_internal_encoding("UTF-8");

function autoload(string $trida): void
{
    if(preg_match('/Kontroler$/', $trida))
    {
        require("kontrolery/" . $trida . ".php");
    }else{
        require("modely/" . $trida . ".php");
    }
}
spl_autoload_register("autoload");

Db::pripoj('127.0.0.1', 'root', '', 'db_pojistovna');

$smerovac = new SmerovacKontroler();
$smerovac->zpracuj(array($_SERVER['REQUEST_URI']));

$smerovac->vypisPohled();

