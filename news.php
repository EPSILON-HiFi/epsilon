<?php
require_once __DIR__ . '/_secure/config.php';

$url = "https://api.vk.com/method/wall.get?owner_id=" . VK_GROUP_ID . "&count=5&access_token=" . VK_API_TOKEN . "&v=5.131";
$response = file_get_contents($url);
$data = json_decode($response, true);

$posts = $data['response']['items'] ?? [];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости | Epsilon</title>
    <link rel="icon" href="/epsilon-logo.png" type="image/png">
    <style>
        :root { --primary-red: #ff0000; --dark-red: #aa0000; --deep-black: #0a0a0a; }
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            background: var(--deep-black);
            color: white;
            font-family: 'Courier New', monospace;
            padding: 1.5rem;
            line-height: 1.6;
        }
        header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--dark-red);
        }
        h1 {
            color: var(--primary-red);
            font-size: 2.2rem;
            text-shadow: 0 0 8px rgba(255,0,0,0.5);
        }
        .back-link {
            display: inline-block;
            margin-top: 1rem;
            color: var(--primary-red);
            text-decoration: none;
        }
        .news-grid {
            max-width: 800px;
            margin: 0 auto;
            display: grid;
            gap: 1.5rem;
        }
        .post {
            background: rgba(20,20,20,0.7);
            border: 1px solid rgba(255,0,0,0.2);
            border-radius: 8px;
            padding: 1.2rem;
        }
        .post:hover { border-color: var(--primary-red); }
        .post-date { color: var(--dark-red); font-size: 0.9rem; margin-bottom: 0.5rem; }
        .post-text { color: #ccc; margin-bottom: 1rem; white-space: pre-wrap; }
        .post-link {
            color: var(--primary-red);
            text-decoration: none;
            font-weight: bold;
        }
        .post-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <header>
        <h1>Новости проекта</h1>
        <a href="index" class="back-link">← Вернуться на главную</a>
    </header>

    <div class="news-grid">
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <div class="post-date"><?= date('d.m.Y H:i', $post['date']) ?></div>
                <div class="post-text"><?= htmlspecialchars(substr($post['text'], 0, 300)) ?>...</div>
                <a href="https://vk.com/wall<?= VK_GROUP_ID ?>_<?= $post['id'] ?>" 
                   target="_blank" class="post-link">Читать полностью →</a>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
    document.addEventListener('contextmenu', e => e.preventDefault());
    document.addEventListener('keydown', e => {
        if (e.key === 'F12' || (e.ctrlKey && e.key === 'U')) e.preventDefault();
    });
    </script>
    
    <style>
.qr-box {
    position: fixed;
    bottom: 20px;
    right: 30px;  /* Закрепляет справа */
    left: auto;   /* Сбрасывает левую сторону */
    cursor: pointer;
    z-index: 9998;
}
.qr-box img {
    width: 100px;
    height: 100px;
    border: 2px solid #aa0000;
    border-radius: 8px;
    transition: 0.3s;
}
.qr-box:hover img {
    border-color: #ff0000;
    box-shadow: 0 0 20px rgba(255, 0, 0, 0.5);
}
.qr-box .tooltip {
    position: absolute;
    bottom: 110px;
    left: 50%;
    transform: translateX(-50%);
    background: #0a0a0a;
    color: #ff0000;
    padding: 8px 12px;
    border: 1px solid #aa0000;
    border-radius: 6px;
    font-size: 12px;
    font-weight: bold;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: 0.3s;
}
.qr-box:hover .tooltip {
    opacity: 1;
    visibility: visible;
}
@media (max-width: 480px) {
    .qr-box .tooltip { display: none; }
}
</style>

<div class="qr-box" onclick="window.open('https://t.me/palma_202', '_blank')">
    <div class="tooltip">СКАНИРУЙ МЕНЯ</div>
    <img src="http://qrcoder.ru/code/?https%3A%2F%2Ft.me%2Fpalma_202&6&0" alt="QR Code">
</div>

</body>
</html>