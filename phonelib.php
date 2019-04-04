<?php

class filecsv {

	public function writecontact() {
		$content = NULL;
		
		$content = $_GET; //REVIEW THIS: does an array from $_GET converted to string $content?
		$content['id'] = uniqid();

		file_put_contents('contact.csv', (implode(',', $content) . "\n"), FILE_APPEND);
		header('location: index.php');
	}

	public function fetchcsv() {
		$fetch;
		$fetch = file_get_contents('contact.csv');
		return $fetch;
	}
}
