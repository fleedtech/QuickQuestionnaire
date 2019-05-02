
<?php include "student_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				My Previous Questionnaires
			</div>

			<div class="add_new_div">
				<table>
					<tr>
						<td> <a href="my_questionnaire.php"> Back </a> </td>
					</tr>
				</table>
			</div>

		</div>


		<div class="body_content">
			<?php
			
			$student_id = $_SESSION['student_id'];

			$current_date = date("Y-m-d");

			$sql_fetch = "SELECT * FROM questionnaire WHERE q_created_by='$student_id' AND q_expiry_date<'$current_date' ORDER BY no ASC";
			$query_fetch = $con -> query($sql_fetch);

			echo "
				<table class=body_table>
					<thead> 
						<td align=center> No </td>
						<td align=center> ID </td>
						<td align=center> Title </td>
						<td align=center> Created By </td>
						<td align=center> Creation Date </td>
						<td align=center> Expiry Date </td>
						<td align=center> Target </td>
						<td align=center> Fill </td>
						<td align=center> Delete </td>
					</thead>";

			while ($row_fetch = $query_fetch -> fetch_array()) {

				echo "
					<tr> 
						<td>".$row_fetch['no']."</td>
						<td>".$row_fetch['q_id']."</td>
						<td>".$row_fetch['q_title']."</td>
						<td>".$row_fetch['q_created_by']."</td>
						<td>".$row_fetch['q_creation_date']."</td>
						<td>".$row_fetch['q_expiry_date']."</td>
						<td>".$row_fetch['q_target']."</td>
						<td align=center> <a href=create_question.php?q_id=".$row_fetch['q_id']."> Edit </a> </td>
						<td align=center> <a href=delete_questionnaire.php?q_id=".$row_fetch['q_id']."> Delete </a> </td>
					</tr>
					";
				}
			?>
			</table>

		</div>

	</div>

<?php include "student_footer.php" ?>