<div id="sf_admin_container">
  <h1 style="text-align: left;">Saídas e avistamentos</h1>
  
  <!-- CHART CONTAINER -->
  <div class="left-container">
    <div class="container-side container-left"></div>
    <div class="container-div">
        <div class="chart-container">
            <div class="left-sidebar">
                <h2>Parâmetros do gráfico</h2><br/>
                <div class="filter-item">
                    <label>Período:</label>
                    <select id="year" class="filter-select">
                    <?php foreach(range($lastYear, $firstYear) as $year): ?>
                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-item">
                    <label>Tipo de gráfico:</label>
                    <select id="chart-type" class="filter-select">
                        <option value="0">Percentagens</option>
                        <option value="1">Médias</option>
                    </select>
                </div>
                <?php if ($sf_user->isSuperAdmin()): ?>
                <div class="filter-item">
                    <label>Empresa:</label>
                    <select id="company_id" class="filter-select">
                        <option value="0">(Todas)</option>
                        <?php foreach ($companies as $company): ?>
                            <option value="<?php print $company->getId() ?>"><?php print $company->getName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>
                <div class="filter-item">
                    <label><?php echo __('Select Results', null, 'charts') ?>:</label>
                    <select id="selected-results" class="filter-select">
                        <option value="custom"><?php print __('Four highest', null, 'charts') ?></option>
                        <option value="all" selected="selected"><?php print __('Select All', null, 'charts') ?></option>
                        <option value="none"><?php print __('Select None', null, 'charts') ?></option>
                    </select>
                    <input type="hidden" id="select-all-toggle" value="all" />
                </div>
                <div id="chart-loading"></div>
            </div>
            <div id="chart-image" class="chart-image" style="width:580px;height:400px;margin:0 auto">
                <!--<img id="chart-img-elem" src="http://chart.apis.google.com/chart?chf=bg,s,EAF4F800&chxl=1:|Sb|Tt&chxp=1,10,20&chxr=0,0,160&chxt=x,y&chbh=a&chs=600x220&cht=bhs&chco=4D89F9&chds=0,170&chd=t:10,50,60,80,40,60,30,50&chtt=APUE" width="600" height="300" alt="APUE" />-->
            </div>
        </div>
        
    </div>
    <div class="container-side container-right"></div>
  </div>
</div>