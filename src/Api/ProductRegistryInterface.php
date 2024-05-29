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

use Magento\Catalog\Api\Data\ProductInterface;

/**
 * Service interface responsible for product registry.
 *
 * @api
 */
interface ProductRegistryInterface
{
    /**
     * Get the current product object.
     *
     * @return \Magento\Catalog\Api\Data\ProductInterface|null
     */
    public function getCurrentProduct(): ?ProductInterface;

    /**
     * Set the current product object.
     *
     * @param \Magento\Catalog\Api\Data\ProductInterface $currentProduct
     * @return self
     */
    public function setCurrentProduct(ProductInterface $currentProduct): self;
}
