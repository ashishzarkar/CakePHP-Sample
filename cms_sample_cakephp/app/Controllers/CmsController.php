<?php

/**
 * CMS controller file to manage the actions
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
App::uses('AppController', 'Controller');

/**
 * Name : CmsController
 * Use : For add,edit and delete cms
 */
class CmsController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Cms';

    /*
     * helpers
     * @var array
     */
    public $helpers = array('Html', 'Session', 'Form');

    /*
     * this uses below models.
     * @var array
     */
    public $uses = array('Cms');

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     */

    /**
     * Name : beforeFilter
     */
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('addcms', 'cmslist', 'cms', 'deletePage');
    }

    /**
     * Add the cms page.
     *
     * @name addcms
     * @param  integer $id optional parameter for edit cms page.
     * @return void
     * @access public
     * 
     */
    public function addcms($id = "") {

        /* Uncomment the below line and write your layout name. */
        //$this->layout = "admin_forms";
        # Create a new cms page.
        if ($id == '') {
            #   set the title of page
            $this->set('title', 'Add Cms');

            if (!empty($this->data)) {
                $this->Cms->set($this->data);
                #validate the data
                if ($this->Cms->validates($this->data)) {
                    #create a slug for SEO friendly urls
                    $this->request->data['Cms']['cms_alias'] = $this->slugify($this->request->data['Cms']['cms_title']);
                    if ($this->Cms->save($this->request->data))
                        $this->Session->setFlash(__('<label class="alert alert-success" for="error">Cms page created successfully.</label>'));
                    $this->redirect('cmslist');
                }
            }
            # Edit the existing cms page. 
        } else {
            #   set the title of page
            $this->set('title', 'Edit Cms');
            $this->Cms->id = $id;
            $this->set('idd', $id);
            if (!empty($this->data)) {
                $this->Cms->set($this->data);
                #validate the data
                if ($this->Cms->validates($this->data)) {
                    $this->request->data['Cms']['cms_alias'] = $this->slugify($this->request->data['Cms']['cms_title']);
                    if ($this->Cms->save($this->request->data))
                        $this->Session->setFlash(__('<label class="alert alert-success" for="error">Cms page updated successfully.</label>'));
                    $this->redirect('cmslist');
                }
            }
            else {
                #Read the data for edit cms page.
                $this->data = $this->Cms->read();
            }
        }
    }

    /**
     * Display the list of cms pages
     *
     * @name cmslist
     * @param  void
     * @return void
     * @access public
     * 
     */
    public function cmslist() {
        /* Uncomment the below line and write your layout name. */
        //$this->layout = "admin_forms";
        #Set the page title
        $this->set('title', 'CMS List');
        $mycms = $this->Cms->find('all', array('order' => 'Cms.cms_id DESC'));
        $this->set('mycms', $mycms);
    }

    /**
     * Display the content of cms pages
     *
     * @name cms
     * @param  void
     * @return void
     * @access public
     * 
     */
    public function cms() {
        $this->layout = false;
        $mycms = $this->Cms->find('first', array('conditions' => array('cms_alias' => $this->params->params['pass'][0], 'Cms.current_status' => 'Publish')));
        if (count($mycms) > 0) {
            $this->set('title', $mycms['Cms']['cms_metatitle']);
        }
        $this->set('mycms', $mycms);
    }

    /**
     * Delete the cms page and redirect to cmslist page.
     *
     * @name deletePage
     * @param  integer $id delete the cms for given id
     * @return void
     * @access public
     * 
     */
    public function deletePage($id) {
        $this->layout = false;
        $this->autoRender = false;
        #delete the page.
        if ($this->Cms->delete($id)) {
            $this->Session->setFlash(__('<label class="alert alert-success" for="error">Page deleted successfuly.</label>'));
            $this->redirect('cmslist');
        } else {
            $this->Session->setFlash(__('<label class="alert alert-success" for="error">Please try again</label>'));
            $this->redirect('cmslist');
        }
    }

    /**
     * Create a slug for cms page.
     *
     * @name slugify
     * @param  string $text text for creating slug.
     * @return string $text slug value
     * @access public
     * 
     */
    public function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

}
