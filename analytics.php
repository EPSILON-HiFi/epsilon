<?php
if (!isset($_GET['key']) || $_GET['key'] !== 'epsilon2025') {
    http_response_code(403);
    die('Доступ запрещён');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Аналитика | Epsilon</title>
    <style>
        :root { --primary-red: #ff0000; --deep-black: #0a0a0a; }
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            background: var(--deep-black);
            color: white;
            font-family: 'Courier New', monospace;
            padding: 2rem;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: rgba(20,20,20,0.7);
            border: 1px solid var(--primary-red);
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
        }
        .stat-value {
            font-size: 2.2rem;
            color: var(--primary-red);
            margin: 0.5rem 0;
        }
        .stat-label { color: #aaa; text-transform: uppercase; font-size: 0.9rem; }
        canvas { width: 100%; height: 200px; margin: 1rem 0; }
        table { width: 100%; border-collapse: collapse; margin: 1rem 0; }
        th, td { padding: 0.5rem; text-align: left; border-bottom: 1px solid #333; }
        th { color: var(--primary-red); }
        .btn {
            background: var(--primary-red);
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 4px;
            cursor: pointer;
            font-family: inherit;
        }
    </style>
</head>
<body>
    <h1>Аналитика Epsilon</h1>
    
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Всего</div>
            <div class="stat-value" id="total">—</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Уникальных</div>
            <div class="stat-value" id="unique">—</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Онлайн</div>
            <div class="stat-value" id="online">—</div>
        </div>
    </div>

    <canvas id="chart"></canvas>

    <h3>Источники</h3>
    <table id="referrers">
        <thead><tr><th>Источник</th><th>Переходов</th></tr></thead>
        <tbody></tbody>
    </table>

    <h3>Последние визиты</h3>
    <table id="history">
        <thead><tr><th>IP</th><th>Страница</th><th>Время</th></tr></thead>
        <tbody></tbody>
    </table>

    <button class="btn" onclick="exportData()">Экспорт JSON</button>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        async function fetchStats() {
            const res = await fetch('/track.php?action=stats');
            const data = await res.json();

            document.getElementById('total').textContent = data.total;
            document.getElementById('unique').textContent = data.unique;
            document.getElementById('online').textContent = data.online;

            const ctx = document.getElementById('chart').getContext('2d');
            if (window.chart) window.chart.destroy();
            window.chart = new Chart(ctx, {
                type: 'bar',
                 { labels: data.chart.labels, datasets: [{ label: 'Посещений', data: data.chart.values, backgroundColor: 'rgba(255,0,0,0.6)' }] },
                options: { responsive: true, scales: { y: { beginAtZero: true } } }
            });

            const refBody = document.querySelector('#referrers tbody');
            refBody.innerHTML = '';
            data.referrers.forEach(r => {
                const row = `<tr><td>${r.source}</td><td>${r.count}</td></tr>`;
                refBody.innerHTML += row;
            });

            const histBody = document.querySelector('#history tbody');
            histBody.innerHTML = '';
            data.history.forEach(v => {
                const row = `<tr><td>${v.ip}</td><td>${v.page}</td><td>${v.time}</td></tr>`;
                histBody.innerHTML += row;
            });
        }

        async function exportData() {
            const res = await fetch('track.php?action=export');
            const blob = await res.blob();
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'epsilon_analytics.json';
            a.click();
            URL.revokeObjectURL(url);
        }

        fetchStats();
        setInterval(fetchStats, 10000);
    </script>
</body>
</html>