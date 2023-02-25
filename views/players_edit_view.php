<?php require_once 'views/header_view.php'; ?>
<div class="main">
    <div class="wrapper">
        <div class="content">
        <?php if (isset($errors["not_exist_player"])): ?>
            <h2>Not Found!</h2>
            <p class="notice-fail">Игрок не найден!</p>
        <?php elseif (isset($isUpdated) && $isUpdated): ?>
            <h2>Success!</h2>
            <p class="notice-success">Данные игрока обновлены!</p>
        <?php else: ?>
            <h2>Editor Player</h2>
            <a href="/players" class="btn-back">Назад</a>
            <form action="" method="POST" class="reg">
                <input type="hidden" name="player_id" value="<?=$player['player_id']?>">
                <input type="text" name="nickname" placeholder="Псевдоним" value="<?=$player['nickname']?>" autocomplete="off">
                <?php if (isset($errors["error_nickname"])): ?>
                    <p><?= $errors["error_nickname"] ?></p>
                <?php endif; ?>
                <?php if (isset($errors["invalid_nickname"])): ?>
                    <p><?= $errors["invalid_nickname"] ?></p>
                <?php endif; ?>
                <input type="text" name="firstname" placeholder="Имя" value="<?=$player['firstname']?>" autocomplete="off">
                <?php if (isset($errors["error_firstname"])): ?>
                    <p><?= $errors["error_firstname"] ?></p>
                <?php endif; ?>
                <input type="text" name="lastname" placeholder="Фамилия" value="<?=$player['lastname']?>" autocomplete="off">
                <?php if (isset($errors["error_lastname"])): ?>
                    <p><?= $errors["error_lastname"] ?></p>
                <?php endif; ?>
                <input type="submit" name="updatePlayer" value="Обновить">
            </form>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once 'views/footer_view.php'; ?>
