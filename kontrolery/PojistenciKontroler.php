<?php


/**
 *
 */
class PojistenciKontroler extends Kontroler
{

    /**
     * @param array $parametry
     * @return void
     */
    public function zpracuj(array $parametry): void
    {

        //Vytvoření instance modelu, který nám umožní pracovat s pojistencema.
        $spravcePojistencu = new SpravcePojistencu();
        $spravcePojisteni = new SpravcePojisteni();
        $spravceUzivatelu = new SpravceUzivatelu();
        $uzivatel = $spravceUzivatelu->vratUzivatele();

        $this->data['admin'] = $uzivatel && $uzivatel['admin'];
        //Je zadano id_pojistitele

        if (!empty($parametry[1]) && $parametry[1] == 'odstranit') {
            $spravcePojistencu->odstranPojistnik($parametry[0]);
            $this->pridejZpravu('Pojistník byl úspěšně odstraněn');
            $this->presmeruj('pojistenci');
        }
        if (!empty($parametry[0])) {
            $pojistnik = $spravcePojistencu->detailPojistnik($parametry[0]);
            $pojisteni = $spravcePojisteni->detailPojisteni($parametry[0]);


            if (!$pojistnik) {
                $this->presmeruj('chyba');
            }

            //nactení id_pojistnika z tabulky pojisteni
            $this->data['id_pojistence'] = $pojistnik['id_pojistence'];

            $this->data['pojisteni'] = $pojisteni; //nactení dat pro danné id_pojistnika




            //$this->data['id_pojisteni'] = $pojisteni['id_pojisteni'];
            $this->data['jmeno'] = $pojistnik['jmeno'];
            $this->data['prijmeni'] = $pojistnik['prijmeni'];
            $this->data['email'] = $pojistnik['email'];
            $this->data['telefon'] = $pojistnik['telefon'];
            $this->data['ulice'] = $pojistnik['ulice'];
            $this->data['mesto'] = $pojistnik['mesto'];
            $this->data['psc'] = $pojistnik['psc'];

            $this->pohled = 'pojistnik';
        } else {

            $pojistenci = $spravcePojistencu->vypisAll();
            $this->data['pojistenci'] = $pojistenci;
            $this->pohled = 'pojistenci';
        }
    }
}