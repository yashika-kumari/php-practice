<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f6f8fa;
        }
        form {
            background: #fff;
            padding: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            max-width: 400px;
        }
        label {
            margin-bottom: 4px;
            display: inline-block;
        }
        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="password"] {
            width: 98%;
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #bbb;
            border-radius: 4px;
        }
        .gender-group {
            margin-bottom: 10px;
        }
        button {
            padding: 7px 18px;
            margin-right: 8px;
            border: 1px solid #bbb;
            border-radius: 4px;
            background: #eaeaea;
            cursor: pointer;
        }
        button:hover {
            background: #d6e4f0;
        }
    </style>
</head>
<body>
    <h1>Basic Form</h1>
    <form method="post">
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
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</body>
</html>