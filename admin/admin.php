
<?php include "admin_header.php" ?>
	
	<div class="main_container">

		<div class="second_header_dv">

			<div class="page_title_div">
				Admins
			</div>

			<div class="add_new_div">
				<a href="new_admin.php"> New Admin </a>
			</div>

		</div>


		<div class="body_content">
			<?php

			$sql_fetch = "SELECT * FROM admin ORDER BY no ASC";
			$query_fetch = $con -> query($sql_fetch);

			echo "
				<table class=body_table>
					<thead> 
						<td align=center> No </td>
						<td align=center> ID </td>
						<td align=center> Name </td>
						<td align=center> Role </td>
						<td align=center> Update </td>
						<td align=center> Delete </td>
					</thead>";

			while ($row_fetch = $query_fetch -> fetch_array()) {

				echo "
					<tr> 
						<td>".$row_fetch['no']."</td>
						<td>".$row_fetch['admin_id']."</td>
						<td>".$row_fetch['name']."</td>
						<td>".$row_fetch['role']."</td>
						<td align=center> <a href=update_admin.php?admin_id=".$row_fetch['admin_id']."> Update </a> </td>
						<td align=center> <a href=delete_admin.php?admin_id=".$row_fetch['admin_id']."> Delete </a> </td>
					</tr>
					";
				}
			?>
			</table>

		</div>

	</div>

<?php include "admin_footer.php" ?>