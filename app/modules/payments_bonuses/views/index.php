<div class="row justify-content-md-center">
  <div class="col-md-8">
    <div class="page-header">
      <h1 class="page-title">
        <?php 
          if(get_role("admin")) {
        ?>
        <a href="<?=cn("$module/update")?>" class="ajaxModal"><span class="add-new" data-toggle="tooltip" data-placement="bottom" title="<?=lang("add_new")?>" data-original-title="Add new"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span></a> 
        <?php }?>
        <?php echo lang("payments_bonuses"); ?>
      </h1>
    </div>
  </div>
</div>

<div class="row justify-content-md-center" id="result_ajaxSearch">
  <?php if(!empty($payments_bonuses)){
  ?>
  <div class="col-md-8 col-xl-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          List
        </h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-vcenter card-table">
          <thead>
            <tr>
              <th class="w-1"><?=lang("No_")?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
              
              <?php
                if (get_role("admin")) {
              ?>
              <th><?=lang("Action")?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($payments_bonuses)) {
              $i = 0;
              foreach ($payments_bonuses as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->id?>">
              <td class="w-1"><?php echo$i; ?></td>
              <td style="width: 30%;"><strong><?php echo $this->model->get('name', PAYMENTS_METHOD,['id' => $row->payment_id])->name; ?></strong></td>
              <td style="width: 15%;"><?php echo $row->percentage; ?></td>
              <td style="width: 15%;"><?php echo $row->bonus_from; ?></td>
  
              <td style="width: 10%;">
                <label class="custom-switch">
                  <input type="checkbox" name="item_status" data-id="<?php echo $row->id; ?>" data-action="<?php echo cn($module.'/ajax_toggle_item_status/'); ?>" class="custom-switch-input ajaxToggleItemStatus" <?php if(!empty($row->status) && $row->status == 1) echo 'checked'; ?>>
                  <span class="custom-switch-indicator"></span>
                </label>
              </td>
              <td style="width: 15%;">
                <div class="btn-group">
                  <a href="<?=cn("$module/update/".$row->ids)?>" class="btn btn-icon ajaxModal" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang('edit'); ?>"><i class="fe fe-edit"></i></a>
                </div>
              </td>
            </tr>
            <?php }}?>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php }else{
    echo Modules::run("blocks/empty_data");
  }?>
</div>

<div class="row m-t-30" id="result_notification">

</div>