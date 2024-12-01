<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Armstrong Number</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="SADCoder" name="Sudipta Ghosh" />
</head>

<body>

    <h1>Armstrong Number Check</h1>

    <form method="post">
        <label for="num">Enter A Number: </label>
        <input type="number" name="num" required><br><br>

        <input type="submit" value="Check">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $num = (int) $_POST['num'];

        // Perform the Armstrong Number Checking based on the operation chosen
        $temp = $num;
        $sum = 0;
        $r = 0;
        while ($num != 0) {
            $r = $num % 10;
            $sum = $sum + pow($r, strlen($temp));
            $num = (int) ($num / 10);
        }
        if ($temp == $sum) {
            echo "<br><p>".$temp." is a Armstrong Number</p>";
        } else {
            echo "<br><p>".$temp." is not a Armstrong Number</p>";
        }

    }
    ?>

</body>

</html>