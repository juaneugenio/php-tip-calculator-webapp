<?php
function tipCalculator($total, $percentage)
{
  if ($total <= 0 || $percentage <= 0) {
    return "The amounts are not valid";
  }

  $tip = ($total * $percentage) / 100;
  $totalToPay = $total + $tip;

  return [
    "total" => number_format($total, 2),
    "tip" => number_format($tip, 2),
    "totalToPay" => number_format($totalToPay, 2)
  ];
}
