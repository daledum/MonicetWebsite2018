<?php



/**
 * This class defines the structure of the 'observation_photo_dorsal_right_mark' table.
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
class ObservationPhotoDorsalRightMarkTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.photoRepoPlugin.lib.model.map.ObservationPhotoDorsalRightMarkTableMap';

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
		$this->setName('observation_photo_dorsal_right_mark');
		$this->setPhpName('ObservationPhotoDorsalRightMark');
		$this->setClassname('ObservationPhotoDorsalRightMark');
		$this->setPackage('plugins.photoRepoPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('OBSERVATION_PHOTO_DORSAL_RIGHT_ID', 'ObservationPhotoDorsalRightId', 'INTEGER', 'observation_photo_dorsal_right', 'ID', true, null, null);
		$this->addForeignKey('PATTERN_CELL_DORSAL_RIGHT_ID', 'PatternCellDorsalRightId', 'INTEGER', 'pattern_cell_dorsal_right', 'ID', true, null, null);
		$this->addColumn('IS_WIDE', 'IsWide', 'BOOLEAN', false, null, false);
		$this->addColumn('IS_DEEP', 'IsDeep', 'BOOLEAN', false, null, false);
		$this->addForeignKey('TO_CELL_ID', 'ToCellId', 'INTEGER', 'pattern_cell_dorsal_right', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ObservationPhotoDorsalRight', 'ObservationPhotoDorsalRight', RelationMap::MANY_TO_ONE, array('observation_photo_dorsal_right_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('PatternCellDorsalRightRelatedByPatternCellDorsalRightId', 'PatternCellDorsalRight', RelationMap::MANY_TO_ONE, array('pattern_cell_dorsal_right_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('PatternCellDorsalRightRelatedByToCellId', 'PatternCellDorsalRight', RelationMap::MANY_TO_ONE, array('to_cell_id' => 'id', ), 'SET NULL', null);
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

} // ObservationPhotoDorsalRightMarkTableMap
