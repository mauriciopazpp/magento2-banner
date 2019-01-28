![Magento 2](https://lh3.googleusercontent.com/SXrxLhsXKgPl95DTw78lpn-zfEfW9ovumbHjPv2jK6fHOjJel9tuW_xj_JeF8vRF-BYlhMgy0OqSDw=w1920-h979-rw)

# WYSIWYG Banner Module - Magento 2

## Compatibility
- Magento 2.0, 2.1, 2.2, 2.3.

## Features
- Enable and disabled banners in admin
- Create HTML banners using WYSIWYG editor
- Add multiple banners

## How to install:
  Run this command on the 'root of your magento installation':
  ```git
  git clone git@github.com:mauriciopazpp/magento2-banner.git src/magento/app/code/Mauricio
  ```
  Upgrade it:
  ```
  php bin/magento setup:upgrade
  ```
  Enable the module
  ```
  php ./bin/magento module:enable Mauricio_Banner
  ```
  Clean the cache
  ```
  php bin/magento cache:clean
  ```
  if necessary...
  ```
  chown -R :www-data .
  ```
##
The banner management will be appears in the sidebar. `Banners > Homepage Banner`

![Magento 2](https://lh6.googleusercontent.com/z_bgsse6Oh9KNmO3_N4ONtSNl7rSQaMzqvKk-jACcObKzyLATGVvNd__HQJajlNDYTWIXPr5vpvRl2ROZOtf=w1920-h981)

That's it.

