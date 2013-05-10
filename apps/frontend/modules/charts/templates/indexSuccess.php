<div class="charts-container">
  <h2><?php echo __('% sightings on trips') ?></h2>
  <div class="back-to-home"><a href="<?php echo url_for('@homepage') ?>">« <?php echo __('Back to Home') ?></a></div>
  
  <!-- LANGUAGE -->
  <div id="_ul_languages" style="display: inline-block">
    <div style="float:left;"><?php echo link_to('Admin','/admin.php') ?></div>
    <?php if($sf_user->getCulture() == "pt"): ?> 
       <div id="_div_en_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=pt', 'sf_culture=en', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
    <?php else: ?>
       <div id="_div_pt_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=en', 'sf_culture=pt', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
    <?php endif ?>
  </div>
  
  <!-- MAP CONTAINER -->
  <div class="left-container">
    <div class="container-side container-left"></div>
    <div class="container-div">
        <div class="chart-container">
            <div class="left-sidebar">
                <h2><?php echo __('Chart Parameters'); ?></h2><br/>
                <div class="filter-item" style="margin-bottom: 10px;">
                    <label><?php echo __('Chart Type') ?>:</label>
                    <input type="radio" name="chart-type" value="1" checked="checked" /><span class="chart-totals"></span>
                    <input type="radio" name="chart-type" value="2" /><span class="chart-variations"></span>
                </div>
                <div class="filter-item">
                    <label><?php echo __('Period') ?>:</label>
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
                    <label><?php echo __('Select Species') ?>:</label>
                    <select id="selected-species" class="filter-select">
                        <option value="custom"><?php print __('Four most seen') ?></option>
                        <option value="all"><?php print __('Select All') ?></option>
                        <option value="none"><?php print __('Select None') ?></option>
                    </select>
                    <input type="hidden" id="select-all-toggle" value="custom" />
                </div>
                <div id="chart-loading"></div>
                <div class="chart-text bar-chart">
                    <?php print __('Percentage of trips in which the selected species were seen.'); ?>
                </div>
                <div class="chart-text line-chart" style="display: none;">
                    <?php print __('Monthly percentage of trips in which the selected species were seen.'); ?>
                </div>
                <div class="chart-text">
                    <?php print __('Cliking on the species name will omit it from the graph, or show it again.'); ?>
                </div>
            </div>
            <div id="chart-image" class="chart-image" style="width:580px;height:400px;margin:0 auto">
                <!--<img id="chart-img-elem" src="http://chart.apis.google.com/chart?chf=bg,s,EAF4F800&chxl=1:|Sb|Tt&chxp=1,10,20&chxr=0,0,160&chxt=x,y&chbh=a&chs=600x220&cht=bhs&chco=4D89F9&chds=0,170&chd=t:10,50,60,80,40,60,30,50&chtt=APUE" width="600" height="300" alt="APUE" />-->
            </div>
        </div>
        
    </div>
    <div class="container-side container-right"></div>
  </div>
</div>