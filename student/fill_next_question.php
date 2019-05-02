
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

						$quetion_number_position = $_GET['quetion_number_position'];

						$sql_questions = "SELECT * FROM questions WHERE q_id='$q_id' AND question_number='$quetion_number_position' ORDER BY no";
						$query_questions = $con -> query($sql_questions);
						
						$row_questions = $query_questions -> fetch_array();

					//fetch student who create questionnaire
						$sql_created_by = "SELECT * FROM questionnaire WHERE q_id='$q_id'";
						$query_create_by = $con -> query($sql_created_by);
						$row_create_by = $query_create_by -> fetch_array();
						$student_id_who_created = $row_create_by['q_created_by'];

						$sql_student_name = "SELECT * FROM student WHERE student_id='$student_id_who_created'";
						$query_student_name = $con -> query($sql_student_name);
						$row_student_name = $query_student_name -> fetch_array();
						$student_name = $row_student_name['name'];
						$student_gender = $row_student_name['gender'];

					//--------------------------------------------------------------------
					
					//check whether all the questions have been answered
						//count the total number of questions
						$sql_number_of_questions = "SELECT count(no) AS total_number_of_questions FROM questions WHERE q_id='$q_id'";
						$query_number_of_questions = $con -> query($sql_number_of_questions);
						$values_number_of_questions = $query_number_of_questions -> fetch_assoc();
						$total_number_of_questions = $values_number_of_questions['total_number_of_questions'];

						if($quetion_number_position > $total_number_of_questions){

							echo "All answers have been submited. 
							<br>
							<br>";

							//show a message accoding to the gender of the person who created the questionnaire
							if($student_gender == 'M'){
								echo "
								<b>".$student_name."</b> thanks you a lot for filling his questionnaire.";
							} else {
								echo "
								<b>".$student_name."</b> thanks you a lot for filling her questionnaire.";
							}

						} else {

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

						// submit selected answer and load next one

							if(isset($_POST['next']) AND !isset($_POST['option'])){

								echo "Please chose one option of the answers";

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

									header("Refresh: 0; url=fill_next_question.php?q_id=".$q_id."&quetion_number_position=".$quetion_number_position."");

								} else {
									echo "Sorry answer was not submitted. Try again.";
								}
							}
						}

					?>

				</div>



			</div>

		</div>

	</div>

<?php include "student_footer.php" ?>