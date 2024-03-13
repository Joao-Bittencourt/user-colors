<?php

namespace UserColors\Controllers;

use UserColors\Controllers\Controller;
use UserColors\database\Connection;
use UserColors\models\User;

class UsersController extends Controller
{

    public function index()
    {
        $this->render = 'users_list';
        
        $connection = new Connection();
        $users = $connection->query("SELECT * FROM users;");
        
        $this->data['users'] = $users;
    }
    
    public function create() {
        $this->render = 'users_form_create';
    }

    public function store() {

        $user = new User();
        $user->save($this->data['request']);
    
        if (!empty($user->validationErrors)) {

            foreach($user->validationErrors as $error) {
                $this->createFlashMessage($error, 'danger');
            }
            $this->redirect('/users/create');
            return;
        }

        $this->createFlashMessage('Cliente cadastrado com sucesso!', 'success');
        
        $this->redirect('/users');
    }
}
