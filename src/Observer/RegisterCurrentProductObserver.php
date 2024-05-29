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

use Augustash\ConnectRegistry\Api\ProductRegistryInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class RegisterCurrentProductObserver implements ObserverInterface
{
    /**
     * Constructor.
     *
     * Initialize class dependencies.
     *
     * @param \Augustash\ConnectRegistry\Api\ProductRegistryInterface $currentProduct
     */
    public function __construct(
        protected ProductRegistryInterface $currentProduct,
    ) {
    }

    /**
     * Add current product to the registry.
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        /** @var \Magento\Catalog\Model\Product $product */
        $product = $observer->getEvent()->getData('product');

        if (!($product instanceof ProductInterface)) {
            return;
        }

        $this->currentProduct->setCurrentProduct($product);
    }
}
