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
			'su_fname' => $str_fname,
			'su_lname' => $str_lname,
			'su_gnder' => $str_gnder,
			'su_bday' => $str_bday,
			'su_number' => $str_number,
			'su_id' => $str_id
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
	<span id="vcard_namegreet_hello"><sup>Hello</sup> </span><?php echo $search_user['su_fname'] ?>
	</span>


	<table id="info_holder">
		
		<tr>
		<td class="vcard_title">Name:</td>
		<td class="vcard_val"><?php echo $search_user['su_fname']; ?></td>
		</tr>

		<tr>
		<td class="vcard_title">Surname:</td>
		<td class="vcard_val"><?php echo $search_user['su_lname']; ?></td>
		</tr>

		<tr>
		<td class="vcard_title">Gender:</td>
		<td class="vcard_val"><?php echo $search_user['su_gnder'];  ?></td>
		</tr>

		<tr>
		<td class="vcard_title">Birthdate</td>
		<td class="vcard_val"><?php echo $search_user['su_bday'];  ?></td>
		</tr>

		<tr>
		<td class="vcard_title">Number:</td>
		<td class="vcard_val"><?php echo $search_user['su_number'];  ?></td>
		</tr>
		
	</table>


	<div id="vcard_buttons">
		<a href="?edit=<?php echo $search_user['su_id']; ?>" class="vcardbtn"><span id="vcard_edit">EDIT</span></a>
		<a href="?delete=<?php echo $search_user['su_id']; ?>"  class="vcardbtn"><span id="vcard_delete">DELETE</span></a>
	</div>

<span id="bback"><strong><a href="index.php"><</a></strong></span>
</div>
	

</body>
</html>
