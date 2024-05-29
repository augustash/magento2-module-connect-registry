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

use Augustash\ConnectRegistry\Api\CategoryRegistryInterface;
use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class RegisterCurrentCategoryObserver implements ObserverInterface
{
    /**
     * Constructor.
     *
     * Initialize class dependencies.
     *
     * @param \Augustash\ConnectRegistry\Api\CategoryRegistryInterface $currentCategory
     */
    public function __construct(
        protected CategoryRegistryInterface $currentCategory
    ) {
    }

    /**
     * Add current category to the registry.
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        /** @var \Magento\Catalog\Model\Category $category */
        $category = $observer->getEvent()->getData('category');

        if (!($category instanceof CategoryInterface)) {
            return;
        }

        $this->currentCategory->setCurrentCategory($category);
    }
}
