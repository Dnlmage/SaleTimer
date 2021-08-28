<?php

namespace DanilLozenko\SaleTimer\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config as CoreConfig;


class Config extends AbstractHelper
{

    /**
     * @var CoreConfig
     */
    public $coreConfig;

    /**
     * Construct
     *
     * @param Context $context
     * @param CoreConfig $coreConfig
     */
    public function __construct(
        Context $context,
        CoreConfig $coreConfig
    )
    {
        $this->coreConfig = $coreConfig;
        parent::__construct($context);
    }

    /**
     * @return string
     */
    public function isEnable(): string
    {
        return (string)$this->coreConfig->getValue('danillozenko_saletimer/general/enabled');
    }

}
