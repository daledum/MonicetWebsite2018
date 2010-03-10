<?php


/**
 * This class defines the structure of the 'general_info' table.
 *
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Wed Mar 10 15:35:10 2010
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class GeneralInfoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.GeneralInfoTableMap';

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
		$this->setName('general_info');
		$this->setPhpName('GeneralInfo');
		$this->setClassname('GeneralInfo');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('VESSEL_ID', 'VesselId', 'INTEGER', 'vessel', 'ID', true, null, null);
		$this->addForeignKey('SKIPPER_ID', 'SkipperId', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
		$this->addForeignKey('GUIDE_ID', 'GuideId', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
		$this->addColumn('BASE_LATITUDE', 'BaseLatitude', 'VARCHAR', true, 45, null);
		$this->addColumn('BASE_LONGITUDE', 'BaseLongitude', 'VARCHAR', true, 45, null);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Vessel', 'Vessel', RelationMap::MANY_TO_ONE, array('vessel_id' => 'id', ), null, null);
    $this->addRelation('sfGuardUserRelatedBySkipperId', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('skipper_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('sfGuardUserRelatedByGuideId', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('guide_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Record', 'Record', RelationMap::ONE_TO_MANY, array('id' => 'general_info_id', ), null, null);
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
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // GeneralInfoTableMap
