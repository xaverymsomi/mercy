<?php
	include('../../includes/config.php');

	if(isset($_POST['save_account'])) {
		
		$account_chart = clean_input($_POST['account_chart']);
	    
	    if(empty($account_chart)) {
				header("location:../account-balance.php");
				$_SESSION['error'] = "fill the field above";
	    		echo "error required";
		}

		else {
			
			$user = $_SESSION['UserID'];
			$action = "adding new account";
			$sql = "INSERT INTO tbl_logs(log_action, user) VALUES (:action, :user)";
			$stmt = $dbconnect->prepare($sql);
			$stmt->execute(['action'=>$action, 'user'=>$user]);

			if($stmt){
				try{
				
					$sql = "INSERT INTO tbl_account_credit(account_chart, created_by) 
						VALUES(:account_chart, :created_by)";

					$stmt = $dbconnect->prepare($sql);
					$stmt->execute(['account_chart'=>$account_chart, 'created_by'=>$user]);
				
					if($stmt){
						header("location:../account-balance.php");
						$_SESSION['success'] = "Account Saved successfullys";
						// echo "Success $account_chart $user";
					}

					else {
						echo "error";
					}
				}

				catch(PDOException $e) {
					$_SESSION['error'] = "Account Already registured";
					header("location:../account-balance.php");	
				}

			}
			else {
				header("location:../account-balance.php");
				$_SESSION['error'] = "Try again";
				echo "error";
			}
		}
	}
	else {
		header("location:../account-balance.php");
		$_SESSION['error'] = "Bad access";
		echo "error";
	}
?>