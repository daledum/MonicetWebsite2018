<?php 
  $urlArgs = array(
      'specie_id' => isset($formSubmitedValues['specie_id'])? $formSubmitedValues['specie_id']: '',
      'island' => isset($formSubmitedValues['island'])? $formSubmitedValues['island']: '',
      'photographer_id' => isset($formSubmitedValues['photographer_id'])? $formSubmitedValues['photographer_id']: '',
      'company_id' => isset($formSubmitedValues['company_id'])? $formSubmitedValues['company_id']: '',
      'photo_date' => array(
          'from' => isset($formSubmitedValues['photo_date']['from'])? $formSubmitedValues['photo_date']['from']: '',
          'to' => isset($formSubmitedValues['photo_date']['to'])? $formSubmitedValues['photo_date']['to']: ''
      )
  );
  $urlArgsStr = '';
  foreach ($urlArgs as $key => $value) {
    $urlArgsStr .= '&catalog_filter['.$key.']='.$value;
    if( $key == 'photo_date') {
      $urlArgsStr .= '&catalog_filter['.$key.'][from]='.$value['from'];
      $urlArgsStr .= '&catalog_filter['.$key.'][to]='.$value['to'];
    }
  }
?>

<div class="left-sidebar">
    <div class="left-sidebar-title"><h2><?php echo __('Observations catalog', null, 'catalog'); ?></h2></div>
    <form id="catalog-filter-form" method="get">
      <?php include_partial('prCatalog/filters', array(
          'pr_frontend_filter' => $pr_frontend_filter
      )); ?>
    </form>
</div>

<div class="right-content">
  <?php //print_r($results) ?>
  <div class="photos-list">
    <?php if( $pager->getNbResults() > 0 ): ?>
      <?php foreach($pager->getResults() as $individual): ?>
        <?php $bestPhoto = $individual->getBestObservationPhoto() ?>
        <div class="photo-list-item">
          <a href="<?php echo url_for('@pr_catalog_individual?id='.$individual->getId(). $urlArgsStr) ?>">
            <?php if(file_exists(sfConfig::get('sf_upload_dir').'/pr_repo_final/tn_130x120_'.$bestPhoto->getFileName()) ): ?>
              <img width="130" height="120" src="<?php echo url_for( '/uploads/pr_repo_final/tn_130x120_'.$bestPhoto->getFileName() ) ?>" title="<?php echo $individual->countValidObservationPhotos().' '.__('Sighting(s)', null, 'catalog') ?>" />
            <?php endif; ?>
            <div class="photo-description"><?php echo $individual->getName() ?> </div>
          </a>
        </div>
        
      <?php endforeach; ?>
    <?php else: ?>
      Não existem observações para os critérios seleccionados.
    <?php endif; ?>
  </div>

  <?php  if( $pager->haveToPaginate() ): ?>
    <p class="_p_news_pages_navigation">
    <?php echo link_to('&laquo; ' . __('first'), 'prCatalog/index?page=' . $pager->getFirstPage() . $urlArgsStr) ?>&nbsp;&nbsp;&nbsp;
    <?php echo link_to('&lt;', 'prCatalog/index?page='.$pager->getPreviousPage() . $urlArgsStr) ?>&nbsp;
    <?php $links = $pager->getLinks(); foreach ($links as $page): ?>
      <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'prCatalog/index?page=' . $page . $urlArgsStr) ?>
      <?php if ($page != $pager->getCurrentMaxLink()): ?> | <?php endif ?>
    <?php endforeach ?>
    &nbsp;<?php echo link_to('&gt;', 'prCatalog/index?page='.$pager->getNextPage() . $urlArgsStr) ?>&nbsp;&nbsp;&nbsp;
    <?php echo link_to(__('last') . ' &raquo;', 'prCatalog/index?page='.$pager->getLastPage() . $urlArgsStr) ?>
    </p>
  <?php endif ?>
  
</div>





