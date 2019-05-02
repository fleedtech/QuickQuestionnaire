
<?php include "admin_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Students
			</div>

			<div class="add_new_div">
				<a href="new_student.php"> New Student </a>
			</div>

		</div>


		<div class="body_content">
			<?php

			$sql_fetch = "SELECT * FROM student ORDER BY no ASC";
			$query_fetch = $con -> query($sql_fetch);

			echo "
				<table class=body_table>
					<thead> 
						<td align=center> No </td>
						<td align=center> ID </td>
						<td align=center> Name </td>
						<td align=center> Faculty </td>
						<td align=center> Year </td>
						<td align=center> Email </td>
						<td align=center> Date of Reg </td>
						<td align=center> Update </td>
						<td align=center> Delete </td>
					</thead>";

			while ($row_fetch = $query_fetch -> fetch_array()) {

				echo "
					<tr> 
						<td>".$row_fetch['no']."</td>
						<td>".$row_fetch['student_id']."</td>
						<td>".$row_fetch['name']."</td>
						<td>".$row_fetch['faculty']."</td>
						<td>".$row_fetch['year']."</td>
						<td>".$row_fetch['email']."</td>
						<td>".$row_fetch['date_of_registration']."</td>
						<td align=center> <a href=update_student.php?student_id=".$row_fetch['student_id']."> Update </a> </td>
						<td align=center> <a href=delete_student.php?student_id=".$row_fetch['student_id']."> Delete </a> </td>
					</tr>
					";
				}
			?>
			</table>

		</div>

	</div>

<?php include "admin_footer.php" ?>