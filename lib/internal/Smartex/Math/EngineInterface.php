<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex\Math;

/**
 * @package Bitcore
 */
interface EngineInterface
{
    /**
     * @param String $a Numeric String
     * @param String $b Numeric String
     */
    public function add($a, $b);

    /**
     * @param String $a Numeric String
     * @param String $b Numeric String
     */
    public function cmp($a, $b);

    /**
     * @param String $a Numeric String
     * @param String $b Numeric String
     */
    public function div($a, $b);

    /**
     * @param String $a Numeric String
     * @param String $b Numeric String
     */
    public function invertm($a, $b);

    /**
     * @param String $a Numeric String
     * @param String $b Numeric String
     */
    public function mod($a, $b);

    /**
     * @param String $a Numeric String
     * @param String $b Numeric String
     */
    public function mul($a, $b);

    /**
     * @param String $a Numeric String
     * @param String $b Numeric String
     */
    public function pow($a, $b);

    /**
     * @param String $a Numeric String
     * @param String $b Numeric String
     */
    public function sub($a, $b);
}
