<?php

namespace Drupal\block_caching\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Config\Config;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides an 'Block caching nodes' block.
 *
 * @Block(
 *   id = "block_caching_nodetitles",
 *   admin_label = @Translation("Block Caching Node titles"),
 * )
 */
class BlockCachingNodeTitles extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $content = '';
    $cache_tags =array();
    $cache = \Drupal::cache()->get('node_title_caching');

    if(!$cache->data) {
      $nodes = node_get_recent(5);
      foreach($nodes as $key => $node) {
        $title = $node->getTitle();
        $content .= $title . '-';
        $tags[]= $node->getCacheTags();
      }
      foreach($tags as $value) {
        $cache_tags[] = $value[0];
      }
      $cache = \Drupal::cache()->set('node_title_caching',$content,Cache::PERMANENT,$cache_tags);

    }
    else {
      $content = \Drupal::cache()->get('node_title_caching')->data;
    }

    $build = array(
      '#markup' => $content,
      '#cache' => array(
        'keys' => array('node-title-caching'),
        'tags' => $cache_tags,
      ),
    );

    return $build;


  }

}
