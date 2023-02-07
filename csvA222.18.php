<?php
//include database configuration file
include 'configA222.php';

//get records from database
$query = $connection->query("SELECT * FROM a22218 ORDER BY Date_Received  DESC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "MLIREC_2018_RECORDS" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Name_of_Applicant', 'Date_Received','Positions', 'Number_of_Positions', 'No_of_Positions_Recommended', 'No_of_Positions_not_Recommended','Remarks','Exemption_end_date');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $Exemption_end_date = ($row['Exemption_end_date'] == '1')?'':'';
        $lineData = array($row['Name_of_Applicant'], $row['Date_Received'], $row['Positions'], $row['Number_of_Positions'], $row['No_of_Positions_Recommended'],$row['No_of_Positions_not_Recommended'],$row['Remarks'],$row['Exemption_end_date'], $Exemption_end_date);
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
