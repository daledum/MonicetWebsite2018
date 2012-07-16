<?php


/**
 * Base static class for performing query and update operations on the 'general_info' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseGeneralInfoPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'general_info';

	/** the related Propel class for this table */
	const OM_CLASS = 'GeneralInfo';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.GeneralInfo';

	/** the related TableMap class for this table */
	const TM_CLASS = 'GeneralInfoTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 15;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'general_info.ID';

	/** the column name for the CODE field */
	const CODE = 'general_info.CODE';

	/** the column name for the VESSEL_ID field */
	const VESSEL_ID = 'general_info.VESSEL_ID';

	/** the column name for the SKIPPER_ID field */
	const SKIPPER_ID = 'general_info.SKIPPER_ID';

	/** the column name for the GUIDE_ID field */
	const GUIDE_ID = 'general_info.GUIDE_ID';

	/** the column name for the COMPANY_ID field */
	const COMPANY_ID = 'general_info.COMPANY_ID';

	/** the column name for the BASE_LATITUDE field */
	const BASE_LATITUDE = 'general_info.BASE_LATITUDE';

	/** the column name for the BASE_LONGITUDE field */
	const BASE_LONGITUDE = 'general_info.BASE_LONGITUDE';

	/** the column name for the DATE field */
	const DATE = 'general_info.DATE';

	/** the column name for the VALID field */
	const VALID = 'general_info.VALID';

	/** the column name for the COMMENTS field */
	const COMMENTS = 'general_info.COMMENTS';

	/** the column name for the CREATED_BY field */
	const CREATED_BY = 'general_info.CREATED_BY';

	/** the column name for the UPDATED_BY field */
	const UPDATED_BY = 'general_info.UPDATED_BY';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'general_info.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'general_info.UPDATED_AT';

	/**
	 * An identiy map to hold any loaded instances of GeneralInfo objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array GeneralInfo[]
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
		BasePeer::TYPE_PHPNAME => array ('Id', 'Code', 'VesselId', 'SkipperId', 'GuideId', 'CompanyId', 'BaseLatitude', 'BaseLongitude', 'Date', 'Valid', 'Comments', 'CreatedBy', 'UpdatedBy', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'code', 'vesselId', 'skipperId', 'guideId', 'companyId', 'baseLatitude', 'baseLongitude', 'date', 'valid', 'comments', 'createdBy', 'updatedBy', 'createdAt', 'updatedAt', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::CODE, self::VESSEL_ID, self::SKIPPER_ID, self::GUIDE_ID, self::COMPANY_ID, self::BASE_LATITUDE, self::BASE_LONGITUDE, self::DATE, self::VALID, self::COMMENTS, self::CREATED_BY, self::UPDATED_BY, self::CREATED_AT, self::UPDATED_AT, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CODE', 'VESSEL_ID', 'SKIPPER_ID', 'GUIDE_ID', 'COMPANY_ID', 'BASE_LATITUDE', 'BASE_LONGITUDE', 'DATE', 'VALID', 'COMMENTS', 'CREATED_BY', 'UPDATED_BY', 'CREATED_AT', 'UPDATED_AT', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'code', 'vessel_id', 'skipper_id', 'guide_id', 'company_id', 'base_latitude', 'base_longitude', 'date', 'valid', 'comments', 'created_by', 'updated_by', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Code' => 1, 'VesselId' => 2, 'SkipperId' => 3, 'GuideId' => 4, 'CompanyId' => 5, 'BaseLatitude' => 6, 'BaseLongitude' => 7, 'Date' => 8, 'Valid' => 9, 'Comments' => 10, 'CreatedBy' => 11, 'UpdatedBy' => 12, 'CreatedAt' => 13, 'UpdatedAt' => 14, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'code' => 1, 'vesselId' => 2, 'skipperId' => 3, 'guideId' => 4, 'companyId' => 5, 'baseLatitude' => 6, 'baseLongitude' => 7, 'date' => 8, 'valid' => 9, 'comments' => 10, 'createdBy' => 11, 'updatedBy' => 12, 'createdAt' => 13, 'updatedAt' => 14, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::CODE => 1, self::VESSEL_ID => 2, self::SKIPPER_ID => 3, self::GUIDE_ID => 4, self::COMPANY_ID => 5, self::BASE_LATITUDE => 6, self::BASE_LONGITUDE => 7, self::DATE => 8, self::VALID => 9, self::COMMENTS => 10, self::CREATED_BY => 11, self::UPDATED_BY => 12, self::CREATED_AT => 13, self::UPDATED_AT => 14, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CODE' => 1, 'VESSEL_ID' => 2, 'SKIPPER_ID' => 3, 'GUIDE_ID' => 4, 'COMPANY_ID' => 5, 'BASE_LATITUDE' => 6, 'BASE_LONGITUDE' => 7, 'DATE' => 8, 'VALID' => 9, 'COMMENTS' => 10, 'CREATED_BY' => 11, 'UPDATED_BY' => 12, 'CREATED_AT' => 13, 'UPDATED_AT' => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'code' => 1, 'vessel_id' => 2, 'skipper_id' => 3, 'guide_id' => 4, 'company_id' => 5, 'base_latitude' => 6, 'base_longitude' => 7, 'date' => 8, 'valid' => 9, 'comments' => 10, 'created_by' => 11, 'updated_by' => 12, 'created_at' => 13, 'updated_at' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
	 * @param      string $column The column name for current table. (i.e. GeneralInfoPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(GeneralInfoPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(GeneralInfoPeer::ID);
			$criteria->addSelectColumn(GeneralInfoPeer::CODE);
			$criteria->addSelectColumn(GeneralInfoPeer::VESSEL_ID);
			$criteria->addSelectColumn(GeneralInfoPeer::SKIPPER_ID);
			$criteria->addSelectColumn(GeneralInfoPeer::GUIDE_ID);
			$criteria->addSelectColumn(GeneralInfoPeer::COMPANY_ID);
			$criteria->addSelectColumn(GeneralInfoPeer::BASE_LATITUDE);
			$criteria->addSelectColumn(GeneralInfoPeer::BASE_LONGITUDE);
			$criteria->addSelectColumn(GeneralInfoPeer::DATE);
			$criteria->addSelectColumn(GeneralInfoPeer::VALID);
			$criteria->addSelectColumn(GeneralInfoPeer::COMMENTS);
			$criteria->addSelectColumn(GeneralInfoPeer::CREATED_BY);
			$criteria->addSelectColumn(GeneralInfoPeer::UPDATED_BY);
			$criteria->addSelectColumn(GeneralInfoPeer::CREATED_AT);
			$criteria->addSelectColumn(GeneralInfoPeer::UPDATED_AT);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.CODE');
			$criteria->addSelectColumn($alias . '.VESSEL_ID');
			$criteria->addSelectColumn($alias . '.SKIPPER_ID');
			$criteria->addSelectColumn($alias . '.GUIDE_ID');
			$criteria->addSelectColumn($alias . '.COMPANY_ID');
			$criteria->addSelectColumn($alias . '.BASE_LATITUDE');
			$criteria->addSelectColumn($alias . '.BASE_LONGITUDE');
			$criteria->addSelectColumn($alias . '.DATE');
			$criteria->addSelectColumn($alias . '.VALID');
			$criteria->addSelectColumn($alias . '.COMMENTS');
			$criteria->addSelectColumn($alias . '.CREATED_BY');
			$criteria->addSelectColumn($alias . '.UPDATED_BY');
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
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * @return     GeneralInfo
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = GeneralInfoPeer::doSelect($critcopy, $con);
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
		return GeneralInfoPeer::populateObjects(GeneralInfoPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			GeneralInfoPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * @param      GeneralInfo $value A GeneralInfo object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(GeneralInfo $obj, $key = null)
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
	 * @param      mixed $value A GeneralInfo object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof GeneralInfo) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or GeneralInfo object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     GeneralInfo Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to general_info
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
		// Invalidate objects in RecordPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		RecordPeer::clearInstancePool();
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
		$cls = GeneralInfoPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = GeneralInfoPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				GeneralInfoPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (GeneralInfo object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = GeneralInfoPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + GeneralInfoPeer::NUM_COLUMNS;
		} else {
			$cls = GeneralInfoPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			GeneralInfoPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Vessel table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinVessel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Skipper table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSkipper(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Guide table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinGuide(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Company table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinCompany(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByCreatedBy table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByUpdatedBy table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Selects a collection of GeneralInfo objects pre-filled with their Vessel objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinVessel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);
		VesselPeer::addSelectColumns($criteria);

		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = VesselPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = VesselPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = VesselPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					VesselPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (GeneralInfo) to $obj2 (Vessel)
				$obj2->addGeneralInfo($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of GeneralInfo objects pre-filled with their Skipper objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSkipper(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);
		SkipperPeer::addSelectColumns($criteria);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SkipperPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SkipperPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SkipperPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SkipperPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (GeneralInfo) to $obj2 (Skipper)
				$obj2->addGeneralInfo($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of GeneralInfo objects pre-filled with their Guide objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinGuide(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);
		GuidePeer::addSelectColumns($criteria);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = GuidePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = GuidePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = GuidePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					GuidePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (GeneralInfo) to $obj2 (Guide)
				$obj2->addGeneralInfo($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of GeneralInfo objects pre-filled with their Company objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCompany(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);
		CompanyPeer::addSelectColumns($criteria);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = CompanyPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CompanyPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CompanyPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CompanyPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (GeneralInfo) to $obj2 (Company)
				$obj2->addGeneralInfo($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of GeneralInfo objects pre-filled with their sfGuardUser objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);
		sfGuardUserPeer::addSelectColumns($criteria);

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = sfGuardUserPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = sfGuardUserPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					sfGuardUserPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (GeneralInfo) to $obj2 (sfGuardUser)
				$obj2->addGeneralInfoRelatedByCreatedBy($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of GeneralInfo objects pre-filled with their sfGuardUser objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);
		sfGuardUserPeer::addSelectColumns($criteria);

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = sfGuardUserPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = sfGuardUserPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					sfGuardUserPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (GeneralInfo) to $obj2 (sfGuardUser)
				$obj2->addGeneralInfoRelatedByUpdatedBy($obj1);

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
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Selects a collection of GeneralInfo objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
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

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol2 = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);

		VesselPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (VesselPeer::NUM_COLUMNS - VesselPeer::NUM_LAZY_LOAD_COLUMNS);

		SkipperPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SkipperPeer::NUM_COLUMNS - SkipperPeer::NUM_LAZY_LOAD_COLUMNS);

		GuidePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (GuidePeer::NUM_COLUMNS - GuidePeer::NUM_LAZY_LOAD_COLUMNS);

		CompanyPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (CompanyPeer::NUM_COLUMNS - CompanyPeer::NUM_LAZY_LOAD_COLUMNS);

		sfGuardUserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS);

		sfGuardUserPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Vessel rows

			$key2 = VesselPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = VesselPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = VesselPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					VesselPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj2 (Vessel)
				$obj2->addGeneralInfo($obj1);
			} // if joined row not null

			// Add objects for joined Skipper rows

			$key3 = SkipperPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = SkipperPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = SkipperPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SkipperPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj3 (Skipper)
				$obj3->addGeneralInfo($obj1);
			} // if joined row not null

			// Add objects for joined Guide rows

			$key4 = GuidePeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = GuidePeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = GuidePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					GuidePeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj4 (Guide)
				$obj4->addGeneralInfo($obj1);
			} // if joined row not null

			// Add objects for joined Company rows

			$key5 = CompanyPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = CompanyPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = CompanyPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					CompanyPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj5 (Company)
				$obj5->addGeneralInfo($obj1);
			} // if joined row not null

			// Add objects for joined sfGuardUser rows

			$key6 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = sfGuardUserPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$cls = sfGuardUserPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					sfGuardUserPeer::addInstanceToPool($obj6, $key6);
				} // if obj6 loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj6 (sfGuardUser)
				$obj6->addGeneralInfoRelatedByCreatedBy($obj1);
			} // if joined row not null

			// Add objects for joined sfGuardUser rows

			$key7 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
			if ($key7 !== null) {
				$obj7 = sfGuardUserPeer::getInstanceFromPool($key7);
				if (!$obj7) {

					$cls = sfGuardUserPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					sfGuardUserPeer::addInstanceToPool($obj7, $key7);
				} // if obj7 loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj7 (sfGuardUser)
				$obj7->addGeneralInfoRelatedByUpdatedBy($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Vessel table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptVessel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Skipper table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSkipper(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Guide table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptGuide(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Company table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCompany(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByCreatedBy table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByUpdatedBy table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			GeneralInfoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
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
	 * Selects a collection of GeneralInfo objects pre-filled with all related objects except Vessel.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptVessel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol2 = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);

		SkipperPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SkipperPeer::NUM_COLUMNS - SkipperPeer::NUM_LAZY_LOAD_COLUMNS);

		GuidePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (GuidePeer::NUM_COLUMNS - GuidePeer::NUM_LAZY_LOAD_COLUMNS);

		CompanyPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (CompanyPeer::NUM_COLUMNS - CompanyPeer::NUM_LAZY_LOAD_COLUMNS);

		sfGuardUserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS);

		sfGuardUserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Skipper rows

				$key2 = SkipperPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SkipperPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SkipperPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SkipperPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj2 (Skipper)
				$obj2->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Guide rows

				$key3 = GuidePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = GuidePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = GuidePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					GuidePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj3 (Guide)
				$obj3->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Company rows

				$key4 = CompanyPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CompanyPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = CompanyPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CompanyPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj4 (Company)
				$obj4->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined sfGuardUser rows

				$key5 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = sfGuardUserPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = sfGuardUserPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					sfGuardUserPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj5 (sfGuardUser)
				$obj5->addGeneralInfoRelatedByCreatedBy($obj1);

			} // if joined row is not null

				// Add objects for joined sfGuardUser rows

				$key6 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = sfGuardUserPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = sfGuardUserPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					sfGuardUserPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj6 (sfGuardUser)
				$obj6->addGeneralInfoRelatedByUpdatedBy($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of GeneralInfo objects pre-filled with all related objects except Skipper.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSkipper(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol2 = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);

		VesselPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (VesselPeer::NUM_COLUMNS - VesselPeer::NUM_LAZY_LOAD_COLUMNS);

		GuidePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (GuidePeer::NUM_COLUMNS - GuidePeer::NUM_LAZY_LOAD_COLUMNS);

		CompanyPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (CompanyPeer::NUM_COLUMNS - CompanyPeer::NUM_LAZY_LOAD_COLUMNS);

		sfGuardUserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS);

		sfGuardUserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Vessel rows

				$key2 = VesselPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = VesselPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = VesselPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					VesselPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj2 (Vessel)
				$obj2->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Guide rows

				$key3 = GuidePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = GuidePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = GuidePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					GuidePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj3 (Guide)
				$obj3->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Company rows

				$key4 = CompanyPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CompanyPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = CompanyPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CompanyPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj4 (Company)
				$obj4->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined sfGuardUser rows

				$key5 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = sfGuardUserPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = sfGuardUserPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					sfGuardUserPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj5 (sfGuardUser)
				$obj5->addGeneralInfoRelatedByCreatedBy($obj1);

			} // if joined row is not null

				// Add objects for joined sfGuardUser rows

				$key6 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = sfGuardUserPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = sfGuardUserPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					sfGuardUserPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj6 (sfGuardUser)
				$obj6->addGeneralInfoRelatedByUpdatedBy($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of GeneralInfo objects pre-filled with all related objects except Guide.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptGuide(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol2 = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);

		VesselPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (VesselPeer::NUM_COLUMNS - VesselPeer::NUM_LAZY_LOAD_COLUMNS);

		SkipperPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SkipperPeer::NUM_COLUMNS - SkipperPeer::NUM_LAZY_LOAD_COLUMNS);

		CompanyPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (CompanyPeer::NUM_COLUMNS - CompanyPeer::NUM_LAZY_LOAD_COLUMNS);

		sfGuardUserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS);

		sfGuardUserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Vessel rows

				$key2 = VesselPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = VesselPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = VesselPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					VesselPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj2 (Vessel)
				$obj2->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Skipper rows

				$key3 = SkipperPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SkipperPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SkipperPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SkipperPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj3 (Skipper)
				$obj3->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Company rows

				$key4 = CompanyPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CompanyPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = CompanyPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CompanyPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj4 (Company)
				$obj4->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined sfGuardUser rows

				$key5 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = sfGuardUserPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = sfGuardUserPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					sfGuardUserPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj5 (sfGuardUser)
				$obj5->addGeneralInfoRelatedByCreatedBy($obj1);

			} // if joined row is not null

				// Add objects for joined sfGuardUser rows

				$key6 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = sfGuardUserPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = sfGuardUserPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					sfGuardUserPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj6 (sfGuardUser)
				$obj6->addGeneralInfoRelatedByUpdatedBy($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of GeneralInfo objects pre-filled with all related objects except Company.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCompany(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol2 = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);

		VesselPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (VesselPeer::NUM_COLUMNS - VesselPeer::NUM_LAZY_LOAD_COLUMNS);

		SkipperPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SkipperPeer::NUM_COLUMNS - SkipperPeer::NUM_LAZY_LOAD_COLUMNS);

		GuidePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (GuidePeer::NUM_COLUMNS - GuidePeer::NUM_LAZY_LOAD_COLUMNS);

		sfGuardUserPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS);

		sfGuardUserPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Vessel rows

				$key2 = VesselPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = VesselPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = VesselPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					VesselPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj2 (Vessel)
				$obj2->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Skipper rows

				$key3 = SkipperPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SkipperPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SkipperPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SkipperPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj3 (Skipper)
				$obj3->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Guide rows

				$key4 = GuidePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = GuidePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = GuidePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					GuidePeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj4 (Guide)
				$obj4->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined sfGuardUser rows

				$key5 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = sfGuardUserPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = sfGuardUserPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					sfGuardUserPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj5 (sfGuardUser)
				$obj5->addGeneralInfoRelatedByCreatedBy($obj1);

			} // if joined row is not null

				// Add objects for joined sfGuardUser rows

				$key6 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = sfGuardUserPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = sfGuardUserPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					sfGuardUserPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj6 (sfGuardUser)
				$obj6->addGeneralInfoRelatedByUpdatedBy($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of GeneralInfo objects pre-filled with all related objects except sfGuardUserRelatedByCreatedBy.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol2 = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);

		VesselPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (VesselPeer::NUM_COLUMNS - VesselPeer::NUM_LAZY_LOAD_COLUMNS);

		SkipperPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SkipperPeer::NUM_COLUMNS - SkipperPeer::NUM_LAZY_LOAD_COLUMNS);

		GuidePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (GuidePeer::NUM_COLUMNS - GuidePeer::NUM_LAZY_LOAD_COLUMNS);

		CompanyPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (CompanyPeer::NUM_COLUMNS - CompanyPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Vessel rows

				$key2 = VesselPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = VesselPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = VesselPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					VesselPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj2 (Vessel)
				$obj2->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Skipper rows

				$key3 = SkipperPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SkipperPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SkipperPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SkipperPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj3 (Skipper)
				$obj3->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Guide rows

				$key4 = GuidePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = GuidePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = GuidePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					GuidePeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj4 (Guide)
				$obj4->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Company rows

				$key5 = CompanyPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = CompanyPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = CompanyPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					CompanyPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj5 (Company)
				$obj5->addGeneralInfo($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of GeneralInfo objects pre-filled with all related objects except sfGuardUserRelatedByUpdatedBy.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of GeneralInfo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		GeneralInfoPeer::addSelectColumns($criteria);
		$startcol2 = (GeneralInfoPeer::NUM_COLUMNS - GeneralInfoPeer::NUM_LAZY_LOAD_COLUMNS);

		VesselPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (VesselPeer::NUM_COLUMNS - VesselPeer::NUM_LAZY_LOAD_COLUMNS);

		SkipperPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (SkipperPeer::NUM_COLUMNS - SkipperPeer::NUM_LAZY_LOAD_COLUMNS);

		GuidePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (GuidePeer::NUM_COLUMNS - GuidePeer::NUM_LAZY_LOAD_COLUMNS);

		CompanyPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (CompanyPeer::NUM_COLUMNS - CompanyPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(GeneralInfoPeer::VESSEL_ID, VesselPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::SKIPPER_ID, SkipperPeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::GUIDE_ID, GuidePeer::ID, $join_behavior);

		$criteria->addJoin(GeneralInfoPeer::COMPANY_ID, CompanyPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseGeneralInfoPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = GeneralInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = GeneralInfoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = GeneralInfoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				GeneralInfoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Vessel rows

				$key2 = VesselPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = VesselPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = VesselPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					VesselPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj2 (Vessel)
				$obj2->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Skipper rows

				$key3 = SkipperPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = SkipperPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = SkipperPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					SkipperPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj3 (Skipper)
				$obj3->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Guide rows

				$key4 = GuidePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = GuidePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = GuidePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					GuidePeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj4 (Guide)
				$obj4->addGeneralInfo($obj1);

			} // if joined row is not null

				// Add objects for joined Company rows

				$key5 = CompanyPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = CompanyPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = CompanyPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					CompanyPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (GeneralInfo) to the collection in $obj5 (Company)
				$obj5->addGeneralInfo($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseGeneralInfoPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseGeneralInfoPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new GeneralInfoTableMap());
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
		return $withPrefix ? GeneralInfoPeer::CLASS_DEFAULT : GeneralInfoPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a GeneralInfo or Criteria object.
	 *
	 * @param      mixed $values Criteria or GeneralInfo object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from GeneralInfo object
		}

		if ($criteria->containsKey(GeneralInfoPeer::ID) && $criteria->keyContainsValue(GeneralInfoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.GeneralInfoPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a GeneralInfo or Criteria object.
	 *
	 * @param      mixed $values Criteria or GeneralInfo object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(GeneralInfoPeer::ID);
			$value = $criteria->remove(GeneralInfoPeer::ID);
			if ($value) {
				$selectCriteria->add(GeneralInfoPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(GeneralInfoPeer::TABLE_NAME);
			}

		} else { // $values is GeneralInfo object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the general_info table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += GeneralInfoPeer::doOnDeleteCascade(new Criteria(GeneralInfoPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(GeneralInfoPeer::TABLE_NAME, $con, GeneralInfoPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			GeneralInfoPeer::clearInstancePool();
			GeneralInfoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a GeneralInfo or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or GeneralInfo object or primary key or array of primary keys
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
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof GeneralInfo) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GeneralInfoPeer::ID, (array) $values, Criteria::IN);
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
			$affectedRows += GeneralInfoPeer::doOnDeleteCascade($c, $con);
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				GeneralInfoPeer::clearInstancePool();
			} elseif ($values instanceof GeneralInfo) { // it's a model object
				GeneralInfoPeer::removeInstanceFromPool($values);
			} else { // it's a primary key, or an array of pks
				foreach ((array) $values as $singleval) {
					GeneralInfoPeer::removeInstanceFromPool($singleval);
				}
			}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			GeneralInfoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
	 * feature (like MySQL or SQLite).
	 *
	 * This method is not very speedy because it must perform a query first to get
	 * the implicated records and then perform the deletes by calling those Peer classes.
	 *
	 * This method should be used within a transaction if possible.
	 *
	 * @param      Criteria $criteria
	 * @param      PropelPDO $con
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
	{
		// initialize var to track total num of affected rows
		$affectedRows = 0;

		// first find the objects that are implicated by the $criteria
		$objects = GeneralInfoPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


			// delete related Record objects
			$criteria = new Criteria(RecordPeer::DATABASE_NAME);
			
			$criteria->add(RecordPeer::GENERAL_INFO_ID, $obj->getId());
			$affectedRows += RecordPeer::doDelete($criteria, $con);
		}
		return $affectedRows;
	}

	/**
	 * Validates all modified columns of given GeneralInfo object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      GeneralInfo $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(GeneralInfo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GeneralInfoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GeneralInfoPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GeneralInfoPeer::DATABASE_NAME, GeneralInfoPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     GeneralInfo
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = GeneralInfoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(GeneralInfoPeer::DATABASE_NAME);
		$criteria->add(GeneralInfoPeer::ID, $pk);

		$v = GeneralInfoPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(GeneralInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(GeneralInfoPeer::DATABASE_NAME);
			$criteria->add(GeneralInfoPeer::ID, $pks, Criteria::IN);
			$objs = GeneralInfoPeer::doSelect($criteria, $con);
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
	    return sprintf('BaseGeneralInfoPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BaseGeneralInfoPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseGeneralInfoPeer::buildTableMap();

