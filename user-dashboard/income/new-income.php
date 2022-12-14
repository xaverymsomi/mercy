<?php
	include('../../includes/config.php');
	 
	if(isset($_POST['save_income'])) {

		$income_amount = clean_input($_POST['income_amount']);
		$income_source = clean_input($_POST['income_source']);
		$account = clean_input($_POST['account']);

		$check_balance = $dbconnect->prepare("SELECT balance FROM tbl_account_credit WHERE credit_id = :credit_id");
		$check_balance->execute([':credit_id'=>$account]);
		$check_balance_object = $check_balance->fetch();
		$current_balance = $check_balance_object['balance'];
	    
	    if(empty($income_amount) || empty($income_source) || empty($account)) {
				// header("location:../income.php");
				// $_SESSION['error'] = "fill the field above";
	    		echo "error required";
		}

		else {
			
			$user = $_SESSION['UserID'];
			$action = "adding new income";
			$sql = "INSERT INTO tbl_logs(log_action, user) VALUES (:action, :user)";
			$stmt = $dbconnect->prepare($sql);
			$stmt->execute(['action'=>$action, 'user'=>$user]);

			if($stmt){
				try{

					$stmt_account = $dbconnect->prepare("SELECT * FROM tbl_account_credit 
						WHERE credit_id = :credit_id");
					$stmt_account->execute(['credit_id'=>$account]);
					$count_account = $stmt_account->rowCount();

					if($count_account == 1) {

						$data_to_account = [
							'amount'=>$income_amount,
							'credit_id'=>$account
						];

						$update_account = $dbconnect->prepare("UPDATE tbl_account_credit SET balance = (balance + :amount), credited = (credited + 1) WHERE credit_id  = :credit_id ");
						$update_account->execute($data_to_account);

						if($update_account) {

							$data = [
								'income_amount'=>$income_amount, 
								'income_source'=>$income_source,
								'account_credited'=>$account,
								'posted_by'=>$user
							];

							$sql = "INSERT INTO tbl_income(amount, source, account_credited, posted_by) 
									VALUES(:income_amount, :income_source, :account_credited, :posted_by)";

							$stmt = $dbconnect->prepare($sql);
							$stmt->execute($data);

							if($stmt) {
								$amount_after = $current_balance + $income_amount;
			         	    	$status_summary = 'credit';
						 		$data = [
									'account_credited_name'=>$account,
									'current_balance'=>$current_balance,
								    'amount_after'=>$amount_after,
								 	'status'=>$status_summary,
									'created_by'=>$user
			         			];
				    	
				    			$sql = "INSERT INTO tbl_account_summary(account, amount_before, amount_after, status, created_by) VALUES(:account_credited_name, :current_balance, :amount_after, :status, :created_by)";

		            	    	$save_summary = $dbconnect->prepare($sql);
						    	$save_summary->execute($data);
			    	   			if ($save_summary) {
								
						    		$_SESSION['success'] = "Tsh.$income_amount/= credited from your income account";
									 header("location:../income.php");	
									// echo "success $account $income_amount $amount_after $status_summary $user";
								}
								else {
						 			echo "error";
					
								}
							
							}
							else {
								header("location:../income.php");
								$_SESSION['error'] = "Income not saved";
							}
						}
					}
					else {
						echo "account not found $account";
						// header("location:../account-balance.php");
						// $_SESSION['error'] = "Account not found add first account";
					}	

				}	

				catch(PDOException $e) {
					$_SESSION['error'] = "$income_list_name Already registured";
					header("location:../income-source.php");	
				}		
						
			}

		}
	}
?>