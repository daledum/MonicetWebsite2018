<?php



/**
 * This class defines the structure of the 'observation_photo_dorsal_right' table.
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
class ObservationPhotoDorsalRightTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.photoRepoPlugin.lib.model.map.ObservationPhotoDorsalRightTableMap';

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
		$this->setName('observation_photo_dorsal_right');
		$this->setPhpName('ObservationPhotoDorsalRight');
		$this->setClassname('ObservationPhotoDorsalRight');
		$this->setPackage('plugins.photoRepoPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PHOTO_ID', 'PhotoId', 'INTEGER', 'observation_photo', 'ID', true, null, null);
		$this->addColumn('IS_SMOOTH', 'IsSmooth', 'BOOLEAN', false, null, false);
		$this->addColumn('IS_IRREGULAR', 'IsIrregular', 'BOOLEAN', false, null, false);
		$this->addColumn('IS_CUTTED_POINT', 'IsCuttedPoint', 'BOOLEAN', false, null, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ObservationPhoto', 'ObservationPhoto', RelationMap::MANY_TO_ONE, array('photo_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('ObservationPhotoDorsalRightMark', 'ObservationPhotoDorsalRightMark', RelationMap::ONE_TO_MANY, array('id' => 'observation_photo_dorsal_right_id', ), 'CASCADE', null);
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

} // ObservationPhotoDorsalRightTableMap
