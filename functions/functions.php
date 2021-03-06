<?php include 'db/db.php';?>
<?php


function show()
{
	global $connection;
	//select queries into database
	$query = "SELECT * FROM employees";
	//connect query with database
	$result = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		$name = $row['name'];
		$email = $row['email'];
		$address = $row['address'];
		$phone = $row['phone'];
		echo "<tr>
			<td>
				<span class='custom-checkbox'>
					<input type='checkbox' id='checkbox1' name='options[]' value='1'>
					<label for='checkbox1'></label>
				</span>
			</td>
			<td>$id</td>
            <td>$name</td>
            <td>$email</td>
			<td>$address</td>
            <td>$phone</td>
            <td>
                <a href='#editEmployeeModal' class='edit'  data-toggle='modal' data-id='$id'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                <a href='#deleteEmployeeModal' class='delete' data-toggle='modal' data-id='$id'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
            </td>
        </tr>";

	}

}



function create()
{
	global $connection;	
	$name =  $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone =  $_POST['phone'];
	
	$query = $query = "INSERT INTO employees(name, email, address, phone) VALUES ('$name', '$email', '$address', '$phone')";
	$result = mysqli_query($connection, $query);

}

function delete(){

	global $connection;
	$id = $_POST['id'];
	$query = "DELETE FROM employees ";
	$query .= "WHERE id = $id ";
	mysqli_query($connection,$query);

}


function update()
{
	global $connection;
	$id = $_POST['id'];
	$name =  $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone =  $_POST['phone'];

	$query = "UPDATE employees SET ";
	$query .= "name = '$name' , ";
	$query .= "email = '$email' , ";
	$query .= "address = '$address' , ";
	$query .= "phone = '$phone' ";
	$query .= "WHERE id = $id ";
	mysqli_query($connection, $query);

}




?>