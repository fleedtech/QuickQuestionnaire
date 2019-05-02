
<?php include "student_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Delete Question
			</div>

			<?php
			
				$q_id = $_GET['q_id'];

			?>

			<div class="add_new_div">
				<?php echo "<a href=create_question.php?q_id=".$q_id."> Cancel </a>"; ?>
			</div>

		</div>


		<div class="body_content">
			
			<div class="add_new_form_div">
				<center>

				<?php
					$question_id = $_GET['question_id'];

					$sql = "SELECT * FROM questions WHERE question_id='$question_id'";
					$query = $con -> query($sql);
					
					while($row = $query -> fetch_array()){
						$no = $row['no'];
						$question_content = $row['question_content'];
					}

				?>

					<?php echo "Delete '<b>".$question_content."</b>' ?";?>

					<br>
					<br>

					<form method="POST">
						<input type="submit" name="cancel" value="Cancel">
						<input type="submit" name="delete" value="Delete">
					</form>

					<?php

						if (isset($_POST['cancel'])) {
						echo "
							<br>
							Canceling. Wait...
						";
						echo ("<meta http-equiv='refresh' content='0;URL=create_question.php?q_id=".$q_id."'");
					}

					if (isset($_POST['delete'])) {

						$sql_question = "DELETE FROM questions WHERE question_id='$question_id'";
						$query_question = $con -> query($sql_question);

						if($query_question == true){
							echo "
								<br>
								Successfully deleted. Wait...
							";

							echo ("<meta http-equiv='refresh' content='1;URL=create_question.php?q_id=".$q_id."'");

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

<?php include "student_footer.php" ?>