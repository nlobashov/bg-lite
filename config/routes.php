<?php

return [
    '/' => [
        'controller' => 'leaderboard',
        'action' => 'index'
    ],

    '/leaderboard' => [
        'controller' => 'leaderboard',
        'action' => 'index'
    ],

    '/players' => [
        'controller' => 'players',
        'action' => 'index'
    ],

    '/players/register' => [
        'controller' => 'players',
        'action' => 'register'
    ],

    '/players/edit/{id=\d+}' => [
        'controller' => 'players',
        'action' => 'edit'
    ],

    '/players/delete/{id=\d+}' => [
        'controller' => 'players',
        'action' => 'delete'
    ]
];