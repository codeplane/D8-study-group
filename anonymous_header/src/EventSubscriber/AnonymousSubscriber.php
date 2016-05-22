<?php

/**
 * @file
 * Contains \Drupal\anonymous_header\EventSubscriber\AnonymousSubscriber.
 */

namespace Drupal\anonymous_header\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Listens for config changes to Akamai credentials.
 */
class AnonymousSubscriber implements EventSubscriberInterface {

  public function addAccessAllowOriginHeaders(FilterResponseEvent $event) {
    $response= $event->getResponse();
    $response->headers->set('Access-Control-Allow-Origin', '*');
    print_r($response);
  }
  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    
    $events[KernelEvents::RESPONSE][] = array('addAccessAllowOriginHeaders');
    return $events;
  }

}


