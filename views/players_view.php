<?php require_once 'views/header_view.php'; ?>
<div class="main">
    <div class="wrapper-table-players">
        <div class="content">
            <h2>List players</h2>
            <a href="/players/register" class="btn-new-player">New player</a>
            <table class="table__players">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Псевдоним</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th colspan="2">Управление</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($players as $player):?>
                    <tr>
                        <td class="column-id column-hover"><?= $player['player_id']?></td>
                        <td class="column-hover"><b><?= $player['nickname']?></b></td>
                        <td class="column-hover"><?= $player['firstname']?></td>
                        <td class="column-hover"><?= $player['lastname']?></td>
                        <td class="column-button"><a href="/players/edit/<?= $player['player_id']?>" class="table__btn-edit">Редакт.</a></td>
                        <td class="column-button"><a href="/players/delete/<?= $player['player_id']?>" class="table__btn-delete">x</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'views/footer_view.php'; ?>