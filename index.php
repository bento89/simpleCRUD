<!DOCTYPE html>
<html>
<head>
	<title>Demo App</title>
	<style type="text/css">
		#table{
			border: 1px solid red;
		}
	</style>
</head>
<body>
<h1>Demo APP</h1>

<form name="form1" action="index.php" method="post">

	<table>
		<tr>
			<td>NAME </td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>ADDRESS </td>
			<td><input type="text" name="address"></td>
		</tr>
		<tr>
			<td>SALARY </td>
			<td><input type="text" name="salary"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="Submit" name="SAVE"></td>
		</tr>



	</table>

</form>




<table border="1">
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Address</td>
		<td>Salary</td>
		<td>ACTION</td>
	</tr>




<?php 


include_once('config.php');
if(isset($_POST['SAVE'])){
	
	$name = $_POST['name'];
	$address = $_POST['address'];
	$salary = $_POST['salary'];

	$sql = "INSERT INTO employees (name,address, salary) 
			VALUES ('$name','$address',$salary)";
           
            if ($connect->query($sql)) {
               echo "<script>alert('success')</script>";
            }else{
            	echo "<script>alert('fail')</script>";
            }

}

#echo $name;
#echo $address;
#echo $salary;

$sql2 = "SELECT * FROM employees";


$row = $connect->query($sql2);

while ($data = $row->fetch_assoc()) {


 ?>


 	<tr>
 		
 		<td><?=$data['ID']; ?></td>
 		<td><?=$data['name']; ?></td>
 		<td><?=$data['address']; ?></td>
 		<td><?=$data['salary']; ?></td>
 		<td><a href="?edit.php">Edit</a></td>

 	</tr>


 <?php } ?>





</table>

 </body>
</html>