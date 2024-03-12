<?php

namespace UserColors\Controllers;

use UserColors\database\Connection;

class UsersController {

    public $layout = 'default';

    public function index() {
        $connection = new Connection();
        $tables = $connection->query("SELECT * FROM sqlite_master where type='table';");
        echo '<pre>';
        var_dump($tables);
        die('entrou no Users::index');
    }
}