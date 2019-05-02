
<?php include "admin_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Update Admin
			</div>

			<div class="add_new_div">
				<a href="admin.php"> Cancel </a>
			</div>

		</div>


		<div class="body_content">
			
			<div class="add_new_form_div">
				<center>

				<?php
					$admin_id = $_GET['admin_id'];

					$sql = "SELECT * FROM admin WHERE admin_id='$admin_id'";
					$query = $con -> query($sql);
					
					while($row = $query -> fetch_array()){
						$no = $row['no'];
						$name = $row['name'];
						$role = $row['role'];
					}


				?>

					<h3> Update Admin </h3>

					<form method="POST">

						<?php echo '
							<table>
								<tr>
									<td> ID: </td>
									<td> <input type="text" class="form_input" name="admin_id" value="'.$admin_id.'"> </td>
								</tr>
								<tr>
									<td> Name: </td>
									<td> <input type="text" class="form_input" name="name" value="'.$name.'" required> </td>
								</tr>
								<tr>
									<td> Role: </td>
									<td> <input type="text" class="form_input" name="role" value="'.$role.'" required> </td>
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

							$admin_id = $_POST['admin_id'];
							$name = $_POST['name'];
							$role = $_POST['role'];

							$sql = "UPDATE admin SET admin_id='$admin_id', name='$name', role='$role' WHERE no='$no'";
							$query = $con -> query($sql);

							if($query == true){
								echo "
									<br>
									Successfully updated. Wait...
								";

								echo ("<meta http-equiv='refresh' content='1;URL=admin.php'");
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