<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex\Client;

/**
 *
 * @package Smartex
 */
interface ResponseInterface
{
    /**
     * @return string
     */
    public function getBody();

    /**
     * Returns the status code of the response
     *
     * @return integer
     */
    public function getStatusCode();

    /**
     * Returns a $key => $value array of http headers
     *
     * @return array
     */
    public function getHeaders();
}
