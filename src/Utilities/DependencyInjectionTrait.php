<?php

namespace Drupal\uli_custom_workflow\Utilities;

/**
 * Trait that can be used for dependency injection.
 */
trait DependencyInjectionTrait {

  /**
   * Mockable wrapper around \Drupal::service('uli_custom_workflow').
   */
  public function app() {
    return \Drupal::service('uli_custom_workflow');
  }

  /**
   * Mockable wrapper around \Drupal::currentUser().
   */
  public function currentUser() {
    return \Drupal::currentUser();
  }

}
