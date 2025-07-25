<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Form</title>
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(120deg, #e3f2fd 0%, #90caf9 100%);
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.6s;
        }
        .form-box {
            background: #fff;
            padding: 44px 36px 36px 36px;
            border-radius: 28px;
            box-shadow: 0 12px 48px rgba(33, 150, 243, 0.18), 0 2px 16px #90caf9;
            min-width: 320px;
            width: 100%;
            max-width: 420px;
            transition: background 0.6s, box-shadow 0.6s;
            position: relative;
        }
        .form-box::before {
            content: "";
            position: absolute;
            top: -32px; left: -32px; right: -32px; bottom: -32px;
            background: radial-gradient(circle at 20% 10%, #90caf9 0%, transparent 60%), 
                        radial-gradient(circle at 80% 90%, #e3f2fd 0%, transparent 60%);
            z-index: 0;
            opacity: 0.18;
            border-radius: 36px;
        }
        h2 {
            text-align: center;
            color: #1976d2;
            margin-bottom: 28px;
            font-weight: 700;
            letter-spacing: 1.5px;
            transition: color 0.6s;
            position: relative;
            z-index: 1;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #2196f3;
            font-weight: 500;
            transition: color 0.6s;
            position: relative;
            z-index: 1;
        }
        input[type="text"], input[type="email"], input[type="date"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 22px;
            border: 1.5px solid #90caf9;
            border-radius: 14px;
            background: #e3f2fd;
            font-size: 1em;
            transition: border 0.2s, background 0.6s;
            position: relative;
            z-index: 1;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus {
            border-color: #1976d2;
            outline: none;
            background: #f5faff;
        }
        .gender-group {
            margin-bottom: 22px;
            position: relative;
            z-index: 1;
        }
        .gender-group label {
            display: inline-block;
            margin-right: 16px;
            font-weight: 400;
            color: #1976d2;
        }
        input[type="radio"] {
            margin-right: 6px;
            accent-color: #2196f3;
        }
        .button-group {
            display: flex;
            gap: 16px;
            margin-top: 16px;
            position: relative;
            z-index: 1;
        }
        button[type="submit"], button[type="reset"] {
            flex: 1;
            padding: 12px;
            background: linear-gradient(90deg, #2196f3 0%, #1976d2 100%);
            color: #fff;
            border: none;
            border-radius: 14px;
            font-size: 1.08em;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 12px #90caf9;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        }
        button[type="submit"]:hover {
            background: linear-gradient(90deg, #1976d2 0%, #2196f3 100%);
            box-shadow: 0 4px 16px #90caf9;
        }
        button[type="reset"]:hover {
            background: linear-gradient(90deg, #e3f2fd 0%, #90caf9 100%);
            color: #1976d2;
            box-shadow: 0 4px 16px #e3f2fd;
        }
        .theme-btn {
            display: block;
            margin: 0 auto 24px auto;
            padding: 10px 32px;
            background: linear-gradient(90deg, #1976d2 0%, #2196f3 100%);
            color: #fff;
            border: none;
            border-radius: 18px;
            font-size: 1.08em;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 12px #90caf9;
            transition: background 0.3s, color 0.3s;
            position: relative;
            z-index: 1;
        }
        .theme-btn:hover {
            background: linear-gradient(90deg, #2196f3 0%, #1976d2 100%);
        }
        /* Dark theme styles */
        body.theme-dark {
            background: linear-gradient(120deg, #181f2a 0%, #232b3e 100%);
        }
        body.theme-dark .form-box {
            background: #232b3e;
            box-shadow: 0 12px 48px rgba(33, 150, 243, 0.10), 0 2px 16px #232b3e;
        }
        body.theme-dark .form-box::before {
            background: radial-gradient(circle at 20% 10%, #232b3e 0%, transparent 60%), 
                        radial-gradient(circle at 80% 90%, #181f2a 0%, transparent 60%);
        }
        body.theme-dark h2 {
            color: #a3bffa;
        }
        body.theme-dark label {
            color: #b5c9e8;
        }
        body.theme-dark input[type="text"], 
        body.theme-dark input[type="email"], 
        body.theme-dark input[type="date"] {
            background: #1a2233;
            border-color: #3e4c66;
            color: #e3eafc;
        }
        body.theme-dark input[type="text"]:focus, 
        body.theme-dark input[type="email"]:focus,
        body.theme-dark input[type="date"]:focus {
            border-color: #a3bffa;
            background: #232b3e;
        }
        body.theme-dark .gender-group label {
            color: #b5c9e8;
        }
        body.theme-dark button[type="submit"] {
            background: linear-gradient(90deg, #3e4c66 0%, #a3bffa 100%);
            color: #e3eafc;
            box-shadow: 0 2px 12px #232b3e;
        }
        body.theme-dark button[type="submit"]:hover {
            background: linear-gradient(90deg, #a3bffa 0%, #3e4c66 100%);
            color: #232b3e;
            box-shadow: 0 4px 16px #232b3e;
        }
        body.theme-dark button[type="reset"] {
            background: linear-gradient(90deg, #232b3e 0%, #3e4c66 100%);
            color: #e3eafc;
            box-shadow: 0 2px 12px #232b3e;
        }
        body.theme-dark button[type="reset"]:hover {
            background: linear-gradient(90deg, #3e4c66 0%, #232b3e 100%);
            color: #a3bffa;
            box-shadow: 0 4px 16px #232b3e;
        }
        body.theme-dark .theme-btn {
            background: linear-gradient(90deg, #232b3e 0%, #3e4c66 100%);
            color: #a3bffa;
            box-shadow: 0 2px 12px #232b3e;
        }
        body.theme-dark .theme-btn:hover {
            background: linear-gradient(90deg, #3e4c66 0%, #232b3e 100%);
            color: #e3eafc;
        }
    </style>
</head>
<body>
    <form class="form-box">
        <button type="button" class="theme-btn" id="themeToggle">Switch Theme</button>
        <h2>Basic Form</h2>
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="gender-group">
            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="Other">
            <label for="other">Other</label>
        </div>
        <div>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="button-group">
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
        </div>
    </form>
    <script>
        document.getElementById('themeToggle').onclick = function() {
            document.body.classList.toggle('theme-dark');
        };
    </script>
</body>
</html>