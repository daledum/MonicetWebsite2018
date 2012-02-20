<?php use_helper('I18N'); ?>

<h1><?php echo 'Individuo "'.$individual.'"' ?></h1>

<?php $languages = array('pt' => 'Português', 'en' => 'Inglês') ?>

<div id="sf_admin_container">
  <div class="sf_admin_list">
    <table cellspacing="0" class="show_table">
      <tbody>
        <tr class="sf_admin_row odd">
          <th style="width: 100px;">Nome:</th>
          <td><?php echo $individual->getName() ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Espécie:</th>
          <td><?php echo $individual->getSpecie() ?></td>
        </tr>
        
        <tr class="sf_admin_row odd">
          <th>Descrição 1:</th>
          <td>
            <table cellspacing="0" class="show_table">
              <tbody>
                <?php foreach( $languages as $langCode => $language ): ?>
                <tr class="sf_admin_row even">
                  <th style="width: 80px;"><?php echo $language ?>:</th>
                  <td><?php echo nl2br($individual->getDescription1($langCode)) ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </td>
        </tr>
        
        <tr class="sf_admin_row odd">
          <th>Descrição 2:</th>
          <td>
            <table cellspacing="0" class="show_table">
              <tbody>
                <?php foreach( $languages as $langCode => $language ): ?>
                <tr class="sf_admin_row even">
                  <th style="width: 80px;"><?php echo $language ?>:</th>
                  <td><?php echo nl2br($individual->getDescription2($langCode)) ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </td>
        </tr>
        
        <tr class="sf_admin_row odd">
          <th>Notas:</th>
          <td>
            <table cellspacing="0" class="show_table">
              <tbody>
                <?php foreach( $languages as $langCode => $language ): ?>
                <tr class="sf_admin_row even">
                  <th style="width: 80px;"><?php echo $language ?>:</th>
                  <td><?php echo nl2br($individual->getNotes($langCode)) ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </td>
        </tr>
        
      </tbody>
    </table>

    <ul class="sf_admin_actions">
      <li class="sf_admin_action_back"><a href="<?php echo url_for('@recognition_of_cetaceans_app') ?>">Painel de controlo</a></li>
      <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_individual') ?>">Regressar à listagem</a></li>
      <li class="sf_admin_action_edit"><?php echo link_to('Editar', '@pr_individual_edit?id='.$individual->getId()) ?></li>
    </ul>
  </div>
</div>