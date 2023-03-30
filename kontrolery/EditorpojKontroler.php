<?php


/**
 *
 */
class EditorpojKontroler extends Kontroler
{
    /**
     * @param array $parametry
     * @return void
     */
    public function zpracuj(array $parametry): void
    {
        $spravcePojisteni = new SpravcePojisteni();

        $pojisteni = array(
            'id_pojisteni' => '',
            'id_pojistnika' => '',
            'nazev' => '',
            'castka' => '',
            'predmet' => '',
            'platnost_od' => '',
            'platnost_do' => '',
        );

        if($_POST)
        {
            $klice2 = array('nazev', 'castka', 'predmet', 'platnost_od', 'platnost_do');

            $pojisteni = array_intersect_key($_POST, array_flip($klice2));

            $spravcePojisteni->ulozPojistne($_POST['id_pojisteni'], $pojisteni);
            $this->pridejZpravu('Úpravy byly úspěšně uloženy.');
            $this->presmeruj('pojisteni/' . $pojisteni['id']);
        }
        else
        if (!empty($parametry[0])) {
            $nactenePojisteni = $spravcePojisteni->detailPojistka($parametry[0]);
            if ($nactenePojisteni) {
                $pojisteni = $nactenePojisteni;
            } else {
                $this->pridejZpravu('Pojistnik nebyl nalezen');
            }
        }
        $this->data['pojisteni'] = $pojisteni;
        $this->pohled = 'editorpoj';
    }
}