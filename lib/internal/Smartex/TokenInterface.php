<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex;

/**
 * @package Smartex
 */
interface TokenInterface
{
    /**
     * @return string
     */
    public function getToken();

    /**
     * @return string
     */
    public function getResource();

    /**
     * @return string
     */
    public function getFacade();

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @return array
     */
    public function getPolicies();
    
    /**
     * @return string
     */
    public function getPairingCode();

    /**
     * @return \DateTime
     */
    public function getPairingExpiration();
}
