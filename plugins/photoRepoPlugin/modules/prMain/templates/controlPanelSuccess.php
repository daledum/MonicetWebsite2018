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
          <?php /* ?>
          <tr class="sf_admin_row even">
            <td width="400">Fotografias processadas</td>
            <td width="50" style="text-align: right;"><?php echo $processedPhotos ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@homepage') ?></li>
              </ul>
            </td>
          </tr>
          <?php */ ?>
          <tr class="sf_admin_row odd">
            <td width="400">Indíviduos</td>
            <td width="50" style="text-align: right;"><?php echo $individuals ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@pr_individual') ?></li>
                <li class="sf_admin_action_new"><?php echo link_to('Adicionar', '@pr_individual_new') ?></li>
              </ul>
            </td>
          </tr>
          
          <tr class="sf_admin_row even">
            <td width="400">Espécies</td>
            <td width="50" style="text-align: right;"><?php echo $species ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <li class="sf_admin_action_list"><?php echo link_to('Listar', '@specie') ?></li>
                <li class="sf_admin_action_new"><?php echo link_to('Adicionar', '@specie_new') ?></li>
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