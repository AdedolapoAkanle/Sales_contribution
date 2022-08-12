<?php
require("../Model/db.php");
require("../Model/View/Controller/contributors.php");
require("../Model/View/Controller/contributions.php");
require("../Model/View/Controller/functions.php");

$cont = new Contributors();
$contr = new Contributions();
// $dropdown = new Database();

// if ($_POST['submit']) {
//     $cont->processContributor($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['gender'], $_POST['amount']                                            );
//     Functions::redirect("../Model/View/index.php", "success", "Saved successfully!");
// }



if ($_POST['submit_contribution']) {
    $contr->processContribution($_POST['date'], $_POST['name'], $_POST['amount'], $_POST['payment_method']);
    Functions::redirect("../Model/View/view.php", "success", "Saved successfully!");
}

if ($_POST['contributor']) {
    Functions::dynamicDropdown("contributor", "contributors", "name", "Contributor", "", "contributor_id", "dropdown");
    Functions::redirect("../Model/View/view.php", "success", "Saved successfully!");
}