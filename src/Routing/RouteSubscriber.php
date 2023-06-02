<?php

namespace Drupal\uli_custom_workflow\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 *
 * See
 * https://www.drupal.org/docs/drupal-apis/routing-system/altering-existing-routes-and-adding-new-routes-based-on-dynamic-ones.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('user.reset.login')) {
      // https://drupal.stackexchange.com/a/232960/13414.
      $route->setDefault('_controller', '\Drupal\uli_custom_workflow\Controller\UliUserController::resetPassLogin');
      $route->setRequirements([
        '_access' => 'TRUE',
      ]);
    }
  }

}
