<?php
    header('Content-Type:application/json; charset=UTF-8');
    $data = json_decode(file_get_contents("php://input"),false);
    $secret_key = "gafeWh143ajk&$12a";
    $key = $data->key;

    if ($key == $secret_key) {

    
        // referencia - https://www.kodingmadesimple.com/2015/10/insert-multiple-json-data-into-mysql-database-php.html
        // open mysql connection
        $host = "localhost";
        $username = "veeamsqllogs";
        $password = "ju5u6hxi";
        $dbname = "veeamsqllogs";
        $con = mysqli_connect($host, $username, $password, $dbname) or die('Error in Connecting: ' . mysqli_error($con));

        // use prepare statement for insert query
        $st = mysqli_prepare($con, 'INSERT INTO gaps(VBRServerName, ServerName, DatabaseName, BackupGapMinutes, BackupGapStatus) VALUES (?, ?, ?, ?, ?)');

        // bind variables to insert query params
        mysqli_stmt_bind_param($st, 'sssds', $VBRServerName, $ServerName, $DatabaseName, $BackupGapMinutes, $BackupGapStatus);

        // read json file
        //$filename = 'teste.json';
        //$json = file_get_contents($filename);   

        //convert json object to php associative array
        //$data = json_decode($json, false);
        
        // loop through the array
        foreach (($data->Data) as $currentdata) {
            $VBRServerName = $currentdata->VBRServerName;
            $ServerName = $currentdata->ServerName;
            $DatabaseName = $currentdata->DatabaseName;
            $BackupGapMinutes = $currentdata->BackupGapMinutes;
            $BackupGapStatus = $currentdata->BackupGapStatus;
            // execute insert query
            mysqli_stmt_execute($st);

            // print ($VBRServerName . "<br>");
            // print ($ServerName . "<br>");
            // print ($DatabaseName . "<br>");
            // print ($BackupGapMinutes . "<br>");
            // print ($BackupGapStatus . "<br>");
            // print ("<p>");

        }
        
        //close connection
        mysqli_close($con);
        print ("OK");


    } else {
        print ("Wrong key");
    }
?>