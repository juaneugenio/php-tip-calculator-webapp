<?php

function tipCalculator($total, $percentage)
{
  if ($total <= 0) {
    return "The amounts are not valid";
  }

  // if percentage is empty or 0 then tip is 0.
  if (empty($percentage) || $percentage == 0) {
    $tip = 0;
    $totalToPay = $total; // Total without tip
  } else {
    $tip = ($total * $percentage) / 100;
    $totalToPay = $total + $tip;
  }

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
  $total = number_format($total, 2);
  $tip = number_format($tip, 2);
  $totalTransaction = number_format($total + $tip, 2);
  $line = "$date, $time, $total, $tip, $totalTransaction\n";

  // Verifica si el archivo no existe
  if (!file_exists($file)) {
    // Si el archivo no existe, creamos el archivo con la cabecera
    $headLine = "Date,Time, Total Bill,Tip, Total transaction\n";
    file_put_contents($file, $headLine, FILE_APPEND | LOCK_EX);
  }

  // Añade la transacción al archivo CSV
  file_put_contents($file, $line, FILE_APPEND | LOCK_EX);
}




function getTotals()
{
  $file = "../transactions.csv";
  $totalBill = 0;
  $totalTip = 0;

  if (file_exists($file)) {
    $rows = array_map(fn($line) => str_getcsv($line, ",", '"', ""), file($file));

    // Excluding the header generation each time to register only the totals
    array_shift($rows);

    foreach ($rows as $row) {
      $totalBill += floatval($row[2] ?? 0);  // Total Bill (column 3)
      $totalTip += floatval($row[3] ?? 0);   // Tip (column 4)
    }

    return [
      "totalBill" => number_format($totalBill, 2),
      "totalTip" => number_format($totalTip, 2)
    ];
  }

  return [
    "totalBill" => "0.00",
    "totalTip" => "0.00"
  ];
}
