<?php

    $datas = $_POST;
    
/**
 * GET DATAS FROM JSON FILE
 */
    $config = getConfig( $filePath ); 

/**
 * OPEN DATABASE CONNECTION
 */
    $pdo = getConnection( $config['database'] );


/**
 * UPDATE database
 */


    updatePhoto( $pdo, $datas );

    header('Location: index.php');