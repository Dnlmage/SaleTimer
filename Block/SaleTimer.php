<?php

namespace DanilLozenko\SaleTimer\Block;

use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\Registry;
use \DanilLozenko\SaleTimer\Helper\Config;

/**
 * Class SaleTimer
 * @package DanilLozenko\SaleTimer\Block
 */
class SaleTimer extends \Magento\Framework\View\Element\Template
{

    /**
     * @var string
     */
    protected $_template = 'DanilLozenko_SaleTimer::saleTimer.phtml';

    /**
     * @var \Magento\Catalog\Model\Product
     */
    protected $product;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * @var \DanilLozenko\SaleTimer\Helper\Config
     */
    protected $config;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \DanilLozenko\SaleTimer\Helper\Config
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        Config $config,
        array $data = []
    )
    {
        $this->config = $config;
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * @param \Magento\Catalog\Model\Product $product
     * @return $this
     */
    public function setProduct($product = null)
    {
        if ($product) {
            $this->product = $product;
        } else if ($this->registry->registry('product')) {
            $this->product = $this->registry->registry('product');
        }

        return $this;
    }

    /**
     * @return \Magento\Catalog\Model\Product
     */
    public function getProduct() : \Magento\Catalog\Model\Product
    {
        return $this->product;
    }

    /**
     * @return string
     */
    public function isEnable() : string
    {
        return $this->config->isEnable();
    }

}
