<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex;

/**
 * Creates an application for a new merchant account
 *
 * @package Smartex
 */
interface ApplicationInterface
{
    /**
     * @return array
     */
    public function getUsers();

    /**
     * @return array
     */
    public function getOrgs();
}
