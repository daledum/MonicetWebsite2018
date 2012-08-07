<?php



/**
 * This class defines the structure of the 'pattern_cell_dorsal_right' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.map
 */
class PatternCellDorsalRightTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.photoRepoPlugin.lib.model.map.PatternCellDorsalRightTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('pattern_cell_dorsal_right');
		$this->setPhpName('PatternCellDorsalRight');
		$this->setClassname('PatternCellDorsalRight');
		$this->setPackage('plugins.photoRepoPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PATTERN_ID', 'PatternId', 'INTEGER', 'pattern', 'ID', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('POINTS', 'Points', 'VARCHAR', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Pattern', 'Pattern', RelationMap::MANY_TO_ONE, array('pattern_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('ObservationPhotoDorsalRightMarkRelatedByPatternCellDorsalRightId', 'ObservationPhotoDorsalRightMark', RelationMap::ONE_TO_MANY, array('id' => 'pattern_cell_dorsal_right_id', ), 'CASCADE', null);
    $this->addRelation('ObservationPhotoDorsalRightMarkRelatedByContinuesFromCellId', 'ObservationPhotoDorsalRightMark', RelationMap::ONE_TO_MANY, array('id' => 'continues_from_cell_id', ), 'SET NULL', null);
    $this->addRelation('ObservationPhotoDorsalRightMarkRelatedByContinuesOnCellId', 'ObservationPhotoDorsalRightMark', RelationMap::ONE_TO_MANY, array('id' => 'continues_on_cell_id', ), 'SET NULL', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // PatternCellDorsalRightTableMap
