<?php
/**
 * View file for listing of all cms pages.
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
 * @author     Any linux work Pvt. Ltd <anywebsol.com>
 * @copyright  2015-2016 Any web sol group
 * @version    1.0
 */
?>
<script>
$(document).ready(function() { 
       $(".id").toggle();
       $(".center_id").toggle();
} );
</script>
<!-- row start-->
<div class="row-fluid sortable">
    <!-- span start-->
    <div class="box span12">
        <!-- title start -->
        <div class="box-header well" data-original-title>
                <h2><i class="icon-user"></i> CMS List</h2>
        </div>
        <!-- title end -->
        
        <!-- Display Message start -->
        <?php echo $this->Session->flash();?>  
        <!-- Display Message end -->
        
        <!-- Add link start -->
        <div class="top-right-bttn">
                    <!-- title start -->
             <a href='<?php echo $this->webroot?>cms/add' class="btn btn-info">Add</a> 
        </div>
        <!-- Add link end -->
       
        <!-- content Start -->
        <div class="box-content">	      
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                <tr>
                  <th class="id">id</th>   
                  <th>Title</th>
                  <th width="27%">Meta Title</th>
                  <th width="27%">Meta Keyword</th>
                  <th>Status</th>
                  <th class="nosort">Actions</th>
                </tr>
              </thead>   
              <tbody>
            <?php for($i=0; $i<count($mycms); $i++)
                  {
                       if($mycms[$i]['Cms']['current_status'] == 'Publish')
                       {
                          $class = 'label label-success';
                       }
                       else
                       {
                          $class = 'label label-important';
                       }
                    ?>
                    <tr>
                        <td class="center_id"><?php echo $mycms[$i]['Cms']['cms_id'];?></td>
                        <td><?php echo $mycms[$i]['Cms']['cms_title'];?></td>
                        <td class="center"><?php echo $mycms[$i]['Cms']['cms_metatitle'];?></td>
                        <td class="center"><?php echo $mycms[$i]['Cms']['cms_metakeyword'];?></td>
                        <td class="center">
                             <span class="<?php echo $class; ?>"><?php echo $mycms[$i]['Cms']['current_status'];?></span>
                        </td>
                        <td class="center">
                           <a class="btn btn-info" href="<?php echo $this->webroot?>addcms/<?php echo $mycms[$i]['Cms']['cms_id'];?>">
                              <i class="icon-edit icon-white"></i> Edit                                            
                           </a> |
                           <a class="btn btn-info" target="_blank" href="<?php echo $this->webroot?>cmspage/<?php echo $mycms[$i]['Cms']['cms_alias']?>">
                              <i class="icon-edit icon-white"></i> Preview                                            
                           </a>
                           |
                           <a class="btn btn-info" href="javascript:void(0)" onclick="delete_cms_page(<?php echo $mycms[$i]['Cms']['cms_id'];?>)">
                              <i class="icon-edit icon-white"></i> Delete                                            
                           </a>
                        </td>
                       
                    </tr>
                 <?php
                  }
                  ?>
              </tbody>
          </table>            
       </div>
       <!-- content End -->
    </div>
    <!--/span end -->
			
</div>
<!--/row end-->
<script type="text/javascript">
    function delete_cms_page(cms_id){
        var url = "<?php echo $this->webroot?>cms/deletePage/"+cms_id;
        var cnf = confirm("Do you want to delete this page ?");
        if(cnf) {
            document.location = url;
        }
    }
</script>


