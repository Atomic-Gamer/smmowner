

<div class="row  justify-content-md-center" id="result_ajaxSearch">
  <?php if(!empty($payments)){
  ?>
  <div class="col-md-10 col-xl-10">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?php echo lang("payments_methods"); ?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-vcenter card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><?=lang("No_")?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
              
              <?php
                if (get_role("admin")) {
              ?>
              <th class="text-center"><?=lang("Action")?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($payments)) {
              $i = 0;
              foreach ($payments as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->id?>">
              <td class="text-center"><?php echo$i; ?></td>
              <td class="text-muted"> <?php echo $row->type?></td>
              <td style="width: 30%;"><strong><?php echo $row->name?></strong></td>
              <td  class="text-muted" style="width: 15%;"><?php echo $row->min; ?></td>
              <td class="text-muted" style="width: 15%;"><?php echo $row->max; ?></td>
              <td style="width: 10%;">
                <?php if(!empty($row->new_users) && $row->new_users == 1){?>
                  <span class="badge badge-info">Allowed</span>
                  <?php }else{?>
                  <span class="badge badge-warning">Not Allowed</span>
                <?php }?>
              </td>
              <td style="width: 10%;">
                <label class="custom-switch">
                  <input type="checkbox" name="item_status" data-id="<?php echo $row->id; ?>" data-action="<?php echo cn($module.'/ajax_toggle_item_status/'); ?>" class="custom-switch-input ajaxToggleItemStatus" <?php if(!empty($row->status) && $row->status == 1) echo 'checked'; ?>>
                  <span class="custom-switch-indicator"></span>
                </label>
              </td>
              <td class="text-center" style="width: 15%;">
                <div class="btn-group">
                  <a href="<?=cn("$module/update/".$row->id)?>" class="btn btn-icon ajaxModal" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fe fe-edit"></i></a>
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