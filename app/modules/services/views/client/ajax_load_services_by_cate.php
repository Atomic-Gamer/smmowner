<div class="table-responsive">
  <?php if (!empty($services)) {
  ?>
  <table class="table table-hover table-bordered table-outline table-vcenter card-table">
    <thead>
      <tr>
        
        <th class="text-center w-1">ID</th>
        <th><?php echo lang("Name"); ?></th>
        <?php if (!empty($columns)) {
          foreach ($columns as $key => $row) {
        ?>
        <th class="text-center"><?=$row?></th>
        <?php }}?>
        
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($services)) {
        $i = 0;
        foreach ($services as $key => $row) {
        $i++;
      ?>
      <tr class="tr_<?php echo $row->id ; ?>">
        <td class="text-center text-muted"><?=$row->id?></td>
        <td>
          <div class="title"> <?=$row->name?> </div>
        </td>
        <td class="text-center" style="width: 8%;">
          <div>
            <?php
              $service_price = $row->price;
              if (isset($custom_rates[$row->id])) {
                $service_price = $custom_rates[$row->id]['service_price'];
              }
            ?>
            <?php echo (double)$service_price; ?>
          </div>
        </td>
        <td class="text-center" style="width: 8%;"><?=$row->min?> / <?=$row->max?></td>
        <td style="width: 6%;">
          <button class="btn btn-info btn-sm" type="button" class="dash-btn" data-toggle="modal" data-target="#service-<?php echo $row->id; ?>"><?=lang("Details")?></button>
          <div id="<?php echo 'service-' . $row->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <?php
              $this->load->view('descriptions', ['service' => $row]);
            ?>
          </div>
        </td>
      </tr>
      <?php }}?>
      
    </tbody>
  </table>
  <?php } ?>
</div>

