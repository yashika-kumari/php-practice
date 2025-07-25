<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Aesthetic Table</title>
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(120deg, #f8bbd0 0%, #fff1f9 50%, #b39ddb 100%);
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            transition: background 0.8s;
        }
        body.theme-dark {
            background: linear-gradient(120deg, #2a133b 0%, #3c1d5a 60%, #000 100%);
        }
        .floating-blobs {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            pointer-events: none;
            z-index: 0;
        }
        .blob {
            position: absolute;
            border-radius: 50%;
            opacity: 0.35;
            filter: blur(12px);
            animation: float 12s ease-in-out infinite alternate;
            transition: background 0.8s;
        }
        .blob1 {
            width: 320px; height: 320px;
            background: radial-gradient(circle, #f8bbd0 60%, #fff0 100%);
            top: -80px; left: -80px;
            animation-delay: 0s;
        }
        .blob2 {
            width: 220px; height: 220px;
            background: radial-gradient(circle, #b39ddb 60%, #fff0 100%);
            bottom: 10vh; right: 8vw;
            animation-delay: 2s;
        }
        .blob3 {
            width: 180px; height: 180px;
            background: radial-gradient(circle, #f06292 60%, #fff0 100%);
            top: 60vh; left: 60vw;
            animation-delay: 4s;
        }
        body.theme-dark .blob1 {
            background: radial-gradient(circle, #6a1b9a 60%, #0000 100%);
        }
        body.theme-dark .blob2 {
            background: radial-gradient(circle, #4527a0 60%, #0000 100%);
        }
        body.theme-dark .blob3 {
            background: radial-gradient(circle, #311b92 60%, #0000 100%);
        }
        @keyframes float {
            0% { transform: translateY(0) scale(1);}
            100% { transform: translateY(-40px) scale(1.08);}
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: rgba(255,255,255,0.85);
            border-radius: 32px;
            box-shadow: 0 8px 48px 0 rgba(173, 20, 87, 0.10), 0 2px 16px #e1bee7;
            padding: 48px 36px 36px 36px;
            position: relative;
            z-index: 2;
            overflow: hidden;
            backdrop-filter: blur(2px);
            animation: fadeInUp 1.2s cubic-bezier(.23,1.01,.32,1) both;
            transition: background 0.8s, box-shadow 0.8s;
        }
        body.theme-dark .container {
            background: rgba(40, 20, 60, 0.93);
            box-shadow: 0 8px 48px 0 rgba(40, 20, 60, 0.25), 0 2px 16px #311b92;
        }
        /* Embroidery SVG pattern overlay */
        .embroidery-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            opacity: 0.22;
            background: url('data:image/svg+xml;utf8,<svg width="320" height="320" viewBox="0 0 320 320" fill="none" xmlns="http://www.w3.org/2000/svg"><g stroke="%23e1bee7" stroke-width="2"><circle cx="60" cy="60" r="40"/><circle cx="260" cy="60" r="30"/><circle cx="160" cy="160" r="60"/><circle cx="60" cy="260" r="30"/><circle cx="260" cy="260" r="40"/><path d="M60 20 Q80 80 160 100 Q240 120 260 60" stroke="%23f8bbd0" stroke-width="2" fill="none"/><path d="M60 260 Q120 200 160 220 Q200 240 260 260" stroke="%23f06292" stroke-width="2" fill="none"/><path d="M20 160 Q100 180 160 160 Q220 140 300 160" stroke="%23ba68c8" stroke-width="2" fill="none"/></g></svg>');
            background-size: 320px 320px;
            background-repeat: repeat;
            animation: embroideryMove 18s linear infinite;
            transition: opacity 0.8s, background 0.8s;
        }
        body.theme-dark .embroidery-bg {
            opacity: 0.13;
            background: url('data:image/svg+xml;utf8,<svg width="320" height="320" viewBox="0 0 320 320" fill="none" xmlns="http://www.w3.org/2000/svg"><g stroke="%23512da8" stroke-width="2"><circle cx="60" cy="60" r="40"/><circle cx="260" cy="60" r="30"/><circle cx="160" cy="160" r="60"/><circle cx="60" cy="260" r="30"/><circle cx="260" cy="260" r="40"/><path d="M60 20 Q80 80 160 100 Q240 120 260 60" stroke="%237c4dff" stroke-width="2" fill="none"/><path d="M60 260 Q120 200 160 220 Q200 240 260 260" stroke="%236a1b9a" stroke-width="2" fill="none"/><path d="M20 160 Q100 180 160 160 Q220 140 300 160" stroke="%23311b92" stroke-width="2" fill="none"/></g></svg>');
        }
        @keyframes embroideryMove {
            0% { background-position: 0 0; }
            100% { background-position: 80px 80px; }
        }
        .container > *:not(.embroidery-bg) {
            position: relative;
            z-index: 1;
        }
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(60px);}
            100% { opacity: 1; transform: translateY(0);}
        }
        h2 {
            text-align: center;
            color: #f06292;
            margin-bottom: 36px;
            letter-spacing: 2px;
            font-weight: 800;
            font-size: 2.3em;
            text-shadow: 0 4px 16px #f8bbd0, 0 1px 0 #fff;
            position: relative;
            z-index: 1;
            animation: fadeIn 1.5s 0.2s both;
            transition: color 0.8s, text-shadow 0.8s;
        }
        body.theme-dark h2 {
            color: #b388ff;
            text-shadow: 0 4px 16px #311b92, 0 1px 0 #000;
        }
        .theme-btn {
            display: block;
            margin: 0 auto 28px auto;
            padding: 10px 32px;
            border-radius: 24px;
            border: none;
            background: linear-gradient(90deg, #f06292 0%, #ba68c8 100%);
            color: #fff;
            font-family: inherit;
            font-size: 1.1em;
            font-weight: 600;
            letter-spacing: 1px;
            box-shadow: 0 2px 12px #e1bee7;
            cursor: pointer;
            transition: background 0.5s, color 0.5s, box-shadow 0.5s;
            position: relative;
            z-index: 2;
        }
        .theme-btn:active {
            transform: scale(0.97);
        }
        body.theme-dark .theme-btn {
            background: linear-gradient(90deg, #4527a0 0%, #000 100%);
            color: #fff;
            box-shadow: 0 2px 12px #311b92;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 2px 24px rgba(173, 20, 87, 0.10);
            position: relative;
            z-index: 1;
            animation: fadeIn 1.5s 0.4s both;
            transition: background 0.8s, box-shadow 0.8s;
        }
        body.theme-dark table {
            background: rgba(30, 20, 40, 0.97);
            box-shadow: 0 2px 24px #311b92;
        }
        thead tr {
            background: linear-gradient(90deg, #f06292 0%, #ba68c8 100%);
            transition: background 0.8s;
        }
        body.theme-dark thead tr {
            background: linear-gradient(90deg, #4527a0 0%, #000 100%);
        }
        th {
            color: #fff;
            font-size: 1.18em;
            letter-spacing: 1.5px;
            padding: 22px 16px;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            border-bottom: 3px solid #f8bbd0;
            box-shadow: 0 2px 12px #e1bee7;
            font-weight: 700;
            transition: background 0.3s, color 0.8s, border-bottom 0.8s, box-shadow 0.8s;
        }
        body.theme-dark th {
            border-bottom: 3px solid #4527a0;
            box-shadow: 0 2px 12px #311b92;
        }
        th:last-child {
            border-top-right-radius: 16px;
        }
        th:first-child {
            border-top-left-radius: 16px;
        }
        td {
            padding: 18px 16px;
            font-size: 1.08em;
            color: #7b1fa2;
            background: rgba(255,255,255,0.93);
            border-bottom: 2px solid #f3e5f5;
            transition: background 0.25s, color 0.25s, box-shadow 0.25s;
            position: relative;
        }
        body.theme-dark td {
            color: #b388ff;
            background: rgba(30, 20, 40, 0.93);
            border-bottom: 2px solid #4527a0;
        }
        tbody tr {
            transition: box-shadow 0.3s, transform 0.3s;
        }
        tbody tr:nth-child(even) td {
            background: linear-gradient(90deg, #f3e5f5 0%, #fce4ec 100%);
        }
        tbody tr:nth-child(odd) td {
            background: linear-gradient(90deg, #fce4ec 0%, #f3e5f5 100%);
        }
        body.theme-dark tbody tr:nth-child(even) td {
            background: linear-gradient(90deg, #311b92 0%, #4527a0 100%);
        }
        body.theme-dark tbody tr:nth-child(odd) td {
            background: linear-gradient(90deg, #4527a0 0%, #311b92 100%);
        }
        tbody tr:hover td {
            background: linear-gradient(90deg, #f8bbd0 0%, #ce93d8 100%);
            color: #ad1457;
            cursor: pointer;
            box-shadow: 0 4px 24px #f8bbd0;
            z-index: 2;
            animation: rowPop 0.5s;
        }
        body.theme-dark tbody tr:hover td {
            background: linear-gradient(90deg, #7c4dff 0%, #000 100%);
            color: #fff;
            box-shadow: 0 4px 24px #311b92;
        }
        @keyframes rowPop {
            0% { transform: scale(1);}
            60% { transform: scale(1.04);}
            100% { transform: scale(1);}
        }
        tbody tr:hover {
            filter: drop-shadow(0 0 16px #f06292);
        }
        body.theme-dark tbody tr:hover {
            filter: drop-shadow(0 0 16px #7c4dff);
        }
        tbody tr:last-child td:first-child {
            border-bottom-left-radius: 16px;
        }
        tbody tr:last-child td:last-child {
            border-bottom-right-radius: 16px;
        }
        .container::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 32px;
            padding: 3px;
            background: linear-gradient(120deg, #f8bbd0, #ba68c8, #f06292, #f8bbd0);
            background-size: 300% 300%;
            z-index: 1;
            pointer-events: none;
            animation: borderMove 8s linear infinite;
            mask:
                linear-gradient(#fff 0 0) content-box, 
                linear-gradient(#fff 0 0);
            mask-composite: exclude;
            -webkit-mask-composite: xor;
            transition: background 0.8s;
        }
        body.theme-dark .container::after {
            background: linear-gradient(120deg, #7c4dff, #311b92, #000, #7c4dff);
        }
        @keyframes borderMove {
            0% { background-position: 0% 50%;}
            50% { background-position: 100% 50%;}
            100% { background-position: 0% 50%;}
        }
        @media (max-width: 700px) {
            .container {
                padding: 16px 2vw;
            }
            th, td {
                padding: 12px 6px;
                font-size: 1em;
            }
            h2 {
                font-size: 1.3em;
            }
        }
    </style>
    <!-- Google Fonts for Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="floating-blobs">
        <div class="blob blob1"></div>
        <div class="blob blob2"></div>
        <div class="blob blob3"></div>
    </div>
    <div class="container">
        <div class="embroidery-bg"></div>
        <button class="theme-btn" id="themeBtn" type="button">Theme</button>
        <h2>User Information</h2>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>1990-01-15</td>
                </tr>
                <tr>
                    <td>Jane</td>
                    <td>Smith</td>
                    <td>1985-07-22</td>
                </tr>
                <tr>
                    <td>Michael</td>
                    <td>Johnson</td>
                    <td>1992-03-10</td>
                </tr>
                <tr>
                    <td>Emily</td>
                    <td>Williams</td>
                    <td>1988-11-05</td>
                </tr>
                <tr>
                    <td>David</td>
                    <td>Brown</td>
                    <td>1995-06-30</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        const btn = document.getElementById('themeBtn');
        btn.addEventListener('click', () => {
            document.body.classList.toggle('theme-dark');
            btn.classList.toggle('active');
        });
    </script>
</body>
</html>