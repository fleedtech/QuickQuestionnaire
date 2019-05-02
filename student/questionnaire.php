
<?php include "student_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Questionnaires
			</div>

			<div class="add_new_div">
				<table>
					<tr>
						<td> <a href="expired_questionnaire.php"> Expired Questionnaires </a> </td>
					</tr>
				</table>
			</div>

		</div>


		<div class="body_content">
			<?php

			$current_date = date("Y-m-d");
			$created_by = $_SESSION['student_id'];

		//fetch the questionnaires
			$sql_fetch = "SELECT * FROM questionnaire WHERE q_created_by!='$created_by' AND q_expiry_date>='$current_date' ORDER BY no ASC";
			$query_fetch = $con -> query($sql_fetch);

		/*fetch questionnaire ID of students who have filled the questionnaire
			$sql_q_id = "SELECT * FROM questionnaire WHERE q_expiry_date>='$current_date' ORDER BY no ASC";
			$query_q_id = $con -> query($sql_q_id);
			$row_filled_by = $query_q_id -> fetch_array();
			$q_id = $row_filled_by['q_id'];

		//total number of students who have filled
			$sql_filled_by = "SELECT DISTINCT count(student_id) AS total_filled_by FROM answers WHERE q_id='$q_id'";
			$query_filled_by = $con -> query($sql_filled_by);
			$values_filled_by = $query_filled_by -> fetch_assoc();
			$total_filled_by = $values_filled_by['total_filled_by'];
		*/

		//table displaying all questionnaire
			echo "
				<table class=body_table>
					<thead> 
						<td align=center> No </td>
						<td align=center> ID </td>
						<td align=center> Title </td>
						<td align=center> Created by </td>
						<td align=center> Creatied on </td>
						<td align=center> Expire on </td>
						<td align=center> Target </td>
						<td align=center> Fill </td>
					</thead>";

			while ($row_fetch = $query_fetch -> fetch_array()) {

				$student_id = $_SESSION['student_id'];
				$q_id = $row_fetch['q_id'];

				//check is a student has already filled the questionnaire of not
				$sql_check = "SELECT * FROM answers WHERE q_id='$q_id' AND student_id='$student_id'";
				$query_check = $con -> query($sql_check);
				$num_row_check = mysqli_num_rows($query_check);

				echo "
					<tr> 
						<td>".$row_fetch['no']."</td>
						<td>".$row_fetch['q_id']."</td>
						<td>".$row_fetch['q_title']."</td>
						<td>".$row_fetch['q_created_by']."</td>
						<td>".$row_fetch['q_creation_date']."</td>
						<td>".$row_fetch['q_expiry_date']."</td>
						<td>".$row_fetch['q_target']."</td>";
						if($num_row_check == false){
							echo "<td align=center> <a href=fill_questionnaire.php?q_id=".$row_fetch['q_id']."> Fill </a> </td>";
						}else{
							echo "<td>Done</td>";
						}

					echo"
					</tr>
					";
				}
			?>
			</table>

		</div>

	</div>

<?php include "student_footer.php" ?>