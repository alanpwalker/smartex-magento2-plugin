<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex\Storage;

/**
 * @package Bitcore
 */
interface StorageInterface
{
    /**
     * @param KeyInterface $key
     */
    public function persist(\Smartex\KeyInterface $key);

    /**
     * @param string $id
     *
     * @return KeyInterface
     */
    public function load($id);
}
