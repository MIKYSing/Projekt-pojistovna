<?php


/**
 *
 */
class PrihlaseniKontroler extends Kontroler
{
    /**
     * @param array $parametry
     * @return void
     */
    public function zpracuj(array $parametry): void
    {
        $spravceUzivatelu = new SpravceUzivatelu();
        if ($spravceUzivatelu->vratUzivatele())
            $this->presmeruj('administrace');
        if ($_POST) {
            try {
                $spravceUzivatelu->prihlas($_POST['jmeno'], $_POST['heslo']);
                $this->pridejZpravu('Byl jste úspěšně přihlášen.');
                $this->presmeruj('administrace');
            } catch (ChybaUzivatele $chyba) {
                $this->pridejZpravu($chyba->getMessage());
            }
        }
// Nastavení šablony
        $this->pohled = 'prihlaseni';
    }
}
