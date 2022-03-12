<div class="table-responsive">
  <?php if (!empty($services)) {
  ?>
  <table class="table table-hover table-bordered table-outline table-vcenter card-table">
    <thead>
      <tr>
        <th class="text-center w-1">
          <div class="custom-controls-stacked">
            <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input check-all" data-name="chk_<?=$cate_id?>">
              <span class="custom-control-label"></span>
            </label>
          </div>
        </th>
        <th class="text-center w-1">ID</th>
        <th><?php echo lang("Name"); ?></th>
        <?php if (!empty($columns)) {
          foreach ($columns as $key => $row) {
        ?>
        <th class="text-center"><?=$row?></th>
        <?php }}?>
        <th><?=lang("Action")?></th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($services)) {
        $i = 0;
        foreach ($services as $key => $row) {
        $i++;
      ?>
      <tr class="tr_<?=$row->ids?>">
        <th class="text-center w-1">
          <div class="custom-controls-stacked">
            <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input chk_<?=$cate_id?>"  name="ids[]" value="<?=$row->ids?>">
              <span class="custom-control-label"></span>
            </label>
          </div>
        </th>
        <td class="text-center text-muted"><?=$row->id?></td>
        <td>
          <div class="title"> <?=$row->name?> </div>
        </td>
        <td style="width: 10%;">
          <div class="title">
            <?php
              if (!empty($row->add_type && $row->add_type == "api")) {
                echo truncate_string($row->api_name, 13);
              }else{
                echo lang('Manual');
              }
            ?>
          </div>
          <div class="text-muted small">
            <?=(!empty($row->api_service_id))? $row->api_service_id: ""?>
          </div>
        </td>
        <td class="text-center" style="width: 8%;">
          <div>
            <?php echo (double)$row->price; ?>
          </div>
          <?php 
            if (isset($row->original_price)) {
              if ($row->original_price > $row->price) {
                $text_color = "text-danger";
              }else{
                $text_color = "text-muted";
              }
              echo '<small class="'.$text_color.'">'.(double)$row->original_price.'</small>';
            }
          ?>
        </td>
        <td class="text-center" style="width: 8%;"><?=$row->min?> / <?=$row->max?></td>
        <td style="width: 6%;">
          <button class="btn btn-info btn-sm" type="button" class="dash-btn" data-toggle="modal" data-target="#<?php echo 'service-'.$row->id; ?>"><?=lang("Details")?></button>
          <div id="<?php echo 'service-'.$row->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <?php
              $this->load->view('descriptions', ['service' => $row]);
            ?>
          </div>
        </td>
        <td class="w-1 text-center">
          <?php if(!empty($row->dripfeed) && $row->dripfeed == 1){?>
            <span class="badge badge-info"><?=lang("Active")?></span>
            <?php }else{?>
            <span class="badge badge-warning"><?=lang("Deactive")?></span>
          <?php }?>
        </td>
        <td class="w-1 text-center">
          <label class="custom-switch">
            <input type="checkbox" name="item_status" data-id="<?php echo $row->id; ?>" data-action="<?php echo cn($module.'/ajax_toggle_item_status/'); ?>" class="custom-switch-input ajaxToggleItemStatus" <?php if(!empty($row->status) && $row->status == 1) echo 'checked'; ?>>
            <span class="custom-switch-indicator"></span>
          </label>
        </td>  
        <td class="text-center"  style="width: 5%;">
          <div class="item-action dropdown">
            <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
            <div class="dropdown-menu">
              <a href="<?=cn("$module/update/".$row->ids)?>" class="dropdown-item ajaxModal"><i class="dropdown-icon fe fe-edit"></i> <?=lang('Edit')?> </a>
              <a href="<?=cn("$module/ajax_delete_item/".$row->ids)?>" class="dropdown-item ajaxDeleteItem"><i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?> </a>
            </div>
          </div>
        </td>
      </tr>
      <?php }}?>
      
    </tbody>
  </table>
  <?php } ?>
</div>