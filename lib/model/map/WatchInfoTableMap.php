<?php



/**
 * This class defines the structure of the 'watch_info' table.
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
class WatchInfoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.WatchInfoTableMap';

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
		$this->setName('watch_info');
		$this->setPhpName('WatchInfo');
		$this->setClassname('WatchInfo');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CODE', 'Code', 'VARCHAR', true, 45, null);
		$this->addForeignKey('WATCH_POST_ID', 'WatchPostId', 'INTEGER', 'watch_post', 'ID', false, null, null);
		$this->addForeignKey('WATCHMAN_ID', 'WatchmanId', 'INTEGER', 'watchman', 'ID', false, null, null);
		$this->addForeignKey('COMPANY_ID', 'CompanyId', 'INTEGER', 'company', 'ID', true, null, null);
		$this->addColumn('BASE_LATITUDE', 'BaseLatitude', 'VARCHAR', true, 45, null);
		$this->addColumn('BASE_LONGITUDE', 'BaseLongitude', 'VARCHAR', true, 45, null);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, null);
		$this->addColumn('VALID', 'Valid', 'BOOLEAN', true, null, null);
		$this->addColumn('COMMENTS', 'Comments', 'LONGVARCHAR', false, null, null);
		$this->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
		$this->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('WatchPost', 'WatchPost', RelationMap::MANY_TO_ONE, array('watch_post_id' => 'id', ), null, null);
    $this->addRelation('Watchman', 'Watchman', RelationMap::MANY_TO_ONE, array('watchman_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Company', 'Company', RelationMap::MANY_TO_ONE, array('company_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('sfGuardUserRelatedByCreatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'CASCADE', null);
    $this->addRelation('sfGuardUserRelatedByUpdatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'CASCADE', null);
    $this->addRelation('WatchSighting', 'WatchSighting', RelationMap::ONE_TO_MANY, array('id' => 'watch_info_id', ), 'CASCADE', null);
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

} // WatchInfoTableMap
