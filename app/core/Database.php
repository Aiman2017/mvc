<?php

Trait Database
{

    private static function connect()
    {
        try {
           $con = new PDO('mysql:hostname='. DBSERVER .';dbname='.DBNAME, USER, PASSWORD, OPTIONS);
        }catch (PDOException $e) {
            die('you dont have the correct name of database');
        }

        return $con;
    }

    //read database
    private function query($query, $data = [])
    {
        $con = self::connect();
        $statement = $con->prepare($query);
        $check = $statement->execute($data);
        ;
        if ($check) {
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result)) {
                return $result;
            }
        }
        return false;
    }

    private function getRow($query, $data = [])
    {
        $con = self::connect();
        $statement = $con->prepare($query);
        $check = $statement->execute($data);
        ;
        if ($check) {
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result)) {
                return $result[0];
            }
        }
        return false;
    }
}