<?php


class VlozitpojKontroler extends Kontroler //Kontroler pro vložení pojištění.
{
    public function zpracuj(array $parametry): void
    {
        $spravcePojisteni = new SpravcePojisteni();

        if (!$parametry) {
            $pojisteni = array(
                'id_pojisteni' => '',
                'id_pojistnika' => '',
                'nazev' => '',
                'castka' => '',
                'predmet' => '',
                'platnost_od' => '',
                'platnost_do' => '',
            );

        } else {
            $pojisteni = array(
                'id_pojisteni' => '',
                'id_pojistnika' => $parametry[0],
                'nazev' => '',
                'castka' => '',
                'predmet' => '',
                'platnost_od' => '',
                'platnost_do' => '',
            );

        }

        if ($_POST)  //Pokud je formulář odeslán. tak ulož pole odeslaných hodnot do promněné $klice2
        {
            if (!$parametry[0]) {
                $klice2 = array('nazev', 'castka', 'predmet', 'platnost_od', 'platnost_do');
            } else {
                $klice2 = array('id_pojistnika', 'nazev', 'castka', 'predmet', 'platnost_od', 'platnost_do');
            }


            $pojisteni = array_intersect_key($_POST, array_flip($klice2));

            $spravcePojisteni->ulozPojistne($_POST['id_pojisteni'], $pojisteni);
            if (!$parametry[0]) {
                $this->pridejZpravu('Nové pojištění bylo úspěšně přidáno.');
                $this->presmeruj('pojisteni/');
            } else {
                $this->presmeruj('pojistenci/' . $pojisteni['id_pojistnika']);
            }
            // v případě zobrazení detailu napsat tohle . $pojisteni['id_pojistnika']


        }

        $this->data['pojisteni'] = $pojisteni;
        $this->pohled = 'vlozitpoj';
    }
}