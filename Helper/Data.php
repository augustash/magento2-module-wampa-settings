<?php

namespace Augustash\WampaSettings\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

  const XML_PATH_FOOTER_ENABLED = 'augustash_wampasettings/company_footer/company_footer_enabled';
  const XML_PATH_FOOTER_ADDRESS = 'augustash_wampasettings/company_footer/company_address';
  const XML_PATH_FOOTER_PHONE   = 'augustash_wampasettings/company_footer/company_phone';
  const XML_PATH_FOOTER_FAX     = 'augustash_wampasettings/company_footer/company_fax';
  const XML_PATH_FOOTER_EMAIL   = 'augustash_wampasettings/company_footer/company_email';
  const XML_PATH_FOOTER_COPYRIGHT = 'augustash_wampasettings/company_footer/company_copyright';

  /**
   * @var \Magento\Store\Model\StoreManagerInterface
   */
  protected $storeManager;

  public function __construct(
    \Magento\Framework\App\Helper\Context $context,
    \Magento\Store\Model\StoreManagerInterface $storeManager
  ) {
    $this->storeManager = $storeManager;
    parent::__construct($context);
  }

  /**
   * Returns a boolean value if this module is enabled/disabled
   * within the Stores > Configuration
   *
   * @param  null|integer  $storeId   # Magento store ID
   * @return boolean
   */
  public function isFooterEnabled($storeId = null)
  {
    return (bool)$this->getConfig(self::XML_PATH_FOOTER_ENABLED, $storeId);
  }

  public function getFooterAddress($storeId = null)
  {
    if (!$this->isFooterEnabled($storeId)) {
      return '';
    }

    return $this->getConfig(self::XML_PATH_FOOTER_ADDRESS, $storeId);
  }

  public function getFooterPhone($storeId = null)
  {
    if (!$this->isFooterEnabled($storeId)) {
      return '';
    }

    return $this->getConfig(self::XML_PATH_FOOTER_PHONE, $storeId);
  }

  public function getFooterFax($storeId = null)
  {
    if (!$this->isFooterEnabled($storeId)) {
      return '';
    }

    return $this->getConfig(self::XML_PATH_FOOTER_FAX, $storeId);
  }

  public function getFooterEmail($storeId = null)
  {
    if (!$this->isFooterEnabled($storeId)) {
      return '';
    }

    return $this->getConfig(self::XML_PATH_FOOTER_EMAIL, $storeId);
  }

  public function getFooterCopyright($storeId = null)
  {
    if (!$this->isFooterEnabled($storeId)) {
      return '';
    }

    return $this->getConfig(self::XML_PATH_FOOTER_COPYRIGHT, $storeId);
  }

  /**
   * Returns the ID of the current store
   *
   * @return int
   */
  public function getCurrentStoreId()
  {
    return $this->storeManager->getStore()->getStoreId();
  }

  /**
   * Utility function to ease fetching of values from the Stores > Configuration
   *
   * @param  string           $field      # see the etc/adminhtml/system.xml for field names
   * @param  null|integer     $storeId    # Magento store ID
   * @return mixed
   */
  protected function getConfig($field, $storeId = null)
  {
    $storeId = (!is_null($storeId)) ? $storeId : $this->getCurrentStoreId();
    return $this->scopeConfig->getValue(
      $field,
      \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
      $storeId
    );
  }
}
