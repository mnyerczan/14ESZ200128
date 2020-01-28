<?php
    $photo = $_POST;
    
/**
 * GET DATAS FROM JSON FILE
 */
    $config = getConfig( $filePath ); 

/**
 * OPEN DATABASE CONNECTION
 */
    $pdo = getConnection( $config['database'] );


/**
 * UPLOAD NEW DATAS OF A SPECIFIED PHOTO
 */
    if ( insertPhoto( $pdo, $photo ) )
    {
        header('Location: index.php?page=photos');
    }
    else
    {
        header('Location: index.php?page=form');
    }
 