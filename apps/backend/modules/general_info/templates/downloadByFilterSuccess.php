<table>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4">Position /EFF</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="9">Sighting</td>
    <td colspan="6">Inf. Geral</td>
  </tr>
  <tr>
    <td rowspan="2">Data</td>
    
    <td rowspan="2">Cod.</td>
    <td rowspan="2">Hora</td>
    <td rowspan="2">Latitude</td>
    <td rowspan="2">Longitude</td>
    
    <td rowspan="2">Vis.</td>
    <td rowspan="2">Est. Mar</td>
    
    <td rowspan="2">Sp.</td>
    <td rowspan="2">Total</td>
    <td rowspan="2">A</td>
    <td rowspan="2">J</td>
    <td rowspan="2">C</td>
    <td rowspan="2">Comp</td>
    <td rowspan="2">Asso</td>
    <td rowspan="2">Num. Emb.</td>
    <td rowspan="2">Comentários</td>
    
    <td rowspan="2">Empresa</td>
    <td rowspan="2">Barco</td>
    <td rowspan="2">Skipper</td>
    <td rowspan="2">Biologist</td>
    <td rowspan="2">Passg</td>
    <td rowspan="2">Dist. Percorrida</td>
  </tr>
  <tr></tr>
  <?php foreach($dataQS->find() as $gi): ?>
    <?php $records = RecordPeer::doSelectRecordsByGeneralInfoId($gi->getId()); ?>
    <?php foreach($records as $cont => $record): ?>
      <?php 
        // buscar sighting correspondente
        $sighting = SightingPeer::retrieveByRecordId($record->getId());

        // buscar especie
        $specie = '';
        if($sighting->getSpecieId()){
          $specie = $sighting->getSpecie()->getCode();
        }

        // buscar associacao
        $association = '';
        if($sighting->getAssociationId()){
          $association = $sighting->getAssociation()->getCode();
        }
      
      ?>
      <tr>
        <td><?php if( $cont == 0 ): ?><?php echo $gi->getDate() ?><?php else: ?>&nbsp;<?php endif; ?></td>
        <td><?php echo $record->getCode()->getAcronym() ?></td>
        <td><?php echo $record->getTime() ?></td>
        <td><?php echo $record->getLatitude() ?></td>
        <td><?php echo $record->getLongitude() ?></td>
        <td><?php ?></td>
        <td><?php ?></td>
      </tr>
    <?php endforeach; ?>
  <?php endforeach; ?>
</table>
