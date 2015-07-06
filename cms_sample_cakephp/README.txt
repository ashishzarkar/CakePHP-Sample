About
=======================================================
The main purpose of this module is to manage the CMS or static pages on the site in Admin section.
Admin can add, edit or delete the created pages and can modify the status (enable or disable) of pages.


TECHNOLOGY AND FRAMEWORK 
=======================================================
PHP, Cakephp 2.6.1 Framework


MODULE NAME
=======================================================
CMS page management in Admin section


Required Database Schema
=======================================================
This module requires following table.
--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `cms_title` varchar(25) NOT NULL,
  `cms_description` varchar(255) NOT NULL,
  `cms_metatitle` varchar(255) NOT NULL,
  `cms_metakeyword` varchar(255) NOT NULL,
  `cms_metadescription` varchar(255) NOT NULL,
  `cms_alias` varchar(75) NOT NULL,
  `current_status` enum('Publish','Unpublish') NOT NULL DEFAULT 'Publish',
  PRIMARY KEY (`cms_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


Brief description files and folders 
========================================================
FUNCTIONAL DESCRIPTION OF MODULE: This package is designed by considering the basic structure of Cakephp 2.6.1 It includes all required and necessary scripts to achieve the goal. Following is the brief description of files used in this module:

    1: /app/Config/routes.php: Routing for cms pages
    
    2: /app/Controller/CmsController.php: contains add, edit, view and delete actions.
    
    3: /app/Model/Cms.php : contains model classes.

    4: /app/View/Cms : contains all the view files used in the module.

Version History
========================================================
April 7 2015  CMS module