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

namespace Augustash\ConnectRegistry\Observer;

use Augustash\ConnectRegistry\Api\CustomerRegistryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class RegisterCurrentCustomerObserver implements ObserverInterface
{
    /**
     * Constructor.
     *
     * Initialize class dependencies.
     *
     * @param \Augustash\ConnectRegistry\Api\CustomerRegistryInterface $currentCustomer
     */
    public function __construct(
        protected CustomerRegistryInterface $currentCustomer,
    ) {
    }

    /**
     * Add current customer to the registry.
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        /** @var \Magento\Customer\Model\Data\Customer $customer */
        $customer = $observer->getEvent()->getData('customer');

        if (!($customer instanceof CustomerInterface)) {
            return;
        }

        $this->currentCustomer->setCurrentCustomer($customer);
    }
}
