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

    public function updateChanges(int $id, string $lastname, string $firstname, string $email, string $phone, int $rentalStatus, int $creditpackages) {
      $statement = $this->pdo->prepare('UPDATE credit
                                                  SET lastname = :lastname, firstname = :firstname , email = :email, phone = :phone, rentalStatus = :rentalStatus, fk_creditpackages = :creditpackages
                                                  WHERE id = :id;');
      $statement->bindValue(':id', $id);
      $statement->bindValue(':lastname', $lastname);
      $statement->bindValue(':firstname', $firstname);
      $statement->bindValue(':email', $email);
      $statement->bindValue(':phone', $phone);
      $statement->bindValue(':rentalStatus', $rentalStatus);
      $statement->bindValue(':creditpackages', $creditpackages);

      $statement->execute();
    }

    public function insertCredit(string $lastname, string $firstname, string $email, string $phone, int $numberOfRates, int $creditpackages) {
      $statement = $this->pdo->prepare('INSERT INTO credit (lastname, firstname, email, phone, numberOfRates,fk_creditpackages, begin)
                                        VALUES (:lastname, :firstname, :email, :phone, :numberOfRates, :creditpackages, NOW());');
      $statement->bindValue(':lastname', $lastname);
      $statement->bindValue(':firstname', $firstname);
      $statement->bindValue(':email', $email);
      $statement->bindValue(':phone', $phone);
      $statement->bindValue(':numberOfRates', $numberOfRates);
      $statement->bindValue(':creditpackages', $creditpackages);

      $statement->execute();

    }
}
