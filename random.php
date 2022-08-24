<?php

function random($panjang)
{
  $karakter = '1234567890abcdefghijklmnopqrstuvwxyz';
  $string = '';

  for ($i = 0; $i < $panjang; $i++) {
    $pos = rand(0, strlen($karakter) - 1);
    $string .= $karakter{
      $pos};
    // $string .= rand(0, strlen($karakter) - 1);
  }

  return $string;
}

// echo random(7);
echo "<br>";
// echo random(20);
echo rand(1, 99999);
echo "<br>";
