<?php require_once 'views/header_view.php'; ?>
<div class="main">
    <div class="wrapper">
        <div class="content">
            <h2>Leaderboard</h2>
            <?php foreach ($players as $player): ?>
            <div class="row">
                <div class="player-position-gold"></div>
                <div class="block-avatar">
                    <img src="/resources/img/ava_profile.jpg" alt="aff">
                </div>
                <div class="block-name">
                    <div class="full-name">
                        <p><?= $player['nickname'] ?></p>
                        <p><?= $player['firstname'] . ' ' . $player['lastname'] ?></p>
                    </div>
                </div>
                <div class="block-statistics">
                    <p>Рейтинг</p>
                    <p class="rating"><span class="rating">0</span></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require_once 'views/footer_view.php'; ?>