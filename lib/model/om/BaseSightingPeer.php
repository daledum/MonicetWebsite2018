<?php


/**
 * Base static class for performing query and update operations on the 'sighting' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSightingPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'sighting';

	/** the related Propel class for this table */
	const OM_CLASS = 'Sighting';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.Sighting';

	/** the related TableMap class for this table */
	const TM_CLASS = 'SightingTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 12;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'sighting.ID';

	/** the column name for the RECORD_ID field */
	const RECORD_ID = 'sighting.RECORD_ID';

	/** the column name for the SPECIE_ID field */
	const SPECIE_ID = 'sighting.SPECIE_ID';

	/** the column name for the BEHAVIOUR_ID field */
	const BEHAVIOUR_ID = 'sighting.BEHAVIOUR_ID';

	/** the column name for the ASSOCIATION_ID field */
	const ASSOCIATION_ID = 'sighting.ASSOCIATION_ID';

	/** the column name for the ADULTS field */
	const ADULTS = 'sighting.ADULTS';

	/** the column name for the JUVENILES field */
	const JUVENILES = 'sighting.JUVENILES';

	/** the column name for the CALVES field */
	const CALVES = 'sighting.CALVES';

	/** the column name for the TOTAL field */
	const TOTAL = 'sighting.TOTAL';

	/** the column name for the COMMENTS field */
	const COMMENTS = 'sighting.COMMENTS';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'sighting.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'sighting.UPDATED_AT';

	/**
	 * An identiy map to hold any loaded instances of Sighting objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Sighting[]
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
		BasePeer::TYPE_PHPNAME => array ('Id', 'RecordId', 'SpecieId', 'BehaviourId', 'AssociationId', 'Adults', 'Juveniles', 'Calves', 'Total', 'Comments', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'recordId', 'specieId', 'behaviourId', 'associationId', 'adults', 'juveniles', 'calves', 'total', 'comments', 'createdAt', 'updatedAt', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::RECORD_ID, self::SPECIE_ID, self::BEHAVIOUR_ID, self::ASSOCIATION_ID, self::ADULTS, self::JUVENILES, self::CALVES, self::TOTAL, self::COMMENTS, self::CREATED_AT, self::UPDATED_AT, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'RECORD_ID', 'SPECIE_ID', 'BEHAVIOUR_ID', 'ASSOCIATION_ID', 'ADULTS', 'JUVENILES', 'CALVES', 'TOTAL', 'COMMENTS', 'CREATED_AT', 'UPDATED_AT', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'record_id', 'specie_id', 'behaviour_id', 'association_id', 'adults', 'juveniles', 'calves', 'total', 'comments', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'RecordId' => 1, 'SpecieId' => 2, 'BehaviourId' => 3, 'AssociationId' => 4, 'Adults' => 5, 'Juveniles' => 6, 'Calves' => 7, 'Total' => 8, 'Comments' => 9, 'CreatedAt' => 10, 'UpdatedAt' => 11, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'recordId' => 1, 'specieId' => 2, 'behaviourId' => 3, 'associationId' => 4, 'adults' => 5, 'juveniles' => 6, 'calves' => 7, 'total' => 8, 'comments' => 9, 'createdAt' => 10, 'updatedAt' => 11, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::RECORD_ID => 1, self::SPECIE_ID => 2, self::BEHAVIOUR_ID => 3, self::ASSOCIATION_ID => 4, self::ADULTS => 5, self::JUVENILES => 6, self::CALVES => 7, self::TOTAL => 8, self::COMMENTS => 9, self::CREATED_AT => 10, self::UPDATED_AT => 11, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'RECORD_ID' => 1, 'SPECIE_ID' => 2, 'BEHAVIOUR_ID' => 3, 'ASSOCIATION_ID' => 4, 'ADULTS' => 5, 'JUVENILES' => 6, 'CALVES' => 7, 'TOTAL' => 8, 'COMMENTS' => 9, 'CREATED_AT' => 10, 'UPDATED_AT' => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'record_id' => 1, 'specie_id' => 2, 'behaviour_id' => 3, 'association_id' => 4, 'adults' => 5, 'juveniles' => 6, 'calves' => 7, 'total' => 8, 'comments' => 9, 'created_at' => 10, 'updated_at' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
	 * @param      string $column The column name for current table. (i.e. SightingPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(SightingPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(SightingPeer::ID);
			$criteria->addSelectColumn(SightingPeer::RECORD_ID);
			$criteria->addSelectColumn(SightingPeer::SPECIE_ID);
			$criteria->addSelectColumn(SightingPeer::BEHAVIOUR_ID);
			$criteria->addSelectColumn(SightingPeer::ASSOCIATION_ID);
			$criteria->addSelectColumn(SightingPeer::ADULTS);
			$criteria->addSelectColumn(SightingPeer::JUVENILES);
			$criteria->addSelectColumn(SightingPeer::CALVES);
			$criteria->addSelectColumn(SightingPeer::TOTAL);
			$criteria->addSelectColumn(SightingPeer::COMMENTS);
			$criteria->addSelectColumn(SightingPeer::CREATED_AT);
			$criteria->addSelectColumn(SightingPeer::UPDATED_AT);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.RECORD_ID');
			$criteria->addSelectColumn($alias . '.SPECIE_ID');
			$criteria->addSelectColumn($alias . '.BEHAVIOUR_ID');
			$criteria->addSelectColumn($alias . '.ASSOCIATION_ID');
			$criteria->addSelectColumn($alias . '.ADULTS');
			$criteria->addSelectColumn($alias . '.JUVENILES');
			$criteria->addSelectColumn($alias . '.CALVES');
			$criteria->addSelectColumn($alias . '.TOTAL');
			$criteria->addSelectColumn($alias . '.COMMENTS');
			$criteria->addSelectColumn($alias . '.CREATED_AT');
			$criteria->addSelectColumn($alias . '.UPDATED_AT');
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
		$criteria->setPrimaryTableName(SightingPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SightingPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
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
	 * @return     Sighting
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = SightingPeer::doSelect($critcopy, $con);
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
		return SightingPeer::populateObjects(SightingPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			SightingPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
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
	 * @param      Sighting $value A Sighting object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Sighting $obj, $key = null)
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
	 * @param      mixed $value A Sighting object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Sighting) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Sighting object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Sighting Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to sighting
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
		// Invalidate objects in ObservationPhotoPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ObservationPhotoPeer::clearInstancePool();
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
		$cls = SightingPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = SightingPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = SightingPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				SightingPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (Sighting object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = SightingPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = SightingPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + SightingPeer::NUM_COLUMNS;
		} else {
			$cls = SightingPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			SightingPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Record table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinRecord(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SightingPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SightingPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Specie table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSpecie(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SightingPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SightingPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SightingPeer::SPECIE_ID, SpeciePeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Behaviour table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinBehaviour(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SightingPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SightingPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SightingPeer::BEHAVIOUR_ID, BehaviourPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Association table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAssociation(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SightingPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SightingPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SightingPeer::ASSOCIATION_ID, AssociationPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
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
	 * Selects a collection of Sighting objects pre-filled with their Record objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Sighting objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinRecord(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SightingPeer::addSelectColumns($criteria);
		$startcol = (SightingPeer::NUM_COLUMNS - SightingPeer::NUM_LAZY_LOAD_COLUMNS);
		RecordPeer::addSelectColumns($criteria);

		$criteria->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SightingPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SightingPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SightingPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SightingPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = RecordPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = RecordPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = RecordPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					RecordPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Sighting) to $obj2 (Record)
				$obj2->addSighting($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Sighting objects pre-filled with their Specie objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Sighting objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSpecie(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SightingPeer::addSelectColumns($criteria);
		$startcol = (SightingPeer::NUM_COLUMNS - SightingPeer::NUM_LAZY_LOAD_COLUMNS);
		SpeciePeer::addSelectColumns($criteria);

		$criteria->addJoin(SightingPeer::SPECIE_ID, SpeciePeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SightingPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SightingPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SightingPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SightingPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SpeciePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SpeciePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SpeciePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SpeciePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Sighting) to $obj2 (Specie)
				$obj2->addSighting($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Sighting objects pre-filled with their Behaviour objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Sighting objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinBehaviour(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SightingPeer::addSelectColumns($criteria);
		$startcol = (SightingPeer::NUM_COLUMNS - SightingPeer::NUM_LAZY_LOAD_COLUMNS);
		BehaviourPeer::addSelectColumns($criteria);

		$criteria->addJoin(SightingPeer::BEHAVIOUR_ID, BehaviourPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SightingPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SightingPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SightingPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SightingPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = BehaviourPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = BehaviourPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = BehaviourPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					BehaviourPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Sighting) to $obj2 (Behaviour)
				$obj2->addSighting($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Sighting objects pre-filled with their Association objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Sighting objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAssociation(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SightingPeer::addSelectColumns($criteria);
		$startcol = (SightingPeer::NUM_COLUMNS - SightingPeer::NUM_LAZY_LOAD_COLUMNS);
		AssociationPeer::addSelectColumns($criteria);

		$criteria->addJoin(SightingPeer::ASSOCIATION_ID, AssociationPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SightingPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SightingPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = SightingPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SightingPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = AssociationPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AssociationPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AssociationPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AssociationPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Sighting) to $obj2 (Association)
				$obj2->addSighting($obj1);

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
		$criteria->setPrimaryTableName(SightingPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SightingPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::SPECIE_ID, SpeciePeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::BEHAVIOUR_ID, BehaviourPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::ASSOCIATION_ID, AssociationPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
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
	 * Selects a collection of Sighting objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Sighting objects.
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

		SightingPeer::addSelectColumns($criteria);
		$startcol2 = (SightingPeer::NUM_COLUMNS - SightingPeer::NUM_LAZY_LOAD_COLUMNS);

		RecordPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (RecordPeer::NUM_COLUMNS - RecordPeer::NUM_LAZY_LOAD_COLUMNS);

		SpeciePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SpeciePeer::NUM_COLUMNS - SpeciePeer::NUM_LAZY_LOAD_COLUMNS);

		BehaviourPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (BehaviourPeer::NUM_COLUMNS - BehaviourPeer::NUM_LAZY_LOAD_COLUMNS);

		AssociationPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (AssociationPeer::NUM_COLUMNS - AssociationPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::SPECIE_ID, SpeciePeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::BEHAVIOUR_ID, BehaviourPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::ASSOCIATION_ID, AssociationPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SightingPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SightingPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SightingPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SightingPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Record rows

			$key2 = RecordPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = RecordPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = RecordPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RecordPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Sighting) to the collection in $obj2 (Record)
				$obj2->addSighting($obj1);
			} // if joined row not null

			// Add objects for joined Specie rows

			$key3 = SpeciePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = SpeciePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = SpeciePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SpeciePeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Sighting) to the collection in $obj3 (Specie)
				$obj3->addSighting($obj1);
			} // if joined row not null

			// Add objects for joined Behaviour rows

			$key4 = BehaviourPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = BehaviourPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = BehaviourPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					BehaviourPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (Sighting) to the collection in $obj4 (Behaviour)
				$obj4->addSighting($obj1);
			} // if joined row not null

			// Add objects for joined Association rows

			$key5 = AssociationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = AssociationPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = AssociationPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					AssociationPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (Sighting) to the collection in $obj5 (Association)
				$obj5->addSighting($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Record table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptRecord(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SightingPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SightingPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SightingPeer::SPECIE_ID, SpeciePeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::BEHAVIOUR_ID, BehaviourPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::ASSOCIATION_ID, AssociationPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Specie table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSpecie(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SightingPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SightingPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::BEHAVIOUR_ID, BehaviourPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::ASSOCIATION_ID, AssociationPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Behaviour table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptBehaviour(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SightingPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SightingPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::SPECIE_ID, SpeciePeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::ASSOCIATION_ID, AssociationPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Association table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptAssociation(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SightingPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SightingPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::SPECIE_ID, SpeciePeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::BEHAVIOUR_ID, BehaviourPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
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
	 * Selects a collection of Sighting objects pre-filled with all related objects except Record.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Sighting objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptRecord(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SightingPeer::addSelectColumns($criteria);
		$startcol2 = (SightingPeer::NUM_COLUMNS - SightingPeer::NUM_LAZY_LOAD_COLUMNS);

		SpeciePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SpeciePeer::NUM_COLUMNS - SpeciePeer::NUM_LAZY_LOAD_COLUMNS);

		BehaviourPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (BehaviourPeer::NUM_COLUMNS - BehaviourPeer::NUM_LAZY_LOAD_COLUMNS);

		AssociationPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (AssociationPeer::NUM_COLUMNS - AssociationPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SightingPeer::SPECIE_ID, SpeciePeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::BEHAVIOUR_ID, BehaviourPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::ASSOCIATION_ID, AssociationPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SightingPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SightingPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SightingPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SightingPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Specie rows

				$key2 = SpeciePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SpeciePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SpeciePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SpeciePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj2 (Specie)
				$obj2->addSighting($obj1);

			} // if joined row is not null

				// Add objects for joined Behaviour rows

				$key3 = BehaviourPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = BehaviourPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = BehaviourPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					BehaviourPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj3 (Behaviour)
				$obj3->addSighting($obj1);

			} // if joined row is not null

				// Add objects for joined Association rows

				$key4 = AssociationPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = AssociationPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = AssociationPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					AssociationPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj4 (Association)
				$obj4->addSighting($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Sighting objects pre-filled with all related objects except Specie.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Sighting objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSpecie(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SightingPeer::addSelectColumns($criteria);
		$startcol2 = (SightingPeer::NUM_COLUMNS - SightingPeer::NUM_LAZY_LOAD_COLUMNS);

		RecordPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (RecordPeer::NUM_COLUMNS - RecordPeer::NUM_LAZY_LOAD_COLUMNS);

		BehaviourPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (BehaviourPeer::NUM_COLUMNS - BehaviourPeer::NUM_LAZY_LOAD_COLUMNS);

		AssociationPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (AssociationPeer::NUM_COLUMNS - AssociationPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::BEHAVIOUR_ID, BehaviourPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::ASSOCIATION_ID, AssociationPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SightingPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SightingPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SightingPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SightingPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Record rows

				$key2 = RecordPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = RecordPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = RecordPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RecordPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj2 (Record)
				$obj2->addSighting($obj1);

			} // if joined row is not null

				// Add objects for joined Behaviour rows

				$key3 = BehaviourPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = BehaviourPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = BehaviourPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					BehaviourPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj3 (Behaviour)
				$obj3->addSighting($obj1);

			} // if joined row is not null

				// Add objects for joined Association rows

				$key4 = AssociationPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = AssociationPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = AssociationPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					AssociationPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj4 (Association)
				$obj4->addSighting($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Sighting objects pre-filled with all related objects except Behaviour.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Sighting objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptBehaviour(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SightingPeer::addSelectColumns($criteria);
		$startcol2 = (SightingPeer::NUM_COLUMNS - SightingPeer::NUM_LAZY_LOAD_COLUMNS);

		RecordPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (RecordPeer::NUM_COLUMNS - RecordPeer::NUM_LAZY_LOAD_COLUMNS);

		SpeciePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SpeciePeer::NUM_COLUMNS - SpeciePeer::NUM_LAZY_LOAD_COLUMNS);

		AssociationPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (AssociationPeer::NUM_COLUMNS - AssociationPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::SPECIE_ID, SpeciePeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::ASSOCIATION_ID, AssociationPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SightingPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SightingPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SightingPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SightingPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Record rows

				$key2 = RecordPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = RecordPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = RecordPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RecordPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj2 (Record)
				$obj2->addSighting($obj1);

			} // if joined row is not null

				// Add objects for joined Specie rows

				$key3 = SpeciePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SpeciePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SpeciePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SpeciePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj3 (Specie)
				$obj3->addSighting($obj1);

			} // if joined row is not null

				// Add objects for joined Association rows

				$key4 = AssociationPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = AssociationPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = AssociationPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					AssociationPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj4 (Association)
				$obj4->addSighting($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Sighting objects pre-filled with all related objects except Association.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Sighting objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptAssociation(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		SightingPeer::addSelectColumns($criteria);
		$startcol2 = (SightingPeer::NUM_COLUMNS - SightingPeer::NUM_LAZY_LOAD_COLUMNS);

		RecordPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (RecordPeer::NUM_COLUMNS - RecordPeer::NUM_LAZY_LOAD_COLUMNS);

		SpeciePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SpeciePeer::NUM_COLUMNS - SpeciePeer::NUM_LAZY_LOAD_COLUMNS);

		BehaviourPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (BehaviourPeer::NUM_COLUMNS - BehaviourPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(SightingPeer::RECORD_ID, RecordPeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::SPECIE_ID, SpeciePeer::ID, $join_behavior);

		$criteria->addJoin(SightingPeer::BEHAVIOUR_ID, BehaviourPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseSightingPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = SightingPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = SightingPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = SightingPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				SightingPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Record rows

				$key2 = RecordPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = RecordPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = RecordPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RecordPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj2 (Record)
				$obj2->addSighting($obj1);

			} // if joined row is not null

				// Add objects for joined Specie rows

				$key3 = SpeciePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SpeciePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SpeciePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SpeciePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj3 (Specie)
				$obj3->addSighting($obj1);

			} // if joined row is not null

				// Add objects for joined Behaviour rows

				$key4 = BehaviourPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = BehaviourPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = BehaviourPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					BehaviourPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Sighting) to the collection in $obj4 (Behaviour)
				$obj4->addSighting($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseSightingPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseSightingPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new SightingTableMap());
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
		return $withPrefix ? SightingPeer::CLASS_DEFAULT : SightingPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Sighting or Criteria object.
	 *
	 * @param      mixed $values Criteria or Sighting object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Sighting object
		}

		if ($criteria->containsKey(SightingPeer::ID) && $criteria->keyContainsValue(SightingPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.SightingPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a Sighting or Criteria object.
	 *
	 * @param      mixed $values Criteria or Sighting object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(SightingPeer::ID);
			$value = $criteria->remove(SightingPeer::ID);
			if ($value) {
				$selectCriteria->add(SightingPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(SightingPeer::TABLE_NAME);
			}

		} else { // $values is Sighting object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the sighting table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			SightingPeer::doOnDeleteSetNull(new Criteria(SightingPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(SightingPeer::TABLE_NAME, $con, SightingPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SightingPeer::clearInstancePool();
			SightingPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Sighting or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Sighting object or primary key or array of primary keys
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
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Sighting) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SightingPeer::ID, (array) $values, Criteria::IN);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			// cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
			$c = clone $criteria;
			SightingPeer::doOnDeleteSetNull($c, $con);
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				SightingPeer::clearInstancePool();
			} elseif ($values instanceof Sighting) { // it's a model object
				SightingPeer::removeInstanceFromPool($values);
			} else { // it's a primary key, or an array of pks
				foreach ((array) $values as $singleval) {
					SightingPeer::removeInstanceFromPool($singleval);
				}
			}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			SightingPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * This is a method for emulating ON DELETE SET NULL DBs that don't support this
	 * feature (like MySQL or SQLite).
	 *
	 * This method is not very speedy because it must perform a query first to get
	 * the implicated records and then perform the deletes by calling those Peer classes.
	 *
	 * This method should be used within a transaction if possible.
	 *
	 * @param      Criteria $criteria
	 * @param      PropelPDO $con
	 * @return     void
	 */
	protected static function doOnDeleteSetNull(Criteria $criteria, PropelPDO $con)
	{

		// first find the objects that are implicated by the $criteria
		$objects = SightingPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {

			// set fkey col in related ObservationPhoto rows to NULL
			$selectCriteria = new Criteria(SightingPeer::DATABASE_NAME);
			$updateValues = new Criteria(SightingPeer::DATABASE_NAME);
			$selectCriteria->add(ObservationPhotoPeer::SIGHTING_ID, $obj->getId());
			$updateValues->add(ObservationPhotoPeer::SIGHTING_ID, null);

			BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

		}
	}

	/**
	 * Validates all modified columns of given Sighting object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Sighting $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Sighting $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SightingPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SightingPeer::TABLE_NAME);

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

		return BasePeer::doValidate(SightingPeer::DATABASE_NAME, SightingPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Sighting
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = SightingPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(SightingPeer::DATABASE_NAME);
		$criteria->add(SightingPeer::ID, $pk);

		$v = SightingPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(SightingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(SightingPeer::DATABASE_NAME);
			$criteria->add(SightingPeer::ID, $pks, Criteria::IN);
			$objs = SightingPeer::doSelect($criteria, $con);
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
	    return sprintf('BaseSightingPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BaseSightingPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSightingPeer::buildTableMap();

