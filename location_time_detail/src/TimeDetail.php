<?php

/**
 * @file
 * Contains Drupal\location_time_detail\TimeDetail.
 *
 * This class is tied into Drupal's config, but it doesn't have to be.
 * As long as you implement a getBasicInformation() method, you can
 * rewrite this service without having to rewrite the block plugin code.
 *
 * This code also shows how to use the new form of the l() function.
 *
 */

namespace Drupal\location_time_detail;

use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Url;

/**
 * Class TimeDetail.
 *
 * @package Drupal\location_time_detail
 */
class TimeDetail {

  /**
   * Drupal\Core\Config\ConfigFactory definition.
   *
   * @var Drupal\Core\Config\ConfigFactory
   */
  protected $config_factory;
  /**
   * Constructor.
   */
  public function __construct(ConfigFactory $config_factory) {
    $this->config_factory = $config_factory;
  }
  
  /**
   * In this method we are using the Drupal config service to
   * load the variables. Similar to Drupal 7 variable_get().
   * It also uses the new l() function and the Url object from core.
   * At the end of the day, we are just returning a string.
   * This could be refactored to use a Twig template in a future tutorial.
   */
  public function getConfigInfo() {
    $config = $this->config_factory->get('location_time_detail.settings');
	$timezone =  $config->get('timezone');
	if(isset($timezone) && !empty($timezone)){
		$DayTime =	getDateTimeByTimezoneService($timezone);
		
		return $DayTime;
	}
  }
}

