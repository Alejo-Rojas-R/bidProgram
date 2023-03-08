<?php
// Validate existence of the submitted budget value
if (isset($_POST["budget"])) {
    $budget = $_POST["budget"];

    include "../classes/classBid.php";

    // Instanciate class with the submitted budget
    $bidClass = new classBid($budget);

    // Validate submitted input
    $bidClass->validateInput();

    // If error is empty the bid is calculated
    if ($bidClass->getErrorMessage() == "") {
        $bidClass->calculateBid();
    }

    $queryString = $bidClass->formatValues();

    // Return to the index page with the results
    header("location: ../index.php?". http_build_query($queryString));
}