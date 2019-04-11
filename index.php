<?php
include_once('phonelib.php');
$csvops = new filecsv();
$deleteops = new delcv();

if($_GET['view']) {
	require('contact_view.php');
	exit;
}

if($_GET['delete']) {
	$deleteops->deleteById($_GET['delete']);
}

if($_GET['edit']) {
	require('contact_edit.php');
	exit;
}

$csvData = [];


if($_GET['frm_fname']) {
	$csvops->writecontact();
}

if($_GET['frmEdit_id']) {
	$deleteops->deleteById($_GET['frmEdit_id']);
	$csvops->writecontact();
}

?>
<!DOCTYPE Html>

<html>
	<head>
		<title>Phonebook</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>

	<body>

		<div id="bookcontainer">

			<div id="book">
				<table class="contactlist">
					<tr>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Gender</th>
						<th>Birthdate</th>
						<th>Number</th>
					</tr>
				</table>


					
						<!--this is foreach-->
						<?php foreach(explode("\n", $csvops->fetchcsv()) as $fetchedLine): ?>
							<?php echo $csvops->csv_contents; ?> <!-- This is  test -->
							<?php [$fl_fname, $fl_lname, $fl_gender, $fl_birthdate, $fl_number, $fl_id] = explode(',', $fetchedLine); ?>
		
							<span class="spanSlice">
								
									<span class="spanSlice_colmn_fname"><a class="tllink" href="?view=<?php echo $fl_id; ?>"><?php echo "$fl_fname"; ?></a></span>
									<span class="spanSlice_colmn_lname"><?php echo "$fl_lname"; ?></span>
									<span class="spanSlice_colmn_gender"><?php echo "$fl_gender"; ?></span>
									<span class="spanSlice_colmn_bday"><?php echo "$fl_birthdate"; ?></span>
									<span class="spanSlice_colmn_num"><?php echo "$fl_number"; ?></span>
							
							</span>
	
						<?php endforeach; ?>

						
						<table class="contactlist">
						<tr>
							<form action="" method="GET">
								<td class="tlItem"><input class="frmInput" type="text" name="frm_fname" placeholder="Firstname"></td>
								<td class="tlItem"><input class="frmInput" type="text" name="frm_lname" placeholder="Lastname"></td>
								<td class="tlItem"><select class="frmInput" name="frm_gender">
								<option value="Male">Male</option>
								<option value="Female">Female</option></td>
								<td class="tlItem"><input class="frmInput" type="date" name="frm_birthdate" placeholder="Birthdate"></td>
								<td class="tlItem"><input class="frmInput" type="text" name="frm_number" placeholder="Mobile number"></td>
								<input class="frmInput" type="submit"/>
							</form>
						</tr>
						</table>
			</div>

		</div>




</body>
</html>
