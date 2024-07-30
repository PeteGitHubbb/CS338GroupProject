<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TTC Transit Information System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #003399;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            background-color: #003399;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a, nav ul li button {
            color: white;
            text-decoration: none;
            padding: 10px;
            background: none;
            border: none;
            cursor: pointer;
            font: inherit;
        }
        nav ul li a:hover, nav ul li button:hover {
            background-color: #002080;
            border-radius: 5px;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h1, h2 {
            text-align: center;
            color: #003399;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #003399;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>TTC Transit Information System</h1>
    </header>
    <nav>
        <ul>
            <li><button id="fetchBirthdaysBtn">View Employee Birthdays</button></li>
            <li><a href="Schedule.php#schedules">View Employee Schedules</a></li>
        </ul>
    </nav>
    <div id="birthdaysResult" class="container"></div>
    <script src="javascript/script.js"></script>
</body>
</html>