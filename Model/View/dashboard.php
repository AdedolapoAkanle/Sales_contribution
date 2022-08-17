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
                    <label for="action" class="title">Action:
                    </label>
                    <select name="action" class="find">
                        <option value="gender">Gender</option>
                        <option value="amount">Amount</option>
                        <option value="phone">Phone</option>
                        <option value="email">Email</option>
                    </select>
                    <input type="submit" name="fetch" value="fetch" class="fetch">

                    <?php

                    if (isset($_POST['fetch'])) {
                        $value = $_POST['action'];


                        echo "<label for='search' class='title'>Search:</label>";
                        $db = new Database;
                        Functions::dynamicDropdown("contributor_id", "contributors", "$value", "$value", "", "$value", "find", "DISTINCT $value");

                        // $action = new Contributors;
                        // $res = $action->getContributorsByCategory($value, $_POST['action']);

                        // if (!empty($res)) {
                        //     foreach ($res as $row) {
                        //         echo " <tr class>
                        //         [id => {$row['id']}] => <td>{$row['name']} </td>
                        //         </tr> <br>";
                        //     }j
                    }
                    ?>

                    <div class="submit-btn">
                        <input type="submit" name="find" value="submit" class="submit">
                    </div>
                </div>

                <div class="right">
                    <?php

                    // if (isset($_POST['find'])) {
                    //     $value = $_POST['action'];
                    //     $action = new Contributors;
                    //     $res = $action->getContributorsByCategory($value, $value);


                    //     if (!empty($res)) {
                    //         foreach ($res as $row) {
                    //             echo " <tr class>
                    //         [id => {$row['id']}] => <td>{$row['name']} </td>
                    //         </tr> <br>";
                    //         }
                    //     }
                    // }


                    ?>
                </div>

            </div>
        </div>
        </div>
    </form>
</body>

</html>