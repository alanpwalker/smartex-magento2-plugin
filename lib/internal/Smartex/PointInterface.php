<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex;

/**
 * @package Bitcore
 */
interface PointInterface extends \Serializable
{
    /**
     * Infinity constant
     *
     * @var string
     */
    const INFINITY = 'inf';

    /**
     * @return string
     */
    public function getX();

    /**
     * @return string
     */
    public function getY();

    /**
     * @return boolean
     */
    public function isInfinity();
}
