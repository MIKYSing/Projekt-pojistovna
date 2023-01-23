<?php
class PojistenciKontroler extends Kontroler{

    public function zpracuj(array $parametry): void
    {
        
        //Vytvoření instance modelu, který nám umožní pracovat s pojistencema.
        $spravcePojistencu = new SpravcePojistencu();
        //Je zadano id_pojistitele
        if(!empty($parametry[0]))
        {
            $pojistnik = $spravcePojistencu->detailPojistnik($parametry[0]);

            if(!$pojistnik){
                $this->presmeruj('chyba');
            }
            
            $this->data['jmeno'] = $pojistnik['jmeno'];
            $this->data['prijmeni'] = $pojistnik['prijmeni'];
            $this->data['email'] = $pojistnik['email'];
            $this->data['telefon'] = $pojistnik['telefon'];
            $this->data['ulice'] = $pojistnik['ulice'];
            $this->data['mesto'] = $pojistnik['mesto'];
            $this->data['psc'] = $pojistnik['psc'];

            $this->pohled = 'pojistnik';
        }else
        {

        
            $pojistenci = $spravcePojistencu->vypisAll();
            $this->data['pojistenci'] = $pojistenci;
            $this->pohled = 'pojistenci';
        }
    }
}