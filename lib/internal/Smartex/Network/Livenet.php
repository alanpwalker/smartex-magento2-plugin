<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex\Network;

/**
 *
 * @package Bitcore
 */
class Livenet implements NetworkInterface
{
    public function getName()
    {
        return 'livenet';
    }

    public function getAddressVersion()
    {
        return 0x00;
    }

    public function getApiHost()
    {
        return 'smartex.io';
    }

    public function getApiPort()
    {
        return 443;
    }
}
