<?php
	include('../../includes/config.php');

	if(isset($_POST['save_account_list'])) {
		
		$account_name = clean_input($_POST['account_name']);
	    
	    if(empty($account_name)) {
				header("location:../account-chart.php");
				$_SESSION['error'] = "fill the field above";
	    		echo "error required";
		}

		else {
			
			$user = $_SESSION['UserID'];
			$action = "adding new account Chart type";
			$sql = "INSERT INTO tbl_logs(log_action, user) VALUES (:action, :user)";
			$stmt = $dbconnect->prepare($sql);
			$stmt->execute(['action'=>$action, 'user'=>$user]);

			if($stmt){
				try{
					$account_name = strtoupper($account_name);
					$sql = "INSERT INTO tbl_account_chart(account_name, created_by) 
						VALUES(:account_name, :created_by)";

					$stmt = $dbconnect->prepare($sql);
					$stmt->execute(['account_name'=>$account_name, 'created_by'=>$user]);
				
					if($stmt){
						header("location:../account-chart.php");
						$_SESSION['success'] = "Account Chart Saved successfullys";
					}

					else {
						echo "error";
					}
				}

				catch(PDOException $e) {
					$_SESSION['error'] = "Account Chart Already registured";
					header("location:../account-chart.php");	
				}

			}
			else {
				header("location:../account-chart.php");
				$_SESSION['error'] = "Try again";
				echo "error";
			}
		}
	}
	else {
		header("location:../account-chart.php");
		$_SESSION['error'] = "Bad access";
		echo "error";
	}
?>