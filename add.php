<?php
if (isset($_POST['add'])) {
	$text = htmlspecialchars($_POST['add']);
	if ($text != ''){
		$file = file_get_contents("data.json");
		if($file == false) {
			echo "Unable to read file";
		} else {
			$affair_obj = json_decode($file,true);
			if($affair_obj == NULL && $affair_obj == false && $file != '[]') {
				echo "Unable to open file";
			} else {
				$new_affair = array(
				"description" => $text,
				"marked" => false,
			);
			array_push ($affair_obj,$new_affair);
			$affair_obj = json_encode($affair_obj);
			file_put_contents("data.json", $affair_obj);
			header('Location: index.php');
			}
		}
	}
}

?>