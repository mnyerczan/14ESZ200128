<?php

    $id = $_POST['id'];
    
/**
 * GET DATAS FROM JSON FILE
 */
    $config = getConfig( $filePath ); 

/**
 * OPEN DATABASE CONNECTION
 */
    $pdo = getConnection( $config['database'] );

/**
 * DELETE from database
 */

    deletePhoto( $pdo, $id );

    header('Location: index.php');