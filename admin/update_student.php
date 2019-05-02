
<?php include "admin_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Update Student
			</div>

			<div class="add_new_div">
				<a href="student.php"> Cancel </a>
			</div>

		</div>


		<div class="body_content">
			
			<div class="add_new_form_div">
				<center>

				<?php
					$student_id = $_GET['student_id'];

					$sql = "SELECT * FROM student WHERE student_id='$student_id'";
					$query = $con -> query($sql);
					
					while($row = $query -> fetch_array()){
						$no = $row['no'];
						$name = $row['name'];
						$faculty = $row['faculty'];
						$year = $row['year'];
						$email = $row['email'];
					}


				?>

					<h3> Update Student </h3>

					<form method="POST">

						<?php echo '
							<table>
								<tr>
									<td> ID: </td>
									<td> <input type="text" class="form_input" name="student_id" value="'.$student_id.'"> </td>
								</tr>
								<tr>
									<td> Name: </td>
									<td> <input type="text" class="form_input" name="name" value="'.$name.'" required> </td>
								</tr>
								<tr>
									<td> Faculty: </td>
									<td> <input type="text" class="form_input" name="faculty" value="'.$faculty.'" required> </td>
								</tr>
								<tr>
									<td> Year: </td>
									<td> <input type="text" class="form_input" name="year" value="'.$year.'" required> </td>
								</tr>
								<tr>
									<td> Email: </td>
									<td> <input type="text" class="form_input" name="email" value="'.$email.'" required> </td>
								</tr>
								<tr>
									<td> </td>
									<td> <input type="submit" class="form_submit" name="update" value="Update"> </td>
								</tr>
							</table>';
						?>

					</form>

					<?php

						if(isset($_POST['update'])) {

							$student_id = $_POST['student_id'];
							$name = $_POST['name'];
							$faculty = $_POST['faculty'];
							$year = $_POST['year'];
							$email = $_POST['email'];

							$sql = "UPDATE student SET student_id='$student_id', name='$name', faculty='$faculty', year='$year', email='$email' WHERE no='$no'";
							$query = $con -> query($sql);

							if($query == true){
								echo "
									<br>
									Successfully updated. Wait...
								";

								echo ("<meta http-equiv='refresh' content='1;URL=student.php'");
							} else {
								echo "
									<br>
									Sorry.. update failed. Try again.
								".mysqli_error($con);
							}
						}
					?>

				</center>
			</div>

		</div>

	</div>

<?php include "admin_footer.php" ?>