<?php if( count($OBPhotos) > 0 ): ?>
  <span class="previous"></span>
  <div class="wrapper">
    <ul>
      <?php foreach( $OBPhotos as $OBPhoto ): ?>
        <li>
          <img width="155" id="photo_<?php echo $OBPhoto->getId() ?>" src="<?php echo url_for( '/uploads/pr_repo_final/tn_165x150_'.$OBPhoto->getFileName() ) ?>" alt="<?php echo $OBPhoto->getFileName() ?>" title="<?php echo $OBPhoto->completeToString() ?>"/>
          <input class="checkbox_item" type="checkbox" id="checkbox_<?php echo $OBPhoto->getId() ?>" name="<?php echo $OBPhoto->getId() ?>"/>
          <?php if($OBPhoto->getIndividualId()): ?>
            <span style="font-size: 11px;"><?php echo $OBPhoto->getIndividual()->getName() ?></span>
          <?php endif; ?>

          <script>
            $(document).ready(function(){

              //alert($(this).attr('src'));
              $(<?php echo sprintf("'#photo_%s'", $OBPhoto->getId()) ?>).click(function(){
                //alert($(this)+'clicked');
                $("#identify_viewer_image2 img").attr('src', '/uploads/pr_repo_final/<?php echo $OBPhoto->getFileName(); ?>');
                $('#identify_viewer_image2 img').attr('title', '<?php echo $OBPhoto->getHtmlResume(); ?>');
                $("#associate_individual_link").attr('href', '<?php echo url_for('@pr_associate_individual_by_photo?id='.$observationPhoto->getId().'&individual_id='.$OBPhoto->getIndividualId()) ?>');
                $("#associate_individual_li").show();
              });
            });
          </script>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <span class="next"></span>
<?php else: ?>
  Nenhum registo foi devolvido para este filtro.
<?php endif; ?>
