<?php

/**
 * View file for display the content of cms page
 *
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   CMS
 * @package    CMS
 * @author     Any linux work Pvt. Ltd <www.anywebsol.com>
 * @copyright  2015-2016 Any web sol group
 * @version    1.0
 */
?>
<!DOCTYPE HTML>
<html lang="en">
    <!--[if IE 7 ]>    <html class="ie ie7"> <![endif]-->
    <!--[if IE 8 ]>    <html class="ie ie8"> <![endif]-->
    <!--[if IE 9 ]>    <html class="ie ie9"> <![endif]-->
    <head>
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php if(count($mycms) > 0) {  ?>
        <meta name="title" content="<?php echo $mycms['Cms']['cms_metatitle'];?>">
        <meta name="keywords" content="<?php echo $mycms['Cms']['cms_metakeyword'];?>">
        <?php $desc = str_replace('&nbsp;','',$mycms['Cms']['cms_metadescription'])?>
        <meta name="description" content="<?php echo strip_tags($desc);?>"> 
        <title><?php echo $title?></title>
        <?php } ?>
    </head>
    <body class="form_loginpage">
        <div class="cms-wrapper">
        <?php if(count($mycms) > 0) { ?>
            <section class="main">
                <div class="full-blue title">
                    <div class="wrapper">
                        <h2><?php  echo $mycms['Cms']['cms_title'];?></h2>
                    </div>
                    <div class="wrapper posted">
                    <?php 
                    $time = strtotime($mycms['Cms']['modified']);
                    echo date('M, Y',$time);?></h2>-->  
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="main-cms">
	    <?php echo $mycms['Cms']['cms_description']; ?>
                </div>
        <?php  } ?>
            </section>
            <div style="clear:both;"></div>
        </div>
    </body>
</html>