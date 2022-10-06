<?php

/**
 * @file
 * This file is used to create a admin config form that used in the module.
 */
namespace Drupal\location_time_detail\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure location_time_detail settings for this site.
 */
class LocationSettingsForm extends ConfigFormBase{
  /**
  * Config settings.
  *
  * @var string
  */
  const SETTINGS = 'location_time_detail.settings';

  /** 
  * {@inheritdoc}
  * function to get form id.
  */
  public function getFormId() {
    return 'location_admin_settings';
  }

  /** 
  * {@inheritdoc}
  * function getEditableConfigNames.
  */
  protected function getEditableConfigNames() {
    return
	[
      static::SETTINGS,
    ];
  }

  /** 
  * {@inheritdoc}
  * function buildForm.
  */
  public function buildForm(array $form, FormStateInterface $form_state) {
  $config = $this->config(static::SETTINGS);
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
  $select_list = getTimezoneList();
  $form['timezone'] = array(
    '#title' => t('Timezone'),
    '#type' => 'select',
    '#description' => "Select the Timezone.",
    '#options' => $select_list,
    '#default_value' => $config->get('timezone'),
  );
    return parent::buildForm($form, $form_state);
  }

  /** 
  * {@inheritdoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $this->config(static::SETTINGS)
      // Set the submitted configuration setting.
      ->set('country', $form_state->getValue('country'))
      ->set('city', $form_state->getValue('city'))
      ->set('timezone', $form_state->getValue('timezone'))
      ->save();
    parent::submitForm($form, $form_state);
  }
}
