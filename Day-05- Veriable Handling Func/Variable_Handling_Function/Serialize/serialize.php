<?php

// $session_data contains a multi-dimensional array with session 
// information for the current user. We use serialize()to store
// it in a database at the end of the request. 

$conn = odbc_connect(webdb, $php, $chicken);
$stmt = odbc_prepare($conn,
        "UPDATE Sessions SET data = ? WHERE id = ?");
$sqldata =  array ( serialize($sessioin_data), $_SERVER['PHP_AUTH_USER']);
if (!odbc_execute($stmt, $sqldata)){
    $stmt = odbc_prepare($conn, 
            "INSERT INTO sessions (id, data) VALUES(?, ?)");
    IF (!odbc_execute($stmt, $sqldata)){
//        Something went wrong .. 
    }
}
?>