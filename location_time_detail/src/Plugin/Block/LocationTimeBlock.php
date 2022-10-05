<?php

namespace Drupal\location_time_detail\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\block\Entity\Block;

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
	 //$variables['country'] = \Drupal::config('location_time_detail.settings')->get('country');
	 //$variables['city'] = \Drupal::config('location_time_detail.settings')->get('city');
	 //$variables['timezone'] = \Drupal::config('location_time_detail.settings')->get('timezone');
      return [
        '#theme' => 'location_time_block',
        '#country' => \Drupal::config('location_time_detail.settings')->get('country'),
		'#city' => \Drupal::config('location_time_detail.settings')->get('city'),
		'#timezone' => \Drupal::config('location_time_detail.settings')->get('timezone'),
      ];
  }

}
