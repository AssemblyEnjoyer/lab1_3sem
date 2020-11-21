<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title> To do list </title>
		<style>
			h1 {
			font-size: 300%;
			font-family: Arial;
			color: black;
			}
			body {
			background: #FFDEAD url(back.jpg) no-repeat;
			background-size: cover;
			color: black;
			}
			table {
			font-family: "Times New Roman";
			font-size: 200%;
			}
			input {
			display: block;
			font-family: "Times New Roman"; 
			font-size: 30px;
			background-color: #F0E68C;
			margin: 0 auto;
			}
			div {
			position: absolute;
			bottom: 20px;
			left: 10%;
			}
		</style>
	</head>
	<body>
		<h1 align = "center">Monitor your objectives here</h1>
		<?php
			$data = file_get_contents('data.json');
			if ($data == false) {
				echo "Error: Unable to get list's contents";
			} else {
				$list_arr = json_decode($data);
				if ($list_arr == NULL){
					echo "<h1> No things to do yet...<h1>";
				} else {
					echo "<table border='2' align = center height = 80% width = 80%>
						<tr>
							<th>Description</th>
							<th>Mark</th>
							<th>Delete</th>
						</tr>";
					$elem_number = count($list_arr);
					for ($elem_count = 0, $temp_arr = array(); $elem_count < $elem_number; $elem_count++){
						$temp_arr = (array) $list_arr[$elem_count];
						if($temp_arr['marked'] == false){
							echo "<tr align = 'center'><td>".$temp_arr['description']."</td><td><a href = 'mark.php?mark=".$temp_arr['description']."'>X</a></td><td><a href = 'delete.php?delete=".$temp_arr['description']."'>X</a></td></tr>";
						} else {
							echo "<tr align = 'center'><td><font color = 'red'>".$temp_arr['description']."</font></td><td><a href = 'mark.php?mark=".$temp_arr['description']."'>X</a></td><td><a href = 'delete.php?delete=".$temp_arr['description']."'>X</a></td></tr>";
						}
					}
				}
			}
		?>
		<div>
		<form action ="add.php" method = "post">
			<input name = "add" type = "text" size = "90%"></input><br>

			<input type="submit" value="Add"></input>
		</form>
		</div>
	</body>
</html>