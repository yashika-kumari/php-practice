<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(120deg, #e3f2fd 0%, #90caf9 100%);
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: stretch;
            justify-content: flex-start;
            transition: background 0.6s;
        }
        .main-wrapper {
            display: flex;
            width: 100vw;
            height: 100vh;
        }
        .form-section {
            width: 40vw;
            min-width: 340px;
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: transform 0.7s cubic-bezier(.77,0,.18,1);
            z-index: 2;
        }
        .form-section.move-right {
            transform: translateX(60vw);
        }
        .form-box {
            background: #ffffff;
            padding: 40px 32px 24px 32px;
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(33, 150, 243, 0.13), 0 2px 16px #90caf9;
            min-width: 320px;
            width: 100%;
            max-width: 380px;
            transition: background 0.6s, box-shadow 0.6s;
            position: relative;
        }
        h2 {
            text-align: center;
            color: #1976d2;
            margin-bottom: 28px;
            font-weight: 700;
            letter-spacing: 1px;
            transition: color 0.6s;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #2196f3;
            font-weight: 500;
            transition: color 0.6s;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1.5px solid #90caf9;
            border-radius: 12px;
            background: #e3f2fd;
            font-size: 1em;
            transition: border 0.2s, background 0.6s;
        }
        input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus {
            border-color: #1976d2;
            outline: none;
        }
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #1976d2 0%, #2196f3 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px #90caf9;
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: linear-gradient(90deg, #2196f3 0%, #1976d2 100%);
        }
        .theme-btn {
            display: block;
            margin: 0 auto 24px auto;
            padding: 8px 28px;
            background: #1976d2;
            color: #fff;
            border: none;
            border-radius: 18px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px #90caf9;
            transition: background 0.3s, color 0.3s;
        }
        .theme-btn:hover {
            background: #0d47a1;
        }
        .switch-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #1976d2;
            font-weight: 500;
            cursor: pointer;
            text-decoration: underline;
            transition: color 0.3s;
        }
        .switch-link:hover {
            color: #2196f3;
        }
        /* Illustration section */
        .illustration-section {
            flex: 1;
            min-width: 0;
            background: none;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .illustration-bg {
            width: 80%;
            max-width: 600px;
            height: 80%;
            min-height: 340px;
            background: linear-gradient(120deg, #e3f2fd 60%, #90caf9 100%);
            border-radius: 48px;
            box-shadow: 0 8px 48px rgba(33,150,243,0.10), 0 2px 16px #90caf9;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .illustration-img {
            width: 70%;
            max-width: 340px;
            height: auto;
            margin: 0 auto;
            display: block;
            filter: drop-shadow(0 8px 32px #90caf9);
        }
        /* Dark theme styles */
        body.theme-dark {
            background: linear-gradient(120deg, #0d47a1 0%, #263238 100%);
        }
        body.theme-dark .form-box {
            background: #1a237e;
            box-shadow: 0 8px 32px rgba(33, 150, 243, 0.18), 0 2px 16px #263238;
        }
        body.theme-dark h2 {
            color: #90caf9;
        }
        body.theme-dark label {
            color: #90caf9;
        }
        body.theme-dark input[type="text"], 
        body.theme-dark input[type="password"], 
        body.theme-dark input[type="email"] {
            background: #263238;
            border-color: #1976d2;
            color: #fff;
        }
        body.theme-dark input[type="text"]:focus, 
        body.theme-dark input[type="password"]:focus,
        body.theme-dark input[type="email"]:focus {
            border-color: #90caf9;
        }
        body.theme-dark button[type="submit"] {
            background: linear-gradient(90deg, #263238 0%, #1976d2 100%);
            color: #fff;
        }
        body.theme-dark button[type="submit"]:hover {
            background: linear-gradient(90deg, #1976d2 0%, #263238 100%);
        }
        body.theme-dark .theme-btn {
            background: #263238;
            color: #90caf9;
        }
        body.theme-dark .theme-btn:hover {
            background: #0d47a1;
            color: #fff;
        }
        body.theme-dark .switch-link {
            color: #90caf9;
        }
        body.theme-dark .switch-link:hover {
            color: #1976d2;
        }
        @media (max-width: 900px) {
            .main-wrapper { flex-direction: column; }
            .form-section, .illustration-section { width: 100vw; min-width: 0; }
            .form-section.move-right { transform: none; }
            .illustration-bg { width: 90vw; min-height: 220px; }
        }
        @media (max-width: 600px) {
            .form-box { padding: 24px 12px 16px 12px; min-width: 0; }
            .illustration-bg { border-radius: 24px; }
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="form-section" id="formSection">
            <form class="form-box" id="loginForm" method="post" action="">
                <button type="button" class="theme-btn" id="themeToggle">Switch Theme</button>
                <h2>Login</h2>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autocomplete="username">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password">
                <button type="submit">Login</button>
                <span class="switch-link" id="showRegister">Already a User? Register here</span>
            </form>
            <form class="form-box" id="registerForm" method="post" action="" style="display:none;">
                <button type="button" class="theme-btn" id="themeToggle2">Switch Theme</button>
                <h2>Register</h2>
                <label for="reg_username">Username</label>
                <input type="text" id="reg_username" name="reg_username" required autocomplete="username">
                <label for="reg_email">Email</label>
                <input type="email" id="reg_email" name="reg_email" required autocomplete="email">
                <label for="reg_password">Password</label>
                <input type="password" id="reg_password" name="reg_password" required autocomplete="new-password">
                <button type="submit">Register</button>
                <span class="switch-link" id="showLogin">Already have an account? Login here</span>
            </form>
        </div>
        <div class="illustration-section">
            <div class="illustration-bg">
                <!-- You can replace the SVG below with any illustration you like -->
                <img class="illustration-img" src="https://undraw.co/api/illustrations/undraw_book_lover_mkck.svg" alt="Library Illustration">
            </div>
        </div>
    </div>
    <script>
        // Theme toggle for both forms
        function toggleTheme() {
            document.body.classList.toggle('theme-dark');
        }
        document.getElementById('themeToggle').onclick = toggleTheme;
        document.getElementById('themeToggle2').onclick = toggleTheme;

        // Switch between login and register
        const formSection = document.getElementById('formSection');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        document.getElementById('showRegister').onclick = function() {
            loginForm.style.display = "none";
            registerForm.style.display = "block";
            formSection.classList.add('move-right');
        };
        document.getElementById('showLogin').onclick = function() {
            registerForm.style.display = "none";
            loginForm.style.display = "block";
            formSection.classList.remove('move-right');
        };
    </script>
</body>
</html>