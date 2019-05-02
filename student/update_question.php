
<?php include "student_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Update Question
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
						$option1 = $row['option1'];
						$option2 = $row['option2'];
						$option3 = $row['option3'];
					}


				?>

					<h3> Update Question </h3>

					<form method="POST">

						<?php echo '
							<table>
								<tr>
									<td> Question: </td>
									<td> <input type="text" class="form_input" name="question_content" value="'.$question_content.'"> </td>
								</tr>
								<tr>
									<td> Option 1: </td>
									<td> <input type="text" class="form_input" name="option1" value="'.$option1.'" required> </td>
								</tr>
								<tr>
									<td> Option 2: </td>
									<td> <input type="text" class="form_input" name="option2" value="'.$option2.'" required> </td>
								</tr>
								<tr>
									<td> Option 3: </td>
									<td> <input type="text" class="form_input" name="option3" value="'.$option3.'" required> </td>
								</tr>
								<tr>
									<td> </td>
									<td> <input type="submit" class="form_submit" name="update" value="Update"> </td>
								</tr>
							</table>';
						?>

					</form>

					<?php

						if(isset($_POST['update'])) {

							$question_content = $_POST['question_content'];
							$option1 = $_POST['option1'];
							$option2 = $_POST['option2'];
							$option3 = $_POST['option3'];

							$sql = "UPDATE questions SET question_content='$question_content', option1='$option1', option2='$option2', option3='$option3' WHERE no='$no'";
							$query = $con -> query($sql);

							if($query == true){
								echo "
									<br>
									Successfully updated. Wait...
								";

								echo ("<meta http-equiv='refresh' content='1;URL=create_question.php?q_id=".$q_id."'");
							} else {
								echo "
									<br>
									Sorry.. update failed. Try again.
								".mysqli_error($con);
							}
						}
					?>

				</center>
			</div>

		</div>

	</div>

<?php include "student_footer.php" ?>