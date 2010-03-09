<p class="content"><?php echo __('The project is based on a consortium between 3 whale-watching companies and the regional research center CIRN, with the support of external consultants. The expansion of the team to include other companies and researchers is planned and is seen as essential to reach the goal of building a truly regional and long-term database.'); ?></p>
<br />
<h3><?php echo __('Consorcium') ?></h3>
<ul class="content">
    <?php foreach($consorcium_elements as $element): ?>
    <li><?php echo link_to($element->getName(), 'consorcium', $element) ?></li>
    <?php endforeach ?>
</ul>
<br />
<h3><?php echo __('Local researchers:'); ?></h3>
<ul class="content">
    <?php foreach($local_researchers as $lr): ?>
    <li><?php echo link_to($lr->getName(), 'team', $lr) ?></li>
    <?php endforeach ?>
</ul>
<br />
<h3><?php echo __('Consultants'); ?></h3>

<ul class="content">
    <?php foreach($consultants as $c): ?>
    <li><?php echo link_to($c->getName(), 'team', $c) ?></li>
    <?php endforeach ?>
    <!-- <li>Peter Evans<br />
        <a href="http://www.seawatchfoundation.org.uk/">Sea Watch Foundation</a><br />
        <a href="http://www.sos.bangor.ac.uk/">School of Ocean Sciences</a>, Bangor University<br />
        UK
    </li>
    <li>Natacha Aguilar Soto<br />
        Grupo Inv. Biodiversidad, Ecología MArina y Conservación (<a href="http://viinv.ull.es/grupos/1246/">BIOECOMAC)</a><br />
        <a href="http://www.ull.es/">Universidad de La Laguna</a><br />
    </li>
    <li>Carole Carlson <br />
        <a href="http://www.whalewatch.com/">Dolphin Fleet's Research and Education Program</a><br />
        <a href="http://www.coa.edu/">College of the Atlantic</a><br />
        USA
    </li>
    <li>
        Jonathan Gordon<br />
        <a href="http://soi.st-andrews.ac.uk/">Scottish Oceans Institute</a><br /> 
        <a href="http://www.st-andrews.ac.uk/">University of St Andrews</a><br />
        UK
    </li>
    <li>
        Lenin Oviedo<br /> 
        BIOTROPICA- Proyecto Golfo de la Ballena<br /> 
        Venezuela
    </li> -->
</ul>