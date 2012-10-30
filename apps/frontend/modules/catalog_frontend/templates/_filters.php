<div class="filter-item">
    <label><?php echo __('Species'); ?>:</label>
    <select id="species" class="filter-select">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
</div>
<div class="filter-item">
    <label><?php echo __('Period'); ?>:</label>
    <select id="year" class="filter-select">
    <?php foreach(range($lastYear, $firstYear) as $year): ?>
        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
    <?php endforeach; ?>
    </select>
    <select id="month" class="filter-select">
        <option value="0">(<?php echo __('All'); ?>)</option>
        <?php foreach($months as $monthId => $monthName): ?>
        <option value="<?php echo $monthId; ?>"><?php echo __($monthName); ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="filter-item">
    <label><?php echo __('Island'); ?>:</label>
    <select id="island" class="filter-select">
        <option value="0">(<?php echo __('All'); ?>)</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
</div>
<div class="filter-item">
    <label><?php echo __('Photographer'); ?>:</label>
    <select id="photographer" class="filter-select">
        <option value="0">(<?php echo __('All'); ?>)</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
</div>
<div class="filter-item">
    <label><?php echo __('Company'); ?>:</label>
    <select id="company" class="filter-select">
        <option value="0">(<?php echo __('All'); ?>)</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
</div>
