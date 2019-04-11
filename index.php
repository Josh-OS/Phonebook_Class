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
				<span class="spanSlice_head">			
						<span class="spanSlice_head_fname"><strong>Firstname</strong></span>
						<span class="spanSlice_head_lname"><strong>Lastname</strong></span>
						<span class="spanSlice_head_gender"><strong>Gender</strong></span>
						<span class="spanSlice_head_bday"><strong>Birthdate</strong></span>
						<span class="spanSlice_head_num"><strong>Number</strong></span>
				</span>


					
						<!--this is foreach-->
						<?php foreach(explode("\n", $csvops->fetchcsv()) as $fetchedLine): ?>
							<?php [$fl_fname, $fl_lname, $fl_gender, $fl_birthdate, $fl_number, $fl_id] = explode(',', $fetchedLine); ?>
								
							<?php if ($fl_id == NULL) break; ?> <!-- // REMOVE EXCESS EMPTY SLICE BEFORE USER INPUT SLICE -->
							
							<a class="tllink" href="?view=<?php echo $fl_id; ?>">
								<span class="spanSlice">
								
									<span class="spanSlice_colmn_fname"><?php echo "$fl_fname"; ?></span>
									<span class="spanSlice_colmn_lname"><?php echo "$fl_lname"; ?></span>
									<span class="spanSlice_colmn_gender"><?php echo "$fl_gender"; ?></span>
									<span class="spanSlice_colmn_bday"><?php echo "$fl_birthdate"; ?></span>
									<span class="spanSlice_colmn_num"><?php echo "$fl_number"; ?></span>
								</span>
							</a>
	
						<?php endforeach; ?>
						
						<span class="spanSlice">
							<form action="" method="GET">
								<span class="spanSlice_colmn_fname"><input class="frmInput" type="text" name="frm_fname" placeholder="Firstname"></span>
								<span class="spanSlice_colmn_lname"><input class="frmInput" type="text" name="frm_lname" placeholder="Lastname"></span>
								<span class="spanSlice_colmn_gender"><select class="frmInput" name="frm_gender">
									<option value="Male">Male</option>
									<option value="Female">Female</option></select></span>
								<span class="spanSlice_colmn_bday"><input class="frmInput" type="date" name="frm_birthdate" placeholder="Birthdate"></span>
								<span class="spanSlice_colmn_num"><input class="frmInput" type="text" name="frm_number" placeholder="Mobile number"></span>
								<input class="frmInput" type="submit"/>
							</form>
						</span>
			</div>

		</div>




</body>
</html>
