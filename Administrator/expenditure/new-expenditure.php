<?php
	include('../../includes/config.php');

	if(isset($_POST['save_exipanditure'])) {

		$debit_account = clean_input($_POST['debit_account']);
	    $exipandure_amount = clean_input($_POST['exipandure_amount']);
	    $exipanditure_type = $_POST['exipanditure_type'];
	    $user_expenditure = $_SESSION['UserID'];

	    if(empty($exipanditure_type ) || empty($debit_account) || empty($exipandure_amount) || empty($user_expenditure)) {
			header("location:../");
			$_SESSION['error'] = "All field are required";
    		echo "error required";
		}

		else {

			$data = [
				'debit_account'=>$debit_account,
				'expenditure_amount'=>$exipandure_amount,
				'user_expenditure'=>$user_expenditure
			];

			$sql = "INSERT INTO tbl_expenditure(account_debited, expenditure_amount, user_expenditure)
					VALUES(:debit_account, :expenditure_amount, :user_expenditure)";

			$stmt = $dbconnect->prepare($sql);

			$stmt->execute($data);
			$expenditure = $dbconnect->lastInsertId();

			if($stmt){
				foreach($exipanditure_type as $exipanditure_type) {
					// echo $exipanditure_type;
			        $exipanditure_type_sql = "INSERT INTO tbl_expenditure_logs(expenditure_type, expenditure)
			            VALUES(:expenditure_type, :expenditure)";

			        $query_exipanditure_type = $dbconnect->prepare($exipanditure_type_sql);

			        $query_exipanditure_type->execute(['expenditure_type'=>$exipanditure_type, 'expenditure'=>$expenditure]);
			    }
				header("location:../expenditure.php");
				$_SESSION['success'] = "expenditure Saved successfullys";
				echo "Success";
			}
			else {
				header("location:../expenditure.php");
				$_SESSION['error'] = "Try again";
			}
		}
	}

	else {
		header("location:../expenditure.php");
		$_SESSION['error'] = "Bad access";
	}
?>
