<?php  
if (isset($_GET['mark'])) {
	$text = htmlspecialchars($_GET['mark']);
	$file = file_get_contents("data.json");
	if($file == false) {
		echo "Unable to read file";
	} else {
		$affair_obj = json_decode($file,true);
		if($affair_obj == NULL) {
			echo "Unable to open file";
		} else {
			var_dump($affair_obj);
			$elem_number = count($affair_obj);
			for ($elem_count = '0'; $elem_count < $elem_number; $elem_count++, $elem_count = (string) $elem_count){
				if (strcmp($text,$affair_obj[$elem_count]['description']) == 0) {
					if($affair_obj[$elem_count]['marked'] == true) {
						$affair_obj[$elem_count]['marked'] = false;
					} else {
						$affair_obj[$elem_count]['marked'] = true;
					}
					$affair_obj = json_encode($affair_obj);
					file_put_contents("data.json", $affair_obj);
					header('Location: index.php');
				}
			} 
		}
	}
} else {
	echo "0";
}

?>