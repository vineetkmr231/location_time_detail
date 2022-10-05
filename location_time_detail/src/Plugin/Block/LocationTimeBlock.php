<?php

namespace Drupal\location_time_detail\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "location_time_block",
 *   admin_label = @Translation("Site location and the current time"),
 *   category = "System"
 * )
 */
class LocationTimeBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
	  $timezone = \Drupal::config('location_time_detail.settings')->get('timezone');
	  $GetTime = getDateTimeByTimezone($timezone);
      return [
        '#theme' => 'location_time_block',
        '#country' => \Drupal::config('location_time_detail.settings')->get('country'),
		'#city' => \Drupal::config('location_time_detail.settings')->get('city'),
		'#timezone' => $GetTime,
      ];
  }
  /**
   * @return int
   */
  public function getCacheMaxAge() {
    return 0;
  }
}
