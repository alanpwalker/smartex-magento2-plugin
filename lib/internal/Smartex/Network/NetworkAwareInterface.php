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
interface NetworkAwareInterface
{
    /**
     * Set the network the object will work with
     *
     * @param NetworkInterface $network
     */
    public function setNetwork(NetworkInterface $network = null);
}
