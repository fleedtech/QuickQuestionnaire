
<?php include "admin_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				New Students
			</div>

			<div class="add_new_div">
				<a href="student.php"> Cancel </a>
			</div>

		</div>


		<div class="body_content">
			
			<div class="add_new_form_div">
				<center>

					<h3> New Student </h3>

					<form method="POST">
						<table>
							<tr>
								<td> <input type="text" class="form_input" name="student_id" placeholder="ID" required> </td>
							</tr>
							<tr>
								<td> <input type="text" class="form_input" name="name" placeholder="Name" required> </td>
							</tr>
							<tr>
								<td>
									<select name="gender">
										<option> M </option>
										<option> F </option>
									</select>
								</td>
							</tr>
							<tr>
								<td> <input type="text" class="form_input" name="faculty" placeholder="Faculty" required> </td>
							</tr>
							<tr>
								<td> <input type="text" class="form_input" name="year" placeholder="Year" required> </td>
							</tr>
							<tr>
								<td> <input type="text" class="form_input" name="email" placeholder="Email" required> </td>
							</tr>
							<tr>
								<td> <input type="submit" class="form_submit" name="register" value="Register"> </td>
							</tr>
						</table>
					</form>

					<?php

						if(isset($_POST['register'])) {
							$student_id = $_POST['student_id'];
							$name = $_POST['name'];
							$gender = $_POST['gender'];
							$faculty = $_POST['faculty'];
							$year = $_POST['year'];
							$email = $_POST['email'];
							$username = $_POST['student_id'];
							$password = $_POST['student_id'];
							$date_of_registration = date("Y-m-d");

							$sql_check = "SELECT * FROM student WHERE student_id='$student_id'";
							$query_check = $con -> query($sql_check);
							$num_row = mysqli_num_rows($query_check);

							if($num_row == true){

								echo "
										<br>
										Sorry. Student ID already exists. Try again.
									";

							} else {

								$sql = "INSERT INTO student (student_id, name, gender, faculty, year, email, username, password, date_of_registration) VALUES ('$student_id', '$name','$gender', '$faculty', '$year', '$email', '$username', '$password', '$date_of_registration')";
								$query = $con -> query($sql);

								if($query == true){
									echo "
										<br>
										Successfully registered. Wait...
									";

									echo ("<meta http-equiv='refresh' content='1;URL=student.php'");
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