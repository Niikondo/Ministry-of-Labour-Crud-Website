<?php
//include database configuration file
include 'configA222.php';

//get records from database
$query = $connection->query("SELECT * FROM a2217 ORDER BY Date_of_Application DESC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "MLIREC_2017_RECORDS" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Name_of_Applicant', 'Date_of_Application',' Section_to_be_Varied', 'Cat_of_affected_employees', 'Recommendations', 'Variation_end_date', 'filename' );
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $Variation_end_date = ($row['Variation_end_date'] == '1')?'':'';
        $lineData = array($row['Name_of_Applicant'], $row['Date_of_Application'], $row['Section_to_be_Varied'], $row['Cat_of_affected_employees'], $row['Recommendations'],$row['Variation_end_date'],$row['filename']);
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
