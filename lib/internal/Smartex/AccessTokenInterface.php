<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex;

/**
 * Creates an access token for the given client
 *
 * @package Smartex
 */
interface AccessTokenInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @return string
     */
    public function getLabel();

    /**
     * @return boolean
     */
    public function isNonceDisabled();
}
