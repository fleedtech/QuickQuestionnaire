
<?php include "admin_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				New Admin
			</div>

			<div class="add_new_div">
				<a href="admin.php"> Cancel </a>
			</div>

		</div>


		<div class="body_content">
			
			<div class="add_new_form_div">
				<center>

					<h3> New Admin </h3>

					<form method="POST">
						<table>
							<tr>
								<td> <input type="text" class="form_input" name="admin_id" placeholder="ID" required> </td>
							</tr>
							<tr>
								<td> <input type="text" class="form_input" name="name" placeholder="Name" required> </td>
							</tr>
							<tr>
								<td> 
									<select class="form_submit" name="role">
										<option> --- Choose Admin Role --- </option>
										<option> Main Admin </option>
										<option> Assistant </option>
									</select>
								</td>
							</tr>
							<tr>
								<td> <input type="submit" class="form_submit" name="register" value="Register"> </td>
							</tr>
						</table>
					</form>

					<?php

						if(isset($_POST['register'])) {
							$admin_id = $_POST['admin_id'];
							$name = $_POST['name'];
							$role = $_POST['role'];
							$username = $_POST['admin_id'];
							$password = $_POST['admin_id'];
							$date_of_registration = date("Y-m-d");

							$sql_check = "SELECT * FROM admin WHERE admin_id='$admin_id'";
							$query_check = $con -> query($sql_check);
							$num_row = mysqli_num_rows($query_check);

							if($num_row == true){
								
								echo "
										<br>
										Sorry. Admin ID already exists. Try again.
									";

							} else {

								$sql = "INSERT INTO admin (admin_id, name, role, username, password, date_of_registration) VALUES ('$admin_id', '$name', '$role', '$username', '$password', '$date_of_registration')";
								$query = $con -> query($sql);

								if($query == true){
									echo "
										<br>
										Successfully registered. Wait...
									";

									echo ("<meta http-equiv='refresh' content='1;URL=admin.php'");

								} else {
									echo "
										<br>
										Sorry.. registration failed. Try again.
									";
								}
							}
						}
					?>

				</center>
			</div>

		</div>

	</div>

<?php include "admin_footer.php" ?>