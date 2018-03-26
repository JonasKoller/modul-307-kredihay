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

    public function fetchAllOpenCreditsSortedByDate() {
        $statement = $this->pdo->prepare('SELECT 
                                                      c.id,
                                                      c.firstname,
                                                      c.lastname,
                                                      (DATE_ADD(begin, INTERVAL (c.numberOfRates * 15) DAY)) AS endDate,
                                                      cp.name AS creditpackage
                                                    FROM credit c 
                                                    INNER JOIN creditpackages cp ON c.fk_creditpackages = cp.id
                                                    WHERE rentalStatus = 0 
                                                    ORDER BY begin;');
        $statement->execute();

        return $statement->fetchAll();
    }

}
