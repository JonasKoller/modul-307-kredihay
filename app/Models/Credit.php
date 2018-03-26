<?php

class Credit {

    private $pdo;

    public function __construct() {
        $this->pdo = connectToDatabase();
    }

    public function fetchAll() {
        $statement = $this->pdo->prepare('SELECT * FROM credit');
        $statement->execute();

        return $statement->fetchAll();

    }

    public function getCreditPackageList() {
      $statement = $this->pdo->prepare('SELECT * FROM creditpackages');
      $statement->execute();

      return $statement->fetchAll();
    }

}
