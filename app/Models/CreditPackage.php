<?php

class CreditPackage {

    private $pdo;

    public function __construct() {
        $this->pdo = connectToDatabase();
    }

    public function getCreditPackageList() {
        $statement = $this->pdo->prepare('SELECT * FROM creditpackages');
        $statement->execute();

        return $statement->fetchAll();
    }

    public function checkIfCreditPackageExists(int $id): bool {
        $statement = $this->pdo->prepare('SELECT * FROM creditpackages WHERE id = :id;');
        $statement->bindValue(':id', $id);
        $statement->execute();
        return count($statement->fetchAll()) > 0;
    }
}
