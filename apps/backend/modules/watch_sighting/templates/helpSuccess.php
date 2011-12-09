<style type="text/css">


html {
    background-color: #e4e4e4;
    margin: 0px;
    padding: 0px;
    font:13px/1.231 arial,helvetica,clean,sans-serif;
}

ul {
    font-size: 14px;
    list-style-type: none;
    color: #222;
}

h1 {
    font-size: 20px;
    color: #5B8638;
    border-bottom: 1px solid #5B8638; 
}

h2 {
    padding-top: 10px;
    font-size: 16px;
    color: #5B8638;
}

</style>

<div class="help">
  <h1>Ajuda</h1>
	
	<h2>Códigos</h2>
	<ul>
	  <?php foreach($codes as $code): ?>
        <li><strong><?php echo $code->getAcronym() ?></strong> - <?php echo $code->getDescription() ?></li>
      <?php endforeach ?>
	</ul>
	
	<h2>Visibilidade</h2>
    <ul>
        <?php foreach($visibilities as $visibility): ?>
        <li><strong><?php echo $visibility->getCode() ?></strong> - <?php echo $visibility->getDescription() ?></li>
      <?php endforeach ?>
    </ul>
    
    <h2>Comportamento</h2>
    <ul>
      <?php foreach($behaviours as $behaviour): ?>
        <li><strong><?php echo $behaviour->getCode() ?></strong> - <?php echo $behaviour->getDescription() ?></li>
      <?php endforeach ?>
    </ul>
    
    <h2>Odontoceti</h2>
    <ul>
      <?php foreach($odontocetis as $odo): ?>
        <li><strong><?php echo $odo->getCode() ?></strong> - <?php echo $odo->getName() ?></li>
      <?php endforeach ?>
    </ul>
    
    <h2>Mysticeti</h2>
    <ul>
      <?php foreach($mysticetis as $mys): ?>
        <li><strong><?php echo $mys->getCode() ?></strong> - <?php echo $mys->getName() ?></li>
      <?php endforeach ?>
    </ul>
    
    <h2>Tartarugas</h2>
    <ul>
      <?php foreach($turtles as $tur): ?>
        <li><strong><?php echo $tur->getCode() ?></strong> - <?php echo $tur->getName() ?></li>
      <?php endforeach ?>
    </ul>
</div>