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

    public function update(int $id, array $data)
    {
        $this->validate($data);

        if (empty($this->validationErrors)) {
            $con = new Connection();
            $query = $con->getConnection()->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
            $query->bindParam(':id', $id, \PDO::PARAM_INT);
            $query->bindParam(':name', $data['name'], \PDO::PARAM_STR);
            $query->bindParam(':email', $data['email'], \PDO::PARAM_STR);
            $query->execute();

            if (!empty($data['color_id'])) {
                $userColor = new UserColor();
                $userColor->saveOrUpdate($id, $data['color_id']);
            }
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
