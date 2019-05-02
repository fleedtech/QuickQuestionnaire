
<?php include "admin_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Delete Admin
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
					}

				?>

					<h3> Delete Student </h3>
					
					<?php echo 'Are you sure you want to delete <strong>'.$name.'</strong> from the list?';?>

					<br>
					<br>

					<form method="POST">

						<input type="submit" name="cancel" value="Cancel">
						<input type="submit" name="delete" value="Delete">

					</form>

					<?php
						if(isset($_POST['cancel'])) {
							echo "
									<br>
									Canceling. Wait...
								";

								echo ("<meta http-equiv='refresh' content='0;URL=admin.php'");
						}


						if(isset($_POST['delete'])) {

							$sql = "DELETE FROM admin WHERE no='$no'";
							$query = $con -> query($sql);

							if($query == true){
								echo "
									<br>
									Successfully deleted. Wait...
								";

								echo ("<meta http-equiv='refresh' content='1;URL=admin.php'");
							} else {
								echo "
									<br>
									Sorry.. delete failed. Try again.
								";
							}
						}
					?>

				</center>
			</div>

		</div>

	</div>

<?php include "admin_footer.php" ?>