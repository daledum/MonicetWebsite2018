<?php



/**
 * This class defines the structure of the 'specie' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class SpecieTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.SpecieTableMap';

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
		$this->setName('specie');
		$this->setPhpName('Specie');
		$this->setClassname('Specie');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('SPECIE_GROUP_ID', 'SpecieGroupId', 'INTEGER', 'specie_group', 'ID', true, null, null);
		$this->addColumn('CODE', 'Code', 'VARCHAR', true, 10, null);
		$this->addColumn('REC_CET_CODE', 'RecCetCode', 'VARCHAR', false, 45, null);
		$this->addColumn('SCIENTIFIC_NAME', 'ScientificName', 'VARCHAR', false, 255, null);
		$this->addColumn('COLOR', 'Color', 'VARCHAR', false, 10, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SpecieGroup', 'SpecieGroup', RelationMap::MANY_TO_ONE, array('specie_group_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('SpecieI18n', 'SpecieI18n', RelationMap::ONE_TO_MANY, array('id' => 'id', ), null, null);
    $this->addRelation('Sighting', 'Sighting', RelationMap::ONE_TO_MANY, array('id' => 'specie_id', ), 'CASCADE', null);
    $this->addRelation('WatchSighting', 'WatchSighting', RelationMap::ONE_TO_MANY, array('id' => 'specie_id', ), 'CASCADE', null);
    $this->addRelation('Individual', 'Individual', RelationMap::ONE_TO_MANY, array('id' => 'specie_id', ), 'CASCADE', null);
    $this->addRelation('Pattern', 'Pattern', RelationMap::ONE_TO_MANY, array('id' => 'specie_id', ), 'CASCADE', null);
    $this->addRelation('ObservationPhoto', 'ObservationPhoto', RelationMap::ONE_TO_MANY, array('id' => 'specie_id', ), 'SET NULL', null);
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
			'symfony_i18n' => array('i18n_table' => 'specie_i18n', ),
		);
	} // getBehaviors()

} // SpecieTableMap
