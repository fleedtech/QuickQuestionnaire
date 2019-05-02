
<?php include "student_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Add Questions
			</div>

			<div class="add_new_div">
				<a href="my_questionnaire.php"> Cancel </a>
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

					<form method="POST">
						<table>
							<tr>
								<td> Question: </td>
								<td> <input type="text" name="question_content" required> </td>
								<td> Option 1: </td>
								<td> <input type="text" name="option1" required> </td>
								<td> Option 2: </td>
								<td> <input type="text" name="option2" required> </td>
								<td> Option 3: </td>
								<td> <input type="text" name="option3" required> </td>
								<td> <input type="submit" name="create" value="Create"> </td>
							</tr>
						</table>
					</form>

					<?php

						if(isset($_POST['create'])) {
							$question_id = uniqid('q_');
							$question_content = $_POST['question_content'];
							$question_date = date("Y-m-d");
							$option1 = $_POST['option1'];
							$option2 = $_POST['option2'];
							$option3 = $_POST['option3'];

							$sql = "INSERT INTO questions (question_id, q_id, question_content, question_date, option1, option2, option3) VALUES ('$question_id','$q_id','$question_content','$question_date','$option1','$option2','$option3')";
							$query = $con -> query($sql);

							if ($query == true) {

								echo "Successfully added...";

								echo ("<meta http-equiv='refresh' content='0'");

							} else {
								echo "Failed. Try again.";
							}
						}
					?>

				</div>



				<div class="question_list_div">

					<?php

						$sql_fetch = "SELECT * FROM questions WHERE q_id='$q_id' ORDER BY no ASC";
						$query_fetch = $con -> query($sql_fetch);

						echo "
							List of questions:
							<table class=body_table>
								<thead> 
									<td align=center> No </td>
									<td align=center> ID </td>
									<td align=center> Content </td>
									<td align=center> Created on </td>
									<td align=center> Option 1 </td>
									<td align=center> Option 2 Date </td>
									<td align=center> Option 3 </td>
									<td align=center> Update </td>
									<td align=center> Delete </td>
								</thead>";

						while ($row_fetch = $query_fetch -> fetch_array()) {

							echo "
								<tr> 
									<td>".$row_fetch['no']."</td>
									<td>".$row_fetch['question_id']."</td>
									<td>".$row_fetch['question_content']."</td>
									<td>".$row_fetch['question_date']."</td>
									<td>".$row_fetch['option1']."</td>
									<td>".$row_fetch['option2']."</td>
									<td>".$row_fetch['option3']."</td>
									<td align=center> <a href=update_question.php?q_id=".$q_id."&question_id=".$row_fetch['question_id']."> Update </a> </td>
									<td align=center> <a href=delete_question.php?q_id=".$q_id."&question_id=".$row_fetch['question_id']."> Delete </a> </td>
								</tr>
								";
							}
						?>
					</table>
				</div>

			</div>

		</div>

	</div>

<?php include "student_footer.php" ?>