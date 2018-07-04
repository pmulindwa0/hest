<?php 
	/**
	* 
	*/
	class csv extends mysqli
	{
		private $state_csv = false;
		public function __construct()
		{
			parent::__construct("127.0.0.1", "root", "", "hest");
			if ($this->connect_error) {
				echo "Connection error : ". $this->connect_error;
			}
		}
		public function import($file)
		{
			$file = fopen($file, 'r');

			while ($row = fgetcsv($file)) {
				$value = "'". implode("','", array_slice($row, 2)) ."'";
				$r_date=date_create($row[0]);
				$reg_date = date_format($r_date,"Y/m/d H:i:s");

				$j_date=date_create($row[1]);
				$join_date = date_format($j_date,"Y/m/d H:i:s");

				/*$q = "INSERT INTO users(registration_date, joined, fname, lname, username, password, active, sex, university_id, course, phone, alt_phone, residence, bank_name, bank_branch, account_no, nkname, nkphone, email, company_name, company_supervisor, supervisor_number)
				 VALUES($reg_date, $join_date, ". $value .")";*/
				 $q = "INSERT INTO users(registration_date, joined, fname, lname, username, password, active, sex, university_id, course, phone, alt_phone, residence, bank_name, bank_branch, account_no, nkname, nkphone, email, company_name, company_supervisor, supervisor_number)
				 VALUES('$reg_date', '$join_date', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', '$row[8]', '$row[9]', '$row[10]', '$row[11]', '$row[12]', '$row[13]', '$row[14]', '$row[15]', '$row[16]', '$row[17]', '$row[18]', '$row[19]', '$row[20]', '$row[21]')";
				if ($this->query($q)) {
					$this->state_csv = true;
				}else{
					$this->state_csv = false;
					echo $this->error;
				}
			}
			if ($this->state_csv) {
					echo "Successfully uploaded";
				}else{
					echo "Something went wrong";
			}
		}

		public function export()
		{
			$this->state_csv = false;
			$q = "SELECT t.id, t.username, t.fname, t.lname, t.joined, t.registration_date, t.active, t.sex, t.university_id, t.course, t.phone, t.alt_phone, t.residence, t.bank_name, t.bank_branch, t.account_no, t.nkname, t.nkphone, t.email, t.company_name, t.company_supervisor, t.supervisor_number, t.password, t.active, t.report_one, t.report_two, t.report_three, t.report_four, t.report_five, t.report_six FROM users AS t";
			$run = $this->query($q);

			if ($run->num_rows > 0) {
				$fn = "csv_". uniqid() .".csv";
				$file = fopen('files/'. $fn, 'w');

				while ($row = $run->fetch_array(MYSQLI_NUM)) {
					if (fputcsv($file, $row)) {
						$this->state_csv = true;
					}else{
						$this->state_csv = false;
					}
				}
				if ($this->state_csv) {
					echo "Successfully Exported";
				}else{
					echo "Something went wrong";
			}
			fclose($file);
			}else{
				echo "No data found";
			}
		}

		public function delete($id){
			$this->state_csv = false;
			$q = "DELETE FROM users WHERE id = '$id' ";
			if ($this->query($q)) {
					$this->state_csv = true;
				}else{
					$this->state_csv = false;
					echo $this->error;
				}
			if ($this->state_csv) {
					echo "Successfully deleted";
				}else{
					echo "Something went wrong";
			}
		}
	}
 ?>