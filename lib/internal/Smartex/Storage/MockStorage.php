<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex\Storage;

/**
 * @codeCoverageIgnore
 * @package Bitcore
 */
class MockStorage implements StorageInterface
{
    public function persist(\Smartex\KeyInterface $key)
    {
    }

    public function load($id)
    {
        return;
    }
}
