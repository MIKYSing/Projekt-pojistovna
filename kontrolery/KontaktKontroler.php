<?php


class KontaktKontroler extends Kontroler
{
    public function zpracuj(array $parametry): void
    {
        $this->pohled = 'kontakt';
    }

}