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
        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }
        nav ul li a:hover {
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
            <li><a href=" ">View Employee Birthdays</a ></li>
            <li><a href="#schedules">View Employee Schedules</a ></li>
        </ul>
    </nav>
    <div class="container">
        <section id="birthdays">
            <h2>Upcoming Employee Birthdays</h2>
            <table>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birth Date</th>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>2024-06-22</td>
                </tr>
                <tr>
                    <td>234567</td>
                    <td>Jane</td>
                    <td>Smith</td>
                    <td>2024-06-25</td>
                </tr>
                <tr>
                    <td>456789</td>
                    <td>Emily</td>
                    <td>Johnson</td>
                    <td>2024-06-30</td>
                </tr>
                <tr>
                    <td>567890</td>
                    <td>Michael</td>
                    <td>Brown</td>
                    <td>2024-07-01</td>
                </tr>
                <tr>
                    <td>567891</td>
                    <td>Linda</td>
                    <td>Davis</td>
                    <td>2024-07-05</td>
                </tr>
            </table>
        </section>

        <section id="schedules">
            <h2>Current Employee Schedules</h2>
            <table>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Schedule Type</th>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>09:00:00</td>
                    <td>17:00:00</td>
                    <td>WK</td>
                </tr>
                <tr>
                    <td>234567</td>
                    <td>Jane</td>
                    <td>Smith</td>
                    <td>08:00:00</td>
                    <td>16:00:00</td>
                    <td>WK</td>
                </tr>
                <tr>
                    <td>345678</td>
                    <td>Emily</td>
                    <td>Johnson</td>
                    <td>10:00:00</td>
                    <td>18:00:00</td>
                    <td>WK</td>
                </tr>
            </table>
        </section>
    </div>
    <footer>
        &copy; 2024 TTC Transit Information System
    </footer>
</body>
</html>