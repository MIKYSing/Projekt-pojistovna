<?php


/**
 *
 */
class PojisteniKontroler extends Kontroler
{
    /**
     * @param array $parametry
     * @return void
     */
    public function zpracuj(array $parametry): void
    {
        //vytvoření instance modelu, který nám umožní pracovat s pojistěním.
        $spravcePojisteni = new SpravcePojisteni();
        $spravceUzivatelu = new SpravceUzivatelu();
        $uzivatel = $spravceUzivatelu->vratUzivatele();
        $this->data['admin'] = $uzivatel && $uzivatel['admin'];

        if (!empty($parametry[1]) && $parametry[1] == 'odstranit') {
            $spravcePojisteni->odstranPojisteni($parametry[0]);
            $this->pridejZpravu('Pojistění bylo úspěšně odstraněno');
            $this->presmeruj('pojisteni');
        }
        if (!empty($parametry[0])) {
            $pojistka = $spravcePojisteni->detailPojistka($parametry[0]); //nactení id_pojistnika z tabulky pojisteni

            $this->data['nazev'] = $pojistka['nazev'];
            $this->data['castka'] = $pojistka['castka'];
            $this->data['predmet'] = $pojistka['predmet'];

            $this->data['platnost_od'] = date('d.m.Y', strtotime($pojistka['platnost_od']));

            $this->data['platnost_do'] = date('d.m.Y', strtotime($pojistka['platnost_do']));

            $this->pohled = 'pojistka';
            //$this->pohled = 'pojistnik'; // tam kde se má vypisovat id_pojistnika
        } else {
            $pojisteni = $spravcePojisteni->vypisAllPojisteni();
            $this->data['pojisteni'] = $pojisteni;
            $this->pohled = 'pojisteni';


        }
    }
}