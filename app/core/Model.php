<?php

Trait Model
{
    use Database;

    protected $table = 'dbname';

    public function findAll()
    {
        $query = 'SELECT * FROM ' .$this->table;
        return $this->query($query);
    }
    //get all the row on our database
    public function where($keys, $not_key = [])
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE ';
        $query .= trim(getKeysFromData($keys, ' = :') . getKeysFromData($not_key, ' = :'), ' && ');
        show($keys);
        if ($this->query($query, $keys)) {
            return $this->query($query, $keys);
        } else {
            echo 'This person  is not in our database';
        }
        return false;
    }

    //get one  row on our database
    public function first($keys)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE ';
        $query .= trim(getKeysFromData($keys, ' = :'), ' && ');

        if ($this->query($query, $keys)) {
            return $this->query($query, $keys)[0];
        } else {
            echo 'This person is not in our database';
        }
        return false;
    }

    public function insert($keys)
    {
            $data = array_keys($keys);
                $query = 'INSERT INTO ' . $this->table . ' ('  . implode(",", $data) . ') VALUES (:' . implode(",:", $data) .')' ;
                $this->query($query, $keys);

         return false;
    }

    public function update($id, $data, $id_column = 'id')
    {

        $query = ' UPDATE ' . $this->table . ' SET ';
        $query .= trim(setEqualForIDS($data, ' = :'), ', ') .  'WHERE ' . $id_column . ' = :'  . $id_column;
        $data[$id_column] = $id;
        if ($id) {
            $this->query($query, $data );
            echo 'The user was updated';
        }
    }

    public function delete($id, $id_column = 'id')
    {
        if (!empty($id)) {
            $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $id_column . ' = :' . $id_column;
            $this->query($query, $id);
            echo 'The user has been deleted from our database';
        }
        return false;
    }
}