<?php
namespace Drupal\dino_roar\Service;

use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;
use Drupal\Core\Session\AccountProxy;


class RoarService
{
    protected $user;

    /**
     * @var KeyValueFactoryInterface
     */
    private $keyValueFactory;

    private $useCache;

    /**
     * RoarService constructor.
     * @param KeyValueFactoryInterface $keyValueFactory
     * @param AccountProxy $user
     * @param $useCache
     */
    public function __construct(KeyValueFactoryInterface $keyValueFactory, AccountProxy $user, $useCache) {

        $this->keyValueFactory = $keyValueFactory;
        $this->user = $user;
        $this->useCache = $useCache;
    }



    public function getRoar($length)
    {

        $key = 'roar_'.$length;
        $store = $this->keyValueFactory->get('dino');

        if ($store->has($key) && $this->useCache) {

            return $store->get($key);
        }
        sleep(2);
        $string =  'R'.str_repeat('O',$length).'AR!';
        $store->set($key,$string);

        return $string;
    }
}
