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

$smerovac = new SmerovacKontroler();
$smerovac->zpracuj(array($_SERVER['REQUEST_URI']));

$smerovac->vypisPohled();