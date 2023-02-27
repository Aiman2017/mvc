<?php

Trait Database
{

	 private function connect()
	{
        try {
           return new PDO("mysql:hostname=localhost;dbname=" . DBNAME , USER, PASSWORD);
          } catch (PDOException $e)
        {
            die($e->getMessage());
        }
	}

	public function query($query, $data = [])
	{
            $connection =  $this->connect();
            $statement  = $connection->prepare($query);
            $check = $statement->execute($data);
            if ($check) {
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                if (is_array($result) && count($result) > 0) {
                   return $result;
                }
            }
        return false;
	}

}