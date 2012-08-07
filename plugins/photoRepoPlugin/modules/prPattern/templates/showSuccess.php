<?php use_helper('I18N'); ?>

<h1><?php echo 'Padrão "'.$pattern.'"' ?></h1>


<div id="sf_admin_container">
  <div class="sf_admin_list">
    <table cellspacing="0" class="show_table">
      <tbody>
        <tr class="sf_admin_row odd">
          <th style="width: 130px;">Espécie:</th>
          <td><?php echo $pattern->getSpecie()->formattedString() ?></td>
        </tr>
        
        <tr class="sf_admin_row even">
          <th>Cauda:</th>
          <td>
            <table cellspacing="0" class="show_table">
              <tbody>
                <tr class="sf_admin_row even">
                  <th style="width: 70px;">Áreas:</th>
                  <td><?php echo $pattern->tailAreasToString() ?></td>
                </tr>
                <tr class="sf_admin_row odd">
                  <th style="width: 70px;">Padrão:</th>
                  <td>
                    <?php if( $pattern->getImageTail() ): ?>
                      <img class="uploaded_image" src="/uploads/pr_patterns/<?php echo $pattern->getImageTail() ?>"></img>
                    <?php endif; ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        
        <tr class="sf_admin_row odd">
          <th>Dorsal esquerda:</th>
          <td>
            <table cellspacing="0" class="show_table">
              <tbody>
                <tr class="sf_admin_row even">
                  <th style="width: 70px;">Áreas:</th>
                  <td><?php echo $pattern->dorsalLeftAreasToString() ?></td>
                </tr>
                <tr class="sf_admin_row odd">
                  <th style="width: 70px;">Padrão:</th>
                  <td>
                    <?php if( $pattern->getImageDorsalLeft() ): ?>
                      <img class="uploaded_image" src="/uploads/pr_patterns/<?php echo $pattern->getImageDorsalLeft() ?>"></img>
                    <?php endif; ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        
        <tr class="sf_admin_row odd">
          <th>Dorsal direita:</th>
          <td>
            <table cellspacing="0" class="show_table">
              <tbody>
                <tr class="sf_admin_row even">
                  <th style="width: 70px;">Áreas:</th>
                  <td><?php $pattern->dorsalRightAreasToString() ?></td>
                </tr>
                <tr class="sf_admin_row odd">
                  <th style="width: 70px;">Padrão:</th>
                  <td>
                    <?php if( $pattern->getImageDorsalRight() ): ?>
                      <img class="uploaded_image" src="/uploads/pr_patterns/<?php echo $pattern->getImageDorsalRight() ?>"></img>
                    <?php endif; ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        
      </tbody>
    </table>
    <ul class="sf_admin_actions">
      <li class="sf_admin_action_back"><a href="<?php echo url_for('@recognition_of_cetaceans_app') ?>">Painel de controlo</a></li>
      <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_pattern') ?>">Regressar à listagem</a></li>
      <li class="sf_admin_action_edit"><?php echo link_to('Editar', '@pr_pattern_edit?id='.$pattern->getId()) ?></li>
    </ul>
  </div>
  
</div>