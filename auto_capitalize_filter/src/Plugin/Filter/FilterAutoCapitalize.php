<?php
namespace Drupal\auto_capitalize_filter\Plugin\Filter;

use Drupal\Core\Form\FormStateInterface;
use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * @Filter(
 *   id = "filter_autocapitalize",
 *   title = @Translation("Auto Capitalize Filter"),
 *   description = @Translation("Help the text format to auto capitalize specific words!"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 * )
 */
class FilterAutoCapitalize extends FilterBase {
  public function process($text, $langcode) {
    $new_text=$text;
    $texttobecapitalized = $this->settings['autocapitalize_text'] ? $this->settings['autocapitalize_text'] : '';
    $list_of_words = explode(',', $texttobecapitalized);
    $words = explode('/',$text);
    foreach($words as $word) {
      if(in_array($word, $list_of_words)) {
        $capitalised_word = ucfirst($word);

        $new_text = str_replace($word, $capitalised_word, $text);

      }
    }
    return new FilterProcessResult($new_text);
  }

  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['autocapitalize_text'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Auto Capitalise Text'),
      '#default_value' => $this->settings['autocapitalize_text'],
      '#description' => $this->t('Input few words that you wish to capitalize separated by comma'),
    );
    return $form;

  }
}