<?php
    $id = $_GET['id'];

/**
 * GET DATAS FROM JSON FILE
 */
    $config = getConfig( $filePath ); 
    
/**
 * OPEN DATABASE CONNECTION
 */
    $pdo = getConnection( $config['database'] );

/**
 * GET PHOTO
 */
    $photo = getPhoto( $pdo, $id );

