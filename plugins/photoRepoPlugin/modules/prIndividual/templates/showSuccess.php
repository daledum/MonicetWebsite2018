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
        
        <?php
        //order the photos according to body part
        $body_parts = array();
        $keys = array();
        $photos = array();
        $body_part_lines = array();
        $newLineElemPos = array();

        foreach ($fotografias as $key => $fotografia) {
            $body_parts[$key] = $fotografia->getBodyPartId();
        }

        asort($body_parts);
        $keys = array_keys($body_parts);
        
        foreach($keys as $key){
          $photos[] = $fotografias[$key];
        }

        //calculate the number of lines required per body part
        $no_photos = count($photos);
        if( $no_photos > 1){//at least 2 photos
          $j = 0;
            for($i=1; $i <= $no_photos-2; $i++){
              if( $photos[$i]->getBodyPartId() != $photos[$i-1]->getBodyPartId() ){
                $body_part_lines[ $photos[$i-1]->getBodyPartId() ] = ceil( ($i-$j)/5 );
                $j = $i;
              }
            }
          
          //special consideration for the last element, $photos[$no_photos-1]
            //a) record the body part Id and no of lines for the second to last photo
            $body_part_lines[ $photos[$no_photos-2]->getBodyPartId() ] = ceil( (($no_photos-1)-$j)/5 );//here $j has the last recorded value from the for above
            //b) record the body part Id and no of lines for the last photo, in case it has a different body part than the second to last photo
            if ( $photos[$no_photos-1]->getBodyPartId() != $photos[$no_photos-2]->getBodyPartId() ) {
              $body_part_lines[ $photos[$no_photos-1]->getBodyPartId() ] = 1; //one photo, one line
            }
            else{//this means the second to last photo and the last photo share the same body part...
                if( (($no_photos-1)-$j) % 5 == 0 ){//and before the last photo there were a multiple of 5 photos with the same body part as the last photo
                  $body_part_lines[ $photos[$no_photos-2]->getBodyPartId() ]++;//add an extra line for the last photo
                }
            }
            
          //store keys of photo elements where a new line is required
          $j = 0;
            for($i=1; $i < $no_photos; $i++){

              if( $photos[$i]->getBodyPartId() != $photos[$i-1]->getBodyPartId() ){//if the body part of a photo is not the same as the body part of the previous photo
                $newLineElemPos[]= $i;
                $j = 0;
              }
              else{
                $j++;
                if ($j % 5 == 0) {//allow a maximum of 5 photos per line
                  $newLineElemPos[]= $i;
                  $j = 0;
                }
              }
            }
        }
        elseif( $no_photos == 1){
             $body_part_lines[ $photos[0]->getBodyPartId() ] = 1;//one line for the single photo
        }//else: works fine as it is with 0 photos, even though it can't be 0, because when the last photo of an individual has been deleted/re-associated, the individual was deleted)
        
        $positions = array_keys($photos);
        $row = 'even';
        ?>
        <tr class="sf_admin_row even">
          <th>Parte do corpo:
          <br>
          <br>
          <form id="dominant_body_part_form">
          <?php foreach ($body_part_lines as $body_part_Id => $body_part_line): ?>
          <div style="height:<?php echo $body_part_line*185; ?>px;">
          <?php $exploded_description = array();
                $body_part = BodyPartPeer::retrieveByPK($body_part_Id);
                $description = $body_part->getDescription('pt');
                $exploded_description = explode(" ", $description);
                foreach($exploded_description as $one_line_description){
                  echo $one_line_description."<br>";
                }
          ?>
          <input type="radio"
                 name="dominant_body_part"
                 value="<?php echo $body_part_Id; ?>"
                 onclick="changeDominant('<?php echo $individual->getId(); ?>', '<?php echo $body_part->getCode(); ?>' )"
                 <?php if( $individual->getDominantBodyPartCode() === $body_part->getCode() ): ?>checked<?php endif; ?>
          >
          </div>
          <?php endforeach; ?>
          </form>
          </th>
          <td>
            Fotografias:
            <table cellspacing="0" class="show_table" style="width: auto;">
              <tbody>
                  <tr class="sf_admin_row even">
                      <?php foreach($positions as $position): ?>
                        <?php if( in_array($position, $newLineElemPos) ): ?>
                            </tr>
                            <tr class="sf_admin_row <?php $row = ($row == 'even')? 'odd': 'even'; echo $row; ?>">
                        <?php endif;?>
                      <?php if(isset($photos[$position])): ?>
                        <td width="170" <?php if( $photos[$position]->getStatus() != ObservationPhoto::V_SIGLA ): ?>style="background-color:LightCoral;"<?php endif;?> >
                          <a target="blank" href="<?php echo url_for('/uploads/pr_repo_final/'.$photos[$position]->getFileName()) ?>">
                            <img width="165" id ="<?php echo $photos[$position]->getFileName() ?>" src="/uploads/pr_repo_final/tn_165x150_<?php echo $photos[$position]->getFileName() ?>" alt="<?php echo $photos[$position]->getFileName() ?>" class="<?php echo $photos[$position]->getIsBest()? 'best': 'not_best' ?>"/>
                          </a>
                          <?php if($photos[$position]->getIsBest()): ?>
                             <h1>A melhor</h1>
                          <?php else: ?>
                            <?php echo link_to('Marcar como "A Melhor"', '@pr_define_as_best?id='.$photos[$position]->getId(), array('method' => 'post', 'confirm' => 'Tem a certeza que pretende definir esta fotografia como "A melhor"?')) ?>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </tr>
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
<script>

  function changeDominant(individual_id, body_part_code){
            $.ajax({
                type: "POST",
                url: window.location.protocol + '//' + window.location.host+'/admin.php/ajax/individuo/dominant',
                data: {
                  individual_id: individual_id,
                  body_part_code: body_part_code
                },
                async: false,
                success: function(msg) {
                    alert('A parte de corpo específica deste indivíduo foi modificada na base de dados');
                  }
            });
  }

</script>