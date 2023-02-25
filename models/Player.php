<?php

namespace models;

class Player extends \core\Model
{
    const TABLE_NAME = 'players';

    public function addPlayer($nickname, $firstname, $lastname) :bool
    {
        $nickname = htmlentities(trim($nickname));
        $firstname = htmlentities(trim($firstname));
        $lastname = htmlentities(trim($lastname));
        $newPlayer = [
            "nickname" => $nickname,
            "firstname" => $firstname,
            "lastname" => $lastname
        ];
        $stmt = $this->db->insert(self::TABLE_NAME, $newPlayer);
        if ($stmt) return true;
        return false;
    }

    public function updatePlayer($playerID, $nickname, $firstname, $lastname) :bool
    {
        $id = (int)$playerID;
        $nickname = htmlentities(trim($nickname));
        $firstname = htmlentities(trim($firstname));
        $lastname = htmlentities(trim($lastname));
        $updatedPlayer = [
            "nickname" => $nickname,
            "firstname" => $firstname,
            "lastname" => $lastname
        ];
        $stmt = $this->db->updateRowById(self::TABLE_NAME, $id, $updatedPlayer);
        if ($stmt) return true;
        return false;
    }

    public function getPlayer($id)
    {
        $row = $this->db->getRowById(self::TABLE_NAME, $id);
        if (!$row) return false;
        return [
            'player_id' => $row['id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'nickname' => $row['nickname']
        ];
    }

    public function getPlayers(): array
    {
        $listPlayers = $this->db->getRows(self::TABLE_NAME);
        $players = [];
        foreach ($listPlayers as $player)
        {
            $players[] =
                [
                    'player_id' => $player['id'],
                    'firstname' => $player['firstname'],
                    'lastname' => $player['lastname'],
                    'nickname' => $player['nickname']
                ];
        }
        return $players;
    }

    public function deletePlayer($id) :bool
    {
        $id = (int)$id;
        if ($id <= 0) return false;
        return $this->db->deleteRowById(self::TABLE_NAME, $id);
    }

    public function isAddedPlayer($nickname) :bool
    {
        $nickname = htmlentities(trim($nickname));
        $sql = 'SELECT * FROM `players` WHERE `nickname` = :nickname';
        $params = ['nickname' => $nickname];
        $stmt = $this->db->safeQuery($sql, $params);
        $infoPlayer = $stmt->fetch();
        return !empty($infoPlayer);
    }
}
