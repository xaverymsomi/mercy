<?php $title = "User-Profile" ?>

<?php include('includes/sidebar.php'); ?>

<?php $sql = "SELECT * FROM user where user_id = :user_id";
  $stmt = $dbconnect->prepare($sql);
  $stmt->execute(['user_id'=>$_SESSION['UserID']]);
  $user_detail = $stmt->fetch();
 ?>
 <style type="text/css">
 	.control-input{
 		border: none;
 		 border-bottom: 1px dotted green;
 		 width: 100%;
 	}
 	.control-input:focus{
 		outline: none;
 		border-bottom: 1px dotted green;
 		width: 100%;
 	}
 	.profile-picture {
 		max-width: 100%;
 	}
 	.round-img {
 		border-radius: 20%;
 		width: 100px;
 		height: 100px;
 		background: white;
 		padding: 15px;
 		padding-top:15px;
 		margin: auto;
 	}
 </style>
<div class="main_container">
	<div class="row"> 
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header bg-danger">
					<div class="round-img">
						<img src="img/1.jfif" class="profile-picture">
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-xl-4">
							<label>First Name</label>
							<input type="text" readonly class="control-input" value="<?php echo strtoupper($user_detail['first_name']) ?>">
						</div>
						<div class="col-xl-4">
							<label>Last Name</label>
							<input type="text" readonly class="control-input" value="<?php echo strtoupper($user_detail['last_name']) ?>">
						</div>
						<div class="col-xl-4">
							<label>Gender</label>
							<?php if( $user_detail['sex'] == 'M' OR $user_detail['sex'] == 'm'): ?>
							<input type="text" readonly class="control-input" value="Male">
							<?php elseif( $user_detail['sex'] == 'F' OR $user_detail['sex'] == 'f'): ?>
							<input type="text" readonly class="control-input" value="Female">
							<?php else: ?>
								<input type="text" readonly class="control-input" value="Note Defined">
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php'); ?>