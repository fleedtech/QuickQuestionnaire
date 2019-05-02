<!DOCTYPE html>
<html>
<head>
	<title> QuickQuestionnaire </title>
	<?php include "connection.php" ?>
	<link href="css/css.css" rel="stylesheet">
</head>
<body>

	<div class="login_form_content">
	<center>
		<div class="login_system_name">
			<h2> Welcome to QuickQuestionnaire </h2>
		</div>

		<br>

		<div class="login_form_div">
			<form method="POST">
				<table>
					<tr>
						Login
					</tr>
					<tr>
						<td> <input type="text" class='form_input' name="username" placeholder="Username" required> </td>
					</tr>
					<tr>
						<td> <input type="password" class='form_input' name="password" placeholder="Password" required> </td>
					</tr>
					<tr>
						<td> <input type="submit" class='form_submit' name="login" value="Login"> </td>
					</tr>
				</table>
			</form>

			<?php
				if(isset($_POST['login'])){

					$username = $_POST['username'];
					$password = $_POST['password'];

					$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
					$query = $con -> query($sql);
					$numrow = mysqli_num_rows($query);

					if($numrow == true){

						while($row = $query -> fetch_array()) {
							$admin_id = $row['admin_id'];
						}

						$sql_update_active = "UPDATE admin SET active='1' WHERE admin_id='$admin_id'";
						$query_update_active = $con -> query($sql_update_active);

						session_start();

						$_SESSION['admin_id'] = $admin_id;

						header ("location: admin/questionnaire.php");

					} else {

						$sql_student = "SELECT * FROM student WHERE username = '$username' AND password='$password'";
						$query_student = $con -> query($sql_student);
						$result_student = mysqli_num_rows($query_student);

						if($result_student == true){

							while($row_student = $query_student -> fetch_array()) {
								$student_id = $row_student['student_id'];
							}

							$sql_update_active = "UPDATE student SET active='1' WHERE student_id='$student_id'";
							$query_update_active = $con -> query($sql_update_active);

							session_start();

							$_SESSION['student_id'] = $student_id;

							header ("location: student/questionnaire.php");
								
						} else {

							echo "
								<br>
								Failed. Please correct your username and password.

							";

						}

					}

				}
			?>

		</div>
	</div>

</body>
</html>