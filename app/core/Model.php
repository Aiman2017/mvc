<?php

class Model
{
    use Database;
    protected $table = 'tb_name';
    protected $limit = 10;
    protected $offset = 0;

    //return multiple row database
    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = trim(
            'SELECT * FROM ' . $this->table . ' WHERE ' . setEqualForID($keys, ' = :') . setEqualForID($keys_not, ' != :') ,
            ' && ')
            .' limit ' . $this->limit . ' offset ' . $this->offset;
        $data = array_merge( $data, $data_not);

        return $this->query($query,$data);
    }

    //return one row database
    public function first($data, $data_not = [])
    {

    }

    //insert into database
    public function insert($data)
    {
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (".implode(",", $keys). ") VALUES (:" .implode(",:", $keys) .")";
        $this->query($query, $data);
        return false;
    }

    //update into database
    public function update($id, $data, $id_column = 'id')
    {

    }

    //delete from database
    public function delete($id, $id_column = 'id')
    {
        $data[$id_column] = $id; // id => 6
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $id_column . '=:' . $id_column ;

        self::query($query, $data);
    }
}