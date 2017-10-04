<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex;

/**
 * Class PayoutTransaction
 * @package Smartex
 */
interface PayoutTransactionInterface
{
    /**
     * Get ethereum blockchain transaction ID for the payout transaction.
     * @return mixed
     */
    public function getTransactionID();

    /**
     * The amount of ethereum paid.
     * @return float
     */
    public function getAmount();

    /**
     * The date and time when the payment was sent.
     * @return string
     */
    public function getDate();
}
