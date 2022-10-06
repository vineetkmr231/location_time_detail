<?php

/**
 * @file
 * Contains Drupal\location_time_detail\TimeDetail.
 * This class is tied into Drupal's config, but it doesn't have to be.
 * As long as you implement a getConfigInfo() method, you can
 * rewrite this service without having to rewrite the block plugin code.
 */

namespace Drupal\location_time_detail;

use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Url;

/**
 * Class TimeDetail.
 *
 * @package Drupal\location_time_detail
 */
class TimeDetail{

  /**
  * Drupal\Core\Config\ConfigFactory definition.
  *
  * @var Drupal\Core\Config\ConfigFactory
  */
  protected $config_factory;
  /**
  * Constructor.
  */
  public function __construct(ConfigFactory $config_factory){
    $this->config_factory = $config_factory;
  }

  /**
  * In this method we are using the Drupal config service to load the variables.
  */
  public function getConfigInfo(){
  $config = $this->config_factory->get('location_time_detail.settings');
  $timezone =  $config->get('timezone');
    if(isset($timezone) && !empty($timezone)){
      $DayTime = getDateTimeByTimezoneService($timezone);
      return $DayTime;
    }
  }
}

