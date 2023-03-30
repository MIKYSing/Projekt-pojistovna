<?php


class VlozitKontroler extends Kontroler
{
    public function zpracuj(array $parametry): void
    {
        $this->overUzivatele(true);
        $spravcePojistencu = new SpravcePojistencu();

        $pojistnik = array(
            'id_pojistence' => '',
            'jmeno' => '',
            'prijmeni' => '',
            'email' => '',
            'telefon' => '',
            'ulice' => '',
            'mesto' => '',
            'psc' => '',
        );

        if ($_POST) {
            $klice = array('jmeno', 'prijmeni', 'email', 'telefon', 'ulice', 'mesto', 'psc');

            $pojistnik = array_intersect_key($_POST, array_flip($klice));

            $spravcePojistencu->ulozPojistnika($_POST['id_pojistence'], $pojistnik);

            $this->pridejZpravu('Nový pojistník byl úspěšně uložen.');
            $this->presmeruj('pojistenci/' . $pojistnik['id_pojistence']);

        }


        $this->data['pojistnik'] = $pojistnik;
        $this->pohled = 'vlozit';


    }
}