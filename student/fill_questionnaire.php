
<?php include "student_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Fill Questionnaire
			</div>

			<div class="add_new_div">
				<a href="questionnaire.php"> Cancel </a>
			</div>

		</div>


		<div class="body_content">
			
			<div class="add_new_form_div">
				
				<?php
					$q_id = $_GET['q_id'];

					$sql = "SELECT * FROM questionnaire WHERE q_id='$q_id'";
					$query = $con -> query($sql);

					while($row = $query -> fetch_array()){
						$q_title = $row['q_title'];
						$q_created_by = $row['q_created_by'];
						$q_creation_date = $row['q_creation_date'];
						$q_expiry_date = $row['q_expiry_date'];
						$q_target = $row['q_target'];
					}

					echo "
						<div class='questionnaire_info_div'>
							<table>
								<tr>
									<td> ID: <b>".$q_id."</b> </td>
									<td> | </td>
									<td> Title: <b>".$q_title."</b> </td>
									<td> | </td>
									<td> Created by: <b>".$q_created_by."</b> </td>
									<td> | </td>
									<td> Created on: <b>".$q_creation_date."</b> </td>
									<td> | </td>
									<td> Expire on: <b>".$q_expiry_date."</b> </td>
									<td> | </td>
									<td> Target: <b>".$q_target."</b> </td>
								</tr>
							</table>
						</div>
					";

				?>

				<div class='create_question_div'>

					<?php

						$quetion_number_position = 1;

						$sql_questions = "SELECT * FROM questions WHERE q_id='$q_id' AND question_number='$quetion_number_position' ORDER BY no";
						$query_questions = $con -> query($sql_questions);
						
						$row_questions = $query_questions -> fetch_array();

						echo "<form method='post'>";

						echo "								
							<div class=''>
								".$quetion_number_position.". ".$row_questions['question_content']."
								<br>
								<br>
								<input type='radio' name='option' value='".$row_questions['option1']."'>".$row_questions['option1']."
								<input type='radio' name='option' value='".$row_questions['option2']."'>".$row_questions['option2']."
								<input type='radio' name='option' value='".$row_questions['option3']."'>".$row_questions['option3']."
								<br>
								<br>
							</div>
							
						";

						echo "<input type='submit' name='next' value='Next'>";

						echo "</form>";

					?>

					<?php

						if(isset($_POST['next']) AND !isset($_POST['option'])){

							echo "<br>Please chose one option of the answers";

						} elseif (isset($_POST['next']) AND isset($_POST['option'])) {

							$answer_id = uniqid('a_');
							$question_id = $row_questions['question_id'];
							$student_id = $_SESSION['student_id'];
							$answer_date = date('Y-m-d');

							$option = $_POST['option'];

							$sql_submit = "INSERT INTO answers (answer_id, answer_number, question_id, q_id, student_id, answer_content, answer_date) VALUES ('$answer_id','$quetion_number_position','$question_id','$q_id','$student_id','$option','$answer_date')";
							$query_submit = $con -> query($sql_submit);

							if($query_submit){

								$quetion_number_position = $quetion_number_position + 1;

								echo "<br>Your answer was submited. Looding next question...";

								header("Refresh: 0; url=fill_next_question.php?q_id=".$q_id."&quetion_number_position=".$quetion_number_position."");

							} else {
								echo "Sorry answer was not submitted. Try again.";
							}
						}

					?>

				</div>

			</div>

		</div>

	</div>

<?php include "student_footer.php" ?>