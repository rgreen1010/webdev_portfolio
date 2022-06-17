<?php
/*
 * 
 */
 date_default_timezone_set("America/New_York");
 function debugLog( $logmsg, $fname="debug.log" ) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $sid= session_id();
    $dh = fopen("/tmp/$sid-$fname", "a");
    if (!$dh) {
        echo "debugLog- cannot open/create  debug file: " . $fname;
        exit(101);
    } else {
        $ts=date("m-d-y H:i:s");
        fprintf ($dh, "%s - %s \n", $ts, $logmsg);
        fclose($dh);
    }
    return;
 }


 function incCounter($fcount){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $sid= session_id();
    $dh = fopen("/tmp/$sid-$fcount", "c+");
    if (!$dh) {
        echo "\n\t SID: $sid  \t\n";
        echo "incCounter - cannot open/create  special counter file: " . $fcount;
        exit(101);
    } else {
 
        fscanf ($dh, "%d", $counter);
        $counter++;
        fseek($dh, 0);
        fprintf($dh, "%d", $counter);
        fclose($dh);
    }
    return;
 }

  function delCounter($fcount){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $sid= session_id();
    return unlink("/tmp/$sid-$fcount");
    
 }

?>
