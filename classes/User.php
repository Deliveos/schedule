<?php
class User extends Table {
  public $lastname = "";
  public $firstname = "";
  public $patronymic = "";
  public $login = "";
  public $pass = "";
  public $gender_id = 0;
  public $birthday = "";
  public $role_id = 0;
  public $active = 1;

  public function validate() {
    return false;
  }
}