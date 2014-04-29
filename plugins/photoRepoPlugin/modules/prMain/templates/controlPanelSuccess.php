<?php use_helper('I18N')?>

<h1>Reconhecimento de cetáceos</h1>
<div class="paineis_de_controlo" id="sf_admin_container">
  
  <?php include_partial('prMain/flashes') ?>
    
  <div class="painel_controlo">
    <h2>Painel de controlo</h2>
    <div class="sf_admin_list conteudo_painel_controlo">

      <table cellspacing="0">
        <tbody>
          <tr class="sf_admin_row even">
            <td width="400">Fotografias enviadas pelos utilizadores</td>
            <td width="50" style="text-align: right;"><?php echo $uploadPhotosNotProccessed.' de '.$uploadPhotos ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@pr_uploaded_photo') ?></li>
              </ul>
            </td>
          </tr>
          
          <tr class="sf_admin_row odd">
            <td width="400">Fotografias por processar</td>
            <td width="50" style="text-align: right;"><?php echo $notProcessedPhotos ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@pr_pendent_photos_list') ?></li>
                <li class="sf_admin_action_new"><?php echo link_to('Adicionar', '@pr_add_photos_bulk') ?></li>
              </ul>
            </td>
          </tr>
          
          <tr class="sf_admin_row even">
            <td width="400">Fotografias por analisar</td>
            <td width="50" style="text-align: right;"><?php echo $notValidated ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@pr_observation_photo') ?></li>
              </ul>
            </td>
          </tr>
          
          <tr class="sf_admin_row odd">
            <td width="400">Catálogo</td>
            <td width="50" style="text-align: right;"><?php echo $validated ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@pr_observation_photo?template=catalog') ?></li>
                <li class="sf_admin_action_action"><?php echo link_to('Exportar catálogo', '@pr_observation_photo_export') ?></li>
              </ul>
            </td>
          </tr>
          
          <tr class="sf_admin_row even">
            <td width="400">Individuos</td>
            <td width="50" style="text-align: right;"><?php echo $individuals ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@pr_individual') ?></li>
              </ul>
            </td>
          </tr>
          <?php /* ?>
          <tr class="sf_admin_row odd">
            <td width="400">Espécies</td>
            <td width="50" style="text-align: right;"><?php echo $species ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@specie') ?></li>
                <li class="sf_admin_action_new"><?php echo link_to('Adicionar', '@specie_new') ?></li>
              </ul>
            </td>
          </tr>
          
          <tr class="sf_admin_row even">
            <td width="400">Companhias</td>
            <td width="50" style="text-align: right;"><?php echo $num_companies ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@company') ?></li>
                <li class="sf_admin_action_new"><?php echo link_to('Adicionar', '@company_new') ?></li>
              </ul>
            </td>
          </tr>
          
          <tr class="sf_admin_row odd">
            <td width="400">Barcos</td>
            <td width="50" style="text-align: right;"><?php echo $num_vessels ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@vessel') ?></li>
                <li class="sf_admin_action_new"><?php echo link_to('Adicionar', '@vessel_new') ?></li>
              </ul>
            </td>
          </tr>
          <?php */ ?>
          <tr class="sf_admin_row odd">
            <td width="400">Fotógrafos</td>
            <td width="50" style="text-align: right;"><?php echo $num_photographers ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@pr_photographer') ?></li>
                <li class="sf_admin_action_new"><?php echo link_to('Adicionar', '@pr_photographer_new') ?></li>
              </ul>
            </td>
          </tr>
          
          <tr class="sf_admin_row even">
            <td width="400">Partes do corpo</td>
            <td width="50" style="text-align: right;"><?php echo $num_body_parts ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@pr_body_part') ?></li>
                <li class="sf_admin_action_new"><?php echo link_to('Adicionar', '@pr_body_part_new') ?></li>
              </ul>
            </td>
          </tr>
          
          <tr class="sf_admin_row odd">
            <td width="400">Padrões</td>
            <td width="50" style="text-align: right;"><?php echo $patterns ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@pr_pattern') ?></li>
                <li class="sf_admin_action_new"><?php echo link_to('Adicionar', '@pr_pattern_new') ?></li>
              </ul>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>