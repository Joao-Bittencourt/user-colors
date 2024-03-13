<?php

namespace UserColors\Controllers;

use Exception;
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

    public function edit($params) {
        $this->render = 'users_form_edit';
    
        $id = $params['id'] ?? null;
        
        if (!is_numeric($id)) {
            throw new Exception('Parametros invalidos!', 400);
        }

        $connection = new Connection();
        $user = $connection->query("SELECT * FROM users WHERE id = $id;");
        
        if (empty($user)) {
            $this->createFlashMessage("User #$id inexistente!", 'info');               
            $this->redirect('/users');
        } 

        $this->data['user'] = $user[0];
        
    }

    public function update($params) {

        $id = $params['id'] ?? null;

        $user = new User();
        $user->update($id, $this->data['request']);
    
        if (!empty($user->validationErrors)) {

            foreach($user->validationErrors as $error) {
                $this->createFlashMessage($error, 'danger');
            }
            $this->redirect('/users/edit/'. $id);
            return;
        }

        $this->createFlashMessage('Usuário atualizado com sucesso!', 'success');
        
        $this->redirect('/users');
    }

    public function delete($params) {
       
        $id = $params['id'] ?? null;
       
        if (is_numeric($id)) {

            $connection = new Connection();
            $user = $connection->query("SELECT 1 FROM users WHERE id = $id;");
            
            if (empty($user)) {
                $this->createFlashMessage("Usuário #$id inexistente!", 'info');               
            } else {
                $connection->query("DELETE FROM users WHERE id = $id;");
                $this->createFlashMessage('Usuário deletado com sucesso!', 'success');
            }
            $this->redirect('/users');
        }

        throw new Exception('Parametros invalidos!', 400);       
    }
}
