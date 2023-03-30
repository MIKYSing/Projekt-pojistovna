<?php

class SpravcePojisteni
{
    public function detailPojisteni(int $id_pojistnika): array
    {
        return Db::dotazVice('
        SELECT id_pojisteni, nazev, castka,predmet, platnost_od,platnost_do
        FROM pojisteni
        WHERE id_pojistnika = ?
        ', array($id_pojistnika));
    }
    public function detailPojistka(int $id_pojisteni): array
    {
        return Db::dotazJeden('
    SELECT id_pojisteni,id_pojistnika, nazev, castka,predmet, platnost_od,platnost_do
    FROM pojisteni
    WHERE id_pojisteni = ?
    ', array($id_pojisteni));
    }
    public function vypisAllPojisteni(): array
    {
        return Db::dotazVsechny('
        SELECT id_pojisteni, nazev, castka, predmet, platnost_od, platnost_do
        FROM pojisteni
        ORDER BY nazev
        ');
    }
    public function vypisAllPojisteniLimit(): array
    {
        return Db::dotazVsechny('
        SELECT id_pojisteni, nazev, castka, predmet, platnost_od, platnost_do
        FROM pojisteni
        ORDER BY id_pojisteni DESC
        LIMIT 3
        ');
    }
    public function ulozPojistne(int|bool $id, array $pojisteni): void
    {
        if (!$id) {
            Db::vloz('pojisteni', $pojisteni);
        } else {
            Db::zmen('pojisteni', $pojisteni, 'WHERE id_pojisteni = ?', array($id));
        }
    }
    public function odstranPojisteni(int $id_pojisteni) : void
    {
        Db::dotaz('
        DELETE FROM pojisteni
        WHERE id_pojisteni = ?
    ', array($id_pojisteni));
    }
    public function odstranPojistku(int $id_pojistnika) : void
    {
        Db::dotaz('
        DELETE FROM pojisteni
        WHERE id_pojistnika = ?
    ', array($id_pojistnika));
    }
}