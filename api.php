<?php
  $balls = 48;
  $ball_number = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49);
  $random_number = $ball_number[mt_rand(0, $balls)];
  $ball = array();
  while(count($ball) < 6) {
    $stop = false;
    while(!$stop) {
      if(array_search($random_number, $ball) === false) {
        array_push($ball, $random_number);
        $stop = true;
      } else {
        $random_number = $ball_number[mt_rand(0, $balls)];
      }
    }
  }
  print join(', ', $ball);
}
?>
