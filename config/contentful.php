<?php
/**
 * @copyright 2016-2017 Contentful GmbH
 * @license   MIT
 */

return [
    /**
     * The ID of the space you want to access
     */
    'delivery.space' => 'fn4wb0dqgt8y',

    /**
     * An API key for the above specified space
     */
    'delivery.token' => '9a98627610b08f2b1d4adb7a258d5b91db6388923756a1e97b16f4af3ab04e67',
    //'delivery.token' => 'acc7f56063c8cfb4338c769d1cab38c96d120cae979b22b214836b9773c66221',

    /**
     * Controls whether Contentful's Delivery or Preview API is accessed
     */
    'delivery.preview' => false,

    /**
     * Sets the locale in which to fetch content by default. NULL means the space'd default locale will be used
     */
    'delivery.defaultLocale' => null
];
