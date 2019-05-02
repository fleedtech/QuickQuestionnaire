
<?php include "admin_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				About
			</div>

			<div class="add_new_div">
				<a href="expired_questionnaires.php"> Expired Questionnaires </a>
			</div>

		</div>


		<div class="body_content">
			<?php
				$admin_id = $_SESSION['admin_id'];

				$sql_select = "SELECT * FROM admin WHERE admin_id='$admin_id'";
				$query_select = $con -> query($sql_select);

				while($row_select = $query_select -> fetch_array()){
					$name = $row_select['name'];
					$role = $row_select['role'];
					$username = $row_select['username'];
					$password = $row_select['password'];
				}

			?>

			<div class="profile_info_div">
				<table>
					<tr>
						<td> ID:  </td>
						<td> <?php echo "<b>".$admin_id; ?> </td>
					</tr>
					<tr>
						<td> Name:  </td>
						<td> <?php echo "<b>".$name; ?> </td>
					</tr>
					<tr>
						<td> Post:  </td>
						<td> <?php echo "<b>".$role; ?> </td>
					</tr>
					<tr>
						<td> Username:  </td>
						<td> <?php echo "<b>".$username; ?> </td>
					</tr>
				</table>
			</div>

			<div class="update_password_div">

				<br>
				<br>
				<hr>

				<form method="post">

					<h3> Update username and password </h3>

					<table>
						<tr>
							<td> Username: </td>
							<td> <?php echo "<input type='text' class='form_input' name='username' value='".$username."' required> </td>";?>
						</tr>
						<tr>
							<td> Old password: </td>
							<td> <input type="password" class="form_input" name="old_password"> </td>
						</tr>
						<tr>
							<td> New password: </td>
							<td> <input type="password" class="form_input" name="new_password"> </td>
						</tr>
						<tr>
							<td> Repeat new password: </td>
							<td> <input type="password" class="form_input" name="repeat_new_password"> </td>
						</tr>
						<tr>
							<td> </td>
							<td> <input type="submit" class="form_submit" name="update_password" value="Update"> </td>
						</tr>
					</table>
				</form>

				<?php
					if (isset($_POST['update_password'])) {

						$username = $_POST['username'];
						$old_password = $_POST['old_password'];
						$new_password = $_POST['new_password'];
						$repeat_new_password = $_POST['repeat_new_password'];

// check whether the admin old username and password truely exist in the database
						$sql_check_admin = "SELECT * FROM admin WHERE username='$username' AND password='$new_password'";
						$query_check_admin = $con -> query($sql_check_admin);
						$num_rows_admin = mysqli_num_rows($query_check_admin);

						$sql_check_students = "SELECT * FROM student WHERE username='$username'";
						$query_check_students = $con -> query($sql_check_students);
						$num_rows_students = mysqli_num_rows($query_check_students);

						if ($num_rows_admin == true){
							echo "
								<br>
								<br>
								<div class='fail_div'> 
									Sorry, the username you entered is being used by another user. Try another...
								</div>
							";

						} elseif ($num_rows_students == true){
							echo "
								<br>
								<br>
								<div class='fail_div'> 
									Sorry, the username you entered is being used by another user. Try another...
								</div>
							";

						} else {

// allow the admin to update only the username

							if(empty($old_password) AND empty($new_password) AND empty($repeat_new_password)){
								
								$sql = "UPDATE admin SET username='$username' WHERE admin_id='$admin_id'";
								$query = $con -> query($sql);

								if($query) {
									echo "
										<br>
										<br>
										<div class='success_div'> 
											Successfully updated. Loging again to confirm changes...
										</div>
									";
									
									echo ("<meta http-equiv='refresh' content='1;URL=session/logout.php'");

								} else {
									echo "
										<br>
										<br>
										<div class='fail_div'> 
											Sorry, you did not repeat your new password correctly. Try again..
										</div>
									";
								}
// -------------------------------------------------------------------------------------------------------------------

							} elseif ($old_password != $password){
								echo "
									<br>
									<br>
									<div class='fail_div'> 
										Sorry, your old password is incorrect. Try again..
									</div>
								";

							} elseif($new_password === $password){
								echo "
									<br>
									<br>
									<div class='fail_div'> 
										Sorry, your new password is equal to your old one. Make sure they are different. Try again..
									</div>
								";

							} elseif($new_password != $repeat_new_password) {
								echo "
									<br>
									<br>
									<div class='fail_div'> 
										Sorry, you did not repeat your new password correctly. Try again..
									</div>
								";

							} else {

								$sql = "UPDATE admin SET username='$username', password='$new_password' WHERE admin_id='$admin_id'";
								$query = $con -> query($sql);

								if($query) {
									echo "
										<br>
										<br>
										<div class='success_div'> 
											Successfully updated. Loging again to confirm changes...
										</div>
									";
									
									echo ("<meta http-equiv='refresh' content='1;URL=session/logout.php'");

								} else {

									echo "
										<br>
										<br>
										<div class='fail_div'> 
											Sorry, you did not repeat your new password correctly. Try again..
										</div>
									";
								}
							}
						}
					}
				?>
		</div>

	</div>

<?php include "admin_footer.php" ?>