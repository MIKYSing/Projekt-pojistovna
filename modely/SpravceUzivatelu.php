<?php

/**
 * Třída se stará o uživatele a jejich úkony
 */
class SpravceUzivatelu
{

    /**Vrátí otisk hesla
     * @param string $heslo
     * @return string
     */
    public function vratOtisk(string $heslo) : string
    {
        return password_hash($heslo, PASSWORD_DEFAULT);
    }

    /**
     * Registruje uživatele pokud splnil všechny podmínky
     * @param string $jmeno
     * @param string $heslo
     * @param string $hesloZnovu
     * @param string $rok
     * @return void
     * @throws ChybaUzivatele
     */
    public function registruj(string $jmeno, string $heslo, string $hesloZnovu, string $rok) : void
    {
        if($rok != date('Y'))
        {
            throw new ChybaUzivatele('Chybně vyplněný antispam.');
        }
        if($heslo != $hesloZnovu)
        {
            throw new ChybaUzivatele('Hesla nesouhlasí.');
        }
        $uzivatel = array(
            'jmeno' => $jmeno,
            'heslo' => $this->vratOtisk($heslo),
        );
        try {
            Db::vloz('uzivatele', $uzivatel);
        }
        catch (PDOException $chyba)
        {
            throw new ChybaUzivatele('Uzivatel s tímto jménem je již zaregistrovaný.');
        }
    }

    /**
     * Pokud souhlasí jmeno a heslo, tak přihlásí uživatele
     * @param string $jmeno
     * @param string $heslo
     * @return void
     * @throws ChybaUzivatele
     */
    public function prihlas(string $jmeno, string $heslo) : void
    {
        $uzivatel = Db::dotazJeden('
            SELECT uzivatele_id, jmeno, admin, heslo
            FROM uzivatele
            WHERE jmeno = ?
        ', array($jmeno));
        if(!$uzivatel || !password_verify($heslo, $uzivatel['heslo']))
        {
            throw  new ChybaUzivatele('Neplatné jméno nebo heslo.');
        }
        $_SESSION['uzivatel'] = $uzivatel;
    }

    /**
     * odhlásí uživatele
     * @return void
     */
    public function odhlas(): void
    {
        unset($_SESSION['uzivatel']);
    }

    /**
     * Vrátí aktualně přihlášeného uživatele
     * @return array|null
     */
    public function vratUzivatele() : ?array
    {
        if (isset($_SESSION['uzivatel']))
        {
            return $_SESSION['uzivatel'];
        }
        return null;
    }

}