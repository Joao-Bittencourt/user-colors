<?php

namespace UserColors\Controllers;

use Exception;
use UserColors\Controllers\Controller;
use UserColors\database\Connection;
use UserColors\models\Color;
use UserColors\models\User;

class ColorsController extends Controller
{

    public function index()
    {
        $this->render = 'colors_list';
        
        $connection = new Connection();
        $colors = $connection->query("SELECT * FROM colors;");
        
        $this->data['colors'] = $colors;
    }
    
    public function create() {
        $this->render = 'colors_form_create';
    }

    public function store() {

        $color = new Color();
        $color->save($this->data['request']);
    
        if (!empty($color->validationErrors)) {

            foreach($color->validationErrors as $error) {
                $this->createFlashMessage($error, 'danger');
            }
            $this->redirect('/colors/create');
            return;
        }

        $this->createFlashMessage('Cor cadastrada com sucesso!', 'success');
        
        $this->redirect('/colors');
    }

    public function delete($params) {
       
        $id = $params['id'] ?? null;
       
        if (is_numeric($id)) {

            $connection = new Connection();
            $color = $connection->query("SELECT * FROM colors WHERE id = $id;");
            
            if (empty($color)) {
                $this->createFlashMessage("Cor #$id inexistente!", 'info');               
            } else {
                $connection->query("DELETE FROM colors WHERE id = $id;");
                $this->createFlashMessage('Cor deletada com sucesso!', 'success');
            }
            $this->redirect('/colors');
        }

        throw new Exception('Parametros invalidos!', 400);       
    }
}
