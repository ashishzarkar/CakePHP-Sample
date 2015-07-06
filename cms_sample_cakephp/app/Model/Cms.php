<?php

/**
 * CMS model file for handling all database operation on cms table.
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
/*
 * @name Cms
 */
class Cms extends AppModel {
    /*
     * Model name
     * @var string Cms
     */

    var $name = "Cms";

    /*
     * This model use below table.
     * Table name
     * @var string $useTable
     */
    var $useTable = "cms";

    /*
     * Primary key for cms table.
     * primary key
     * @var string $primaryKey
     */
    var $primaryKey = "cms_id";

    /*
     * Validate the input data
     * @var array $validate
     */
    public $validate = array(
        'cms_title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter title.'
            )
        ),
        'cms_description' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter description.'
            )
        ),
        'cms_metatitle' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter meta title.'
            )),
        'cms_metakeyword' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter meta meyword.'
            )),
        'cms_metadescription' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter meta description.'
            )
        )
    );

}