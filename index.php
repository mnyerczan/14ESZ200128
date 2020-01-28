<?php 
    define('APPPATH', 'Application/');

    /**
     * ERROR szint beálítása
     */
    error_reporting(E_ALL);

    /**
     * Elsődleges kimenetre való kiírás beállítása
     */
    ini_set( "display_errors", 1 );

    /**
     * LOGFILE definiálása
     */
    ini_set( "error_log", APPPATH.'Log/error.log' );

    /**
     * LOGFILE engedélyezése
     */
    ini_set( "log_error", 0 );



    require_once APPPATH.'functions.php';
/**
 * Adatok definiálása
 */
    $page = @$_GET['page'] ? $_GET['page'] : 'photos';
    $filePath = 'config.json';

/**
 * LOW LEVEL RUTING
 */

    switch ( $page )
    {
        case 'photos':  require_once APPPATH.'Core/photos.php'; break;
        case 'add':     require_once APPPATH.'Core/add.php';    break;
        case 'photo':   require_once APPPATH.'Core/photo.php';  break;  
        case 'update':   require_once APPPATH.'Core/update.php';  break;  
        case 'delete':   require_once APPPATH.'Core/delete.php';  break;  
    }
   

    require_once APPPATH.'Templates/_layout.php';   