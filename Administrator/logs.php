<?php $title = "User-logs" ?>
<?php include('includes/sidebar.php'); ?>
<?php $sql = "SELECT * FROM tbl_logs where user = :user ORDER BY log_date DESC";
 $sql = "SELECT * FROM tbl_logs where user = :user";
  $stmt = $dbconnect->prepare($sql);
  $stmt->execute(['user'=>$_SESSION['UserID']]);
  $logs_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>
<div class="main_container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Action</th>
									<th>Date</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody>
								<?php $SN = 1; foreach($logs_list as $logs_item): ?>
								<?php $time = explode(" ", $logs_item['log_date']) ?>
									<tr>
										<td><?php echo $SN++ ?></td>
										<td><?php echo $logs_item['log_action'] ?></td>
										<td><?php echo $time[0] ?></td>
										<td><?php echo $time[1] ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php'); ?>
