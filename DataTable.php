<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table Example</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Dynamic Data Table with For Loop</h1>
    <table>
        <thead>
            <tr>
                <th>Employ_Id</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Sample data array
            $data = [
                ["ID" => 1, "Name" => "Alice", "Age" => 25, "Email" => "alice@example.com"],
                ["ID" => 2, "Name" => "Bob", "Age" => 30, "Email" => "bob@example.com"],
                ["ID" => 3, "Name" => "Charlie", "Age" => 35, "Email" => "charlie@example.com"],
            ];

            // Using a for loop to iterate through the array
            for ($i = 0; $i < count($data); $i++) {
                echo "<tr>";
                echo "<td>" . $data[$i]["ID"] . "</td>";
                echo "<td>" . $data[$i]["Name"] . "</td>";
                echo "<td>" . $data[$i]["Age"] . "</td>";
                echo "<td>" . $data[$i]["Email"] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
