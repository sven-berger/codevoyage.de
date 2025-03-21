<?php

class Login {
    private $benutzername;
    private $passwort;
    
    public function __construct(string $benutzername, string $passwort) {
        $this->benutzername = $benutzername;
        $this->passwort = $passwort;
    }

    public function passwortVerschluesseln() {
        return password_hash($this->passwort, PASSWORD_DEFAULT);
    }

    public static function datenAbrufenSql($connection) {
        $sql = "SELECT * FROM bankkonten WHERE beutzername = :benutzername AND passwort = :passwort";
        $statement = $connection->prepare($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}