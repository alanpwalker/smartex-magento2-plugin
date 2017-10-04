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
abstract class NetworkAware implements NetworkAwareInterface
{
    /**
     * @var NetworkInterface
     */
    protected $network;

    /**
     * @inheritdoc
     */
    public function setNetwork(NetworkInterface $network = null)
    {
        $this->network = $network;
    }
}
