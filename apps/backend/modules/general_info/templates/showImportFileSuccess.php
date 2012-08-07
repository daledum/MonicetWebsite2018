<?php use_helper('I18N')?>

<div id="sf_admin_container">
  <h1>Ficheiro carregado para importação</h1>

  <?php include_partial('general_info/flashes') ?>

  <div id="sf_admin_header"></div>
  <div class="sf_admin_list" id="sf_admin_content">
    <table cellspacing="0">
      <thead>
        <tr>
          <th width="150">Ficheiro (renomeado)</th>
          <th width="50">Válido</th>
          <th>Acções</th>
        </tr>
      </thead>
      <tbody>
        <tr class="sf_admin_row odd">
            <td><?php echo $filename ?></td>
            <td><?php echo ($valido)? $img_valida: $img_invalida ?></td>
            <td>
              <ul class="sf_admin_td_actions">
                <?php if($valido): ?>
                  <li class="sf_admin_action_import"><?php echo link_to('Importar conteúdo do ficheiro', 'general_info_load_import_file', array(), array('method' => 'post', 'confirm' => 'Tem a certeza que pretende carregar o conteúdo do ficheiro para a base de dados?')) ?></li>
                <?php else: ?>
                  <li class="sf_admin_action_reload"><?php echo link_to('Recarregar ficheiro', 'general_info_collection', array('action' => 'upload')) ?></li>
                <?php endif; ?>
              </ul>
            </td>
          </tr>
      </tbody>
    </table>
  </div>
  
  <?php if(!$valido): ?>
    <br/>
    <h1>Listagem de erros</h1>
    <div class="sf_admin_list" id="sf_admin_content">
      <table cellspacing="0">
        <thead>
          <tr>
            <th width="50">Linha</th>
            <th width="50">Coluna</th>
            <th>Erro</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $validation_log as $cont => $log ): ?>
            <tr class="sf_admin_row <?php echo fmod($cont, 2)? 'odd': 'even' ?>">
              <td><?php echo $log['line'] ?></td>
              <td><?php echo $log['column'] ?></td>
              <td><?php echo $log['error'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
  
</div>
