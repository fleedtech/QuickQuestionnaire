
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

				<div class="question_list_div">

					<?php

					//count the number of options selected
						$sql_answer_number = "SELECT count(DISTINCT student_id) AS total_responders FROM answers WHERE q_id='$q_id'";
						$query_answer_number = $con -> query($sql_answer_number);
						$values_answer_number = $query_answer_number -> fetch_assoc();
						$total_responders = $values_answer_number['total_responders'];

						echo "Total number of responders: <b>".$total_responders."</b>";
						echo "<br>";

					//fetch the answeres
						$sql_all_answers = "SELECT * FROM answers WHERE q_id='$q_id'";
						$query_all_answers = $con -> query($sql_all_answers);

						echo "
							<br>
							List of answers:
							<table class=body_table>
								<thead> 
									<td align=center> No </td>
									<td align=center> ID </td>
									<td align=center> Number </td>
									<td align=center> By </td>
									<td align=center> Choice </td>
									<td align=center> Date </td>
								</thead>";

						while ($row_fetch = $query_all_answers -> fetch_array()) {

							echo "
								<tr> 
									<td>".$row_fetch['no']."</td>
									<td>".$row_fetch['answer_id']."</td>
									<td>".$row_fetch['answer_number']."</td>
									<td>".$row_fetch['student_id']."</td>
									<td>".$row_fetch['answer_content']."</td>
									<td>".$row_fetch['answer_date']."</td>
								";
							}

						echo "</table>";
						
					?>

				</div>


			</div>

		</div>

	</div>

<?php include "student_footer.php" ?>