<?php



/**
 * This class defines the structure of the 'observation_photo_tail' table.
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
class ObservationPhotoTailTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.photoRepoPlugin.lib.model.map.ObservationPhotoTailTableMap';

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
		$this->setName('observation_photo_tail');
		$this->setPhpName('ObservationPhotoTail');
		$this->setClassname('ObservationPhotoTail');
		$this->setPackage('plugins.photoRepoPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PHOTO_ID', 'PhotoId', 'INTEGER', 'observation_photo', 'ID', true, null, null);
		$this->addColumn('IS_SMOOTH', 'IsSmooth', 'BOOLEAN', false, null, false);
		$this->addColumn('IS_IRREGULAR', 'IsIrregular', 'BOOLEAN', false, null, false);
		$this->addColumn('IS_CUTTED_POINT_LEFT', 'IsCuttedPointLeft', 'BOOLEAN', false, null, false);
		$this->addColumn('IS_CUTTED_POINT_RIGHT', 'IsCuttedPointRight', 'BOOLEAN', false, null, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ObservationPhoto', 'ObservationPhoto', RelationMap::MANY_TO_ONE, array('photo_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('ObservationPhotoTailMark', 'ObservationPhotoTailMark', RelationMap::ONE_TO_MANY, array('id' => 'observation_photo_tail_id', ), 'CASCADE', null);
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

} // ObservationPhotoTailTableMap
