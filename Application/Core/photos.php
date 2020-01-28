<?php
/**
 * GET DATAS FROM JSON FILE
 */
    $config = getConfig( $filePath ); 
    
/**
 * OPEN DATABASE CONNECTION
 */
    $pdo = getConnection( $config['database'] );

/**
 * FETCH PHOTOS FROM DATABASE
 */
    $photos = getPhotos( $pdo );
  
?>