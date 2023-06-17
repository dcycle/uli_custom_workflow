<?php

namespace Drupal\uli_custom_workflow;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Service representing this module.
 */
class UliCustomWorkflow {

  use StringTranslationTrait;

  /**
   * Injected config.factory service.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  public $configFactory;

  /**
   * Class constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   Injected config.factory service.
   */
  public function __construct(ConfigFactoryInterface $configFactory) {
    $this->configFactory = $configFactory;
  }

  /**
   * Mockable implementation of hook_form_alter().
   */
  public function hookFormAlter(&$form, FormStateInterface $form_state, $form_id) {
    switch ($form_id) {
      case 'user_admin_settings':
        $this->alterUserAdminForm($form, $form_state);
        break;

      default:
        break;
    }
  }

  /**
   * Get a config key.
   *
   * @param string $key
   *   Config key to set.
   *
   * @return string
   *   Value of the config key.
   */
  public function configGet(string $key) : string {
    return trim($this->configFactory
      ->get('uli_custom_workflow.general.settings')
      ->get($key));
  }

  /**
   * Set a config key.
   *
   * @param string $key
   *   Config key to set.
   * @param string $value
   *   Value of the config key.
   */
  public function configSet(string $key, string $value) {
    $this->configFactory
      ->getEditable('uli_custom_workflow.general.settings')
      ->set($key, trim($value))->save();
  }

  /**
   * Form alter hook for the user admin page.
   */
  public function alterUserAdminForm(&$form, FormStateInterface $form_state) {
    $form['untranslated_uli_anonymous_message'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Untranslated message when a user is not logged in, and follows a one-time login link (can be empty).'),
      '#default_value' => $this
        ->configGet('untranslated_uli_anonymous_message'),
    ];
    $form['untranslated_uli_authenticated_message'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Untranslated message when a user is already logged in, and follows a one-time login link (can be empty).'),
      '#default_value' => $this
        ->configGet('untranslated_uli_authenticated_message'),
    ];

    $form['#submit'][] = 'uli_custom_workflow_submit_user_admin_form';
  }

  /**
   * Submit handler for the user admin page.
   */
  public function submitUserAdminForm($form, FormStateInterface $form_state) {
    $anonymous = $form_state
      ->getValue('untranslated_uli_anonymous_message');
    $authenticated = $form_state
      ->getValue('untranslated_uli_authenticated_message');
    $this->configSet('untranslated_uli_anonymous_message', $anonymous);
    $this->configSet('untranslated_uli_authenticated_message', $authenticated);
  }

}
