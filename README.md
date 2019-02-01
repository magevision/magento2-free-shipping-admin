# [MageVision](https://www.magevision.com/) Free Shipping Admin Extension for Magento 2

## Overview
The Free Shipping Admin extension brings a new free shipping method only for admin users (backend). The free shipping admin method can be only used for orders that will be created in Magento's admin panel. 
Useful for pickup customers that their orders are free of shipping costs.

## Key Features
	* Free shipping method available only for admin users (backend)
	* Not visible in frontend
	* Method name and title fully configurable
	
## Other Features
	* Developed by a Magento Certified Developer
	* Meets Magento standard development practices
	* Simple installation
	* 100% open source

## Compatibility
Magento Community Edition 2.0 - 2.1 - 2.2 - 2.3

## Installing the Extension
	* Backup your web directory and store database
	* Download the extension
		1. Sign in to your account
		2. Navigate to menu My Account → My Downloads
		3. Find the extension and click to download it
	* Extract the downloaded ZIP file in a temporary directory
	* Upload the extracted folders and files of the extension to base (root) Magento directory. Do not replace the whole folders, but merge them. If you have downloaded the extension from Magento Marketplace, then create the following folder path app/code/MageVision/FreeShippingAdmin and upload there the extracted folders and files.
        * Connect via SSH to your Magento server as, or switch to, the Magento file system owner and run the following commands from the (root) Magento directory:
            1. cd path_to_the_magento_root_directory 
            2. php bin/magento maintenance:enable
            3. php bin/magento module:enable MageVision_FreeShippingAdmin
            4. php bin/magento setup:upgrade
            5. php bin/magento setup:di:compile
            6. php bin/magento setup:static-content:deploy
            7. php bin/magento maintenance:disable
        * Log out from Magento admin and log in again
		
## Support
If you need support or have any questions directly related to a [MageVision](https://www.magevision.com/) extension, please contact us at [support@magevision.com](mailto:support@magevision.com)
