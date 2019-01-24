# Magento 2 Banner Module

Clone this repository inside src/app/code/Mauricio folder of your magento2 installation

```
git clone git@github.com:mauriciopazpp/magento2-banner.git src/app/code/Mauricio
```

Clean the cache
```
php bin/magento cache:clean
```
Upgrade and compile
```
php bin/magento setup:upgrade && php bin/magento setup:di:compile
```
The banner management will be created in the sideba. `Banner > Homepage Banner`
