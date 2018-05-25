# Augustash Wampa Settings.

This allows the admin to control theme specific settings to include throughout the website/store.

## Installation

### Composer

```bash
$ composer config repositories.augustash-wampa-settings vcs https://github.com/augustash/magento2-module-wampa-settings.git
$ composer require augustash/module-wampa-settings:dev-master
```

## Components
### Company Footer
To enable and include the page_company_footer.phtml into a layout, with the Magento_Theme>layout>default.xml include the following:  `<block class="Augustash\WampaSettings\Block\View" name="footer-company-contact" template="Augustash_WampaSettings::page_company_footer.phtml"></block>`
