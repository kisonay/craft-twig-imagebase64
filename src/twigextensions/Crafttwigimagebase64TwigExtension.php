<?php
/**
 * craft-twig-imagebase64 plugin for Craft CMS 3.x
 *
 * Base64 image encoding via twig.
 *
 * @link      http://DoeDesign.com/
 * @copyright Copyright (c) 2018 Brian Yanosik
 */

namespace doeenterprises\crafttwigimagebase64\twigextensions;

use doeenterprises\crafttwigimagebase64\Crafttwigimagebase64;

use Craft;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Brian Yanosik
 * @package   Crafttwigimagebase64
 * @since     0.1.0
 */
class Crafttwigimagebase64TwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'Crafttwigimagebase64';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | someFilter }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('image64', [$this, 'image64']),
        ];
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
    * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('image64', [$this, 'image64']),
        ];
    }

    /**
     * Our function called via Twig; it can do anything you want
     *
     * @param null $text
     *
     * @return string
     */
    public function image64($asset, $inline = false)
    {
      if (!$asset instanceof Asset)
      {
          // Die quietly.
          return false;
      }
      // Make sure the mime type is an image.
      if (0 !== strpos($asset->getMimeType(), 'image/'))
      {
          // Die quietly.
          return false;
      }
      // Get the file.
      $binary = file_get_contents($asset->getUrl());
      // Return the string.
      return $inline ? sprintf('data:image/%s;base64,%s', $asset->getExtension(), base64_encode($binary)) : base64_encode($binary);
    }
}
