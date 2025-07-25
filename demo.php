<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        thead tr {
            background-color: #0074D9;
            color: #fff;
        }
    </style>
</head>
<body>
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
</body>
</html>