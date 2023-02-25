<?php require_once 'views/header_view.php'; ?>
<div class="main">
    <div class="wrapper">
        <div class="content">
        <?php if (isset($errors["not_exist_player"])): ?>
            <h2>Not Found!</h2>
            <p class="notice-fail">Игрок не найден!</p>
        <?php elseif (isset($isUpdated) && $isUpdated): ?>
            <h2>Success!</h2>
            <p class="notice-success">Игрок успешно удален</p>
        <?php else: ?>
            <h2>Delete Player?</h2>
            <a href="/players" class="btn-back">Назад</a>
            <form action="" method="POST" class="reg">
                <p>Вы собираетесь удалить игрока <b><?=$player['nickname']?></b> (<?=$player['firstname']?> <?=$player['lastname']?>)?</p>
                <input type="submit" name="deletePlayer" value="Удалить">
            </form>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once 'views/footer_view.php'; ?>
