<?php
	include('../../includes/config.php');

	if(isset($_POST['save_service'])) {
		
		$service_name = clean_input($_POST['service_name']);
	    
	    if(empty($service_name)) {
				header("location:../maintainance.php");
				$_SESSION['error'] = "fill the field above";
	    		echo "error required";
		}

		else {
			
			$user = $_SESSION['UserID'];
			$action = "adding new service ($service_name)";
			$sql = "INSERT INTO tbl_logs(log_action, user) VALUES (:action, :user)";
			$stmt = $dbconnect->prepare($sql);
			$stmt->execute(['action'=>$action, 'user'=>$user]);

			if($stmt){
				$service_name = strtolower($service_name);
				try{
					$sql = "INSERT INTO tbl_service(service_name) VALUES(:service_name)";
					$stmt = $dbconnect->prepare($sql);
					$stmt->execute(['service_name'=>$service_name]);
				
					if($stmt){
						$_SESSION['success'] = "$service Service Saved successfullys";
						header("location:../maintainance.php");
					}
				}
				catch(PDOException $e) {
					$_SESSION['error'] = "$service_name Already registured";
					header("location:../maintainance.php");	
				}

			}
			else {
				header("location:../maintainance.php");
				$_SESSION['error'] = "$service_name not saved Try again!";
				echo "error";
			}
		}
	}
?>