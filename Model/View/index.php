<?php
require("../db.php");
require("Controller/contributors.php");
require("Controller/contributions.php");
require("../View/Controller/functions.php");

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

                <div class="left">
                    <div class="header">Contributors</div>
                    <?php
                    if ($success)
                        echo "<div class='success'>$success</div>";

                    if ($error)
                        echo "<div class='error'>$error</div>";
                    ?>
                    <label for="name" class="title">Name:</label>
                    <input type="text" name="name" class="text-input" /><br>
                    <label for="phone" class="title">Phone:</label>
                    <input type="tel" name="phone" class="text-input" /><br>
                    <label for="email" class="title">Email:</label>
                    <input type="email" name="email" class="text-input" /><br>
                    <label for="address" class="title">Address:</label>
                    <input type="text" name="address" class="text-input" /><br>
                    <div class="select">
                        <select name="gender" class="dropdown">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select><br>
                        <select name="amount" class="dropdown">
                            <option value="1000">1000</option>
                            <option value="5000">5000</option>
                            <option value="10000">10000</option>
                        </select><br>
                    </div>
                    <div class="submit-btn">
                        <input type="submit" name="submit" value="submit" class="submit">

                    </div>
                </div>
                <div class="right">
                    <?php
                    $gender = new Contributors;
                    $gender->getContributorsGender("male");


                    if (!empty($res)) {
                        foreach ($res as $row) {
                            echo "<tr>
                                    <td>{$row['name']} </td>
                    
                                </tr>";
                        }
                    }
                    ?>
                </div>

            </div>



        </div>
    </form>


</body>

</html>