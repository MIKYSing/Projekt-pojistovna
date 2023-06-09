<?php


/**
 *
 */
class EditorKontroler extends Kontroler
{
    /**
     * @param array $parametry
     * @return void
     */
    public function zpracuj(array $parametry): void
    {
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
            $this->pridejZpravu('Úpravy byly úspěšně uloženy.');
            $this->presmeruj('pojistenci/' . $pojistnik['id']);
        } else if (!empty($parametry[0])) {
            $nactenyPojistnik = $spravcePojistencu->detailPojistnik($parametry[0]);
            if ($nactenyPojistnik) {
                $pojistnik = $nactenyPojistnik;
            } else {
                $this->pridejZpravu('Pojistník nebyl nalezen.');
            }
        }
        $this->data['pojistnik'] = $pojistnik;
        $this->pohled = 'editor';

    }
}