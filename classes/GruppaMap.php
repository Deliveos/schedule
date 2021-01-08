<?php
class GruppaMap extends BaseMap {
  public function findAll() {
    $res = $this->db->query("SELECT gruppa_id AS id, name FROM gruppa");
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
}