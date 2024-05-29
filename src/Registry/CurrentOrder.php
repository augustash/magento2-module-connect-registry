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

use Augustash\ConnectRegistry\Api\OrderRegistryInterface;
use Magento\Sales\Api\Data\OrderInterface;

class CurrentOrder implements OrderRegistryInterface
{
    /**
     * Current order object.
     */
    private ?OrderInterface $currentOrder = null;

    /**
     * Get the current order object.
     *
     * @return \Magento\Sales\Api\Data\OrderInterface|null
     */
    public function getCurrentOrder(): ?OrderInterface
    {
        return $this->currentOrder;
    }

    /**
     * Set the current order object.
     *
     * @param \Magento\Sales\Api\Data\OrderInterface $currentOrder
     * @return self
     */
    public function setCurrentOrder(OrderInterface $currentOrder): self
    {
        $this->currentOrder = $currentOrder;
        return $this;
    }
}
