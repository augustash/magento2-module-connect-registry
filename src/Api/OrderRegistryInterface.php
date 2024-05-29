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

namespace Augustash\ConnectRegistry\Api;

use Magento\Sales\Api\Data\OrderInterface;

/**
 * Service interface responsible for sales order object registry.
 *
 * @api
 */
interface OrderRegistryInterface
{
    /**
     * Get the current order object.
     *
     * @return \Magento\Sales\Api\Data\OrderInterface|null
     */
    public function getCurrentOrder(): ?OrderInterface;

    /**
     * Set the current order object.
     *
     * @param \Magento\Sales\Api\Data\OrderInterface $currentOrder
     * @return self
     */
    public function setCurrentOrder(OrderInterface $currentOrder): self;
}
