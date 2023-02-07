<?php
//include database configuration file
include 'configA110.php';

//get records from database
$query = $connection->query("SELECT * FROM a11020 ORDER BY Date_Received  DESC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "MLIREC_2020_RECORDS" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Organization', 'Date_Received','Department_Division', 'Approval_Period', 'Requested_Section', 'Date_Sign_by_the_Minister','Exemp_Contops');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $Exemp_Contops = ($row['Exemp_Contops'] == '1')?'':'';
        $lineData = array($row['Organization'], $row['Date_Received'], $row['Department_Division'], $row['Approval_Period'], $row['Requested_Section'],$row['Date_Sign_by_the_Minister'],$row['Exemp_Contops'], $Exemp_Contops);
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
