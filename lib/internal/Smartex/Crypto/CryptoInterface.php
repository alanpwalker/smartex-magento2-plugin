<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex\Crypto;

/**
 * All crypto extensions MUST support this interface
 */
interface CryptoInterface
{
    /**
     * If the users system supports the cryto extension, this should return
     * true, otherwise it should return false.
     *
     * @return boolean
     */
    public static function hasSupport();

    /**
     * @return array
     */
    public function getAlgos();
}
