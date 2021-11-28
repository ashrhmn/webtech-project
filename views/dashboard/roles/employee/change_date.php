<?php 
	//include('header.php');
?>

<html>
<head>
	<title>Edit New User</title>
</head>
<body>
	<center>
		<a href="../controllers/logout.php"> logout</a>
	</center>

	<form method="post" action="home.php">
		<fieldset>
			<legend>Reschedule </legend>
			<table>
			<tr>
					<td>ID:</td>
					<td><input type="text" name="id" value=""></td>
				</tr>
			<tr>
			     <td>ChangeDate</td>
				 <td><input type="date" name="Date"placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31"></td>
		     </tr>	
			 <tr>
					<td></td>
					<td><input type="submit" name="submit" value="change"></td>
				</tr>
			 </table>
		</fieldset>
	 </form>