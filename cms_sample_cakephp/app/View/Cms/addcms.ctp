<?php
/**
 * View file for add cms page
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
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i>
                  <?php if(isset($idd) && $idd != '')
                        {
                            echo 'Edit';
                        }
                        else
                        {
                           echo 'Add'; 
                        }
                     ?> CMS Page
                </h2>
        </div>
        <div class="box-content">
            <?php echo $this->Form->create('Cms',array('class'=>'form-horizontal','method'=>'post','onsubmit'=>'return chkdesc();'));?>
                <fieldset>
                  <div class="control-group">
                    <label class="control-label">Title</label>
                    <div class="controls">
                        <?php
                        if(isset($idd) && $idd != '')
                        {
                            echo $this->Form->hidden('cms_id',array('value'=>$idd));    
                            echo $this->Form->input("cms_title",array('type'=>'text','label'=>false,'class'=>'input-xlarge','title'=>'Cms Title'));
                        }
                        else
                        {
                            echo $this->Form->input("cms_title",array('type'=>'text','label'=>false,'class'=>'input-xlarge','title'=>'Cms Title'));
                        }
                        ?>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Description</label>
                    <div class="controls">
                        <?php echo $this->Form->input("cms_description",array('type'=>'textarea','label'=>false,'class'=>'cleditor','id'=>'desc','required'=>false,'title'=>'Cms Description')); ?>
                    </div>
                     <div id="descvalid" class="error-message" style="margin-left:158px;"></div>
                  </div>
                   <div class="control-group">
                    <label class="control-label">Meta Title</label>
                    <div class="controls">
                        <?php echo $this->Form->input("cms_metatitle",array('type'=>'text','label'=>false,'class'=>'input-xlarge','title'=>'Cms Meta Title')); ?>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Meta Keyword</label>
                    <div class="controls">
                        <?php echo $this->Form->input("cms_metakeyword",array('type'=>'text','label'=>false,'class'=>'input-xlarge','title'=>'Cms Meta Keyword')); ?>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Meta Description</label>
                    <div class="controls">
                        <?php echo $this->Form->input("cms_metadescription",array('type'=>'textarea','label'=>false,'class'=>'cleditor','id'=>'metadesc','required'=>false,'title'=>'Cms Meta Description')); ?>
                    </div>
                     <div id="metadescvalid" class="error-message" style="margin-left:158px;"></div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Status</label>
                        <div class="controls">
                      <label class="radio">
                            <?php $options=array('Publish'=>'Publish','Unpublish'=>'Unpublish');
                                  $attributes=array(
                                      'legend'=>false,
                                      'div'=>false,
                                      'label'=>false,
                                      'empty'=>false,
                                      'default'=>'Active'
                                      );
                                  echo $this->Form->radio('current_status',$options,$attributes);
                            
                            ?>     
                      </label>
                        </div>
                  </div>
                 <div class="form-actions">
                   <?php echo $this->Form->button('Save', array('type' => 'submit','class' => 'btn btn-primary','title'=>'Save')); ?>
                   <?php $cancelUrl = $this->webroot.'cms/cmslist';?>
                   <?php echo $this->Form->button('Cancel', array('type' => 'button','class' => 'btn','onclick'=> "location.href = '$cancelUrl'",'title'=>'Cancel')); ?>
                 </div>
              </fieldset>
           <?php echo $this->Form->end(); ?>

        </div>
    </div>
</div>
<script type="text/javascript">
    /*
     * Client side validation for textarea on the form.
     */
    function chkdesc()
    {   
        /* get the description 
         * @var string descr 
         */
        var descr = $("#desc").val();
        if(descr.length == 0 || descr == '<br>')
        {
            var msgs = 'Please enter description';
            $("#descvalid").html(msgs);
            return false;
        }
        
        /* get the meta description 
         * @var string descr 
         */
        var metadescr = $("#metadesc").val();
        if(metadescr.length == 0 || metadescr == '<br>')
        {
            var msgs = 'Please enter meta description';
            $("#metadescvalid").html(msgs);
            return false;
        }
    }
</script>