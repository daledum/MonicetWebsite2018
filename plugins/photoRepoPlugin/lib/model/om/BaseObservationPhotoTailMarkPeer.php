<?php


/**
 * Base static class for performing query and update operations on the 'observation_photo_tail_mark' table.
 *
 * 
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoTailMarkPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'observation_photo_tail_mark';

	/** the related Propel class for this table */
	const OM_CLASS = 'ObservationPhotoTailMark';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'plugins.photoRepoPlugin.lib.model.ObservationPhotoTailMark';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ObservationPhotoTailMarkTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 7;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'observation_photo_tail_mark.ID';

	/** the column name for the OBSERVATION_PHOTO_TAIL_ID field */
	const OBSERVATION_PHOTO_TAIL_ID = 'observation_photo_tail_mark.OBSERVATION_PHOTO_TAIL_ID';

	/** the column name for the PATTERN_CELL_TAIL_ID field */
	const PATTERN_CELL_TAIL_ID = 'observation_photo_tail_mark.PATTERN_CELL_TAIL_ID';

	/** the column name for the IS_WIDE field */
	const IS_WIDE = 'observation_photo_tail_mark.IS_WIDE';

	/** the column name for the IS_DEEP field */
	const IS_DEEP = 'observation_photo_tail_mark.IS_DEEP';

	/** the column name for the CONTINUES_FROM_CELL_ID field */
	const CONTINUES_FROM_CELL_ID = 'observation_photo_tail_mark.CONTINUES_FROM_CELL_ID';

	/** the column name for the CONTINUES_ON_CELL_ID field */
	const CONTINUES_ON_CELL_ID = 'observation_photo_tail_mark.CONTINUES_ON_CELL_ID';

	/**
	 * An identiy map to hold any loaded instances of ObservationPhotoTailMark objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array ObservationPhotoTailMark[]
	 */
	public static $instances = array();


	// symfony behavior
	
	/**
	 * Indicates whether the current model includes I18N.
	 */
	const IS_I18N = false;

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ObservationPhotoTailId', 'PatternCellTailId', 'IsWide', 'IsDeep', 'ContinuesFromCellId', 'ContinuesOnCellId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'observationPhotoTailId', 'patternCellTailId', 'isWide', 'isDeep', 'continuesFromCellId', 'continuesOnCellId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::OBSERVATION_PHOTO_TAIL_ID, self::PATTERN_CELL_TAIL_ID, self::IS_WIDE, self::IS_DEEP, self::CONTINUES_FROM_CELL_ID, self::CONTINUES_ON_CELL_ID, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'OBSERVATION_PHOTO_TAIL_ID', 'PATTERN_CELL_TAIL_ID', 'IS_WIDE', 'IS_DEEP', 'CONTINUES_FROM_CELL_ID', 'CONTINUES_ON_CELL_ID', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'observation_photo_tail_id', 'pattern_cell_tail_id', 'is_wide', 'is_deep', 'continues_from_cell_id', 'continues_on_cell_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ObservationPhotoTailId' => 1, 'PatternCellTailId' => 2, 'IsWide' => 3, 'IsDeep' => 4, 'ContinuesFromCellId' => 5, 'ContinuesOnCellId' => 6, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'observationPhotoTailId' => 1, 'patternCellTailId' => 2, 'isWide' => 3, 'isDeep' => 4, 'continuesFromCellId' => 5, 'continuesOnCellId' => 6, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::OBSERVATION_PHOTO_TAIL_ID => 1, self::PATTERN_CELL_TAIL_ID => 2, self::IS_WIDE => 3, self::IS_DEEP => 4, self::CONTINUES_FROM_CELL_ID => 5, self::CONTINUES_ON_CELL_ID => 6, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'OBSERVATION_PHOTO_TAIL_ID' => 1, 'PATTERN_CELL_TAIL_ID' => 2, 'IS_WIDE' => 3, 'IS_DEEP' => 4, 'CONTINUES_FROM_CELL_ID' => 5, 'CONTINUES_ON_CELL_ID' => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'observation_photo_tail_id' => 1, 'pattern_cell_tail_id' => 2, 'is_wide' => 3, 'is_deep' => 4, 'continues_from_cell_id' => 5, 'continues_on_cell_id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. ObservationPhotoTailMarkPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ObservationPhotoTailMarkPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(ObservationPhotoTailMarkPeer::ID);
			$criteria->addSelectColumn(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID);
			$criteria->addSelectColumn(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID);
			$criteria->addSelectColumn(ObservationPhotoTailMarkPeer::IS_WIDE);
			$criteria->addSelectColumn(ObservationPhotoTailMarkPeer::IS_DEEP);
			$criteria->addSelectColumn(ObservationPhotoTailMarkPeer::CONTINUES_FROM_CELL_ID);
			$criteria->addSelectColumn(ObservationPhotoTailMarkPeer::CONTINUES_ON_CELL_ID);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.OBSERVATION_PHOTO_TAIL_ID');
			$criteria->addSelectColumn($alias . '.PATTERN_CELL_TAIL_ID');
			$criteria->addSelectColumn($alias . '.IS_WIDE');
			$criteria->addSelectColumn($alias . '.IS_DEEP');
			$criteria->addSelectColumn($alias . '.CONTINUES_FROM_CELL_ID');
			$criteria->addSelectColumn($alias . '.CONTINUES_ON_CELL_ID');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ObservationPhotoTailMarkPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     ObservationPhotoTailMark
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ObservationPhotoTailMarkPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return ObservationPhotoTailMarkPeer::populateObjects(ObservationPhotoTailMarkPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}


		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      ObservationPhotoTailMark $value A ObservationPhotoTailMark object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(ObservationPhotoTailMark $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A ObservationPhotoTailMark object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof ObservationPhotoTailMark) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ObservationPhotoTailMark object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     ObservationPhotoTailMark Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to observation_photo_tail_mark
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = ObservationPhotoTailMarkPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ObservationPhotoTailMarkPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ObservationPhotoTailMarkPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ObservationPhotoTailMarkPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (ObservationPhotoTailMark object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = ObservationPhotoTailMarkPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = ObservationPhotoTailMarkPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + ObservationPhotoTailMarkPeer::NUM_COLUMNS;
		} else {
			$cls = ObservationPhotoTailMarkPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			ObservationPhotoTailMarkPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related ObservationPhotoTail table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinObservationPhotoTail(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ObservationPhotoTailMarkPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, ObservationPhotoTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related PatternCellTailRelatedByPatternCellTailId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinPatternCellTailRelatedByPatternCellTailId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ObservationPhotoTailMarkPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, PatternCellTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related PatternCellTailRelatedByContinuesFromCellId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinPatternCellTailRelatedByContinuesFromCellId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ObservationPhotoTailMarkPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_FROM_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related PatternCellTailRelatedByContinuesOnCellId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinPatternCellTailRelatedByContinuesOnCellId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ObservationPhotoTailMarkPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_ON_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of ObservationPhotoTailMark objects pre-filled with their ObservationPhotoTail objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ObservationPhotoTailMark objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinObservationPhotoTail(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		$startcol = (ObservationPhotoTailMarkPeer::NUM_COLUMNS - ObservationPhotoTailMarkPeer::NUM_LAZY_LOAD_COLUMNS);
		ObservationPhotoTailPeer::addSelectColumns($criteria);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, ObservationPhotoTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ObservationPhotoTailMarkPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ObservationPhotoTailMarkPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ObservationPhotoTailMarkPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ObservationPhotoTailMarkPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ObservationPhotoTailPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ObservationPhotoTailPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ObservationPhotoTailPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ObservationPhotoTailPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (ObservationPhotoTailMark) to $obj2 (ObservationPhotoTail)
				$obj2->addObservationPhotoTailMark($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ObservationPhotoTailMark objects pre-filled with their PatternCellTail objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ObservationPhotoTailMark objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPatternCellTailRelatedByPatternCellTailId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		$startcol = (ObservationPhotoTailMarkPeer::NUM_COLUMNS - ObservationPhotoTailMarkPeer::NUM_LAZY_LOAD_COLUMNS);
		PatternCellTailPeer::addSelectColumns($criteria);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, PatternCellTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ObservationPhotoTailMarkPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ObservationPhotoTailMarkPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ObservationPhotoTailMarkPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ObservationPhotoTailMarkPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = PatternCellTailPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PatternCellTailPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = PatternCellTailPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PatternCellTailPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (ObservationPhotoTailMark) to $obj2 (PatternCellTail)
				$obj2->addObservationPhotoTailMarkRelatedByPatternCellTailId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ObservationPhotoTailMark objects pre-filled with their PatternCellTail objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ObservationPhotoTailMark objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPatternCellTailRelatedByContinuesFromCellId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		$startcol = (ObservationPhotoTailMarkPeer::NUM_COLUMNS - ObservationPhotoTailMarkPeer::NUM_LAZY_LOAD_COLUMNS);
		PatternCellTailPeer::addSelectColumns($criteria);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_FROM_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ObservationPhotoTailMarkPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ObservationPhotoTailMarkPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ObservationPhotoTailMarkPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ObservationPhotoTailMarkPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = PatternCellTailPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PatternCellTailPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = PatternCellTailPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PatternCellTailPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (ObservationPhotoTailMark) to $obj2 (PatternCellTail)
				$obj2->addObservationPhotoTailMarkRelatedByContinuesFromCellId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ObservationPhotoTailMark objects pre-filled with their PatternCellTail objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ObservationPhotoTailMark objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPatternCellTailRelatedByContinuesOnCellId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		$startcol = (ObservationPhotoTailMarkPeer::NUM_COLUMNS - ObservationPhotoTailMarkPeer::NUM_LAZY_LOAD_COLUMNS);
		PatternCellTailPeer::addSelectColumns($criteria);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_ON_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ObservationPhotoTailMarkPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ObservationPhotoTailMarkPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ObservationPhotoTailMarkPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ObservationPhotoTailMarkPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = PatternCellTailPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PatternCellTailPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = PatternCellTailPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PatternCellTailPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (ObservationPhotoTailMark) to $obj2 (PatternCellTail)
				$obj2->addObservationPhotoTailMarkRelatedByContinuesOnCellId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ObservationPhotoTailMarkPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, ObservationPhotoTailPeer::ID, $join_behavior);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, PatternCellTailPeer::ID, $join_behavior);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_FROM_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_ON_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}

	/**
	 * Selects a collection of ObservationPhotoTailMark objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ObservationPhotoTailMark objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		$startcol2 = (ObservationPhotoTailMarkPeer::NUM_COLUMNS - ObservationPhotoTailMarkPeer::NUM_LAZY_LOAD_COLUMNS);

		ObservationPhotoTailPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ObservationPhotoTailPeer::NUM_COLUMNS - ObservationPhotoTailPeer::NUM_LAZY_LOAD_COLUMNS);

		PatternCellTailPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (PatternCellTailPeer::NUM_COLUMNS - PatternCellTailPeer::NUM_LAZY_LOAD_COLUMNS);

		PatternCellTailPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (PatternCellTailPeer::NUM_COLUMNS - PatternCellTailPeer::NUM_LAZY_LOAD_COLUMNS);

		PatternCellTailPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (PatternCellTailPeer::NUM_COLUMNS - PatternCellTailPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, ObservationPhotoTailPeer::ID, $join_behavior);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, PatternCellTailPeer::ID, $join_behavior);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_FROM_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_ON_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ObservationPhotoTailMarkPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ObservationPhotoTailMarkPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ObservationPhotoTailMarkPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ObservationPhotoTailMarkPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined ObservationPhotoTail rows

			$key2 = ObservationPhotoTailPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = ObservationPhotoTailPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ObservationPhotoTailPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ObservationPhotoTailPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (ObservationPhotoTailMark) to the collection in $obj2 (ObservationPhotoTail)
				$obj2->addObservationPhotoTailMark($obj1);
			} // if joined row not null

			// Add objects for joined PatternCellTail rows

			$key3 = PatternCellTailPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = PatternCellTailPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = PatternCellTailPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					PatternCellTailPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (ObservationPhotoTailMark) to the collection in $obj3 (PatternCellTail)
				$obj3->addObservationPhotoTailMarkRelatedByPatternCellTailId($obj1);
			} // if joined row not null

			// Add objects for joined PatternCellTail rows

			$key4 = PatternCellTailPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = PatternCellTailPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = PatternCellTailPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PatternCellTailPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (ObservationPhotoTailMark) to the collection in $obj4 (PatternCellTail)
				$obj4->addObservationPhotoTailMarkRelatedByContinuesFromCellId($obj1);
			} // if joined row not null

			// Add objects for joined PatternCellTail rows

			$key5 = PatternCellTailPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = PatternCellTailPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = PatternCellTailPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					PatternCellTailPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (ObservationPhotoTailMark) to the collection in $obj5 (PatternCellTail)
				$obj5->addObservationPhotoTailMarkRelatedByContinuesOnCellId($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related ObservationPhotoTail table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptObservationPhotoTail(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ObservationPhotoTailMarkPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, PatternCellTailPeer::ID, $join_behavior);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_FROM_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_ON_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related PatternCellTailRelatedByPatternCellTailId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptPatternCellTailRelatedByPatternCellTailId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ObservationPhotoTailMarkPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, ObservationPhotoTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related PatternCellTailRelatedByContinuesFromCellId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptPatternCellTailRelatedByContinuesFromCellId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ObservationPhotoTailMarkPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, ObservationPhotoTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related PatternCellTailRelatedByContinuesOnCellId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptPatternCellTailRelatedByContinuesOnCellId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ObservationPhotoTailMarkPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, ObservationPhotoTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of ObservationPhotoTailMark objects pre-filled with all related objects except ObservationPhotoTail.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ObservationPhotoTailMark objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptObservationPhotoTail(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		$startcol2 = (ObservationPhotoTailMarkPeer::NUM_COLUMNS - ObservationPhotoTailMarkPeer::NUM_LAZY_LOAD_COLUMNS);

		PatternCellTailPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (PatternCellTailPeer::NUM_COLUMNS - PatternCellTailPeer::NUM_LAZY_LOAD_COLUMNS);

		PatternCellTailPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (PatternCellTailPeer::NUM_COLUMNS - PatternCellTailPeer::NUM_LAZY_LOAD_COLUMNS);

		PatternCellTailPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (PatternCellTailPeer::NUM_COLUMNS - PatternCellTailPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, PatternCellTailPeer::ID, $join_behavior);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_FROM_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::CONTINUES_ON_CELL_ID, PatternCellTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ObservationPhotoTailMarkPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ObservationPhotoTailMarkPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ObservationPhotoTailMarkPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ObservationPhotoTailMarkPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined PatternCellTail rows

				$key2 = PatternCellTailPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = PatternCellTailPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = PatternCellTailPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					PatternCellTailPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ObservationPhotoTailMark) to the collection in $obj2 (PatternCellTail)
				$obj2->addObservationPhotoTailMarkRelatedByPatternCellTailId($obj1);

			} // if joined row is not null

				// Add objects for joined PatternCellTail rows

				$key3 = PatternCellTailPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = PatternCellTailPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = PatternCellTailPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					PatternCellTailPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (ObservationPhotoTailMark) to the collection in $obj3 (PatternCellTail)
				$obj3->addObservationPhotoTailMarkRelatedByContinuesFromCellId($obj1);

			} // if joined row is not null

				// Add objects for joined PatternCellTail rows

				$key4 = PatternCellTailPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PatternCellTailPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = PatternCellTailPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PatternCellTailPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (ObservationPhotoTailMark) to the collection in $obj4 (PatternCellTail)
				$obj4->addObservationPhotoTailMarkRelatedByContinuesOnCellId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ObservationPhotoTailMark objects pre-filled with all related objects except PatternCellTailRelatedByPatternCellTailId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ObservationPhotoTailMark objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPatternCellTailRelatedByPatternCellTailId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		$startcol2 = (ObservationPhotoTailMarkPeer::NUM_COLUMNS - ObservationPhotoTailMarkPeer::NUM_LAZY_LOAD_COLUMNS);

		ObservationPhotoTailPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ObservationPhotoTailPeer::NUM_COLUMNS - ObservationPhotoTailPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, ObservationPhotoTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ObservationPhotoTailMarkPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ObservationPhotoTailMarkPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ObservationPhotoTailMarkPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ObservationPhotoTailMarkPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ObservationPhotoTail rows

				$key2 = ObservationPhotoTailPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ObservationPhotoTailPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ObservationPhotoTailPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ObservationPhotoTailPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ObservationPhotoTailMark) to the collection in $obj2 (ObservationPhotoTail)
				$obj2->addObservationPhotoTailMark($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ObservationPhotoTailMark objects pre-filled with all related objects except PatternCellTailRelatedByContinuesFromCellId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ObservationPhotoTailMark objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPatternCellTailRelatedByContinuesFromCellId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		$startcol2 = (ObservationPhotoTailMarkPeer::NUM_COLUMNS - ObservationPhotoTailMarkPeer::NUM_LAZY_LOAD_COLUMNS);

		ObservationPhotoTailPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ObservationPhotoTailPeer::NUM_COLUMNS - ObservationPhotoTailPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, ObservationPhotoTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ObservationPhotoTailMarkPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ObservationPhotoTailMarkPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ObservationPhotoTailMarkPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ObservationPhotoTailMarkPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ObservationPhotoTail rows

				$key2 = ObservationPhotoTailPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ObservationPhotoTailPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ObservationPhotoTailPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ObservationPhotoTailPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ObservationPhotoTailMark) to the collection in $obj2 (ObservationPhotoTail)
				$obj2->addObservationPhotoTailMark($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ObservationPhotoTailMark objects pre-filled with all related objects except PatternCellTailRelatedByContinuesOnCellId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ObservationPhotoTailMark objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPatternCellTailRelatedByContinuesOnCellId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ObservationPhotoTailMarkPeer::addSelectColumns($criteria);
		$startcol2 = (ObservationPhotoTailMarkPeer::NUM_COLUMNS - ObservationPhotoTailMarkPeer::NUM_LAZY_LOAD_COLUMNS);

		ObservationPhotoTailPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ObservationPhotoTailPeer::NUM_COLUMNS - ObservationPhotoTailPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, ObservationPhotoTailPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseObservationPhotoTailMarkPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ObservationPhotoTailMarkPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ObservationPhotoTailMarkPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ObservationPhotoTailMarkPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ObservationPhotoTailMarkPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ObservationPhotoTail rows

				$key2 = ObservationPhotoTailPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ObservationPhotoTailPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ObservationPhotoTailPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ObservationPhotoTailPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ObservationPhotoTailMark) to the collection in $obj2 (ObservationPhotoTail)
				$obj2->addObservationPhotoTailMark($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseObservationPhotoTailMarkPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseObservationPhotoTailMarkPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ObservationPhotoTailMarkTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? ObservationPhotoTailMarkPeer::CLASS_DEFAULT : ObservationPhotoTailMarkPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a ObservationPhotoTailMark or Criteria object.
	 *
	 * @param      mixed $values Criteria or ObservationPhotoTailMark object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from ObservationPhotoTailMark object
		}

		if ($criteria->containsKey(ObservationPhotoTailMarkPeer::ID) && $criteria->keyContainsValue(ObservationPhotoTailMarkPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ObservationPhotoTailMarkPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a ObservationPhotoTailMark or Criteria object.
	 *
	 * @param      mixed $values Criteria or ObservationPhotoTailMark object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ObservationPhotoTailMarkPeer::ID);
			$value = $criteria->remove(ObservationPhotoTailMarkPeer::ID);
			if ($value) {
				$selectCriteria->add(ObservationPhotoTailMarkPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(ObservationPhotoTailMarkPeer::TABLE_NAME);
			}

		} else { // $values is ObservationPhotoTailMark object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the observation_photo_tail_mark table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ObservationPhotoTailMarkPeer::TABLE_NAME, $con, ObservationPhotoTailMarkPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ObservationPhotoTailMarkPeer::clearInstancePool();
			ObservationPhotoTailMarkPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a ObservationPhotoTailMark or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or ObservationPhotoTailMark object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ObservationPhotoTailMarkPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof ObservationPhotoTailMark) { // it's a model object
			// invalidate the cache for this single object
			ObservationPhotoTailMarkPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ObservationPhotoTailMarkPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ObservationPhotoTailMarkPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			ObservationPhotoTailMarkPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given ObservationPhotoTailMark object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      ObservationPhotoTailMark $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(ObservationPhotoTailMark $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ObservationPhotoTailMarkPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ObservationPhotoTailMarkPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(ObservationPhotoTailMarkPeer::DATABASE_NAME, ObservationPhotoTailMarkPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     ObservationPhotoTailMark
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ObservationPhotoTailMarkPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ObservationPhotoTailMarkPeer::DATABASE_NAME);
		$criteria->add(ObservationPhotoTailMarkPeer::ID, $pk);

		$v = ObservationPhotoTailMarkPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ObservationPhotoTailMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ObservationPhotoTailMarkPeer::DATABASE_NAME);
			$criteria->add(ObservationPhotoTailMarkPeer::ID, $pks, Criteria::IN);
			$objs = ObservationPhotoTailMarkPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

	// symfony behavior
	
	/**
	 * Returns an array of arrays that contain columns in each unique index.
	 *
	 * @return array
	 */
	static public function getUniqueColumnNames()
	{
	  return array();
	}

	// symfony_behaviors behavior
	
	/**
	 * Returns the name of the hook to call from inside the supplied method.
	 *
	 * @param string $method The calling method
	 *
	 * @return string A hook name for {@link sfMixer}
	 *
	 * @throws LogicException If the method name is not recognized
	 */
	static private function getMixerPreSelectHook($method)
	{
	  if (preg_match('/^do(Select|Count)(Join(All(Except)?)?|Stmt)?/', $method, $match))
	  {
	    return sprintf('BaseObservationPhotoTailMarkPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BaseObservationPhotoTailMarkPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseObservationPhotoTailMarkPeer::buildTableMap();

