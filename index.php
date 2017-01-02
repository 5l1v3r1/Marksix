<?php
$title = 'Marksix v3.0';
$mode = 1; // 0 = Text mode; 1 = Image mode
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="keywords" content="Marksix">
    <meta name="description" content="Marksix">
    <title><?php echo $title;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link href="default.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="display-1">Marksix</h1>
            <hr class="" draggable="true">
            <form method="post">
              <div class="form-group">
                <label>號碼球</label>
                <select class="form-control" name="colour">
                  <option value="all">全部</option>
                  <option value="red">紅色</option>
                  <option value="green">綠色</option>
                  <option value="blue">藍色</option>
                  <option value="wored">走紅色</option>
                  <option value="wogreen">走綠色</option>
                  <option value="woblue">走藍色</option>
                  <option value="randall">全部隨機</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary"><i class="fa fa-star fa-fw"></i>攪珠</button>
            </form>
<?php
if(isset($_POST['colour'])) {
  if($_POST['colour'] == 'randall') {
    $ball_colour = mt_rand(1, 7);
    switch($ball_colour) {
      case '1':
        $_POST['colour'] = 'all';
        break;
      case '2':
        $_POST['colour'] = 'red';
        break;
      case '3':
        $_POST['colour'] = 'green';
        break;
      case '4':
        $_POST['colour'] = 'blue';
        break;
      case '5':
        $_POST['colour'] = 'wored';
        break;
      case '6':
        $_POST['colour'] = 'wogreen';
        break;
      case '7':
        $_POST['colour'] = 'woblue';
        break;
    }
  }
  switch($_POST['colour']) {
    case 'all':
      $balls = 48;
      $ball_number = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49);
      $random_number = $ball_number[mt_rand(0, $balls)];
      break;
    case 'red':
      $balls = 16;
      $ball_number = array(1, 2, 7, 8, 12, 13, 18, 19, 23, 24, 29, 30, 34, 35, 40, 45, 46);
      $random_number = $ball_number[mt_rand(0, $balls)];
      break;
    case 'green':
      $balls = 15;
      $ball_number = array(5, 6, 11, 16, 17, 21, 22, 27, 28, 32, 33, 38, 39, 43, 44, 49);
      $random_number = $ball_number[mt_rand(0, $balls)];
      break;
    case 'blue':
      $balls = 15;
      $ball_number = array(3, 4, 9, 10, 14, 15, 20, 25, 26, 31, 36, 37, 41, 42, 47, 48);
      $random_number = $ball_number[mt_rand(0, $balls)];
      break;
    case 'wored':
      $balls = 31;
      $ball_number = array(3, 4, 5, 6, 9, 10, 11, 14, 15, 16, 17, 20, 21, 22, 25, 26, 27, 28, 31, 32, 33, 36, 37, 38, 39, 41, 42, 43, 44, 47, 48, 49);
      $random_number = $ball_number[mt_rand(0, $balls)];
      break;
    case 'wogreen':
      $balls = 32;
      $ball_number = array(1, 2, 3, 4, 7, 8, 9, 10, 12, 13, 14, 15, 18, 19, 20, 23, 24, 25, 26, 29, 30, 31, 34, 35, 36, 37, 40, 41, 42, 45, 46, 47, 48);
      $random_number = $ball_number[mt_rand(0, $balls)];
      break;
    case 'woblue':
      $balls = 32;
      $ball_number = array(1, 2, 5, 6, 7, 8, 11, 12, 13, 16, 17, 18, 19, 21, 22, 23, 24, 27, 28, 29, 30, 32, 33, 34, 35, 38, 39, 40, 43, 44, 45, 46, 49);
      $random_number = $ball_number[mt_rand(0, $balls)];
      break;
  }
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
  echo "<p class=\"m-y-1\">";
  if($mode == 0) {
    print join(', ', $ball);
  } else {
    foreach($ball as $value) {
      echo "<img src=\"images/$value.gif\" alt=\"$value\">";
    }
  }
  echo "</p>";
}
?>
            <p class="m-y-3">&copy eService-HK</p>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  </body>
</html>
