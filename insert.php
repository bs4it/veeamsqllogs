<?php
    //connect to mysql db
    $con = mysqli_connect('localhost', 'veeamsqllogs', 'ju5u6hxi') or die('Could not connect: ' . mysqli_error());
    //connect to the employee database
    mysqli_select_db("veeamsqllogs", $con);

    //read the json file contents
    $jsondata = file_get_contents('teste.json');
    
    //convert json object to php associative array
    $data = json_decode($jsondata, true);
    
    

    foreach ($data as $currentdata) {
        $VBRServerName = $currentdata['VBRServerName'];
        $ServerName = $currentdata['ServerName'];
        $DatabaseName = $currentdata['DatabaseName'];
        $BackupGapMinutes = $currentdata['BackupGapMinutes'];
        $BackupGapStatus = $currentdata['BackupGapStatus'];
        print ($VBRServerName . "<br>");
        print ($ServerName . "<br>");
        print ($DatabaseName . "<br>");
        print ($BackupGapMinutes . "<br>");
        print ($BackupGapStatus . "<br>");
        print ("<p>");
    }

    //get the employee details
    // $VBRServerName = $data['VBRServerName'];
    // $ServerName = $data['ServerName'];
    // $DatabaseName = $data['DatabaseName'];
    // $BackupGapMinutes = $data['BackupGapMinutes'];
    // $BackupGapStatus = $data['BackupGapStatus'];
    
    
    //insert into mysql table
    // $sql = "INSERT INTO gaps(VBRServerName, ServerName, DatabaseName, BackupGapMinutes, BackupGapStatus)
    // VALUES('$id', '$name', '$gender', '$age', '$streetaddress', '$city', '$state', '$postalcode', '$designation', '$department')";
    // if(!mysql_query($sql,$con))
    // {
    //     die('Error : ' . mysql_error());
    // }
?>