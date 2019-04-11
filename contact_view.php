<?php
include_once('phonelib.php');

$contact_delete = new delcv();
/* ENDED HERE
if($_GET['delete']) {
	$contact_delete->deleteById($_GET['delete']);
}
 */
$search_user = [];
$fetch;
$fetch = file_get_contents('contact.csv');
foreach(explode("\n", $fetch) as $line) {
	[$str_fname, $str_lname, $str_gnder, $str_bday, $str_number, $str_id] = explode(',', $line);
	if ($_GET['view'] == $str_id) {

		$search_user = [
			'fname' => $str_fname,
			'lname' => $str_lname,
			'gnder' => $str_gnder,
			'bday' => $str_bday,
			'number' => $str_number,
			'id' => $str_id
		];
	}
}
?>
<html>
	<head>
		<title>Details</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>

<body>

	<div id="vcard">

		<span id="vcard_namegreet">
		<span id="vcard_namegreet_hello"><sup>Hello</sup> </span><?php echo $search_user['fname'] ?>
		</span>


		<table id="info_holder">
		
			<tr>
				<td class="vcard_title">Name:</td>
				<td class="vcard_val"><?php echo $search_user['fname']; ?></td>
			</tr>

			<tr>
				<td class="vcard_title">Surname:</td>
				<td class="vcard_val"><?php echo $search_user['lname']; ?></td>
			</tr>

			<tr>
				<td class="vcard_title">Gender:</td>
				<td class="vcard_val"><?php echo $search_user['gnder'];  ?></td>
			</tr>

			<tr>
				<td class="vcard_title">Birthdate</td>
				<td class="vcard_val"><?php echo $search_user['bday'];  ?></td>
			</tr>

			<tr>
				<td class="vcard_title">Number:</td>
				<td class="vcard_val"><?php echo $search_user['number'];  ?></td>
			</tr>
		
		</table>


		<div id="vcard_buttons">
			<a href="?edit=<?php echo $search_user['id']; ?>" class="vcardbtn"><span id="vcard_edit">EDIT</span></a>
			<a href="?delete=<?php echo $search_user['id']; ?>"  class="vcardbtn"><span id="vcard_delete">DELETE</span></a>
		</div>

		<span id="bback"><strong><a href="index.php" id="backbtn"><</a></strong></span>
	</div>
	

</body>
</html>
