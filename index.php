<?php
include_once('phonelib.php');

if($_GET['view']) {
	require('contact_view.php');
	exit;
}

if($_GET['delete']) {
	echo $_GET['delete'];
}

$csvData = [];

$csvops = new filecsv();

if($_GET['frm_fname']) {
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
<table class="entry">
	<thead>
		<tr>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Gender</th>
		<th>Birthdate</th>
		<th>Number</th>
		</tr>
	<thead>


	<tbody>
	<!--thi is foreach-->
	<?php foreach(explode("\n", $csvops->fetchcsv()) as $fetchedLine): ?>
<?php echo $csvops->csv_contents; ?> <!-- This is  test -->
	<?php [$fl_fname, $fl_lname, $fl_gender, $fl_birthdate, $fl_number, $fl_id] = explode(',', $fetchedLine); ?>
		
		<div color="red">
		<tr>
		<td class="tlItem"><a class="tllink" href="?view=<?php echo $fl_id; ?>"><?php echo "$fl_fname"; ?></a></td>
		<td class="tlItem"><?php echo "$fl_lname"; ?></td>
		<td class="tlItem"><?php echo "$fl_gender"; ?></td>
		<td class="tlItem"><?php echo "$fl_birthdate"; ?></td>
		<td class="tlItem"><?php echo "$fl_number"; ?></td>
		</tr>
		</div>
	
	<?php endforeach; ?>
		<tr>
		<form action="" method="GET">
		<td class="tlItem"><input class="frmInput" type="text" name="frm_fname" placeholder="Firstname"></td>
		<td class="tlItem"><input class="frmInput" type="text" name="frm_lname" placeholder="Lastname"></td>
		<td class="tlItem"><select class="frmInput" name="frm_gender">
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</td>
		<td class="tlItem"><input class="frmInput" type="date" name="frm_birthdate" placeholder="Birthdate"></td>
		<td class="tlItem"><input class="frmInput" type="text" name="frm_number" placeholder="Mobile number"></td>
		<input class="frmInput" type="submit"/>
		</form>
		</tr>
	</tbody>
</div>

</div>




</body>
</html>
