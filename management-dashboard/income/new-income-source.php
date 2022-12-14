<?php
	include('../../includes/config.php');

	if(isset($_POST['save_income_source'])) {
		
		$income_list_name = clean_input($_POST['income_source']);
	    
	    if(empty($income_list_name)) {
				header("location:../income-source.php");
				$_SESSION['error'] = "fill the field above";
	    		echo "error required";
		}

		else {
			
			$user = $_SESSION['UserID'];
			$action = "adding new income source type";
			$sql = "INSERT INTO tbl_logs(log_action, user) VALUES (:action, :user)";
			$stmt = $dbconnect->prepare($sql);
			$stmt->execute(['action'=>$action, 'user'=>$user]);

			if($stmt){
				// try{
					$income_list_name = strtolower($income_list_name);
					$sql = "INSERT INTO tbl_income_list(income_list_name, posted_by) 
						VALUES(:income_list_name, :created_by)";

					$stmt = $dbconnect->prepare($sql);
					$stmt->execute(['income_list_name'=>$income_list_name, 'created_by'=>$user]);
				
					if($stmt){
						header("location:../income-source.php");
						$_SESSION['success'] = "$income_list_name Saved successfullys";
					}

					else {
						echo "error";
					}
				// }

				// catch(PDOException $e) {
				// 	$_SESSION['error'] = "$income_list_name Already registured";
				// 	header("location:../income-source.php");	
				// }

			}
			else {
				header("location:../income-source.php");
				$_SESSION['error'] = "Try again";
				echo "error";
			}
		}
	}
?>