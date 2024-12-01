<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Palindrom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="SADCoder" name="Sudipta Ghosh" />
</head>

<body>

    <h1>Palindrom Check</h1>

    <form method="post">
        <label for="num">Enter your Number: </label>
        <input type="number" name="num" required><br><br>

        <input type="submit" value="Check">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $num = (int) $_POST['num'];

        // Perform the Palindrom Number Checking based on the operation chosen
        $temp = $num;
        $sum = 0;
        $r = 0;
        while ($num != 0) {
            $r = $num % 10;
            $sum = $sum * 10 + $r;
            $num = (int) ($num / 10);
        }
        if ($temp == $sum) {
            echo "<br><p>".$temp." is a Palindrom Number</p>";
        } else {
            echo "<br><p>".$temp." is not a Palindrom Number</p>";
        }

    }
    ?>

</body>

</html>