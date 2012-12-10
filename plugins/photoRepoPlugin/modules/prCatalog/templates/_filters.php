<?php slot('filter_links') ?>
  | <a href="javascript:history.go(-1)"><?php echo __('Back to previous page', null, 'frontend') ?></a>
  | <a href="<?php echo url_for('@pr_catalog') ?>"><?php echo __('Clean filter', null, 'frontend') ?></a>
<?php end_slot() ?>


<div class="filter-item">
    <label class="catalog_label"><?php echo __('Specie', null, 'catalog'); ?>:</label>
    <?php echo $pr_frontend_filter['specie_id']->render() ?>
</div>
<div class="filter-item">
    <label class="catalog_label"><?php echo __('Period (Sigthings)', null, 'catalog'); ?>:</label>
    <div id="date-range-box">
      <?php echo $pr_frontend_filter['photo_date']->render() ?>
    </div>
</div>
<div class="filter-item">
    <label class="catalog_label"><?php echo __('Island', null, 'catalog'); ?>:</label>
    <?php echo $pr_frontend_filter['island']->render() ?>
</div>
<div class="filter-item">
    <label class="catalog_label"><?php echo __('Photographer', null, 'catalog'); ?>:</label>
    <?php echo $pr_frontend_filter['photographer_id']->render() ?>
</div>
<div class="filter-item">
    <label class="catalog_label"><?php echo __('Company', null, 'catalog'); ?>:</label>
    <?php echo $pr_frontend_filter['company_id']->render() ?>
</div>
