<div id="sf_admin_container">
    <h1>Dados da saída de <?php echo $general_info->getDate('Y-m-d'); ?></h1>
    
    <div class="sf_admin_list">
        <table style="border:1px solid #ccc;" border="1">
            <thead>
                <tr>
                    <th class="sf_admin_text">Código</th>
                    <th class="sf_admin_text">Hora</th>
                    <th class="sf_admin_text">Latitude</th>
                    <th class="sf_admin_text">Longitude</th>
                    <th class="sf_admin_text">Est.Mar</th>
                    <th class="sf_admin_text">Visib.</th>
                    <th class="sf_admin_text">Espécie</th>
                    <th class="sf_admin_text">Total</th>
                    <th class="sf_admin_text">A</th>
                    <th class="sf_admin_text">J</th>
                    <th class="sf_admin_text">C</th>
                    <th class="sf_admin_text">Comp.</th>
                    <th class="sf_admin_text">Asso.</th>
                    <th class="sf_admin_text">Nº Emb.</th>
                    <th class="sf_admin_text">Comentários</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($records as $x => $record): ?>
                  <?php $sighting = $record->getSightings(); ?>
                  <?php $sighting = $sighting[0]; ?>
                  <tr class="sf_admin_row odd">
                    <td class="sf_admin_text record_code"><?php echo $record->getCode(); ?></td>
                    <td class="sf_admin_text hour"><?php echo $record->getTime(); ?></td>
                    <td class="sf_admin_text latitude"><?php echo $record->getLatitude(); ?></td>
                    <td class="sf_admin_text longitude"><?php echo $record->getLongitude(); ?></td>
                    <td class="sf_admin_text sea_state"><?php if($description = $record->getSeaState()) echo $description->getDescription(); ?></td>
                    <td class="sf_admin_text visibility"><?php if($visibility = $record->getVisibility()) echo $visibility->getDescription(); ?></td>
                    <td class="sf_admin_text specie"><?php echo $sighting->getSpecie(); ?></td>
                    <td class="sf_admin_text total"><?php echo $sighting->getTotal(); ?></td>
                    <td class="sf_admin_text adults"><?php echo $sighting->getAdults(); ?></td>
                    <td class="sf_admin_text juveniles"><?php echo $sighting->getJuveniles(); ?></td>
                    <td class="sf_admin_text calves"><?php echo $sighting->getCalves(); ?></td>
                    <td class="sf_admin_text behaviour"><?php if($behaviour = $sighting->getBehaviour()) echo $behaviour->getDescription(); ?></td>
                    <td class="sf_admin_text association"><?php if($association = $sighting->getAssociation()) echo $association->getDescription(); ?></td>
                    <td class="sf_admin_text num_vessels"><?php echo $record->getNumVessels(); ?></td>
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