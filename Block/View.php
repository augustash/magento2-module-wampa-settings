<?php

namespace Augustash\WampaSettings\Block;

use Augustash\WampaSettings\Helper\Data as SettingsHelper;
use Magento\Framework\View\Element\Template;

class View extends Template
{
  /**
   * @var SettingsHelper
   */
  protected $helper;

  /**
   * @var \Magento\Framework\Registry
   */
  protected $registry;

  protected $storeManager;

  /**
   * @param SettingsHelper $helper
   * @param \Magento\Framework\Registry $registry
   * @param \Magento\Framework\View\Element\Template\Context $context
   * @param array $data
   */
  public function __construct(
    SettingsHelper $helper,
    \Magento\Framework\Registry $registry,
    \Magento\Framework\View\Element\Template\Context $context,
    array $data = []
  ) {
    parent::__construct($context, $data);
    $this->helper = $helper;
    $this->storeManager = $context->getStoreManager();
    $this->registry = $registry;
  }

  /**
   * Check if module is enabled within the system config
   *
   * @return boolean
   */

  public function getIsFooterEnabled()
  {
    return $this->helper->isFooterEnabled();
  }

  public function getStoreId()
  {
    return $this->storeManager->getStore()->getId();
  }

  public function getFooterAddress()
  {
    return $this->helper->getFooterAddress($this->getStoreId());
  }

  public function getFooterPhone()
  {
    return $this->helper->getFooterPhone($this->getStoreId());
  }

  public function getFooterFax()
  {
    return $this->helper->getFooterFax($this->getStoreId());
  }

  public function getFooterEmail()
  {
    return $this->helper->getFooterEmail($this->getStoreId());
  }

  public function getFooterCopyright() 
  {
    return $this->helper->getFooterCopyright($this->getStoreId());
  }

  public function getStoreName()
  {
    return $this->storeManager->getStore()->getWebsite()->getName();
  }

}
