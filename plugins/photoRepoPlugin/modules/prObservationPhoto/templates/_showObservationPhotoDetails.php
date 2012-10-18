<div id="sf_admin_container" style="min-height: 270px;">
  <div class="sf_admin_list">
    <table cellspacing="0" class="show_table">
      <tbody>
        <tr class="sf_admin_row odd">
          <th width="150">Código:</th>
          <td><?php echo $observationPhoto->getCode() ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Data do disparo:</th>
          <td><?php echo $observationPhoto->getPhotoDate('Y-m-d') ?></td>
        </tr>
        <tr class="sf_admin_row odd">
          <th>Hora do disparo:</th>
          <td><?php echo $observationPhoto->getPhotoTime('H:i') ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Carregada em:</th>
          <td><?php echo $observationPhoto->getUploadedAt('Y-m-d') ?></td>
        </tr>
        <tr class="sf_admin_row odd">
          <th>Estado:</th>
          <td><?php echo ObservationPhoto::getValueForSiglaStatus($observationPhoto->getStatus()) ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Última actualização por:</th>
          <td><?php echo $observationPhoto->getLastEditedBy()? $observationPhoto->getsfGuardUserRelatedByLastEditedBy(): '' ?></td>
        </tr>
        <tr class="sf_admin_row odd">
          <th>Validado por:</th>
          <td><?php echo $observationPhoto->getValidatedBy()? $observationPhoto->getsfGuardUserRelatedByValidatedBy(): '' ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Indivíduo:</th>
          <td><?php echo $observationPhoto->getIndividualId()? $observationPhoto->getIndividual(): '' ?></td>
        </tr>
        <tr class="sf_admin_row odd">
          <th>Espécie:</th>
          <td><?php echo $observationPhoto->getSpecieId()? $observationPhoto->getSpecie()->getCode().' - '.$observationPhoto->getSpecie()->getName('pt'): '' ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Ilha:</th>
          <td><?php echo $observationPhoto->getIsland() ?></td>
        </tr>
        <tr class="sf_admin_row odd">
          <th>Parte do corpo:</th>
          <td><?php echo $observationPhoto->getBodyPartId()? $observationPhoto->getBodyPart()->getCode().' - '. $observationPhoto->getBodyPart()->getDescription('pt'): '' ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Sexo:</th>
          <td><?php echo $observationPhoto->getGender() ?></td>
        </tr>
        <tr class="sf_admin_row odd">
          <th>Grupo etário:</th>
          <td><?php echo age_group::getValueForSigla($observationPhoto->getAgeGroup()) ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Comportamento:</th>
          <td><?php echo $observationPhoto->getbehaviourId()? $observationPhoto->getBehaviour()->getCode().' - '.$observationPhoto->getBehaviour()->getDescription('pt'): '' ?></td>
        </tr>
        <tr class="sf_admin_row odd">
          <th>Latitude:</th>
          <td><?php echo $observationPhoto->getLatitude() ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Longitude:</th>
          <td><?php echo $observationPhoto->getLongitude() ?></td>
        </tr>
        <tr class="sf_admin_row odd">
          <th>Companhia:</th>
          <td><?php echo $observationPhoto->getCompanyId()? $observationPhoto->getCompany()->getRecCetCode().' - '. $observationPhoto->getCompany(): '' ?></td>
        <tr class="sf_admin_row even">
          <th>Embarcação:</th>
          <td><?php echo $observationPhoto->getVesselId()? $observationPhoto->getVessel()->getRecCetCode().' - '. $observationPhoto->getVessel()->getName(): '' ?></td>
        </tr>
        <tr class="sf_admin_row odd">
          <th>Fotógrafo:</th>
          <td><?php echo $observationPhoto->getPhotographerId()? $observationPhoto->getPhotographer()->getCode().' - '. $observationPhoto->getPhotographer()->getName(): '' ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Tipo de fotografia:</th>
          <td><?php echo kind_of_photo::getValueForSigla($observationPhoto->getKindOfPhoto()) ?></td>
        </tr>
        <tr class="sf_admin_row odd">
          <th>Qualidade da fotografia:</th>
          <td><?php echo photo_quality::getValueForSigla($observationPhoto->getPhotoQuality()) ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Avistamento:</th>
          <td><?php echo $observationPhoto->getSightingId()? $observationPhoto->getSighting(): '' ?></td>
        </tr>
        <tr class="sf_admin_row odd">
          <th>Melhor fotografia:</th>
          <td><?php echo $observationPhoto->getIsBest()? 'Sim': 'Não' ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Notas:</th>
          <td><?php echo nl2br($observationPhoto->getNotes()) ?></td>
        </tr>
      </tbody>
    </table>  
    <br/>
    
    <h1>Legenda e comentários - PT</h1>
    <table cellspacing="0" class="show_table">
      <tbody>
        <tr class="sf_admin_row odd">
          <th width="150">Legenda:</th>
          <td><?php echo $observationPhoto->getLegend('pt') ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Comentários:</th>
          <td><?php echo nl2br($observationPhoto->getComments('pt')) ?></td>
        </tr>
      </tbody>
    </table>
    <br/>
    
    <h1>Legenda e comentários - EN</h1>
    <table cellspacing="0" class="show_table">
      <tbody>
        <tr class="sf_admin_row odd">
          <th width="150">Legenda:</th>
          <td><?php echo $observationPhoto->getLegend('en') ?></td>
        </tr>
        <tr class="sf_admin_row even">
          <th>Comentários:</th>
          <td><?php echo nl2br($observationPhoto->getComments('en')) ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>