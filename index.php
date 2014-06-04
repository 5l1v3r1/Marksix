<?php
$title = 'Marksix v2.5';
$mode = 1; // 0 = Text mode; 1 = Image mode
?>
<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title><?php echo $title;?></title>
</head>

<body>
<div>
  <form id="ball" name="ball" method="post" action="?action=play">
    號碼球:
    <label>
      <input type="radio" name="colour" id="all" value="all" checked="checked" />
      全部
      <input type="radio" name="colour" id="red" value="red" />
      紅色
      <input type="radio" name="colour" id="green" value="green" />
      綠色
      <input type="radio" name="colour" id="blue" value="blue" />
      藍色
      <input type="radio" name="colour" id="wored" value="wored" />
      走紅色
      <input type="radio" name="colour" id="wogreen" value="wogreen" />
      走綠色
      <input type="radio" name="colour" id="woblue" value="woblue" />
      走藍色
      <input type="radio" name="colour" id="randall" value="randall" />
      全部隨機
      <input type="submit" name="submit" id="submit" value="攪珠" />
    </label>
  </form>
  
<?php
if($_GET['action'] == 'play') {
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
		case 'randall':
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

	if($mode == 0) {
		print join(', ', $ball);
	} else {
		foreach($ball as $value) {
			echo "<img src=\"images/".$value.".gif\" alt=\"".$value."\" />";
		}
	}
}
?>

</div>
</body>
</html>
