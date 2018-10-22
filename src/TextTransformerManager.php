<?php

namespace Drupal\text_transformer;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Text Transformer plugin manager.
 */
class TextTransformerManager extends DefaultPluginManager {

  /**
   * Constructs a TextTransformerManager object.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/TextTransformer', $namespaces, $module_handler, 'Drupal\text_transformer\TextTransformerInterface', 'Drupal\text_transformer\Annotation\TextTransformer');

    $this->alterInfo('text_transformer_info');
    $this->setCacheBackend($cache_backend, 'text_transformers');

  }

  /**
   * Return a list of text transformers.
   */
  public function getTextTransformers() {
    $text_transformers = [];
    $definitions = $this->getDefinitions();
    foreach ($definitions as $id => $definition) {
      $text_transformers[$id] = $definition['name']->render();
    }
    return $text_transformers;
  }

}
