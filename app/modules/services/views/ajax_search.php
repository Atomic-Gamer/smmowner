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
    <?php
      $data = array(
        "module"     => $module,
        "columns"    => $columns,
        "services"   => $services,
        "cate_id"    => 1,
      );
      $this->load->view('ajax_load_services_by_cate', $data);
    ?>
  </div>
</div>
<?php }else{
  echo Modules::run("blocks/empty_data");
}?>
