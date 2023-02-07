<?php
//include database configuration file
include 'configA111.php';

//get records from database
$query = $connection->query("SELECT * FROM CDPR ORDER BY ID DESC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "MLIREC_CDPR_RECORDS" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('APPLICANT_SURNAME', 'APPLICANT_NAME', 'ID_NUMBER', 'DATE_RECEIVED', 'APPOINTMENT_CRITERIA', 'APPOINTMENT_DATE');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $APPOINTMENT_DATE = ($row['APPOINTMENT_DATE'] == '1')?'':'';
        $lineData = array($row['APPLICANT_SURNAME'], $row['APPLICANT_NAME'], $row['ID_NUMBER'], $row['DATE_RECEIVED'], $row['APPOINTMENT_CRITERIA'],$row['APPOINTMENT_DATE'], $APPOINTMENT_DATE);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>
