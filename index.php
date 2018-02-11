<?php

session_start();
require_once( 'ini.php' );
require_once( 'common.php' );
require_once( 'core/SPDO.php' );
require_once( 'core/SRequest.php' );

SPDO::getInstance()->ini(DB_HOST, DB_NAME, DB_LOGIN, DB_PWD );


if( SRequest::getInstance()->get( 'c' )!==NULL ) {
    $bundle = ucwords( SRequest::getInstance()->get( 'c' ) );
} else {
    $bundle = 'Accueil';
    require_once( 'app/Accueil/AccueilController.php' );
    $controller = new AccueilController();
    $controller->ShowListingsAction();
}

if( file_exists( 'app/' . $bundle . '/' . $bundle . 'Controller.php' ) ) {
    require_once( 'app/' . $bundle . '/' . $bundle . 'Controller.php' );
    $controller = $bundle . 'Controller';

    $request = SRequest::getInstance();

    $class = new $controller( 'app/', $request, SPDO::getInstance()->getPDO() );

    if( SRequest::getInstance()->get( 'a' )!==NULL ) {
        $method = SRequest::getInstance()->get( 'a' );
    } else {
        $method = 'default';
    }
    $method .= 'Action';

    if( method_exists( $class, $method ) ) {
        if( SRequest::getInstance()->post()!==NULL && count(SRequest::getInstance()->post())>0 )
            $class->$method( SRequest::getInstance()->post(), SRequest::getInstance()->get() );
        else
            $class->$method( SRequest::getInstance()->get() );

        exit;
    }
}


