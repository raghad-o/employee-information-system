<html>
<body style="background-color:beige;">
<?php
$servername="localhost";
$username="root";
$password="";
$id=$_POST['id'];
$fname=$_POST['name'];
$phone=$_POST['phoneNO'];
$salary=$_POST['salary'];

//here we create connection1
echo"<h1>Database Handling</h1>";
$con = mysqli_connect($servername,$username,$password);
// here we check connection
if($con)
	echo "Connected successfully";
else
	echo "Connection failed: ". mysqli_connect_error();

// here we check DB
if(mysqli_select_db($con,"EmpInfor"))
	echo"<br>Database selected";
else
	echo"<br>Database not selected";
// insert
if(isset($_POST['add'])){
	$sql = "insert into information(ID,FullName,PhoneNumber,Salary)values($id,'$fname','$phone' ,$salary)";
	if(mysqli_query($con,$sql))
	echo "<br><br>Employee added successfully";
}
//delete
if (isset($_POST['delete'])){
$sql="delete from information where ID = ".$id;
if(mysqli_query($con,$sql))
	echo "<br><br>Employee information deleted successfully";
}
//update
if(isset($_POST['update'])){
	$sql="update information set FullName = '$fname', PhoneNumber = '$phone', Salary = $salary where ID = ".$id;
if(mysqli_query($con,$sql))
	echo"<br><br>Employee information Updated successfully";
}

//view
if(isset($_POST['view']))
{
echo"<table border ='1'>";
$sql = "select * from information";
$data = mysqli_query($con,$sql);
if(!$data){
	echo"<br> No data found";
}else{
echo"<tr>
		<th>ID</th>
		<th>Full Name</th>
		<th>Phone Number</th>
		<th>salary</th>
	</tr>";
while($row = mysqli_fetch_array($data)){
	echo"<tr>
			<td>".$row['ID']."</td>
			<td>".$row['FullName']."</td>
			<td>".$row['PhoneNumber']."</td>
			<td>".$row['Salary']."</td>
		</tr>";
}
}
echo"</table>";
}
?>
</body>
</html>