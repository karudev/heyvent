<?php

namespace Hey\AccountBundle\Models;    
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;

/**
 * Exécution de commande depuis le web
 *
 * @author RENAULT
 */
class Commande {

public static function runCommand($container,$command, $arguments = array())
{
    $kernel = $container->get('kernel');
    $app = new Application($kernel);

    $args = array_merge(array('command' => $command), $arguments);

    $input = new ArrayInput($args);
    $output = new NullOutput();

    return $app->doRun($input, $output);
}
}

?>
