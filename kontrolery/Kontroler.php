<?php

/**
 *
 */
abstract class Kontroler
{
    /**
     * @var array
     */
    protected array $data = array();
    /**
     * @var string
     */
    protected string $pohled = "";


    /**
     * @return void
     */
    public function vypisPohled(): void
    {
        if ($this->pohled) {
            extract($this->data);
            require("pohledy/" . $this->pohled . ".phtml");
        }
    }

    /**
     * @param string $url
     * @return never
     */
    public function presmeruj(string $url): never
    {
        header("Location: /$url");
        header("Connection: close");
        exit;
    }

    /**
     * @param array $parametry
     * @return void
     */
    abstract function zpracuj(array $parametry): void;

    /**
     * @param string $zprava
     * @return void
     */
    public function pridejZpravu(string $zprava): void
    {
        if (isset($_SESSION['zpravy'])) {
            $_SESSION['zpravy'][] = $zprava;
        } else {
            $_SESSION['zpravy'] = array($zprava);
        }
    }

    /**
     * @return array
     */
    public function vratZpravy(): array
    {
        if (isset($_SESSION['zpravy'])) {
            $zpravy = $_SESSION['zpravy'];
            unset($_SESSION['zpravy']);
            return $zpravy;
        } else {
            return array();
        }
    }

    /**
     * @param bool $admin
     * @return void
     */
    public function overUzivatele(bool $admin = false): void
    {
        $spravceUzivatelu = new SpravceUzivatelu();
        $uzivatel = $spravceUzivatelu->vratUzivatele();
        if (!$uzivatel || ($admin && !$uzivatel['admin'])) {
            $this->pridejZpravu('Nedostatečná oprávnění.');
            $this->presmeruj('prihlaseni');
        }
    }
}