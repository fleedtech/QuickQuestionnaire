
<?php include "student_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				New Questionnaire
			</div>

			<div class="add_new_div">
				<a href="questionnaire.php"> Cancel </a>
			</div>

		</div>


		<div class="body_content">
			
			<div class="add_new_form_div">
				<center>

					<h3> New Questionnaire </h3>

					<form method="POST">
						<table>
							<tr>
								<td> Title: </td>
								<td> <input type="text" class="form_input" name="title" placeholder="Title" required> </td>
							</tr>
							<tr>
								<td> Expiry Date: </td>
								<td> <input type="date" class="form_input" name="expiry_date" required> </td>
							</tr>
							<tr>
								<td> Target: </td>
								<td>
									<select class="form_submit" name="target">
										<option> --- Choose target --- </option>
										<option> All Students </option>
										<option> Faculty of Science </option>
										<option> Faculty of Business Admin </option>
										<option> Faculty of Agriculture </option>
										<option> Faculty of Built Envinoment </option>
										<option> Faculty of Education </option>
										<option> Faculty of Mascom </option>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td> <input type="submit" class="form_submit" name="create" value="Create"> </td>
							</tr>
						</table>
					</form>

					<?php

						if(isset($_POST['create'])) {

							$q_id = uniqid('Q_');
							$q_title = $_POST['title'];
							$q_created_by = $_SESSION['student_id'];
							$q_creation_date = date("Y-m-d");
							$q_expiry_date = $_POST['expiry_date'];
							$q_target = $_POST['target'];

							$sql = "INSERT INTO questionnaire (q_id, q_title, q_created_by, q_creation_date, q_expiry_date, q_target) VALUES ('$q_id', '$q_title', '$q_created_by', '$q_creation_date', '$q_expiry_date', '$q_target')";
							$query = $con -> query($sql);

							if($query == true){
								echo "
									<br>
									Successfully registered. Wait...
								";

								echo ("<meta http-equiv='refresh' content='1;URL=create_question.php?q_id=$q_id'");
							} else {
								echo "
									<br>
									Sorry.. registration failed. Try again.
								";
							}
						}
					?>

				</center>
			</div>

		</div>

	</div>

<?php include "student_footer.php" ?>