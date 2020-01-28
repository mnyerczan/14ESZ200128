<?php 
/** 
 * Két függvény, a fájl írására és olvasására. Lehet használni 
 * magas szintű fájkezelő függvényeket.
 */
    function getConfig( $filePath )
    {        
        return json_decode( file_get_contents( $filePath ), TRUE );
    }

    function deletePhoto( PDO $pdo, $id )
    {
        try
        {            
            $statement = $pdo->prepare("DELETE FROM `photos`WHERE id = :id ");
     
            $statement->bindParam( ':id', $id );

            if ( !$statement->execute() )
            {
                throw new RuntimeException( $statement->errorInfo()[2] );
            }

            return TRUE;
        }
        catch ( RuntimeException $e )
        {
            error_log( $e->getMessage(), 3, 'Application/Log/dberror.log' );
        }
        return FALSE;
    }

    function updatePhoto( $pdo, $datas )
    {
        try
        {            
            $statement = $pdo->prepare("UPDATE `photos` SET `title` = :title WHERE id = :id ");

            $statement->bindParam( ':title', $datas['title'] );
            $statement->bindParam( ':id', $datas['id'] );

            if ( !$statement->execute() )
            {
                throw new RuntimeException( $statement->errorInfo()[2] );
            }

            return TRUE;
        }
        catch ( RuntimeException $e )
        {
            error_log( $e->getMessage(), 3, 'Application/Log/dberror.log' );
        }
        return FALSE;
    }

    function getConnection( array $config )
    {
        try
        {
            $pdo = new PDO(
                "mysql:host={$config['hostName']};dbname={$config['database']}",
                $config['userName'],
                $config['password']
            );

            return $pdo;
        }
        catch ( PDOException $e )
        {            
            error_log( $e->getMessage(), 3, 'Application/Log/dberror.log' );
            die;
        }
    }

    function getPhotos( PDO $pdo )
    {
        try
        {
            $statement = $pdo->prepare("SELECT `id`, `title`, `thumbnail` FROM `photos`");

            if ( !$statement->execute() )
            {
                throw new RuntimeException( $statement->errorInfo()[2] );
            }

            return $statement->fetchAll();
        }
        catch ( RuntimeException $e )
        {
            error_log( $e->getMessage(), 3, 'Application/Log/dberror.log' );
        }

        return [];
    }

    function getPhoto( PDO $pdo, $id )
    {
        try
        {            
            $statement = $pdo->prepare("SELECT `id`, `title`, `url` FROM `photos` WHERE id = :id ");

            $statement->bindParam( ':id', $id );

            if ( !$statement->execute() )
            {
                throw new RuntimeException( $statement->errorInfo()[2] );
            }

            return $statement->fetchAll()[0];
        }
        catch ( RuntimeException $e )
        {
            error_log( $e->getMessage(), 3, 'Application/Log/dberror.log' );
        }

        return [];
    }

    function insertPhoto( PDO $pdo, array $photo )
    {
        try 
        {
            $statement = $pdo->prepare('INSERT INTO `photos`(`thumbnail`,`title`,`url`) VALUES (?, ?, ?)');

            $statement->bindParam(1, $photo['thumbnail']);
            $statement->bindParam(2, $photo['title']);
            $statement->bindParam(3, $photo['url']);

            if ( !$statement->execute() )
            {
                throw new RuntimeException( $statement->errorInfo()[2] );
            }

            return TRUE;
        } 
        catch ( RuntimeException $e ) 
        {
            error_log( $e->getMessage(), 3, 'Application/Log/dberror.log' );
        }

        return FALSE;
    }