
<?php use_helper('I18N')?>

<div id="sf_admin_container">
  <h1>Pesquisa de fotografias por processar</h1>

  <?php include_partial('prMain/flashes') ?>

  <div id="sf_admin_header"><?php //print_r($argumentos ) ?></div>
  <div id="sf_admin_content">
    <div class="sf_admin_form">
      <form method="post" action="<?php echo url_for('@pr_pendent_photos_list') ?>" enctype="multipart/form-data">

        <fieldset id="sf_fieldset_none">
          <div class="sf_admin_form_row sf_admin_text">
            <?php echo $form['date_type']->renderError() ?>
            <div>
              <?php echo $form['date_type']->renderLabel() ?>
              <?php echo $form['date_type']->render() ?>&nbsp;&nbsp;&nbsp;Desde <?php echo $form['date_from']->render() ?> até <?php echo $form['date_to']->render() ?>
            </div>
          </div>
          <div class="sf_admin_form_row sf_admin_text">
            <?php echo $form['photographer']->renderError() ?>
            <div>
              <?php echo $form['photographer']->renderLabel() ?>
              <?php echo $form['photographer']->render() ?>
            </div>
          </div>
          <div class="sf_admin_form_row sf_admin_text">
            <?php echo $form['sort']->renderError() ?>
            <div>
              <?php echo $form['sort']->renderLabel() ?>
              <?php echo $form['sort']->render() ?>
            </div>
          </div>
        </fieldset>
        <ul class="sf_admin_actions">
          <li class="sf_admin_action_back"><a href="<?php echo url_for('@recognition_of_cetaceans_app') ?>">Painel de controlo</a></li>
          <li class="sf_admin_action_back"><a href="<?php echo url_for('@pr_observation_photo') ?>">Fotografias para analisar</a></li>
          <li class="sf_admin_action_new"><?php echo link_to('Adicionar mais fotografias', '@pr_add_photos_bulk') ?></li>
          <li class="sf_admin_action_save"><input type="submit" value="Pesquisar" /></li>
          <?php if( count($invalidPhotos) ): ?>
            <li class="sf_admin_action_delete"><?php echo link_to('Apagar ficheiros inválidos', 'pr_pendent_invalid_photos_delete', array(), array( 'method' => 'post', 'confirm' => 'Tem a certeza que pretende remover os ficheiros inválidos?')) ?></li>
          <?php endif; ?>
        </ul>
      </form>
    </div>
  </div>
</div>

<?php if( count($invalidPhotos) ): ?>
  <br/>
  <?php if( count($invalidPhotos) ): ?>
    <h1><?php echo format_number_choice('[1] Existe 1 Resultado inválido.|(1,+Inf] Existem %num% resultados inválidos', array('%num%' => count($invalidPhotos)), count($invalidPhotos), 'messages')?></h1>
  <?php endif; ?>
  <div id="sf_admin_container">
    <?php if( count($invalidPhotos) ): ?>
      <div class="sf_admin_list" id="sf_admin_content">
        <table cellspacing="0">
          <thead>
            <tr>
              <th width="300">Fotografia</th>
              <th width="300">Motivo</th>
              <th>Acções</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach( $invalidPhotos as $cont =>$file_info ): ?>
              <tr class="sf_admin_row <?php echo fmod($cont, 2)? 'odd': 'even' ?>">
                <td style="text-align: left;"><?php echo $file_info['file'] ?></td>
                <td style="text-align: left;"><?php echo $file_info['motive'] ?></td>
                <td>
                    <ul class="sf_admin_td_actions">
                      <?php 
                        $file_parts = explode('.', $file_info['file']);
                        $lastIndex = count($file_parts)-1;
                        $extension = $file_parts[$lastIndex];
                        unset($file_parts[$lastIndex]);
                        $filename = implode('.', $file_parts);
                      ?>
                      <li class="sf_admin_action_delete"><?php echo link_to('Apagar', 'pr_pendent_photo_delete', array('filename' => $filename, 'extension' =>$extension), array('method' => 'post', 'confirm' => 'Tem a certeza que pretende remover definitivamente o ficheiro "'.$file_info['file'].'"?')) ?></li>
                    </ul>
                  </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>

