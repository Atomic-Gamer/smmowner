
<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($payments_bonus->ids))? $payments_bonus->ids: '';
          if ($ids != "") {
            $url = cn($module."/ajax_update/$ids");
          }else{
            $url = cn($module."/ajax_update");
          }
        ?>
        <form class="form actionForm" action="<?=$url?>" data-redirect="<?=cn($module)?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fa fa-edit"></i> <?php echo lang("add_bonus"); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">

                <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="form-group">
                    <label>Payment Method</label>
                    <select name="editbonus[method]" class="form-control square">
                      <?php
                        if ($payments) {
                          foreach ($payments as $key => $payment) {
                      ?>
                      <option value="<?php echo $payment->id; ?>" <?=(!empty($payments_bonus->status) && $payments_bonus->payment_id == $payment->id)? 'selected': ''?>><?php echo $payment->name; ?></option>
                      <?php }}else{?>
                      <option value="0"><?php echo lang("no_payment_option"); ?></option>
                      <?php }?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label><?php echo lang("bonus_from"); ?></label>
                    <input type="text" class="form-control square" name="editbonus[bonus_from]" value="<?=(!empty($payments_bonus->bonus_from))? $payments_bonus->bonus_from: 0 ?>"  min="0" step="0.01" aria-required="true">
                  </div>
                  
                  <div class="form-group">
                    <label><?php echo lang("bonus_percentage"); ?></label>
                    <select name="editbonus[percentage]" class="form-control square">
                      <?php
                        for ($i = 1; $i <= 100 ; $i++) { 
                      ?>
                      <option value="<?php echo $i; ?>" <?=(!empty($payments_bonus->percentage) && $payments_bonus->percentage == $i)? 'selected': ''?>><?php echo $i; ?>%</option>
                      <?php } ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label><?=lang("Status")?></label>
                    <select name="editbonus[status]" class="form-control square">
                      <option value="1" <?=(!empty($payments_bonus->status) && $payments_bonus->status == 1)? 'selected': ''?>><?=lang("Active")?></option>
                      <option value="0" <?=(isset($payments_bonus->status) && $payments_bonus->status != 1)? 'selected': ''?>><?=lang("Deactive")?></option>
                    </select>
                  </div>

                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?=lang("Submit")?></button>
            <button type="button" class="btn round btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><?=lang("Cancel")?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
