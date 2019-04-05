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


class delcv {

	public function importFile()
	{
		$contents = file_get_contents('contact.csv');

		$rows = explode("\n", $contents);
		$tasks = [];

		foreach($rows as $field) {
			[$fileLine_fname, $fileLine_lname, $fileLine_gender, $fileLine_birthdate, $fileLine_number, $id] = explode(",", $field);

			$tasks[] = [
				'fname' => $fileLine_fname,
				'lname' => $fileLine_lname,
				'gnder' => $fileLine_gender,
				'bday' => $fileLine_birthdate,
				'number' => $fileLine_number,
				'id' => $id
			];
		}

		return $tasks;
	}

	public function exportFile($contents)
	{
		$rows = null;
		$contents = $contents;
		foreach($contents as $content) {
			if ($content['id']) {
				$field .= implode(',', $content) . "\n";
			}
		}

		file_put_contents('contact.csv', $field);
	}

	public function deleteById($id)
	{
		$contents = $this->importFile();

		foreach($contents as $index => $content) {
			if ($content['id'] === $id) {
			unset($contents[$index]);

			$this->exportFile($contents);
			}
		}
	}

}
