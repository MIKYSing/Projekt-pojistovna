<?php
class StrankaKontroler extends Kontroler
{
    public function zpracuj(array $parametry): void
    {
        $this->pohled = 'stranka';
    }
}