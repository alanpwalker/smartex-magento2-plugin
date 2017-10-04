<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex;

/**
 * @package Bitcore
 */
interface KeyInterface extends \Serializable
{
    /**
     * Generates a new key
     */
    public function generate();

    /**
     * @return boolean
     */
    public function isValid();
}
