<?
$title = 'Marksix v2.2';
$mode = 1; // 0 = Text mode; 1 = Image mode
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title;?></title>
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
      <input type="submit" name="submit" id="submit" value="攪珠" />
    </label>
  </form>
  
<?
if($_GET['action'] == 'play') {
	switch($_POST['colour']) {
		case 'all':
			$ball = array();
			while(count($ball) < 6) {
			$random_number = rand(1, 49);
			$stop = false;
				while(!$stop) {
					if(array_search($random_number, $ball) === false) {
						array_push($ball, $random_number);
						$stop = true;
					} else {
						$random_number = rand(1, 49);
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
			break;
		case 'red':
			$ball = array();
			while(count($ball) < 6) {
			$ball_number = array(1, 2, 7, 8, 12, 13, 18, 19, 23, 24, 29, 30, 34, 35, 40, 45, 46);
			$random_number = $ball_number[rand(0, 16)];
			$stop = false;
				while(!$stop) {
					if(array_search($random_number, $ball) === false) {
						array_push($ball, $random_number);
						$stop = true;
					} else {
						$random_number = $ball_number[rand(0, 16)];
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
			break;
		case 'green':
			$ball = array();
			while(count($ball) < 6) {
			$ball_number = array(5, 6, 11, 16, 17, 21, 22, 27, 28, 32, 33, 38, 39, 43, 44, 49);
			$random_number = $ball_number[rand(0, 15)];
			$stop = false;
				while(!$stop) {
					if(array_search($random_number, $ball) === false) {
						array_push($ball, $random_number);
						$stop = true;
					} else {
						$random_number = $ball_number[rand(0, 15)];
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
			break;
		case 'blue':
			$ball = array();
			while(count($ball) < 6) {
			$ball_number = array(3, 4, 9, 10, 14, 15, 20, 25, 26, 31, 36, 37, 41, 42, 47, 48);
			$random_number = $ball_number[rand(0, 15)];
			$stop = false;
				while(!$stop) {
					if(array_search($random_number, $ball) === false) {
						array_push($ball, $random_number);
						$stop = true;
					} else {
						$random_number = $ball_number[rand(0, 15)];
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
			break;
	}
}
?>

</div>
</body>
</html>