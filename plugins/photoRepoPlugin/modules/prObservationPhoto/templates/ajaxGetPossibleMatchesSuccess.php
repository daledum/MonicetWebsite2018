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

                carouselImageClicked=true;

              <?php
              $message = 0;
              $bestPhotoMessage = 0;

                foreach( $OBPhoto->getIndividual()->getObservationPhotos() as $Photo ){
                  if( ($observationPhoto->getBodyPart() == $Photo->getBodyPart()) &&
                      ($observationPhoto->getPhotoDate() == $Photo->getPhotoDate()) ){
                      $message=1;
                      break;
                  }
                }
                 
                if( $observationPhoto->getIsBest() ){
                  if( $observationPhoto->getIndividual() ){
                    if( $observationPhoto->getIndividual()->countObservationPhotos() > 2 ){
                       $bestPhotoMessage = 1;
                    }
                  }
                }
                
              ?>
              sameDateAndBodyPartMessage = '<?php echo $message; ?>';
              isBestPhotoMessage = '<?php echo $bestPhotoMessage; ?>';
              
                $("#identify_viewer_image2 img").attr('src', 'http://monicet.net/uploads/pr_repo_final/<?php echo $OBPhoto->getFileName(); ?>');
                $("#identify_viewer_image2 img").attr('title', '<?php echo $OBPhoto->getHtmlResume(); ?>');
                $("#associate_individual_link").attr('href', '<?php echo url_for('@pr_associate_individual_by_photo?id='.$observationPhoto->getId().'&individual_id='.$OBPhoto->getIndividualId()) ?>');
                $("#associate_individual_li").show();

                $("#associate_individual_link").click(function(e) {
                  e.preventDefault();
                    var link = this;
                    var message = "#associate";
                    if( sameDateAndBodyPartMessage == '1' && isBestPhotoMessage == '1'){
                      message = "#sameBodyPartDateAndChooseNewBestPhoto";
                    }
                    else{
                       if( sameDateAndBodyPartMessage == '1' ){
                          message = "#associateIndividualSameBodyPartDate";
                       }
                       else{
                        if( isBestPhotoMessage == '1' ){
                            message = "#chooseNewBestPhotoForPreviousIndividual";
                        }
                       }
                    }

                      $(message).dialog({
                          buttons: {
                              "OK": function() {
                                  window.location = link.href;
                              },
                              "Cancel": function() {
                                  $(this).dialog("close");
                              }
                          }
                      });
                });
              });
            });
          </script>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <span class="next"></span>
  <div style="float: right; color:green; font-weight:bold; margin:3px 3px 3px 3px;">
    <span id="page_number">1</span>
    <script>

    var previous = 0;
    var next = 0;
    
    function calculateAndShowPageNumber(back, forward){

      var page_number = forward - back;
      
      if(page_number <= 0){
        previous = next = 0;
        page_number = 1;
      }
      else{
        page_number++;
      }
      $("#page_number").html(page_number);
    }

    $(".previous").click(function() {
      previous++;
      calculateAndShowPageNumber(previous, next);
    });

    $(".next").click(function() {
      next++;
      calculateAndShowPageNumber(previous, next);
    });

    </script>
    <?php echo "/ ".ceil(count($OBPhotos)/5);//this 5 depends on how many photos are displayed in one carousel strip, if that is changed, 5 needs to be changed, too ?>
  </div>
<?php else: ?>
  Nenhum registo foi devolvido para este filtro.
<?php endif; ?>
