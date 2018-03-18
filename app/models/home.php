<?php

class Home extends Model
{
  protected $tableName = 'home';


  public function find(){
    $stmt = $this->db->prepare(
        "SELECT * FROM {$this->tableName}"
    );
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $home = $stmt->fetch();
    return $home;
  }

  public function update(){
    $stmt = $this->db->prepare(
        "ALTER * FROM {$this->tableName}"
    );
  }
}
?>
