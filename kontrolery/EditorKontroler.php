<?php
class EditorKontroler extends Kontroler
{
    public function zpracuj(array $parametry): void
    {
        $spravcePojistencu = new SpravcePojistencu();

        $pojistenci = array(
            'id_pojistence' => '',
            'jmeno' => '',
            'prijmeni' => '',
            'email' => '',
            'telefon' => '',
            'ulice' => '',
            'mesto' => '',
            'psc' => '',
        );

        if($_POST)
        {
            $klice = array('jmeno', 'prijmeni', 'email', 'telefon', 'ulice', 'mesto', 'psc');
            $pojistenci = array_intersect_key($_POST,array_flip($klice));
            $spravcePojistencu->ulozPojistnika($_POST['id_pojistnika'], $pojistenci);
            $this->pridejZpravu('Nový pojistník byl úspěšně uložen.');
            $this->presmeruj('pojistnik/' . $pojistenci['id_pojistitele']);
        }
    }
}