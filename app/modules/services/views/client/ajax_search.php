<?php if (!empty($services)) {
?>
<div class="col-md-12 col-xl-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?=(isset($cate_name)) ? $cate_name : lang("Lists")?></h3>
      <div class="card-options">
        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
      </div>
    </div>
    <?php if (!empty($services)) {
      $j = 1;
    ?>
    <div class="table-responsive">
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
                  if (isset($custom_rates[$row->id]) ) {
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
    </div>
    <?php }?>
  </div>
</div>
<?php }else{
  echo Modules::run("blocks/empty_data");
}?>
