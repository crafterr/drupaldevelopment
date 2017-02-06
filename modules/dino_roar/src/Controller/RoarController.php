<?php
/**
 * Created by PhpStorm.
 * User: crafter
 * Date: 06.02.2017
 * Time: 12:15
 */

namespace Drupal\dino_roar\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\dino_roar\Service\RoarService;
use Drupal\dino_roar\Service\SimpleService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * @property RoarService roarService
 */
class RoarController extends ControllerBase
{
    private $roarService;
    /**
     * @var SimpleService
     */
    private $simpleService;

    public function __construct(RoarService $roarService, SimpleService $simpleService)
    {
        $this->roarService = $roarService;
        $this->simpleService = $simpleService;
    }

    public function roar($count)
    {
        $roar = $this->roarService->getRoar($count);
        return new Response($roar);
    }

    public function node($node) {
        $node = $this->simpleService->getNode($node);
        $z =  var_dump($node);
        return new Response($z);
    }

    public static function create(ContainerInterface $container)
    {
        $serviceContainer = $container->get('dino_roar.roar_service');
        $simpleServiceContainer = $container->get('dino_roar.roar_simpleservice');

        return new static($serviceContainer,$simpleServiceContainer);
    }
}