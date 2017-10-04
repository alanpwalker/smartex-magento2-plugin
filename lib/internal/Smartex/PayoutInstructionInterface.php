<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex;

/**
 * Interface PayoutInstructionInterface
 * @package Smartex
 */
interface PayoutInstructionInterface
{

    /**
     * Get Smartex ID for this instruction.
     * @return string
     */
    public function getId();

    /**
     * Get Label for instruction payout.
     * @return string
     */
    public function getLabel();

    /**
     * Get the Ethereum address for the recipient.
     * @return string
     */
    public function getAddress();

    /**
     * Return the amount to pay the recipient.
     * @return string
     */
    public function getAmount();

    /**
     * Get the ETH array (once rates are set)
     * @return array
     */
    public function getEth();

    /**
     * Return the status of this payout instruction
     * @return string
     */
    public function getStatus();

    /**
     * Return the transactions for this payout
     * @return array
     */
    public function getTransactions();
}
