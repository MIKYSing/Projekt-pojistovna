<?php
class SpravcePojistencu
{
  public function detailPojistnik(string $id_pojistence): array
  {
    return DB::dotazJeden('
    SELECT id_pojistence, jmeno, prijmeni, email, telefon, ulice, mesto, psc
    FROM pojistenci
    WHERE id_pojistence = ?
    ',array($id_pojistence));
  } 

  public function vypisAll():array
  {
    return Db::dotazVsechny('
    SELECT id_pojistence, jmeno, prijmeni, ulice, mesto, psc
    FROM pojistenci
    ORDER BY jmeno DESC
    ');
  }
}