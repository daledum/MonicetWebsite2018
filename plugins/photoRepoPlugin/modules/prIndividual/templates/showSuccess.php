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
          <td><?php echo $individual->getSpecie()->getCode() ?> - <?php echo $individual->getSpecie()->getName('pt') ?></td>
        </tr>
        
        <?php foreach( $languages as $langCode => $language ): ?>
          <tr class="sf_admin_row odd">
            <td><?php echo $language ?>:</td>
            <td>
              <table cellspacing="0" class="show_table">
                <tbody>
                  <tr class="sf_admin_row odd">
                    <th style="width: 100px;">Descrição 1:</th>
                    <td><?php echo nl2br($individual->getDescription1($langCode)) ?></td>
                  </tr>
                  <tr class="sf_admin_row even">
                    <th style="width: 100px;">Descrição 2:</th>
                    <td><?php echo nl2br($individual->getDescription2($langCode)) ?></td>
                  </tr>
                  <tr class="sf_admin_row odd">
                    <th style="width: 100px;">Notas:</th>
                    <td><?php echo nl2br($individual->getNotes($langCode)) ?></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        <?php endforeach; ?>
        
        <tr class="sf_admin_row even">
          <th>Fotografias:</th>
          <td>
            <table cellspacing="0" class="show_table" style="width: 880px;">
              <tbody>
                <?php $position = 0;?>
                <?php for( $line = 0; $line <= ($numFotografias/5); $line++ ): ?>
                  <tr class="sf_admin_row <?php echo fmod($position, 2)? 'odd': 'even'; ?>">
                    <?php for( $col = 0; $col <= 4; $col++ ): ?>
                      <?php $position = $line*5+$col;?>
                      <td width="170">
                        <?php if(isset($fotografias[$position])): ?>
                          <a target="blank" href="<?php echo url_for('/uploads/pr_repo_final/'.$fotografias[$position]->getFileName()) ?>">
                            <img width="165" id ="<?php echo $fotografias[$position]->getFileName() ?>" src="/uploads/pr_repo_final/tn_165x150_<?php echo $fotografias[$position]->getFileName() ?>" alt="<?php echo $fotografias[$position]->getFileName() ?>" class="<?php echo $fotografias[$position]->getIsBest()? 'best': 'not_best' ?>"/>
                          </a>
                          <?php if($fotografias[$position]->getIsBest()): ?>
                            A melhor
                          <?php else: ?>
                            <?php echo link_to('Marcar como "A Melhor"', '@pr_define_as_best?id='.$fotografias[$position]->getId(), array('method' => 'post', 'confirm' => 'Tem a certeza que pretende definir esta fotografia como "A melhor"?')) ?>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                    <?php endfor; ?>
                  </tr>
                <?php endfor; ?>
              </tbody>
            </table>
          </td>
        </tr>
        
      </tbody>
    </table>

    <ul class="sf_admin_actions">
      <?php
        //get all the photos without individuals and a "characterized" (displayed "para identificar" on the page) status
        $c = new Criteria();
        $c->addAnd(ObservationPhotoPeer::INDIVIDUAL_ID, NULL, Criteria::EQUAL);
        $c->addAnd(ObservationPhotoPeer::STATUS, ObservationPhoto::C_SIGLA, Criteria::EQUAL);
        $OBPhotos = ObservationPhotoPeer::doSelect($c);

        //find the one with the biggest id (the most recent photo)
          if($OBPhotos){
            $maxId = $OBPhotos[0];
            for($i = 1; $i < count($OBPhotos); $i++){
              if ($OBPhotos[$i]->getId() > $maxId) {
                $maxId = $OBPhotos[$i]->getId();
                $key = $i;
              }
            }
            $nextOBPhoto = $OBPhotos[$key];
          }
      ?>
      <?php if($nextOBPhoto): ?>
      <li class="sf_admin_action_right"><a href="<?php echo url_for('@pr_observation_photo_identify?id='.$nextOBPhoto->getId()) ?>">A foto seguinte para identificar</a></li>
      <?php endif; ?>
      <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_pendent_photos_list') ?>">Fotografias por processar</a></li>
      <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo?do=clean') ?>">Fotografias por analisar</a></li>
      <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo_validated') ?>">Catálogo</a></li>
      <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_individual') ?>">Listagem de individuos</a></li>
      <li class="sf_admin_action_showmap">
        <a href="<?php
                  $path_individual = url_for( '@pr_catalog_individual?id='.$individual->getId() );
                  $admin_position =  stripos($path_individual, 'admin');
                  echo substr_replace ($path_individual , 'index' , $admin_position, $admin_position + 4);
                ?>">Ver em Mapa
        </a>
      </li>
      <li class="sf_admin_action_edit"><?php echo link_to('Editar', '@pr_individual_edit?id='.$individual->getId()) ?></li>
    </ul>
  </div>
</div>