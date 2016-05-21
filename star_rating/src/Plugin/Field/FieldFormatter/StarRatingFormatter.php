<?php

/**
 * @file
 * Contains \Drupal\star_rating\Plugin\Field\FieldFormatter\StarRatingFormatter.
 */

namespace Drupal\star_rating\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
//use Drupal\image\Plugin\Field\FieldFormatter\ImageFormatter;

/**
 * Plugin implementation of the 'number_decimal' formatter.
 *
 * @FieldFormatter(
 *   id = "star_rating_formatter",
 *   label = @Translation("Star Rating Formatter"),
 *   field_types = {
 *     "decimal"
 *   }
 * )
 */
class StarRatingFormatter extends FormatterBase  {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
//    $elements = parent::viewElements($items);
//    foreach ($elements as &$element) {
//      $element['#theme'] = 'image_title_caption_formatter';
//    }
//    return $elements;
    $element = array();
    foreach ($items as $delta => $item) {
      $input = $item->getValue();
      $value = ($input['value']);

      // Render each element as markup.
      $element[$delta] = array(
        //'#type' => 'markup',
        '#theme' => 'star_rating_number_formatter',
        '#value' => $value*20,
        '#attached' => array('library'=> array('star_rating/star_rating')),
      );
    }

    return $element;

  }

}