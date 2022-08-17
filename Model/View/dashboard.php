<?php
require("../db.php");
require("Controller/contributors.php");
require("Controller/contributions.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<?php
if (isset($_GET['msg'])) {
    echo $_GET['msg'];
}
?>

<body>
    <form action="form-backend.php" method="POST" id="form">
        <div class="container">
            <div class="main">
                <div class="left">
                    <div class="header">Contributors</div>
                    <label for="action" class="title">Action:
                    </label>
                    <select name="action" class="find" id="dropdown">
                        <option value="" hidden>Select Action</option>
                        <option value="gender">Gender</option>
                        <option value="amount">Amount</option>
                        <option value="phone">Phone</option>
                        <option value="email">Email</option>
                    </select>
                    <div id="dd">

                    </div>
                    <!-- <input type="submit" name="fetch" value="fetch" class="fetch"> -->

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
        <script>
        let form = document.querySelector("#form");

        form.addEventListener("change", e => {

            e.preventDefault();

            var postData = $(form).serialize();

            $.ajax({
                url: 'form-backend.php',
                data: postData,
                type: 'post',
                success: function(data) {
                    $("#dd").html(data);
                }
            });
        });
        </script>
    </form>

    <script>
    // function onchangeEvent(value) {
    //     let dropdown = document.querySelector(".find");
    //     document.addEventListener("change", () => {
    //         let text = dropdown.options[dropdown.selectedIndex].value;
    //         console.log(text);
    //     })
    // }
    </script>
</body>

</html>