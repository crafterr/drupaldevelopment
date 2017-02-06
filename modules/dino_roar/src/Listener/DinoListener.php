<?php

namespace Drupal\dino_roar\Listener;


use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class DinoListener implements EventSubscriberInterface {


  protected $loggerFactory;

  public function __construct(LoggerChannelFactoryInterface $loggerFactory)
  {
    $this->loggerFactory = $loggerFactory;
  }

  public function onKernelRequest(GetResponseEvent $event)
  {
     $request = $event->getRequest();
     $shouldRoar = $request->query->get('roar');
     if ($shouldRoar) {
       $this->loggerFactory->get('default')->debug('roarrrararar');
     }
  }
  public static function getSubscribedEvents()
  {
    return [
      KernelEvents::REQUEST => 'onKernelRequest'
    ];
  }

}