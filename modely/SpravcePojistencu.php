<?php

/**
 *
 */
class SpravcePojistencu
{
    /**
     * zobrazí detail pojistence podle jeho ID
     * @param int $id_pojistence
     * @return array
     */
    public function detailPojistnik(int $id_pojistence): array
    {
        return Db::dotazJeden('
    SELECT id_pojistence, jmeno, prijmeni, email, telefon, ulice, mesto, psc
    FROM pojistenci
    WHERE id_pojistence = ?
    ', array($id_pojistence));
    }

    /**
     * Uloží nebo edituje pojistníka a dá mu hodnoty z formuláře
     * Pokud ukládá, tak je Id null a pokud jen edituje tak je tam id načtené
     * @param int|bool $id
     * @param array $pojistnik
     * @return void
     */
    public function ulozPojistnika(int|bool $id, array $pojistnik): void
    {
        if (!$id) {
            Db::vloz('pojistenci', $pojistnik);
        } else {
            Db::zmen('pojistenci', $pojistnik, 'WHERE id_pojistence = ?', array($id));
        }
    }

    /**
     * Vypíše všechny záznamy z databáze a zobrazí je v pojištěncích
     * @return array
     */
    public function vypisAll(): array
    {
        return Db::dotazVsechny('
    SELECT id_pojistence, jmeno, prijmeni, ulice, mesto, psc
    FROM pojistenci
    ORDER BY jmeno 
    ');
    }

    /**
     * Vypíše 3 posldní záznamy z DB a zobrazí je v administraci
     * @return array
     */
    public function vypisAllLimit(): array
    {
        return Db::dotazVsechny('
    SELECT id_pojistence, jmeno, prijmeni, ulice, mesto, psc
    FROM pojistenci
    ORDER BY id_pojistence
    LIMIT 3
    ');
    }

    /**
     * Odstraní Pojistníka podle jeho ID
     * @param int $id_pojistence
     * @return void
     */
    public function odstranPojistnik(int $id_pojistence): void
    {
        Db::dotaz('
        DELETE FROM pojistenci
        WHERE id_pojistence = ?
    ', array($id_pojistence));
    }


}