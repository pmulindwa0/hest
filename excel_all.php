<?php

require_once 'core/init.php';
$account = new User();
$university = $account->data()->university_id;
/****************************************************************/
if (Input::exists()) {
    $report = Input::get('report');
    $d_from = strtotime(Input::get('from'));
    $from = date("Y-m-d h:i:sa", $d_from);
    $d_to = strtotime(Input::get('to'));
    $to = date("Y-m-d h:i:sa", $d_to);
    $result = DB::getInstance()->query("SELECT * FROM users WHERE university_id = '$university' AND registration_date BETWEEN '$from' AND '$to'");

    $filename = "excelfilename";

    $file_ending = "xls";
//header info for browser
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=$filename.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    /*******Start of Formatting for Excel *******/
//define separator (defines columns in excel & tabs in word)
    $sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields 


    print("First Name") . "\t";
    print("Last Name") . "\t";
    print("IP ADDRESS") . "\t";
    print("PW") . "\t";
    print("START DATE") . "\t";
    print("GENDER") . "\t";
    print("COURSE") . "\t";
    print("TEL.NO") . "\t";
    print("EMAIL") . "\t";
    print("ALTERNATIVE.TEL") . "\t";
    print("RESIDENCE") . "\t";
    print("BANK") . "\t";
    print("BRANCH") . "\t";
    print("ACCOUNT NO") . "\t";
    print("NEXT OF KIN") . "\t";
    print("CONTACT") . "\t";
    print("COMPANY") . "\t";
    print("SUPERVISOR") . "\t";
    print("CONTACT") . "\t";

    print("\n");
//end of printing column names  
//start while loop to get data
    foreach ($result->results() as $result) {
        $schema_insert = "";

        if ($result->group == 2) {
            $schema_insert .= "$result->fname" . $sep;
            $schema_insert .= "$result->lname" . $sep;
            $schema_insert .= "$result->username" . $sep;
            $schema_insert .= "$result->password" . $sep;
            $schema_insert .= "$result->joined" . $sep;
            $schema_insert .= "$result->sex" . $sep;
            $schema_insert .= "$result->course" . $sep;
            $schema_insert .= "$result->phone" . $sep;
            $schema_insert .= "$result->email" . $sep;
            $schema_insert .= "$result->alt_phone" . $sep;
            $schema_insert .= "$result->residence" . $sep;
            $schema_insert .= "$result->bank_name" . $sep;
            $schema_insert .= "$result->bank_branch" . $sep;
            $schema_insert .= "$result->account_no" . $sep;
            $schema_insert .= "$result->nkname" . $sep;
            $schema_insert .= "$result->nkphone" . $sep;
            $schema_insert .= "$result->company_name" . $sep;
            $schema_insert .= "$result->company_supervisor" . $sep;
            $schema_insert .= "$result->supervisor_number" . $sep;

            $schema_insert = str_replace($sep . "$", "", $schema_insert);
            $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
            $schema_insert .= "\t";
            print(trim($schema_insert));
            print "\n";
        }

    }
}

/****************************************************************/   
