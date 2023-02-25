<?php
namespace controllers;

use core\Controller;

class LeaderboardController extends Controller
{
    public function index()
    {
        $model = $this->loadModel('Player');
        $this->data['players'] = $model->getPlayers();
        $this->view->render($this->data);
    }
}