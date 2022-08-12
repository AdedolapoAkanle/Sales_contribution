<?php
require("../db.php");
require("../View/Controller/contributors.php");
require("../View/Controller/contributions.php");
require("Controller/functions.php");

$success = "";
$error = "";

if (isset($_GET['error'])) {
    $error = $_GET['error'];
} elseif (isset($_GET['success'])) {
    $success = $_GET['success'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sales Contribution</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
if (isset($_GET['msg'])) {
    echo $_GET['msg'];
}
?>

<body>
    <form action="../backend.php" method="POST">
        <div class="container">
            <div class="main">
                <div class="center">
                    <div class="header">Contributions</div>
                    <?php
                    if ($success)
                        echo "<div class='success'>$success</div>";

                    if ($error)
                        echo "<div class='error'>$error</div>";
                    ?>
                    <input type="date" name="date" class="text-input" /><br>
                    <?php

                    // $db = new Database;
                    // Functions::dynamicDropdown("contributor", "contributors", "name", "Contributor", "", "contributor_id", "text-input");
                    ?>
                    <div class="select">
                        <select name="amount" class="dropdown">
                            <option value="1000">1000</option>
                            <option value="5000">5000</option>
                            <option value="10000">10000</option>
                        </select><br>
                        <select name="payment_method" class="dropdown">
                            <option value="pos">POS</option>
                            <option value="cash">Cash</option>
                            <option value="transfer">Transfer</option>
                        </select><br>
                    </div>
                    <div class="submit-btn">
                        <input type="submit" name="submit_contribution" value="save" class="submit">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <table>
        <?php


        // $info = new Contributions();
        // $res = $info->contributionInfo();

        // if (!empty($res)) {
        //     foreach ($res as $row) {
        //         echo "<tr>
        //     <td>{$row['date']} </td>
        // 	<td>{$row['amount']} </td>
        // 	<td>{$row['payment_method']}</td>
        //   </tr>";
        //     }
        // }

        ?>
    </table>
</body>

</html>