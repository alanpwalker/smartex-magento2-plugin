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
interface NetworkInterface
{
    /**
     * Name of network, currently on livenet and testnet
     *
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getAddressVersion();

    /**
     * The host that is used to interact with this network
     *
     * @see https://github.com/smartex/insight
     * @see https://github.com/smartex/insight-api
     *
     * @return string
     */
    public function getApiHost();

    /**
     * The port of the host
     *
     * @return integer
     */
    public function getApiPort();
}
