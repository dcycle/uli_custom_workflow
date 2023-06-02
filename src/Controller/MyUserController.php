<?php

namespace Drupal\uli_custom_workflow\Controller;

use Drupal\user\Controller\UserController;
use Symfony\Component\HttpFoundation\Request;
use Drupal\uli_custom_workflow\Utilities\DependencyInjectionTrait;

/**
 * A user controller which intercepts the default message.
 */
class MyUserController extends UserController {

  use DependencyInjectionTrait;

  /**
   * {@inheritdoc}
   */
  public function resetPassLogin($uid, $timestamp, $hash, Request $request) {
    $ret = parent::resetPassLogin($uid, $timestamp, $hash, $request);
    $this->interceptMessage();
    return $ret;
  }

  /**
   * Intercepts messages set by default on the messenger.
   */
  public function interceptMessage() {
    $allMessagesInBuffer = $this->messenger()->all();

    if (array_key_exists('error', $allMessagesInBuffer)) {
      return;
    }

    $this->messenger()->deleteAll();

    $message = $this->currentUser()->isAuthenticated() ? $this->app()->configGet('untranslated_uli_authenticated_message') : $this->app()->configGet('untranslated_uli_anonymous_message');

    if ($message) {
      // Only string literals should be passed to t() where possible.
      // In this case it comes from the configuration, so I'll ignore it.
      // @codingStandardsIgnoreStart
      $this->messenger()->addStatus($this->t($message));
      // @codingStandardsIgnoreEnd
    }
  }

}
