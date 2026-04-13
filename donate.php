<?php
// Защита от прямого доступа (опционально)
// if (!isset($_GET['key']) || $_GET['key'] !== 'epsilon2025') {
//     header('Location: index');
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поддержать проект | Epsilon</title>
    <link rel="icon" href="/epsilon-logo.png" type="image/png">
    <style>
        :root {
            --primary-red: #ff0000;
            --dark-red: #aa0000;
            --black: #000000;
            --deep-black: #0a0a0a;
            --glow-red: rgba(255, 0, 0, 0.3);
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
            position: relative;
            overflow-x: hidden;
        }

        /* CRT-эффект */
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom,
                transparent 0%,
                rgba(0, 255, 0, 0.02) 50%,
                transparent 100%
            );
            pointer-events: none;
            z-index: 999;
            animation: scanline 8s linear infinite;
            opacity: 0.5;
            mix-blend-mode: multiply;
        }

        @keyframes scanline {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(200%); }
        }

        header {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.2rem;
            border-bottom: 1px solid var(--dark-red);
            position: relative;
        }

        .header-glow {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, transparent 20%, var(--glow-red) 70%);
            opacity: 0.1;
            pointer-events: none;
            animation: rotateGlow 60s infinite linear;
        }

        @keyframes rotateGlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        h1 {
            color: var(--primary-red);
            font-size: 2.8rem;
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.7);
            letter-spacing: 1px;
            animation: glitch 4s infinite;
        }

        @keyframes glitch {
            0%, 100% { text-shadow: 0 0 10px rgba(255,0,0,0.7); }
            20% { text-shadow: 2px 0 10px var(--primary-red), -2px 0 10px var(--dark-red); }
            40% { text-shadow: 0 0 10px rgba(255,0,0,0.7); }
            60% { text-shadow: -2px 0 10px var(--primary-red), 2px 0 10px var(--dark-red); }
            80% { text-shadow: 0 0 10px rgba(255,0,0,0.7); }
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

        .donate-content {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(20, 20, 20, 0.7);
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .donate-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary-red);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
        }

        .donate-content:hover::before {
            transform: scaleX(1);
        }

        .intro {
            text-align: center;
            margin-bottom: 2.5rem;
            color: #cccccc;
            position: relative;
        }

        .intro::after {
            content: '';
            display: block;
            width: 40px;
            height: 2px;
            background: var(--primary-red);
            margin: 1rem auto 0;
            animation: growLine 1.5s ease;
        }

        @keyframes growLine {
            from { width: 0; }
            to { width: 40px; }
        }

        .methods-grid {
            display: grid;
            gap: 1.8rem;
            margin-top: 1.5rem;
        }

        @media (min-width: 768px) {
            .methods-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .method-card {
            background: rgba(30, 30, 30, 0.8);
            border: 1px solid var(--dark-red);
            border-radius: 10px;
            padding: 1.5rem;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .method-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 0, 0, 0.2), transparent);
            transition: left 0.5s;
        }

        .method-card:hover {
            border-color: var(--primary-red);
            box-shadow: 0 6px 20px rgba(255, 0, 0, 0.4);
            transform: translateY(-3px);
        }

        .method-card:hover::before {
            left: 100%;
        }

        .method-title {
            color: var(--primary-red);
            font-size: 1.4rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .method-icon {
            width: 36px;
            height: 36px;
            background: var(--primary-red);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            animation: pulseIcon 2s infinite alternate;
        }

        @keyframes pulseIcon {
            from { box-shadow: 0 0 5px var(--primary-red); }
            to { box-shadow: 0 0 15px var(--primary-red); }
        }

        .method-desc {
            color: #bbbbbb;
            margin-bottom: 1.2rem;
            line-height: 1.5;
        }

        .donate-btn {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-red), #ff3333);
            color: white;
            text-decoration: none;
            padding: 0.7rem 1.4rem;
            border-radius: 6px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-family: 'Courier New', monospace;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 10px rgba(255, 0, 0, 0.3);
        }

        .donate-btn:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 15px rgba(255, 0, 0, 0.5);
            background: linear-gradient(135deg, #ff3333, var(--primary-red));
        }

        .payment-info {
            background: rgba(0, 0, 0, 0.4);
            padding: 0.8rem;
            border-radius: 6px;
            font-family: monospace;
            word-break: break-all;
            margin-top: 0.8rem;
            color: #aaa;
            border-left: 2px solid var(--primary-red);
        }

        .warning {
            background: rgba(255, 0, 0, 0.1);
            border-left: 3px solid var(--primary-red);
            padding: 1rem;
            margin-top: 2rem;
            color: #ccc;
            font-size: 0.95rem;
            border-radius: 0 8px 8px 0;
        }

        .thank-you {
            text-align: center;
            margin-top: 2rem;
            color: var(--primary-red);
            font-style: italic;
            font-size: 1.2rem;
            text-shadow: 0 0 8px rgba(255, 0, 0, 0.5);
        }

        /* Адаптация для мобильных */
        @media (max-width: 768px) {
            body { padding: 1.5rem; }
            h1 { font-size: 2.2rem; }
            .methods-grid { grid-template-columns: 1fr; }
            .donate-btn { padding: 0.6rem 1.2rem; font-size: 0.95rem; }
        }

        @media (max-width: 480px) {
            body { padding: 1rem; }
            h1 { font-size: 1.9rem; }
            .method-card { padding: 1.2rem; }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-glow"></div>
        <h1>Поддержать проект</h1>
        <a href="index" class="back-link">← Вернуться на главную</a>
    </header>

    <div class="donate-content">
        <div class="intro">
            <p>Фонд «Эпсилон» существует благодаря энтузиазму команды и вашей поддержке. Любое пожертвование помогает нам:</p>
            <ul style="list-style: none; margin-top: 1rem; text-align: left; padding-left: 1.5rem;">
                <li style="margin: 0.5rem 0;">• Поддерживать сервер и домен</li>
                <li style="margin: 0.5rem 0;">• Развивать новые разделы</li>
                <li style="margin: 0.5rem 0;">• Создавать эксклюзивный контент</li>
            </ul>
        </div>

        <div class="methods-grid">
            <!-- Boosty -->
            <div class="method-card">
                <div class="method-title">
                    <span class="method-icon">B</span>
                    Boosty
                </div>
                <p class="method-desc">Поддержите нас на платформе для авторов. Доступны разовые и регулярные донаты.</p>
                <a href="https://boosty.to/myneosha" target="_blank" rel="noopener" class="donate-btn">Поддержать</a>
            </div>

            <!-- СБП -->
            <div class="method-card">
                <div class="method-title">
                    <span class="method-icon">₽</span>
                    СБП
                </div>
                <p class="method-desc">Мгновенный перевод через Систему быстрых платежей.</p>
                <a href="https://qr.sberbank.ru/qr?text=+79991234567&amount=0" target="_blank" rel="noopener" class="donate-btn">Перевести</a>
                <div class="payment-info">+7 (999) 123-45-67</div>
            </div>

            <!-- ЮMoney -->
            <div class="method-card">
                <div class="method-title">
                    <span class="method-icon">Y</span>
                    ЮMoney
                </div>
                <p class="method-desc">Анонимная поддержка через кошелёк ЮMoney.</p>
                <a href="https://yoomoney.ru/to/410011234567890" target="_blank" rel="noopener" class="donate-btn">Перевести</a>
                <div class="payment-info">410011234567890</div>
            </div>

            <!-- Техподдержка -->
            <div class="method-card">
                <div class="method-title">
                    <span class="method-icon">?</span>
                    Помощь
                </div>
                <p class="method-desc">Не знаете, как поддержать? Напишите в техническую поддержку.</p>
                <a href="https://t.me/epsilonlabmsbot" target="_blank" rel="noopener" class="donate-btn">Написать</a>
            </div>
        </div>

        <div class="warning">
            ⚠️ Мы не запрашиваем деньги за доступ к закрытым материалам. Все донаты — добровольные.
        </div>

        <div class="thank-you">
            Спасибо, что вы с нами.<br>
            Ваш вклад делает Epsilon сильнее.
        </div>
    </div>

    <!-- Защита от копирования -->
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