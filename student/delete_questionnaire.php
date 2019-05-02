
<?php include "student_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Delete Questionnaire
			</div>

			<div class="add_new_div">
				
			</div>

		</div>


		<div class="body_content">
			
			<?php
				$q_id = $_GET['q_id'];

				$sql = "SELECT * FROM questionnaire WHERE q_id='$q_id'";
				$query = $con -> query($sql);

				while($row = $query -> fetch_array()){
					$no = $row['no'];
					$q_title = $row['q_title'];
				}

			?>

			<center>
				
				<?php echo "Delete <b>".$q_title."</b> from the list?"; ?>

				<br>
				<br>

				<form method="post">
					<input type="submit" name="cancel" value="Cancel">
					<input type="submit" name="delete" value="Delete">
				</form>

				<?php
					if (isset($_POST['cancel'])) {
						echo "
							<br>
							Canceling. Wait...
						";
						echo ("<meta http-equiv='refresh' content='0;URL=my_questionnaire.php'");
					}

					if (isset($_POST['delete'])) {

						$sql = "DELETE FROM questionnaire WHERE no='$no'";
						$query = $con -> query($sql);

						$sql_question = "DELETE FROM questions WHERE q_id='$q_id'";
						$query_question = $con -> query($sql_question);

						$query_final = $query . $query_question;

						if($query_final == true){
							echo "
								<br>
								Successfully deleted. Wait...
							";

							echo ("<meta http-equiv='refresh' content='1;URL=my_questionnaire.php'");
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

<?php include "student_footer.php" ?>