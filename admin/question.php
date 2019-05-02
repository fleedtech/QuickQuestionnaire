
<?php include "admin_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Questions
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
								</tr>
								";
							}
						?>
					</table>
				</div>

			</div>

		</div>

	</div>

<?php include "admin_footer.php" ?>