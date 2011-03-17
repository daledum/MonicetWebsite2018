<?php use_helper('I18N', 'Date') ?>

<?php slot('gmap') ?>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
<script type="text/javascript">
  
  
  
  /*
   * inicializa o javascript com a abertura da página
   */
  $(function(){
    initialize('time');
  });
  
  
  
</script>

<style type="text/css">

  /* Estilos da pagina */

  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #pg { height: 90% }
  #bd { height: 100% }
  .ct { height: 100% }
  .map-container{
    height: 100%;
  }
  #mapcontainer{
    float: left; 
    height: 60%;
    width: 100%;
  }
  #timelinecontainer{ 
    float: left;
    height: 40%;
    width: 100%; 
  }
  #map { 
    height: 100%;
    width: 100%;
    float: left;
  }
  #timeline{
    height: 100%;
    width: 100%;
    float: left;
  }
  #dv{
    height: 15px;
  }

/* Estilos no mapa */

.title-w{
  font-size: 16px;
  font-weight: bold;
}

.text-w{
  font-size: 12px;
  display: inline-block;
}

.show{
  background: transparent url('/images/backend/icons_gmaps/buttons/show.png') no-repeat left top;
}

.hide{
  background: transparent url('/images/backend/icons_gmaps/buttons/hide.png') no-repeat left top;
}

.remove{
  background: transparent url('/images/backend/icons_gmaps/buttons/remove.png') no-repeat left top;
}

.hide, .show, .remove, .icon {
  padding: 10px;
  margin-left: 6px;
  padding: 4px 12px;
}

.icon{
  margin-left: 0;
  padding: 4px 8px;
}

.left-side-bar{
  height: 90%;
  width: 60%;
  float: left;
  margin: 20px 0px;
}



/* SIDEBAR */

.right-side-bar{
  width: 300px;
  height: 90%;
  float: left;
  margin: 20px 3% 20px 3%;
  background-color: #FFFFFF;
}
.right-side-bar-inner{
  border: 1px solid silver;
  height: 100%;
  padding: 20px;
  position: inherit;
}
.top-container{
  height: 70%;
}
#pesquisa{
  width: 90% !important;
  padding: 5px 2%;
  margin: 15px 2%;
  border: 2px solid silver !important;
}
#pesquisa-select{
  width: 95% !important;
  padding: 5px 2%;
  margin: 15px 2%;
  border: 2px solid silver !important;
}
#item-list{
  margin-top: 5px;
}

.specie-name{
  width: 160px;
  display: inline-block;
  text-align: left;
}

/* FILTROS */

.bottom-container{
  height: 27%;
  border-top: 1px solid silver;
  padding: 10px 5px;
}

.bottom-container h2{
  margin-left: 5px;
  font-size: 16px;
  margin-bottom: 10px;
  font-style: italic;
  font-weight: bold;
}

.filter-item{
  display: inline-block;
}

.filter-item label{
  width: 84px !important;
  margin-top: 4px;
  font-size: 11px;
}

.filter-item select{
  width: 175px;
  font-size: 11px;
}

.specie-count{
  display: inline-block;
  width: 30px;
  text-align: center;
}
/* FILTROS */

/* SIDEBAR */ 
</style>


<?php end_slot() ?>

<div id="sf_admin_container" class="map-container">
  <div class="left-side-bar">
    <div id="timelinecontainer">
      <div id="timeline"></div>
    </div>
    <div id="mapcontainer">
      <div id="map"></div>
    </div>
  </div>
  <div class="right-side-bar">
    <div class="top-container">
      <select id="pesquisa-select">
        <option></option>
        <?php foreach($speciesList as $specie): ?>
          <option value="<?php echo $specie->getId() ?>"><?php echo $specie->getCode() ?> - <?php echo $specie->getName() ?></option>
        <?php endforeach; ?>
      </select>
      <div id="item-list"></div>
    </div>
    <div class="bottom-container">
      <h2>Filtros:</h2>
      <div class="filter-item">
        <?php if($sf_user->isSuperAdmin()): ?>
        <label>Empresa:</label>
        <select id="company" class="filter-select">
          <option></option>
            <?php foreach($companies as $company): ?>
              <option value="<?php echo $company->getId(); ?>"><?php echo $company->getName(); ?></option>
            <?php endforeach; ?>
        </select>
        <?php endif; ?>
      </div>
      <div class="filter-item">
        <label>Associação:</label>
        <select id="association" class="filter-select">
          <option></option>
          <?php foreach($associations as $association): ?>
            <option value="<?php echo $association->getId(); ?>"><?php echo $association->getDescription(); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-item">
        <label>Comportamento:</label>
        <select id="behaviour" class="filter-select">
          <option></option>
          <?php foreach($behaviours as $behaviour): ?>
            <option value="<?php echo $behaviour->getId(); ?>"><?php echo $behaviour->getDescription(); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-item">
        <label>Estado do Mar:</label>
        <select id="sea-state" class="filter-select">
          <option></option>
          <?php foreach($sea_states as $sea_state): ?>
            <option value="<?php echo $sea_state->getId(); ?>"><?php echo $sea_state->getDescription(); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-item">
        <label>Visibilidade:</label>
        <select id="visibility" class="filter-select">
          <option></option>
          <?php foreach($visibilities as $visibility): ?>
            <option value="<?php echo $visibility->getId(); ?>"><?php echo $visibility->getDescription(); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-item">
        <label>Layers:</label>
        <input id="layers-toggle" type="checkbox">
      </div>
    </div>
  </div>
</div>
