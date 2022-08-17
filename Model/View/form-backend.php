<?php
require("../db.php");
require("Controller/contributors.php");
require("Controller/contributions.php");
require("Controller/functions.php");

if (isset($_POST['action'])) {

    $value = $_POST['action'];

    Functions::dynamicDropdown("contributor_id", "contributors", "$value", "$value", "", "$value", "find", "DISTINCT $value");
}