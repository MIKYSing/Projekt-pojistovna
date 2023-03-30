<?php


/**
 *
 */
class SmerovacKontroler extends Kontroler
{
    /**
     * @var Kontroler
     */
    protected Kontroler $kontroler;

    /**
     * @param string $text
     * @return string
     */
    private function pomlckyDOVelbloudiNotace(string $text): string
    {
        $veta = str_replace('-', ' ', $text);
        $veta = ucwords($veta);
        $veta = str_replace(' ', '', $veta);
        return $veta;
    }

    /**
     * @param string $url
     * @return array
     */
    private function parsujURL(string $url): array
    {
        $naparsovanaURL = parse_url($url);
        $naparsovanaURL["path"] = ltrim($naparsovanaURL["path"], "/");
        $naparsovanaURL["path"] = trim($naparsovanaURL["path"]);

        $rozdelenaCesta = explode("/", $naparsovanaURL["path"]);

        return $rozdelenaCesta;
    }

    /**
     * @param array $parametry
     * @return void
     */
    public function zpracuj(array $parametry): void
    {
        $naparsovanaURL = $this->parsujURL($parametry[0]);
        // pokud není zadán žádný kontroler(první parametr je prazdny nebo uplně chybí), tak přesměruj na 
        if (empty($naparsovanaURL[0])) {
            $this->presmeruj('stranka');

        }
        $tridaKontroleru = $this->pomlckyDOVelbloudiNotace(array_shift($naparsovanaURL)) . 'Kontroler';

        if (file_exists('kontrolery/' . $tridaKontroleru . '.php')) {
            $this->kontroler = new $tridaKontroleru;
        } else {
            $this->presmeruj('chyba');
        }
        $this->kontroler->zpracuj($naparsovanaURL);

        $this->pohled = 'rozlozeni';
        $this->data['zpravy'] = $this->vratZpravy();
    }


}