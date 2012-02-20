<?php



/**
 * This class defines the structure of the 'observation_photo' table.
 *
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Mon Feb 20 14:52:39 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.map
 */
class ObservationPhotoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.photoRepoPlugin.lib.model.map.ObservationPhotoTableMap';

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
		$this->setName('observation_photo');
		$this->setPhpName('ObservationPhoto');
		$this->setClassname('ObservationPhoto');
		$this->setPackage('plugins.photoRepoPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CODE', 'Code', 'VARCHAR', true, 255, null);
		$this->addForeignKey('INDIVIDUAL_ID', 'IndividualId', 'INTEGER', 'individual', 'ID', false, null, null);
		$this->addForeignKey('SPECIE_ID', 'SpecieId', 'INTEGER', 'specie', 'ID', false, null, null);
		$this->addColumn('ISLAND', 'Island', 'VARCHAR', false, 255, null);
		$this->addColumn('FIN_SIDE', 'FinSide', 'VARCHAR', false, 255, null);
		$this->addColumn('LATITUDE', 'Latitude', 'VARCHAR', false, 255, null);
		$this->addColumn('LONGITUDE', 'Longitude', 'VARCHAR', false, 255, null);
		$this->addColumn('COMPANY', 'Company', 'VARCHAR', false, 255, null);
		$this->addColumn('PHOTOGRAPHER', 'Photographer', 'VARCHAR', false, 255, null);
		$this->addColumn('PHOTOGRAPHER_EMAIL', 'PhotographerEmail', 'VARCHAR', false, 255, null);
		$this->addColumn('KIND_OF_PHOTO', 'KindOfPhoto', 'VARCHAR', false, 255, null);
		$this->addColumn('PHOTO_QUALITY', 'PhotoQuality', 'VARCHAR', false, 255, null);
		$this->addColumn('OBSERVATION_DATE', 'ObservationDate', 'DATE', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Individual', 'Individual', RelationMap::MANY_TO_ONE, array('individual_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Specie', 'Specie', RelationMap::MANY_TO_ONE, array('specie_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('ObservationPhotoI18n', 'ObservationPhotoI18n', RelationMap::ONE_TO_MANY, array('id' => 'id', ), null, null);
    $this->addRelation('ObservationPhotoMarkTail', 'ObservationPhotoMarkTail', RelationMap::ONE_TO_MANY, array('id' => 'photo_id', ), 'CASCADE', null);
    $this->addRelation('ObservationPhotoMarkDorsalLeft', 'ObservationPhotoMarkDorsalLeft', RelationMap::ONE_TO_MANY, array('id' => 'photo_id', ), 'CASCADE', null);
    $this->addRelation('ObservationPhotoMarkDorsalRight', 'ObservationPhotoMarkDorsalRight', RelationMap::ONE_TO_MANY, array('id' => 'photo_id', ), 'CASCADE', null);
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
			'symfony_i18n' => array('i18n_table' => 'observation_photo_i18n', ),
		);
	} // getBehaviors()

} // ObservationPhotoTableMap
