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
