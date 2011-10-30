<div id="sf_admin_container">
    <h1>Dados da saída de <?php echo $watch_info->getDate('Y-m-d'); ?></h1>
    
    <div class="sf_admin_list">
        <table style="border:1px solid #ccc;" border="1">
            <thead>
                <tr>
		            <th class="sf_admin_text">Código</th>
		            <th class="sf_admin_text">Hora</th>
		            <th class="sf_admin_text">Vis.</th>
		            <th class="sf_admin_text">Espécie</th>
		            <th class="sf_admin_text">Grupo</th>
		            <th class="sf_admin_text">Total</th>
		            <th class="sf_admin_text">Comp.</th>
		            <th class="sf_admin_text">Dir.</th>
		            <th class="sf_admin_text">Horizontal</th>
		            <th class="sf_admin_text">Vertical</th>
		            <th class="sf_admin_text">Embarcação</th>
		            <th class="sf_admin_text">Comentários</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($sightings as $x => $sighting): ?>
                  <tr class="sf_admin_row odd">
                    <td class="sf_admin_text record_code"><?php echo $sighting->getWatchCode(); ?></td>
                    <td class="sf_admin_text hour"><?php echo $sighting->getTime(); ?></td>
                    <td class="sf_admin_text visibility"><?php if($visibility = $sighting->getWatchVisibility()) echo $visibility->getDescription(); ?></td>
                    <td class="sf_admin_text specie"><?php echo $sighting->getSpecie(); ?></td>
                    <td class="sf_admin_text group"><?php echo $sighting->getGroup(); ?></td>
                    <td class="sf_admin_text total"><?php echo $sighting->getTotal(); ?></td>
                    <td class="sf_admin_text behaviour"><?php if($behaviour = $sighting->getWatchBehaviour()) echo $behaviour->getDescription(); ?></td>
                    <td class="sf_admin_text direction"><?php if($direction = $sighting->getDirection()) echo $direction->getDescription(); ?></td>
                    <td class="sf_admin_text horizontal"><?php echo $sighting->getHorizontal(); ?></td>
                    <td class="sf_admin_text vertical"><?php echo $sighting->getVertical(); ?></td>
                    <td class="sf_admin_text vessel"><?php if($vessel = $sighting->getVessel()) echo $vessel->getDescription(); ?></td>
                    <td class="sf_admin_text comments"><?php echo $sighting->getComments(); ?></td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
        </table>
    </div>
    <ul class="sf_admin_actions">
        <li class="sf_admin_action_list">
            <a href="<?php echo url_for('@general_info_gi_list') ?>">Regressar à listagem de saídas</a>
        </li>
    </ul>
</div>