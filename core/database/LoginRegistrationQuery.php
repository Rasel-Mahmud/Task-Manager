<?php

namespace TaskList\Core\Database;
use PDO;
class LoginRegistrationQuery {
  protected $pdo;
  public function __construct($pdo){
    $this->pdo = $pdo;
  }

  public function login($username){
    $statemet = $this->pdo->prepare("SELECT id, password FROM users WHERE email = '{$username}'");
    $statemet->execute();
    return $statemet->fetch(PDO::FETCH_ASSOC);
  }

  public function registration($username, $hash){
    $statemet = $this->pdo->prepare("INSERT INTO users(email, password) VALUES('{$username}', '{$hash}')");
    return $statemet->execute();
  }

  public function getEmail($username){
    $sql = "SELECT email FROM users WHERE email = '{$username}'";
    $statemet = $this->pdo->prepare($sql);
    $statemet->execute();
    return $statemet->fetch(PDO::FETCH_ASSOC);
  }
}