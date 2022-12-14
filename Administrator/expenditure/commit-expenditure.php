<!-- Custom styles for this template-->
<link href="../css/kvm.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.info-box-warning {
		background: whitesmoke;
		border-left: 4px solid red;
	}
</style>

<?php include('../../includes/config.php'); ?>
<?php require_once('../../includes/mustlogin.php') ?>

<?php 

	if(isset($_POST['commit_exptkvm'])):

		$expenditure_id = $_POST['expenditure'];
		$amount = $_POST['amount'];
		$commited = $_POST['commited'];
		$account_debited_name = $_POST['account_debited_name'];
		$account_debited_id = $_POST['account_debited_id'];

		/*query current to get current amount*/
		$check_balance = $dbconnect->prepare("SELECT balance FROM tbl_account_credit WHERE credit_id = :credit_id");
		$check_balance->execute([':credit_id'=>$account_debited_id]);
		$check_balance_object = $check_balance->fetch();
		$current_balance = $check_balance_object['balance'];
		/* end of check balance */

		//expenditure
		$expenditure_type_log = $dbconnect->prepare("SELECT tbl_expenditure_type.* 
			FROM tbl_expenditure_logs, tbl_expenditure,tbl_expenditure_type 
	    	WHERE expenditure = :expenditure 
	    	AND tbl_expenditure_logs.expenditure = tbl_expenditure.exp_id
	    	AND tbl_expenditure_logs.expenditure_type = tbl_expenditure_type.expenditure_type_id");

		$expenditure_type_log->execute(["expenditure"=>$expenditure_id]);

		$expenditure_type_log_list = $expenditure_type_log->fetchAll(PDO::FETCH_ASSOC);

		//query accounts accounts
		$account_debited = $dbconnect->prepare("SELECT tbl_account_credit.credit_id, tbl_account_credit.balance, tbl_account_chart.account_name 
			FROM tbl_account_credit,tbl_account_chart 
			WHERE tbl_account_chart.acount_id = tbl_account_credit.account_chart
			AND tbl_account_credit.balance > $amount");
		$account_debited->execute();
		$count_account = $account_debited->rowCount();
		$account_debited_list = $account_debited->fetchAll(PDO::FETCH_ASSOC); ?>

		<div class="container">
			<div class="mt-3 card card-body">
				<div class="col-xl-12">
					<h3>Are you sure that you want to commit the following Expenditure?</h3>
					<h6 class="text-danger"><b><i class="fa fa-warning text-warning"></i> Warning: </b>There is no option to uncommit after commitement</h6>
					<ul class="list-group">
					<?php foreach($expenditure_type_log_list as $e_t_value): ?>
						<li class="list-group-item">
							<i class="fa fa-times text-danger"></i> <?php echo $e_t_value['expenditure_type_name'] ?>
						</li>
					<?php endforeach ?>  
					</ul>
					<table class="table table-bordered mt-3 mb-3">
						<tr>
							<td>
								Current Account: <?php echo $account_debited_name ?>
								<?php if($amount >= $current_balance): ?>
									<span class="badge bg-danger text-white">Balance is insufficient</span>
								<?php endif ?>		
								<?php if($amount < $current_balance): ?>
									<span class="badge bg-success text-white">Account have sufficient balance</span>
								<?php endif ?>	
							</td>
						</tr>

						<tr>
							<td>Current balance: Tsh.<?php echo $current_balance ?>/=</td>
						</tr>
						
						<tr>
							<th>Expenditure Amount = Tsh. <?php echo number_format($_POST['amount'], 2)?>/=</th>
						</tr>
					</table>`
				</div>
				
				<?php if($commited == 0): ?>
				<div class="col-xl-12">
					<form id="commit-form" method="POST">
						<input readonly hidden type="number" name="amount" value="<?php echo $amount ?>">
		                <input readonly hidden type="number" name="expenditure_id" value="<?php echo $expenditure_id ?>">
		                <input readonly hidden type="text" name="account_debited_name" value="<?php echo $account_debited_name ?>">
						<input readonly hidden type="number" name="account_debited_id" value="<?php echo $account_debited_id ?>">
						<!-- if select account balance is insuficient -->
						<?php if($amount >= $current_balance): ?>
							<!-- if there is an account that it balance is suficient -->
							<?php if($count_account > 0): ?>
								<h6>Your Current select account has in sufficient amount please select from the lis below</h6>
							    <select name="debit_account" class="form-control col-xl-5" >
				                    <option value="">---Select Account---</option>
				                    <?php foreach($account_debited_list as $account_debited_item): ?>
				                        <option value="<?php echo $account_debited_item['credit_id'] ?>">
				                            <?php echo $account_debited_item['account_name'] ?>
				                        </option>
				                    <?php endforeach ?>
				                </select>
				                <button type="submit" class="btn btn-primary btn-sm mt-3" id="save" name="confirm-commit"> 
								Commit Expenditure <i class="fa fa-check"></i> 
								</button>
				            <!-- if not found that there is an account that it balance is suficient -->
				            <?php else: ?>
				            	<div class="p-3 info-box-warning">
				            		<h6><b> <i class="fa fa-info-circle fa-lg text-danger"></i> All account has no enough balance you can't commit any expenditure please 
				            			credit your accounts <a href="../income.php">click here</a></b></h6>
				            	</div>
				            <?php endif ?>

		       			<!-- if select account balance is suficient -->
		            	<?php else: ?>
		            		<input type="text" readonly class="form-control" value="Selected account is <?php echo $account_debited_name ?>">
		            		<input type="number" hidden readonly name="debit_account" value="<?php echo $account_debited_id ?>">
		            		<button type="submit" class="btn btn-primary btn-sm mt-3" id="save" name="confirm-commit"> 
								Commit Expenditure <i class="fa fa-check"></i> 
							</button>
		            	<?php endif ?>
						
						<div class="mt-3">
							<a class="btn btn-success btn-sm" id="cancel"> cancel <i class="fa fa-times"></i> </a>
						</div>
					</form>
				
					<div>
						<button class="btn btn-danger btn-sm" id="confirm"> Yes am sure <i class="fa fa-check"></i> </button>
						<button class="btn btn-success btn-sm" id="back"> No am go Back <i class="fa fa-times"></i> </button>
					</div>
				</div>
				<?php endif ?>
			</div>
		</div>
<?php 
	elseif(isset($_POST['confirm-commit'])):

		$debit_account = $_POST['debit_account'];
		$expenditure_id = $_POST['expenditure_id'];
		$amount = $_POST['amount'];
		$account_debited_name = $_POST['account_debited_name'];
		$account_debited_id = $_POST['account_debited_id'];

		/*query current to get current amount*/
		$check_balance = $dbconnect->prepare("SELECT balance FROM tbl_account_credit WHERE credit_id = :credit_id");
		$check_balance->execute([':credit_id'=>$account_debited_id]);
		$check_balance_object = $check_balance->fetch();
		$current_balance = $check_balance_object['balance'];
		/* end of check balance */

		if(empty($debit_account)) {
			$_SESSION['error'] = "Account to be debited required please credit your account before Debit it";
			header("location:../expenditure.php");	
		}
		else {
			$user = $_SESSION['UserID'];
			$action = "Commit expenditure of amount Tsh.$amount/=";
			$sql = "INSERT INTO tbl_logs(log_action, user) VALUES (:action, :user)";
			$stmt = $dbconnect->prepare($sql);
			$stmt->execute(['action'=>$action, 'user'=>$user]);

			if($stmt){
				$query_debt_account = $dbconnect->prepare("UPDATE tbl_account_credit 
					SET balance = (balance - :amount), debited = (debited + 1)
					WHERE credit_id = :credit_id");
				$query_debt_account->execute([':amount'=>$amount, ':credit_id'=>$debit_account]);

				if($query_debt_account) {

					$data = [
						':expenditure_id'=>$expenditure_id, 
						'status'=>1,
						'debit_account'=>$debit_account
					];

					$update_expenditure = $dbconnect->prepare("UPDATE tbl_expenditure 
					SET commited = :status, account_debited = :debit_account
					WHERE exp_id = :expenditure_id");
					
					$update_expenditure->execute($data);
					
					if ($update_expenditure) {
	              

		         	    $amount_after = $current_balance - $amount;
		         	    $status_summary = 'debit';
					 	$data = [
							'account_debited_name'=>$debit_account,
							'current_balance'=>$current_balance,
						    'amount_after'=>$amount_after,
						 	'status'=>$status_summary,
							'created_by'=>$user
		         		];
				    	
				    	$sql = "INSERT INTO tbl_account_summary(account, amount_before, amount_after, status, created_by) 
				    	VALUES(:account_debited_name, :current_balance, :amount_after, :status, :created_by)";

            	    	$save_summary = $dbconnect->prepare($sql);
				    	$save_summary->execute($data);
				    	if ($save_summary) {
				    		$_SESSION['success'] = "Tsh.$amount/= Deducted from your account and Expenditure Commited successfuly";
							header("location:../expenditure.php");	
							echo "success $account_debited_name $current_balance $amount_after $status_summary $user";
						}
						else {
							echo "error";
						}
					}

					else {
						$_SESSION['error'] = "Tsh.$amount/= Deducted from your account but Expenditure fail to be Commited";
						header("location:../expenditure.php");	
					}
				
				}
				else {
					$_SESSION['error'] = "Fail to track account";
					header("location:../expenditure.php");
				}
			}
			else {
				$_SESSION['error'] = "Something went wrong try again";
				header("location:../expenditure.php");
			}
		}

	else:
		$_SESSION['error'] = "Bad access";
 		header("location: ../expenditure.php");
	endif 
?>

<script src="../vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#commit-form").hide();
		$("#confirm-save").hide();
		$("#message-save").hide();

		$("#confirm").click(function() {
			$("#commit-form").show(500);
			$("#confirm").hide(100);
			$("#back").hide(110);
		})

		$("#cancel").click(function() {
			$("#commit-form").hide(300);
			$("#confirm").show(100);
			$("#back").show(110);	
		})
	})
</script>