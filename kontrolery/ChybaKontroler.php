<?php
class ChybaKontroler extends Kontroler
{
    public function zpracuj(array $parametry): void
    {
        header("HTTP/1.0 404 Not Found");

        $this->hlavicka['titulek'] = 'Chyba 404';

        $this->pohled = 'chyba';
    }
}