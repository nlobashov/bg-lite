<?php require_once 'views/header_view.php'; ?>
<div class="main">
    <div class="wrapper">
        <div class="content">
        <?php if (isset($isRegistered) && $isRegistered): ?>
            <h2>Success!</h2>
            <p class="notice-success">Новый игрок зарегистрирован!</p>
        <?php else: ?>
            <h2>New Player</h2>
            <form action="" method="POST" class="reg">
                <input type="text" name="nickname" placeholder="Псевдоним" autocomplete="off">
                <?php if (isset($errors["error_nickname"])): ?>
                    <p><?= $errors["error_nickname"] ?></p>
                <?php endif; ?>
                <?php if (isset($errors["invalid_nickname"])): ?>
                    <p><?= $errors["invalid_nickname"] ?></p>
                <?php endif; ?>
                <input type="text" name="firstname" placeholder="Имя" autocomplete="off">
                <?php if (isset($errors["error_firstname"])): ?>
                    <p><?= $errors["error_firstname"] ?></p>
                <?php endif; ?>
                <input type="text" name="lastname" placeholder="Фамилия" autocomplete="off">
                <?php if (isset($errors["error_lastname"])): ?>
                    <p><?= $errors["error_lastname"] ?></p>
                <?php endif; ?>
                <input type="submit" name="registration" value="Регистрация">
            </form>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once 'views/footer_view.php'; ?>
