<?php

namespace UserColors\models;

use UserColors\database\Connection;

class User
{

    public $validationErrors = [];

    public function save(array $data)
    {
        
        $this->validate($data);
        
        if (empty($this->validationErrors)) {
            
            $con = new Connection();
            $query = $con->getConnection()->prepare("INSERT INTO users (name, email)values ( :name, :email)");
            $query->bindParam(':name', $data['name'], \PDO::PARAM_STR);
            $query->bindParam(':email', $data['email'], \PDO::PARAM_STR);
            $query->execute();
        }
    }

    protected function validate(array $data)
    {
        if (empty($data['name'])) {
            $this->validationErrors[] = 'Nome não pode ser vazio.';
        }

        if (empty($data['email'])) {
            $this->validationErrors[] = 'Email não pode ser vazio.';
        }
    }
}
