<img src="resources/img/media-encoder.svg"  width="120">

# Twig Image Base64 Encoding

A simple Twig extension to create base64-encoded strings from Craft [Image] Assets in your Twig templates.

<!--- ## Installation

Find it in the Craft Plugin Store or simply install via Composer from your command line composer require "kisonay/craft-twig-imagebase64" --->

## Requirements

This Twig extension requires that you pass an instance of a Craft [`Asset`](https://docs.craftcms.com/api/v3/craft-elements-asset.html) in your Twig template. The extension will die gracefully if anything other than that is passed in as the first parameter.

## Usage

### As a Twig Function

###### With default options

	{{ image64(asset) }}

###### With `inline` set to `true`

	{{ image64(asset, true) }}

This will return the base64-encoded string in a [data URI scheme](http://en.wikipedia.org/wiki/Data_URI_scheme). The default value is `false`.

### As a Twig Filter

	{{ asset|image64 }}
