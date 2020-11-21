<?php
if (isset($_GET['delete'])) {
	$text = htmlspecialchars($_GET['delete']);
	$file = file_get_contents("data.json");
	if($file == false) {
		echo "Unable to read file";
	} else {
		$affair_obj = json_decode($file,true);
		if($affair_obj == NULL) {
			echo "Unable to open file";
		} else {
			$elem_number = count($affair_obj);
			for ($elem_count = '0'; $elem_count < $elem_number; $elem_count++, $elem_count = (string) $elem_count){
				if (strcmp($text,$affair_obj[$elem_count]['description']) == 0) {
					var_dump($affair_obj[$elem_count]['description']);
					unset($affair_obj[$elem_count]);
					$affair_obj = array_values($affair_obj);
					$affair_obj = json_encode($affair_obj, false);
					file_put_contents("data.json", $affair_obj);
				}
			} 
		}
		header('Location: index.php');
	}
} else echo "Unable to acquire data";

?>
