<?php
require "../src/functions.php";

$results = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Sanitize input
  $total = filter_var($_POST["total"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $tipPercentage = filter_var($_POST["tip"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

  // Float conversion
  $total = floatval($total);
  $tipPercentage = floatval($tipPercentage);

  //Validation 
  if ($total <= 0) {
    $results = "The amounts are not valid. Please try again";
  } else {
    $results = tipCalculator($total, $tipPercentage);
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tip Calculator-PHP</title>
  <link rel="stylesheet" href="/styles/style.css">
  <!-- Enlace a Bulma desde CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" rel="stylesheet">


</head>


<body>
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-one-third-tablet is-one-third-desktop">

        <h1 class="title has-text-centered mt-5 has-text-weight-bold">Tip Calculator</h1>
        <?php include '../templates/form.php'; ?>

        <!-- Show results -->
        <?php if ($results && is_array($results)): ?>
          <div class="box has-background-light">

            <h2 class="subtitle has-text-centered mb-4 has-text-weigth-bold is-size-4">Total Calculation</h2>
            <p class="has-text-left"><strong>Total Bill: </strong><?= $results["total"] ?><small> EUR</small></p>
            <p class="has-text-left"><strong>Calculated Tip: </strong><?= $results["tip"] ?><small> EUR</small></p>
            <p class="has-text-centered has-text-info has-text-weight-bold mt-4">Total to pay:</p>
            <p class="has-text-centered has-text-weight-bold has-text-info is-size-4"><?= $results["totalToPay"] ?><small> EUR</small></p>
          </div>

          <!-- Show Error Messages -->

        <?php elseif ($results === "The amounts are not valid"): ?>
          <h2>Error</h2>
          <p><?= $results ?>. Please try again</p>
        <?php endif; ?>


        <!-- Show Totals -->
        <?php
        $totals = getTotals();
        if ($totals): ?>
          <div class="box has-background-light">
            <h2 class="subtitle has-text-centered mb-4">Daily Totals</h2>
            <p class="has-text-left">Total Bills: <strong><?= $totals["totalBill"] ?> </strong><small> EUR</small></p>
            <p class="has-text-left">Total Tips: <strong><?= $totals["totalTip"] ?> </strong><small> EUR</small></p>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</body>

</html>