<?php if(isset($resultados)): ?>
  <br/>
  <?php if( count($resultados) ): ?>
    <h1><?php echo format_number_choice('[1] 1 Resultado|(1,+Inf] %num% Resultados', array('%num%' => count($resultados)), count($resultados), 'messages')?></h1>
  <?php endif; ?>
  <div id="sf_admin_container">
    <?php  ?><form id="batch_form" action="" method="post"><?php  ?>
      <?php if( count($resultados) ): ?>
        <div class="sf_admin_list" id="sf_admin_content">
          <table cellspacing="0">
            <thead>
              <tr>
                <th width="25" id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
                <th width="300">
                  <?php $ph = $sf_request->getParameterHolder()->get('find_pendent_photos') ?>
                  <?php if($ph['date_type'] == 'shoot' || (strlen($ph['photographer']) && $ph['date_type'] == 'no_date' ) ): ?>
                    <?php echo image_tag('/mfAdministracaoPlugin/images/icons/'.$ph['sort'].'.png', array('alt' => __($ph['sort'], array(), 'sf_admin'), 'title' => __($ph['sort'], array(), 'sf_admin'))) ?>
                  <?php endif; ?>
                  Fotografia
                </th>
                <th width="100">
                  <?php if($ph['date_type'] == 'upload'): ?>
                    <?php $iconName = ($ph['sort'] == 'asc')? 'desc' :'asc'; ?>
                    <?php echo image_tag('/mfAdministracaoPlugin/images/icons/'.$iconName.'.png', array('alt' => __($ph['sort'], array(), 'sf_admin'), 'title' => __($ph['sort'], array(), 'sf_admin'))) ?>
                  <?php endif; ?>
                  Data de upload
                </th>
                <th>Acções</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach( $resultados as $cont => $file ): ?>
                <tr class="sf_admin_row <?php echo fmod($cont, 2)? 'odd': 'even' ?>">
                  <td>
                    <input type="checkbox" name="filenames[]" value="<?php echo $file ?>" class="sf_admin_batch_checkbox" />
                  </td>
                  <td style="text-align: left;"><?php echo $file ?></td>
                  <?php $fileAddress = sfConfig::get('sf_upload_dir').'/pr_repo/'.$file; ?>
                  <td><?php echo date("Y-m-d", filemtime( $fileAddress)) ?></td>
                  <td>
                    <ul class="sf_admin_td_actions">
                      <li class="sf_admin_action_show"><?php echo link_to('Ver fotografia', '/uploads/pr_repo/'.$file, array('target' => '_blank', 'class' => 'preview') ) ?></li>
                      <li class="sf_admin_action_action"><?php echo link_to('Processar', '@pr_observation_photo_new?file='.$file) ?></li>
                      <li class="sf_admin_action_delete"><?php echo link_to('Apagar', 'pr_pendent_photo_delete', array('filename' => substr($file, 0, -4), 'extension' =>substr($file, -3)), array('method' => 'post', 'confirm' => 'Tem a certeza que pretende remover definitivamente o ficheiro "'.$file.'"?')) ?></li>
                    </ul>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>

          </table>
        </div>
      
        <ul class="sf_admin_actions">
          <li class="sf_admin_batch_actions_choice">
            <select name="batch_action" id="action_selector">
              <option value=""><?php echo __('Choose an action', array(), 'sf_admin') ?></option>
              <option value="<?php echo url_for('pr_delete_pendent_photos_bulk') ?>"><?php echo __('Delete', array(), 'sf_admin') ?></option>
            </select>
            <input type="hidden" name="_csrf_token" value="66544fe3da12ab90f07df556c988a6e8">
            <input type="submit" value="<?php echo __('Go', array(), 'sf_admin') ?>" />
          </li>
        </ul>
      </form>        
    <?php else: ?>
      <div class="error">Não foram encontrados resultados com os critérios fornecidos</div>
    <?php endif; ?>
  </div>
<?php endif; ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#action_selector').change(function(){
      $('#batch_form').attr('action', $('#action_selector').val());
    });
  });
  /* <![CDATA[ */
  function checkAll()
  {
    var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
  }
  /* ]]> */
</script>