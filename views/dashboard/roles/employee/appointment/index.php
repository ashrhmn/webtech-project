<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Patient appoinment</title>
</head>
<body>

	<center>	
		<a href="home.php">Back </a> |
		<a href="../controller/logout.php"> logout</a>
	</center>

	<br>

	<table border='1' align="center">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>PHONE NUMBER</th>
			<th>SCHEDULE</th>
			<th>APPOINMENT</th>
		</tr>
		<tr>
			<td>01</td>
			<td>ashik</td>
			<td>016..</td>
			<td>10-nov-2021 6.00pm</td>
			<td>
				<a href="change_date.php?id=01"> CHANGE</a> | 
				<a href="delete.php?id=01"> DELETE</a> 
			</td>
		</tr>
		<tr>
			<td>02</td>
			<td>dip roy</td>
			<td>0181..</td>
			<td>05-nov-2021 4pm</td>
			<td>
				<a href="change_date.php?id=02"> CHANGE</a> | 
				<a href="delete.php?id=02"> DELETE</a> 
			</td>
		</tr>
		<tr>
			<td>03</td>
			<td>sumona</td>
			<td>016..</td>
			<td>10-dec-2021 8.00pm</td>
			<td>
				<a href="change_date.php?id=03"> CHANGE</a> | 
				<a href="delete.php?id=03"> DELETE</a> 
			</td>
		</tr>
		<tr>
			<td>04</td>
			<td>abir</td>
			<td>01914..</td>
			<td>20-nov-2021 6.00pm</td>
			<td>
				<a href="change_date.php?id=04"> CHANGE</a> | 
				<a href="delete.php?id=04"> DELETE</a> 
			</td>
		</tr>
	</table>
</body>
</html>