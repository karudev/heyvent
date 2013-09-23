<?php

namespace Hey\AccountBundle\Models;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of SerializerClass
 *
 * @author RENAULT
 */
class SerializerClass {

    //put your code here
    public $serializer;

    public function __construct() {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    public function serialize($data, $format) {
        if ($format == 'json'){
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent($this->serializer->serialize($data, 'json'));
        return $response;
        }
        else
        return $this->serializer->serialize($data, $format);
    }

}

?>
