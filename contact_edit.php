<?php
include_once('phonelib.php');

//$contact_delete = new delcv(); //change this, create new instance.

$search_user = [];
$fetch;
$fetch = file_get_contents('contact.csv');
foreach(explode("\n", $fetch) as $line) {
	[$str_fname, $str_lname, $str_gnder, $str_bday, $str_number, $str_id] = explode(',', $line);
	if ($_GET['edit'] == $str_id) {

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
		<title>Edit Contact</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>

<body>

	<div id="vcard">

		<span id="vcard_namegreet">
		<span id="vcard_namegreet_hello"><sup>Hello</sup> </span><?php echo $search_user['fname'] ?>
		</span>


		<table id="info_holder">
			<form action="" method="GET">
		
				<tr>
					<td class="vcard_title">Name:</td>
					<td class="vcard_val"><input class="vcard_input" type="text" name="frmEdit_fname" value="<?php echo $search_user['fname']; ?>"></td>
				</tr>

				<tr>
					<td class="vcard_title">Surname:</td>
					<td class="vcard_val"><input class="vcard_input" type="text" name="frmEdit_lname" value="<?php echo $search_user['lname']; ?>"></td>
				</tr>

				<tr>
					<td class="vcard_title">Gender:</td>
					<td class="vcard_val"><select name="frmEdit_gender">
						<option value="Male" selected>Male</option>
						<option value="Female" <?php if($search_user['gnder'] == Female) echo 'selected'; ?>>Female</option></td>
				</tr>

				<tr>
					<td class="vcard_title">Birthdate</td>
					<td class="vcard_val"><input class="vcard_input" type="date" name="frmEdit_birthdate" value="<?php echo $search_user['bday'];  ?>"></td>
				</tr>

				<tr>
					<td class="vcard_title">Number:</td>
					<td class="vcard_val"><input class="vcard_input" type="text" name="frmEdit_number" value="<?php echo $search_user['number'];  ?>"></td>
				</tr>
				<input type="hidden" name="frmEdit_id" value="<?php echo $search_user['id']; ?>">
				<div id="vcard_buttons">
					 <a href="index.php" class="vcardbtn"><span id="vcard_edit">CANCEL</span></a>
               			         <input type="submit" id=vcard_delete" class="save" value="save">
        		        </div>
		
			</form>
		</table>
		
	</div>
	

</body>
</html>
