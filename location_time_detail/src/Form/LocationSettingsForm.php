<?php

namespace Drupal\location_time_detail\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure location_time_detail settings for this site.
 */
class LocationSettingsForm extends ConfigFormBase {

  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'location_admin_settings';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'location_time_detail.settings',
    ];
  }

  /** 
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('location_time_detail.settings');

    $form['country'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Country'),
      '#default_value' => $config->get('country'),
    ];  

    $form['city'] = [
      '#type' => 'textfield',
      '#title' => $this->t('City'),
      '#default_value' => $config->get('city'),
    ]; 
	$values = array('America Chicago' => t('America/Chicago'),
					'America New_York' => t('America/New_York'),
					'Asia Tokyo' => t('Asia/Tokyo'),
					'Asia Dubai' => t('Asia/Dubai'),
					'Asia Kolkata' => t('Asia/Kolkata'),
					'Europe Amsterdam' => t('Europe/Amsterdam'),
					'Europe Oslo' => t('Europe/Oslo'),
					'Europe London' => t('Europe/London'));
	$form['timezone'] = array(
	  '#title' => t('Timezone'),
	  '#type' => 'select',
	  '#description' => "Select the Timezone.",
	  '#options' => $values,
	);	

    return parent::buildForm($form, $form_state);
  }

  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
	$this->config('location_time_detail.settings')
      // Set the submitted configuration setting.
      ->set('country', $form_state->getValue('country'))
      // You can set multiple configurations at once by making
      // multiple calls to set().
      ->set('city', $form_state->getValue('city'))
	  ->set('timezone', $form_state->getValue('timezone'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
