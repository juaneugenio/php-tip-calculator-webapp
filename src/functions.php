<?php

function tipCalculator($total, $percentage)
{
  if ($total <= 0 || $percentage <= 0) {
    return "The amounts are not valid";
  }

  $tip = ($total * $percentage) / 100;
  $totalToPay = $total + $tip;

  // Save transaction to CSV file
  saveTransaction($total, $tip);


  return [
    "total" => number_format($total, 2),
    "tip" => number_format($tip, 2),
    "totalToPay" => number_format($totalToPay, 2)
  ];
}

function saveTransaction($total, $tip)
{
  $file = "../transactions.csv";
  $date = date("Y-m-d");
  $time = date("H:i:s");
  $totalTransaction = $total + $tip;
  $headLine = "Date,Time, Total Bill,Tip, Total transaction\n";
  $line = "$date, $time, $total,$tip, $totalTransaction\n";

  file_put_contents($file, $headLine . $line, FILE_APPEND | LOCK_EX);
}

function getTotals()
{
  $file = "../transactions.csv";
  $totalBill = 0;
  $totalTip = 0;

  if (file_exists($file)) {
    $rows = array_map(fn($line) => str_getcsv($line, ",", '"', ""), file($file));

    foreach ($rows as $row) {
      $totalBill += floatval($row[1] ?? 0);
      $totalTip += floatval($row[2] ?? 0);
    }

    return [
      "totalBill" => number_format($totalBill, 2),
      "totalTip" => number_format($totalTip, 2)
    ];
  }
}
