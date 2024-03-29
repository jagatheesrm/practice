<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper" class="customer_profile">
   <div class="content">
      <div class="row">
         <div class="col-md-12">
            <?php if(isset($restaurant_details) && (!has_permission('customers','','view') && is_customer_admin($restaurant_details[0]['restaurant_id']))){?>
            <div class="alert alert-info">
               <?php echo _l('customer_admin_login_as_client_message',get_staff_full_name(get_staff_user_id())); ?>
            </div>
            <?php } ?>
         </div>
   
         <div class="btn-bottom-toolbar btn-toolbar-container-out text-right">
            <button class="btn btn-info only-save customer-form-submiter">
            <?php echo _l( 'submit'); ?>
            </button>
            <?php if(!isset($restaurant_details)){ ?>
            <button class="btn btn-info save-and-add-contact customer-form-submiter">
            <?php echo _l( 'save_customer_and_add_contact'); ?>
            </button>
            <?php } ?>
         </div>

         <?php if(isset($restaurant_details[0]['restaurant_id'])){ ?>
         <div class="col-md-3">
            <div class="panel_s mbot5">
               <div class="panel-body padding-10">
                  <h4 class="medium">
                     #<?php echo $restaurant_details[0]['restaurant_id'] . ' ' . $restaurant_details[0]['business_name']; ?>
                     <?php if(has_permission('customers','','delete') || is_admin()){ ?>
                     <div class="btn-group">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                           <?php if(is_admin()){ ?>
                           <li>
                              <a href="<?php echo admin_url('clients/login_as_client/'.$client->userid); ?>" target="_blank">
                              <i class="fa fa-share-square-o"></i> <?php echo _l('login_as_client'); ?>
                              </a>
                           </li>
                           <?php } ?>
                           <?php if(has_permission('customers','','delete')){ ?>
                           <li>
                              <a href="<?php echo admin_url('clients/delete/'.$client->userid); ?>" class="text-danger delete-text _delete"><i class="fa fa-remove"></i> <?php echo _l('delete'); ?>
                              </a>
                           </li>
                           <?php } ?>
                        </ul>
                     </div>
                     <?php } ?>
                  </h4>
               </div>
            </div>
            <?php $this->load->view('admin/restaurant/restaurant_tabs'); ?>
         </div>
         <?php } ?>
         <div class="col-md-<?php if(isset($restaurant_details[0]['restaurant_id'])){echo 9;} else {echo 12;} ?>">
            <div class="panel_s">
               <div class="panel-body">
                  <?php if(isset($restaurant_details)){ ?>
                  <?php echo form_hidden('isedit'); ?>
                  <?php echo form_hidden('userid', $restaurant_details[0]['restaurant_id']); ?>
                  <div class="clearfix"></div>
                  <?php } ?>
                  <div>
                     <div class="tab-content">
                           <?php $this->load->view((isset($tab) ? $tab['view'] : 'admin/clients/groups/profile')); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php if($group == 'profile'){ ?>
         <div class="btn-bottom-pusher"></div>
      <?php } ?>
   </div>
</div>
<?php init_tail(); ?>
<?php if(isset($restaurant_details)){ ?>
<script>
   $(function(){
      init_rel_tasks_table(<?php echo $restaurant_details[0]['restaurant_id']; ?>,'customer');
   });
</script>
<?php } ?>
<?php $this->load->view('admin/clients/client_js'); ?>
</body>
</html>
