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

    public function getOpenCreditsSortedByDate() {
      $statement = $this->pdo->prepare('SELECT c.id, c.firstname, c.lastname, (DATE_ADD(begin, INTERVAL (c.numberOfRates * 15) DAY)) AS endDate, cp.name AS creditpackage
                                                    FROM credit c
                                                    INNER JOIN creditpackages cp ON c.fk_creditpackages = cp.id
                                                    WHERE rentalStatus = 0
                                                    ORDER BY begin;');
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getById(int $id) {
        $statement = $this->pdo->prepare('SELECT *, (DATE_ADD(begin, INTERVAL (c.numberOfRates * 15) DAY)) AS endDate
                                                    FROM credit c
                                                    WHERE id = :id;');
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetchAll()[0];
    }

    public function checkIfCreditPackageExists(int $id): bool {
      $statement = $this->pdo->prepare('SELECT * FROM creditpackages WHERE id = :id;');
      $statement->bindValue(':id', $id);
      $statement->execute();
      return count($statement->fetchAll()) > 0;

    }

}
