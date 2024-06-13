<?php

namespace UserColors\models;

use UserColors\database\Connection;

class UserColor
{
    public $validationErrors = [];
    protected $con = null;

    public function __construct(?Connection $connection = null)
    {
        $this->con = $connection ?: new Connection();
    }

    public function findListColorIdInUserColor(int $userId = 0): array
    {
        $query = $this->con->getConnection()->prepare("SELECT color_id FROM user_colors WHERE user_id = :user_id");
        $query->bindParam(':user_id', $userId, \PDO::PARAM_INT);
        $query->execute();

        $results =  $query->fetchAll(\PDO::FETCH_OBJ);

        $return = [];
        foreach ($results as $result) {
            $return[] = $result->color_id;
        }

        return $return;
    }

    public function saveOrUpdate(int $userId, array $data)
    {
        $userColorsSaved =  $this->findListColorIdInUserColor($userId);

        $userColorsRequest = $data;


        $colorIdsToSave = array_diff($userColorsRequest, $userColorsSaved);

        $colorIdsToDelete = array_diff($userColorsSaved, $userColorsRequest);

        foreach ($colorIdsToSave as $colorId) {
            $this->save($userId, $colorId);
        }

        foreach ($colorIdsToDelete as $colorId) {
            $this->delete($userId, $colorId);
        }
    }

    private function save($userId, $colorId)
    {
        $query = $this->con->getConnection()->prepare("INSERT INTO user_colors (user_id, color_id)values ( :user_id, :color_id)");
        $query->bindParam(':user_id', $userId, \PDO::PARAM_INT);
        $query->bindParam(':color_id', $colorId, \PDO::PARAM_INT);
        $query->execute();
    }

    private function delete($userId, $colorId)
    {
        $query = $this->con->getConnection()->prepare("DELETE FROM user_colors WHERE user_id = :user_id AND color_id = :color_id;");
        $query->bindParam(':user_id', $userId, \PDO::PARAM_INT);
        $query->bindParam(':color_id', $colorId, \PDO::PARAM_INT);
        $query->execute();
    }
}
