<?php

use Symfony\Component\HttpFoundation\Request;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.

if($_SERVER['REMOTE_ADDR'] != "127.0.0.1")
    $_SERVER['DOCUMENT_ROOT'] = '/home/ovh/www/hey/Symfony/web';

define('FTP_HOST',"91.121.93.223");
define('FTP_USER','heyvent');
define('FTP_PASSWORD','karudev971');
define('ADMIN_EMAIL', serialize(array('renault@karudev.fr','soul2soul@free.fr')));
//define('ADMIN_EMAIL', serialize(array('renault@karudev.fr')));
define('NOREPLY_EMAIL', 'renault@karudev.fr');
$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
require_once __DIR__.'/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
