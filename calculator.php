<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Basic Calculator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="SADCoder" name="Sudipta Ghosh" />
</head>
<body>

    <h1>Basic Calculator</h1>
    
    <form method="post">
        <label for="num1">Enter First Number: </label>
        <input type="number" name="num1" required><br><br>

        <label for="num2">Enter Second Number: </label>
        <input type="number" name="num2" required><br><br>

        <label for="operation">Choose an operation: </label>
        <select name="operation" required>
            <option value="1">Sum</option>
            <option value="2">Subtraction</option>
            <option value="3">Multiplication</option>
            <option value="4">Division</option>
        </select><br><br>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $a = (int)$_POST['num1'];
        $b = (int)$_POST['num2'];
        $operation = (int)$_POST['operation'];

        // Perform the calculation based on the operation chosen
        switch ($operation) {
            case 1:
                echo "<p>The Sum is " . ($a + $b) . "</p>";
                break;
            case 2:
                echo "<p>The Subtraction result is " . ($a - $b) . "</p>";
                break;
            case 3:
                echo "<p>The Multiplication result is " . ($a * $b) . "</p>";
                break;
            case 4:
                // Check for division by zero
                if ($b == 0) {
                    echo "<p>Division by zero is not allowed.</p>";
                } else {
                    echo "<p>The Division result is " . ($a / $b) . "</p>";
                }
                break;
            default:
                echo "<p>Choose a valid operation.</p>";
                break;
        }
    }
    ?>

</body>
</html>
