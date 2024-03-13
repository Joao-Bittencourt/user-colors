<?php

namespace UserColors\Controllers;

class Controller
{

    public $data = [];
    public $render = '';
    private $defaultPathToViews = '/../views/';
    private $defaultExtensionViews = '.php';

    public function layout($data = [])
    {

        $file =  __dir__ . $this->defaultPathToViews . $this->render . $this->defaultExtensionViews;

        if (!file_exists($file)) {
            throw new \Exception("Page {$this->render} not found.");
        }

        $viewData = array_merge($data, $this->data);

        ob_start();
        extract($viewData);
        require $file;

        return ob_get_clean();
    }

    protected function redirect($url)
    {
        header("Location: " . $url, true, 302);
        return;
    }

    public function createFlashMessage(string $message, string $type)
    {
        $_SESSION['FLASH_MESSAGES'][] = ['message' => $message, 'type' => $type];
    }

    public function displayFlasMessage()
    {

        if (!isset($_SESSION['FLASH_MESSAGES'])) {
            return;
        }

        foreach ($_SESSION['FLASH_MESSAGES'] as $messageKey => $message) {
            echo sprintf(
                "<div class='alert alert-%s'>%s</div>",
                $message['type'],
                $message['message']
            );
            
            unset($_SESSION['FLASH_MESSAGES'][$messageKey]);
        }
    }

}
