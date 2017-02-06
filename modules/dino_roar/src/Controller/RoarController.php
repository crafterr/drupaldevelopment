<?php
/**
 * Created by PhpStorm.
 * User: crafter
 * Date: 06.02.2017
 * Time: 12:15
 */

namespace Drupal\dino_roar\Controller;


use Symfony\Component\HttpFoundation\Response;

class RoarController
{
    public function roar($count)
    {
        return new Response("it owrks $count");
    }
}