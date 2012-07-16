<?php



/**
 * This class defines the structure of the 'observation_photo' table.
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
		$this->addColumn('FILE_NAME', 'FileName', 'VARCHAR', true, 255, null);
		$this->addColumn('PHOTO_DATE', 'PhotoDate', 'DATE', false, null, null);
		$this->addColumn('PHOTO_TIME', 'PhotoTime', 'TIME', false, null, null);
		$this->addForeignKey('INDIVIDUAL_ID', 'IndividualId', 'INTEGER', 'individual', 'ID', false, null, null);
		$this->addForeignKey('SPECIE_ID', 'SpecieId', 'INTEGER', 'specie', 'ID', false, null, null);
		$this->addColumn('ISLAND', 'Island', 'VARCHAR', false, 255, null);
		$this->addForeignKey('BODY_PART_ID', 'BodyPartId', 'INTEGER', 'body_part', 'ID', false, null, null);
		$this->addColumn('GENDER', 'Gender', 'VARCHAR', false, 255, null);
		$this->addColumn('AGE_GROUP', 'AgeGroup', 'VARCHAR', false, 255, null);
		$this->addForeignKey('BEHAVIOUR_ID', 'BehaviourId', 'INTEGER', 'behaviour', 'ID', false, null, null);
		$this->addColumn('LATITUDE', 'Latitude', 'VARCHAR', false, 255, null);
		$this->addColumn('LONGITUDE', 'Longitude', 'VARCHAR', false, 255, null);
		$this->addForeignKey('COMPANY_ID', 'CompanyId', 'INTEGER', 'company', 'ID', false, null, null);
		$this->addForeignKey('VESSEL_ID', 'VesselId', 'INTEGER', 'vessel', 'ID', false, null, null);
		$this->addForeignKey('PHOTOGRAPHER_ID', 'PhotographerId', 'INTEGER', 'photographer', 'ID', false, null, null);
		$this->addColumn('KIND_OF_PHOTO', 'KindOfPhoto', 'VARCHAR', false, 255, null);
		$this->addColumn('PHOTO_QUALITY', 'PhotoQuality', 'VARCHAR', false, 255, null);
		$this->addForeignKey('SIGHTING_ID', 'SightingId', 'INTEGER', 'sighting', 'ID', false, null, null);
		$this->addColumn('IS_BEST', 'IsBest', 'BOOLEAN', false, null, false);
		$this->addColumn('NOTES', 'Notes', 'LONGVARCHAR', false, null, null);
		$this->addColumn('UPLOADED_AT', 'UploadedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', false, 255, null);
		$this->addForeignKey('LAST_EDITED_BY', 'LastEditedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
		$this->addForeignKey('VALIDATED_BY', 'ValidatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Individual', 'Individual', RelationMap::MANY_TO_ONE, array('individual_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('Specie', 'Specie', RelationMap::MANY_TO_ONE, array('specie_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('BodyPart', 'BodyPart', RelationMap::MANY_TO_ONE, array('body_part_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('Behaviour', 'Behaviour', RelationMap::MANY_TO_ONE, array('behaviour_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('Company', 'Company', RelationMap::MANY_TO_ONE, array('company_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('Vessel', 'Vessel', RelationMap::MANY_TO_ONE, array('vessel_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('Photographer', 'Photographer', RelationMap::MANY_TO_ONE, array('photographer_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('Sighting', 'Sighting', RelationMap::MANY_TO_ONE, array('sighting_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('sfGuardUserRelatedByLastEditedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('last_edited_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('sfGuardUserRelatedByValidatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('validated_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('ObservationPhotoI18n', 'ObservationPhotoI18n', RelationMap::ONE_TO_MANY, array('id' => 'id', ), null, null);
    $this->addRelation('ObservationPhotoTail', 'ObservationPhotoTail', RelationMap::ONE_TO_MANY, array('id' => 'photo_id', ), 'CASCADE', null);
    $this->addRelation('ObservationPhotoDorsalLeft', 'ObservationPhotoDorsalLeft', RelationMap::ONE_TO_MANY, array('id' => 'photo_id', ), 'CASCADE', null);
    $this->addRelation('ObservationPhotoDorsalRight', 'ObservationPhotoDorsalRight', RelationMap::ONE_TO_MANY, array('id' => 'photo_id', ), 'CASCADE', null);
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
