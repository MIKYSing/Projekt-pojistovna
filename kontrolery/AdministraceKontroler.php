<?php


/**
 * Třída pro zpracování a zobrazení administrace
 */
class AdministraceKontroler extends Kontroler
{
    /**
     * @param array $parametry
     * @return void
     */
    public function zpracuj(array $parametry): void
    {
        $this->overUzivatele();

        $spravceUzivatelu = new SpravceUzivatelu();
        $spravcePojistencu = new SpravcePojistencu();
        $spravcePojisteni = new SpravcePojisteni();

        if (!empty($parametry[0]) && $parametry[0] == 'odhlasit') {
            $spravceUzivatelu->odhlas();
            $this->presmeruj('prihlaseni');
        }
        $uzivatel = $spravceUzivatelu->vratUzivatele();
        $this->data['jmeno'] = $uzivatel['jmeno'];
        $this->data['admin'] = $uzivatel['admin'];



        $pojistenci = $spravcePojistencu->vypisAllLimit();
        $this->data['pojistenci'] = $pojistenci;
        $pojisteni = $spravcePojisteni->vypisAllPojisteniLimit();
        $this->data['pojisteni'] = $pojisteni;

        $this->pohled = 'administrace';
    }
}