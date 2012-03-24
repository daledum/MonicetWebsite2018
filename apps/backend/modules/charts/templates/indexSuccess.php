<div id="sf_admin_container">
  <h1 style="text-align: left;">% avistamentos nas saídas</h1>
  
  <!-- CHART CONTAINER -->
  <div class="left-container">
    <div class="container-side container-left"></div>
    <div class="container-div">
        <div class="chart-container">
            <div class="left-sidebar">
                <h2>Parâmetros do gráfico</h2><br/>
                <form id="iframe_info" name="iframe_info" action="<?php echo url_for('charts/to_iframe'); ?>" method="post">
                <div class="filter-item" style="margin-bottom: 10px;">
                    <label>Tipo de gráfico:</label>
                    <input type="radio" id="chart-type" name="chart-type" value="1" checked="checked" /><span class="chart-totals"></span>
                    <input type="radio" id="chart-type" name="chart-type" value="2" /><span class="chart-variations"></span>
                </div>
                <div class="filter-item">
                    <label>Período:</label>
                    <select id="year" name="year" class="filter-select">
                    <?php foreach(range($lastYear, $firstYear) as $year): ?>
                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php endforeach; ?>
                    </select>
                    <select id="month" name="month" class="filter-select">
                        <option value="0">(<?php echo __('All'); ?>)</option>
                        <?php foreach($months as $monthId => $monthName): ?>
                        <option value="<?php echo $monthId; ?>"><?php echo __($monthName); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-item">
                    <label><?php echo __('Select Species', null, 'charts') ?>:</label>
                    <select id="selected-species" name="selected-species" class="filter-select">
                        <option value="custom"><?php print __('Four most seen', null, 'charts') ?></option>
                        <option value="all"><?php print __('Select All', null, 'charts') ?></option>
                        <option value="none"><?php print __('Select None', null, 'charts') ?></option>
                    </select>
                </div>
                <input type="hidden" id="select-all-toggle" name="select-all-toggle" value="all" />
                <input type="hidden" id="graph_type" name="graph_type" value="apue" />
                <div class="filter-item">
                    <input type="submit" value="<?php echo __('Save to iframe', null, 'charts') ?>" />
                </div>
                </form>
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