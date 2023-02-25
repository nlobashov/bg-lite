<?php
namespace controllers;

use core\Controller;

class PlayersController extends Controller
{
    private $errors = [];

    public function index()
    {
        $model = $this->loadModel('Player');
        $this->data['players'] = $model->getPlayers();
        $this->view->render($this->data);
    }

    public function register()
    {
        if (isset($_POST["registration"]) && $this->validate())
        {
            $model = $this->loadModel('Player');
            if ($model->isAddedPlayer($_POST['nickname']))
                $this->errors['invalid_nickname'] = 'Игрок с таким псевдонимом уже существует';
            else
            {
                $success = $model->addPlayer($_POST['nickname'], $_POST['firstname'], $_POST['lastname']);
                if ($success) $this->data['isRegistered'] = true;
            }
        }
        $this->data['errors'] = $this->errors;
        $this->view->render($this->data);
    }

    public function edit()
    {
        $model = $this->loadModel('Player');
        $player = $model->getPlayer($this->route['id']);
        if ($player === false)
        {
            $this->errors['not_exist_player'] = true;
        }
        $this->data['player'] = $player;
        if (isset($_POST["updatePlayer"]) && $this->validate())
        {
            if ($model->isAddedPlayer($_POST['nickname']) && $player['nickname'] != $_POST['nickname'])
                $this->errors['invalid_nickname'] = 'Игрок с таким псевдонимом уже существует';
            else
            {
                $success = $model->updatePlayer($player['player_id'], $_POST['nickname'], $_POST['firstname'], $_POST['lastname']);
                if ($success) $this->data['isUpdated'] = true;
            }
        }
        $this->data['errors'] = $this->errors;
        $this->view->render($this->data);
    }

    public function delete()
    {
        $model = $this->loadModel('Player');
        $player = $model->getPlayer($this->route['id']);
        if ($player === false)
        {
            $this->errors['not_exist_player'] = true;
        }
        $this->data['player'] = $player;
        if (isset($_POST["deletePlayer"]))
        {
            $success = $model->deletePlayer($player['player_id']);
            if ($success) $this->data['isUpdated'] = true;
        }
        $this->data['errors'] = $this->errors;
        $this->view->render($this->data);
    }

    private function validate() :bool
    {
        if (mb_strlen(trim($_POST['firstname'])) < 1 || mb_strlen(trim($_POST['firstname'])) > 32)
            $this->errors['error_firstname'] = 'Имя должно состоять от 1 до 32 символов!';
        if (mb_strlen(trim($_POST['lastname'])) < 1 || mb_strlen(trim($_POST['lastname'])) > 32)
            $this->errors['error_lastname'] = 'Фамилия должна состоять от 1 до 32 символов!';
        if (mb_strlen(trim($_POST['nickname'])) < 1 || mb_strlen(trim($_POST['nickname'])) > 32)
            $this->errors['error_nickname'] = 'Псевдоним должен состоять от 1 до 32 символов!';
        return empty($this->errors);
    }
}