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
    <form action="" method="POST">
        <div class="container">
            <div class="main">
                <div class="left">
                    <div class="header">Find Contributors</div>
                    <label for="gender" class="title">Get By Gender</label>
                    <select name="gender" class="find">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    <label for="amount" class="title">Get By Amount</label>
                    <select name="amount" class="find">
                        <option value="1000">1000</option>
                        <option value="5000">5000</option>
                        <option value="5000">10000</option>
                    </select>

                    <div class="submit-btn">
                        <input type="submit" name="save" value="save" class="submit">
                    </div>
                </div>

                <div class="right">
                    <?php

                    $gender = new Contributors;
                    $res = $gender->getContributorsGender($_POST['gender']);
                    echo "Contributors In Gender Category <br>";
                    echo "<br>";


                    if (!empty($res)) {
                        foreach ($res as $row) {
                            echo " <tr class = 'table'>
                            [{$row['id']}] => <td>{$row['name']} </td>
                            </tr> <br>";
                        }
                    }

                    ?>

                    <?php
                    $amount = new Contributors;
                    $rlt = $amount->getContributorsAmount($_POST['amount']);
                    echo "<br>";
                    echo "<br>";
                    echo "Contributors In Amount Category <br>";
                    echo "<br>";

                    if (!empty($rlt)) {
                        foreach ($rlt as $row) {
                            echo " <tr class = 'table'>
                            [{$row['id']}] => <td>{$row['name']} </td>
                            </tr> <br>";
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </form>
</body>

</html>