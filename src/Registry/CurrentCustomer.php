<?php

/**
 * Connect Integration Suite - Registry
 *
 * A replacement for deprecated core registry functionality for category, customer, product, sales objects.
 *
 * @author Peter McWilliams <pmcwilliams@augustash.com>
 * @license MIT
 */

declare(strict_types=1);

namespace Augustash\ConnectRegistry\Registry;

use Augustash\ConnectRegistry\Api\CustomerRegistryInterface;
use Magento\Customer\Api\Data\CustomerInterface;

class CurrentCustomer implements CustomerRegistryInterface
{
    /**
     * Current customer object.
     */
    private ?CustomerInterface $currentCustomer = null;

    /**
     * Get the current customer object.
     *
     * @return \Magento\Customer\Api\Data\CustomerInterface|null
     */
    public function getCurrentCustomer(): ?CustomerInterface
    {
        return $this->currentCustomer;
    }

    /**
     * Set the current customer object.
     *
     * @param \Magento\Customer\Api\Data\CustomerInterface $currentCustomer
     * @return self
     */
    public function setCurrentCustomer(CustomerInterface $currentCustomer): self
    {
        $this->currentCustomer = $currentCustomer;
        return $this;
    }
}
