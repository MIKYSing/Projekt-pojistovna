<?php


/**
 *
 */
class RegistraceKontroler extends Kontroler
{
    /**
     * @param array $parametry
     * @return void
     */
    public function zpracuj(array $parametry): void
    {
        if ($_POST)  //pokud byl odeslán formulář, tak pokračuj.
        {
            try { //zkouší v případě registrace odeslat data jmeno,heslo,heslo_znovu pro kontrolu a rok na antispam
                $spravceUzivatelu = new SpravceUzivatelu();
                $spravceUzivatelu->registruj($_POST['jmeno'], $_POST['heslo'], $_POST['heslo_znovu'], $_POST['rok']);
                $spravceUzivatelu->prihlas($_POST['jmeno'], $_POST['heslo']);
                $this->pridejZpravu('Byl jste úspěšně zaregistrován.');
                //$this->presmeruj('administrace');
            } catch (ChybaUzivatele $chyba) // pokud se něco z toho nepovede tak to chytne a vypíše chybu.
            {
                $this->pridejZpravu($chyba->getMessage());
            }
        }
        $this->pohled = 'registrace';
    }
}