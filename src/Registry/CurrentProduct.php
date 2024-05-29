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

use Augustash\ConnectRegistry\Api\ProductRegistryInterface;
use Magento\Catalog\Api\Data\ProductInterface;

class CurrentProduct implements ProductRegistryInterface
{
    /**
     * Current product object.
     */
    private ?ProductInterface $currentProduct = null;

    /**
     * Get the current product object.
     *
     * @return \Magento\Catalog\Api\Data\ProductInterface|null
     */
    public function getCurrentProduct(): ?ProductInterface
    {
        return $this->currentProduct;
    }

    /**
     * Set the current product object.
     *
     * @param \Magento\Catalog\Api\Data\ProductInterface $currentProduct
     * @return self
     */
    public function setCurrentProduct(ProductInterface $currentProduct): self
    {
        $this->currentProduct = $currentProduct;
        return $this;
    }
}
