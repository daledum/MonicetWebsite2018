<?php



/**
 * This class defines the structure of the 'news_article' table.
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
class NewsArticleTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.NewsArticleTableMap';

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
		$this->setName('news_article');
		$this->setPhpName('NewsArticle');
		$this->setClassname('NewsArticle');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('IS_PUBLISHED', 'IsPublished', 'BOOLEAN', true, null, false);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', true, 255, null);
		$this->addColumn('IMAGE', 'Image', 'VARCHAR', false, 1024, null);
		$this->addColumn('ENTER_DATE', 'EnterDate', 'DATE', false, null, null);
		$this->addColumn('EXIT_DATE', 'ExitDate', 'DATE', false, null, null);
		$this->addColumn('PUBLISH_DATE', 'PublishDate', 'DATE', true, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('NewsArticleI18n', 'NewsArticleI18n', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', null);
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
			'symfony_i18n' => array('i18n_table' => 'news_article_i18n', ),
		);
	} // getBehaviors()

} // NewsArticleTableMap
