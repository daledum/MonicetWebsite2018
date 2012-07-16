<?php



/**
 * This class defines the structure of the 'pattern' table.
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
class PatternTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.photoRepoPlugin.lib.model.map.PatternTableMap';

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
		$this->setName('pattern');
		$this->setPhpName('Pattern');
		$this->setClassname('Pattern');
		$this->setPackage('plugins.photoRepoPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('SPECIE_ID', 'SpecieId', 'INTEGER', 'specie', 'ID', false, null, null);
		$this->addColumn('IMAGE_TAIL', 'ImageTail', 'VARCHAR', false, 255, null);
		$this->addColumn('LINES_TAIL', 'LinesTail', 'INTEGER', true, null, 1);
		$this->addColumn('COLUMNS_TAIL', 'ColumnsTail', 'INTEGER', true, null, 1);
		$this->addColumn('IMAGE_DORSAL_LEFT', 'ImageDorsalLeft', 'VARCHAR', false, 255, null);
		$this->addColumn('LINES_DORSAL_LEFT', 'LinesDorsalLeft', 'INTEGER', true, null, 1);
		$this->addColumn('COLUMNS_DORSAL_LEFT', 'ColumnsDorsalLeft', 'INTEGER', true, null, 1);
		$this->addColumn('IMAGE_DORSAL_RIGHT', 'ImageDorsalRight', 'VARCHAR', false, 255, null);
		$this->addColumn('LINES_DORSAL_RIGHT', 'LinesDorsalRight', 'INTEGER', true, null, 1);
		$this->addColumn('COLUMNS_DORSAL_RIGHT', 'ColumnsDorsalRight', 'INTEGER', true, null, 1);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Specie', 'Specie', RelationMap::MANY_TO_ONE, array('specie_id' => 'id', ), 'CASCADE', null);
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

} // PatternTableMap
