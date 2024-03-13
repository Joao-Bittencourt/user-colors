<?php

namespace UserColors\models;

use UserColors\database\Connection;

class Color
{
    public $validationErrors = [];

    public function save(array $data)
    {

        $this->validate($data);

        if (empty($this->validationErrors)) {

            $con = new Connection();
            $query = $con->getConnection()->prepare("INSERT INTO colors (name)values ( :name)");
            $query->bindParam(':name', $data['name'], \PDO::PARAM_STR);
            $query->execute();
        }
    }

    protected function validate(array $data)
    {
        if (empty($data['name'])) {
            $this->validationErrors[] = 'Nome não pode ser vazio.';
        }
    }
}
