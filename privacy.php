<?php
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Политика конфиденциальности | Epsilon</title>
    <link rel="icon" href="/epsilon-logo.png" type="image/png">
    <style>
        :root {
            --primary-red: #ff0000;
            --dark-red: #aa0000;
            --black: #000000;
            --deep-black: #0a0a0a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--deep-black);
            color: white;
            font-family: 'Courier New', monospace;
            padding: 2rem;
            line-height: 1.6;
        }

        header {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.2rem;
            border-bottom: 1px solid var(--dark-red);
        }

        h1 {
            color: var(--primary-red);
            font-size: 2.8rem;
            text-shadow: 0 0 8px rgba(255, 0, 0, 0.5);
            letter-spacing: 1px;
        }

        .back-link {
            display: inline-block;
            margin-top: 1rem;
            color: var(--primary-red);
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .policy-content {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(20, 20, 20, 0.7);
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 0, 0, 0.2);
        }

        h2 {
            color: var(--primary-red);
            font-size: 1.8rem;
            margin: 1.5rem 0 1rem;
        }

        p {
            margin-bottom: 1rem;
            color: #cccccc;
        }

        ul {
            margin: 1rem 0 1.5rem;
            padding-left: 1.5rem;
        }

        li {
            margin-bottom: 0.6rem;
            color: #cccccc;
        }

        .last-updated {
            color: var(--dark-red);
            font-style: italic;
            text-align: center;
            margin-top: 2rem;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Политика конфиденциальности</h1>
        <a href="index" class="back-link">← Вернуться на главную</a>
    </header>

    <div class="policy-content">
        <p><strong>Последнее обновление:</strong> 1 февраля 2026 г.</p>

        <p>Фонд «Эпсилон» уважает вашу конфиденциальность и стремится защищать ваши личные данные. Настоящая Политика конфиденциальности описывает, как мы собираем, используем и защищаем информацию, полученную от пользователей сайта <strong>https://epsilon.hgweb.ru</strong>.</p>

        <h2>1. Собираемая информация</h2>
        <p>При посещении нашего сайта могут автоматически собираться следующие данные:</p>
        <ul>
            <li>IP-адрес устройства</li>
            <li>Тип браузера и операционной системы</li>
            <li>Страницы, которые вы посещаете</li>
            <li>Источник перехода (реферер)</li>
            <li>Дата и время визита</li>
        </ul>

        <h2>2. Цели сбора данных</h2>
        <p>Собранная информация используется исключительно для:</p>
        <ul>
            <li>Анализа трафика и улучшения работы сайта</li>
            <li>Обеспечения безопасности и предотвращения атак</li>
            <li>Генерации статистики (без идентификации личности)</li>
        </ul>

        <h2>3. Использование cookies</h2>
        <p>Наш сайт <strong>не использует файлы cookie</strong> для отслеживания пользователей. Все данные хранятся только на сервере и не передаются третьим лицам.</p>

        <h2>4. Передача данных</h2>
        <p>Мы <strong>не продаем, не обмениваем и не передаем</strong> ваши персональные данные третьим лицам. Информация используется только внутри проекта «Epsilon».</p>

        <h2>5. Хранение данных</h2>
        <p>Данные хранятся в защищённой базе SQLite на сервере. Доступ к ним имеют только авторизованные администраторы. Срок хранения — до тех пор, пока это необходимо для функционирования сайта.</p>

        <h2>6. Ваши права</h2>
        <p>Вы имеете право:</p>
        <ul>
            <li>Запросить информацию о том, какие данные о вас хранятся</li>
            <li>Потребовать удаления ваших данных</li>
            <li>Отказаться от дальнейшего сбора информации</li>
        </ul>
        <p>Для этого свяжитесь с нами через <a href="https://t.me/epsilonlabmsbot" style="color:var(--primary-red); text-decoration:underline;" target="_blank" rel="noopener">техническую поддержку</a>.</p>

        <h2>7. Изменения в политике</h2>
        <p>Мы оставляем за собой право обновлять эту политику. Все изменения вступают в силу немедленно после публикации на этой странице.</p>

        <p class="last-updated">© HiFi. Все права защищены.</p>
    </div>
>
    <script>
    (function() {
        document.addEventListener('contextmenu', e => e.preventDefault());
        document.addEventListener('selectstart', e => e.preventDefault());
        document.addEventListener('keydown', e => {
            if (
                e.key === 'F12' ||
                (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'J')) ||
                (e.ctrlKey && e.key === 'U')
            ) {
                e.preventDefault();
                return false;
            }
        });
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('dragstart', e => e.preventDefault());
        });
        document.body.style.userSelect = 'none';
    })();
    </script>
</body>
</html>