<?php
require("../Model/db.php");
require("../Model/View/Controller/contributors.php");
require("../Model/View/Controller/contributions.php");
require("../Model/View/Controller/functions.php");

$cont = new Contributors();
$contr = new Contributions();




if ($_POST['submit_cont']) {
    $contr->processContribution($_POST['date'], $_POST['contributor_id'], $_POST['amount'], $_POST['payment_method']);
    Functions::redirect("../Model/View/view.php", "success", "Saved successfully!");
}

if ($_POST['contributor_id']) {
    Functions::dynamicDropdown("contributor_id", "contributors", "name", "Contributor", "", "id", "text-input");
    Functions::redirect("../Model/View/view.php", "success", "Saved successfully!");
}

if ($_POST['submit']) {
    $cont->processContributor($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['gender'], $_POST['amount']);
    Functions::redirect("../Model/View/index.php", "success", "Saved successfully!");
}

// if ($_POST['find_gender']) {
//     $gender = $_POST['gender'];
//     $rlt = $cont->getContributorsGender($gender);
//     if (!empty($rlt)) {
//         foreach ($rlt as $row) {
//             echo "<tr>
//             <td>{$row['name']} </td>
//             </tr>";
//         }
//     }
    // Functions::redirect("../Model/View/dashboard.php", "", "");
// }