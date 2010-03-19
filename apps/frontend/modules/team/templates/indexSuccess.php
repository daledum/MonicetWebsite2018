<p class="content"><?php echo __('The project is based on a consortium between 3 whale-watching companies and the regional research center CIRN, with the support of external consultants. The expansion of the team to include other companies and researchers is planned and is seen as essential to reach the goal of building a truly regional and long-term database.'); ?></p>
<br />
<h3><?php echo __('Consorcium') ?></h3>
<ul class="content">
    <?php foreach($consorcium_elements as $element): ?>
    <li><?php echo link_to($element->getName(), 'consorcium', $element) ?></li>
    <?php endforeach ?>
</ul>
<div>
	<div class="local-researchers">
		<h3><?php echo __('Local researchers:'); ?></h3>
		<ul class="content">
		    <?php foreach($local_researchers as $lr): ?>
		    <li><?php echo link_to($lr->getName(), 'team', $lr) ?></li>
		    <?php endforeach ?>
		</ul>
	</div>
	<div class="consultants">
		<h3><?php echo __('Consultants'); ?></h3>
		
		<ul class="content">
		    <?php foreach($consultants as $c): ?>
		    <li><?php echo link_to($c->getName(), 'team', $c) ?></li>
		    <?php endforeach ?>
		</ul>
	</div>
</div>