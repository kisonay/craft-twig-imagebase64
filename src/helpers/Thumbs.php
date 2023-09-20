<?php

namespace kisonay\crafttwigimagebase64\helpers;

use craft\elements\Asset;
use craft\models\ImageTransform;

class Thumbs
{
    public static function getUrl(Asset $asset, $width = null, $height = null): string
    {
        $transform = new ImageTransform([
            'width' => $width,
            'height' => $height,
            'mode' => 'crop',
        ]);

        return $asset->getUrl($transform);
    }
}
