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

namespace Augustash\ConnectRegistry\Plugin;

use Augustash\ConnectRegistry\Api\OrderRegistryInterface;
use Magento\Sales\Controller\AbstractController\OrderViewAuthorizationInterface as Subject;
use Magento\Sales\Model\Order;

class AfterOrderViewAuthorizationPlugin
{
    /**
     * Constructor.
     *
     * Initialize class dependencies.
     *
     * @param \Augustash\ConnectRegistry\Api\OrderRegistryInterface $currentOrder
     */
    public function __construct(
        protected OrderRegistryInterface $currentOrder,
    ) {
    }

    /**
     * Add current order into the registry if customer is allowed to view.
     *
     * @param \Magento\Sales\Controller\AbstractController\OrderViewAuthorizationInterface $subject
     * @param bool $result
     * @param \Magento\Sales\Model\Order $order
     * @return bool
     */
    public function afterCanView(Subject $subject, bool $result, Order $order): bool
    {
        if ($result === true) {
            $this->currentOrder->setCurrentOrder($order);
        }

        return $result;
    }
}
