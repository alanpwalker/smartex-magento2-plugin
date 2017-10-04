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
class Testnet implements NetworkInterface
{
    public function getName()
    {
        return 'testnet';
    }

    public function getAddressVersion()
    {
        return 0x6f;
    }

    public function getApiHost()
    {
        return 'test.smartex.io';
    }

    public function getApiPort()
    {
        return 443;
    }
}
