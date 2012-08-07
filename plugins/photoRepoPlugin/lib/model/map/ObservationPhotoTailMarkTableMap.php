<?php



/**
 * This class defines the structure of the 'observation_photo_tail_mark' table.
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
class ObservationPhotoTailMarkTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.photoRepoPlugin.lib.model.map.ObservationPhotoTailMarkTableMap';

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
		$this->setName('observation_photo_tail_mark');
		$this->setPhpName('ObservationPhotoTailMark');
		$this->setClassname('ObservationPhotoTailMark');
		$this->setPackage('plugins.photoRepoPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('OBSERVATION_PHOTO_TAIL_ID', 'ObservationPhotoTailId', 'INTEGER', 'observation_photo_tail', 'ID', true, null, null);
		$this->addForeignKey('PATTERN_CELL_TAIL_ID', 'PatternCellTailId', 'INTEGER', 'pattern_cell_tail', 'ID', true, null, null);
		$this->addColumn('IS_WIDE', 'IsWide', 'BOOLEAN', false, null, false);
		$this->addColumn('IS_DEEP', 'IsDeep', 'BOOLEAN', false, null, false);
		$this->addForeignKey('CONTINUES_FROM_CELL_ID', 'ContinuesFromCellId', 'INTEGER', 'pattern_cell_tail', 'ID', false, null, null);
		$this->addForeignKey('CONTINUES_ON_CELL_ID', 'ContinuesOnCellId', 'INTEGER', 'pattern_cell_tail', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ObservationPhotoTail', 'ObservationPhotoTail', RelationMap::MANY_TO_ONE, array('observation_photo_tail_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('PatternCellTailRelatedByPatternCellTailId', 'PatternCellTail', RelationMap::MANY_TO_ONE, array('pattern_cell_tail_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('PatternCellTailRelatedByContinuesFromCellId', 'PatternCellTail', RelationMap::MANY_TO_ONE, array('continues_from_cell_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('PatternCellTailRelatedByContinuesOnCellId', 'PatternCellTail', RelationMap::MANY_TO_ONE, array('continues_on_cell_id' => 'id', ), 'SET NULL', null);
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

} // ObservationPhotoTailMarkTableMap
