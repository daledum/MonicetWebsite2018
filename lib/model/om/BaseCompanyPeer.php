<?php


/**
 * Base static class for performing query and update operations on the 'company' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCompanyPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'company';

	/** the related Propel class for this table */
	const OM_CLASS = 'Company';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.Company';

	/** the related TableMap class for this table */
	const TM_CLASS = 'CompanyTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 19;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'company.ID';

	/** the column name for the NAME field */
	const NAME = 'company.NAME';

	/** the column name for the ACRONYM field */
	const ACRONYM = 'company.ACRONYM';

	/** the column name for the REC_CET_CODE field */
	const REC_CET_CODE = 'company.REC_CET_CODE';

	/** the column name for the BASE_LATITUDE field */
	const BASE_LATITUDE = 'company.BASE_LATITUDE';

	/** the column name for the BASE_LONGITUDE field */
	const BASE_LONGITUDE = 'company.BASE_LONGITUDE';

	/** the column name for the TELEPHONE field */
	const TELEPHONE = 'company.TELEPHONE';

	/** the column name for the MOBILE field */
	const MOBILE = 'company.MOBILE';

	/** the column name for the FAX field */
	const FAX = 'company.FAX';

	/** the column name for the EMAIL field */
	const EMAIL = 'company.EMAIL';

	/** the column name for the ADDRESS field */
	const ADDRESS = 'company.ADDRESS';

	/** the column name for the ZIPCODE field */
	const ZIPCODE = 'company.ZIPCODE';

	/** the column name for the COUNTRY field */
	const COUNTRY = 'company.COUNTRY';

	/** the column name for the DISTRICT field */
	const DISTRICT = 'company.DISTRICT';

	/** the column name for the MUNICIPALITY field */
	const MUNICIPALITY = 'company.MUNICIPALITY';

	/** the column name for the LOCALITY field */
	const LOCALITY = 'company.LOCALITY';

	/** the column name for the OBSERVATIONS field */
	const OBSERVATIONS = 'company.OBSERVATIONS';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'company.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'company.UPDATED_AT';

	/**
	 * An identiy map to hold any loaded instances of Company objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Company[]
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
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Acronym', 'RecCetCode', 'BaseLatitude', 'BaseLongitude', 'Telephone', 'Mobile', 'Fax', 'Email', 'Address', 'Zipcode', 'Country', 'District', 'Municipality', 'Locality', 'Observations', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'name', 'acronym', 'recCetCode', 'baseLatitude', 'baseLongitude', 'telephone', 'mobile', 'fax', 'email', 'address', 'zipcode', 'country', 'district', 'municipality', 'locality', 'observations', 'createdAt', 'updatedAt', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::NAME, self::ACRONYM, self::REC_CET_CODE, self::BASE_LATITUDE, self::BASE_LONGITUDE, self::TELEPHONE, self::MOBILE, self::FAX, self::EMAIL, self::ADDRESS, self::ZIPCODE, self::COUNTRY, self::DISTRICT, self::MUNICIPALITY, self::LOCALITY, self::OBSERVATIONS, self::CREATED_AT, self::UPDATED_AT, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'NAME', 'ACRONYM', 'REC_CET_CODE', 'BASE_LATITUDE', 'BASE_LONGITUDE', 'TELEPHONE', 'MOBILE', 'FAX', 'EMAIL', 'ADDRESS', 'ZIPCODE', 'COUNTRY', 'DISTRICT', 'MUNICIPALITY', 'LOCALITY', 'OBSERVATIONS', 'CREATED_AT', 'UPDATED_AT', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'acronym', 'rec_cet_code', 'base_latitude', 'base_longitude', 'telephone', 'mobile', 'fax', 'email', 'address', 'zipcode', 'country', 'district', 'municipality', 'locality', 'observations', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Acronym' => 2, 'RecCetCode' => 3, 'BaseLatitude' => 4, 'BaseLongitude' => 5, 'Telephone' => 6, 'Mobile' => 7, 'Fax' => 8, 'Email' => 9, 'Address' => 10, 'Zipcode' => 11, 'Country' => 12, 'District' => 13, 'Municipality' => 14, 'Locality' => 15, 'Observations' => 16, 'CreatedAt' => 17, 'UpdatedAt' => 18, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'name' => 1, 'acronym' => 2, 'recCetCode' => 3, 'baseLatitude' => 4, 'baseLongitude' => 5, 'telephone' => 6, 'mobile' => 7, 'fax' => 8, 'email' => 9, 'address' => 10, 'zipcode' => 11, 'country' => 12, 'district' => 13, 'municipality' => 14, 'locality' => 15, 'observations' => 16, 'createdAt' => 17, 'updatedAt' => 18, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NAME => 1, self::ACRONYM => 2, self::REC_CET_CODE => 3, self::BASE_LATITUDE => 4, self::BASE_LONGITUDE => 5, self::TELEPHONE => 6, self::MOBILE => 7, self::FAX => 8, self::EMAIL => 9, self::ADDRESS => 10, self::ZIPCODE => 11, self::COUNTRY => 12, self::DISTRICT => 13, self::MUNICIPALITY => 14, self::LOCALITY => 15, self::OBSERVATIONS => 16, self::CREATED_AT => 17, self::UPDATED_AT => 18, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'NAME' => 1, 'ACRONYM' => 2, 'REC_CET_CODE' => 3, 'BASE_LATITUDE' => 4, 'BASE_LONGITUDE' => 5, 'TELEPHONE' => 6, 'MOBILE' => 7, 'FAX' => 8, 'EMAIL' => 9, 'ADDRESS' => 10, 'ZIPCODE' => 11, 'COUNTRY' => 12, 'DISTRICT' => 13, 'MUNICIPALITY' => 14, 'LOCALITY' => 15, 'OBSERVATIONS' => 16, 'CREATED_AT' => 17, 'UPDATED_AT' => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'acronym' => 2, 'rec_cet_code' => 3, 'base_latitude' => 4, 'base_longitude' => 5, 'telephone' => 6, 'mobile' => 7, 'fax' => 8, 'email' => 9, 'address' => 10, 'zipcode' => 11, 'country' => 12, 'district' => 13, 'municipality' => 14, 'locality' => 15, 'observations' => 16, 'created_at' => 17, 'updated_at' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
	 * @param      string $column The column name for current table. (i.e. CompanyPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(CompanyPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(CompanyPeer::ID);
			$criteria->addSelectColumn(CompanyPeer::NAME);
			$criteria->addSelectColumn(CompanyPeer::ACRONYM);
			$criteria->addSelectColumn(CompanyPeer::REC_CET_CODE);
			$criteria->addSelectColumn(CompanyPeer::BASE_LATITUDE);
			$criteria->addSelectColumn(CompanyPeer::BASE_LONGITUDE);
			$criteria->addSelectColumn(CompanyPeer::TELEPHONE);
			$criteria->addSelectColumn(CompanyPeer::MOBILE);
			$criteria->addSelectColumn(CompanyPeer::FAX);
			$criteria->addSelectColumn(CompanyPeer::EMAIL);
			$criteria->addSelectColumn(CompanyPeer::ADDRESS);
			$criteria->addSelectColumn(CompanyPeer::ZIPCODE);
			$criteria->addSelectColumn(CompanyPeer::COUNTRY);
			$criteria->addSelectColumn(CompanyPeer::DISTRICT);
			$criteria->addSelectColumn(CompanyPeer::MUNICIPALITY);
			$criteria->addSelectColumn(CompanyPeer::LOCALITY);
			$criteria->addSelectColumn(CompanyPeer::OBSERVATIONS);
			$criteria->addSelectColumn(CompanyPeer::CREATED_AT);
			$criteria->addSelectColumn(CompanyPeer::UPDATED_AT);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.NAME');
			$criteria->addSelectColumn($alias . '.ACRONYM');
			$criteria->addSelectColumn($alias . '.REC_CET_CODE');
			$criteria->addSelectColumn($alias . '.BASE_LATITUDE');
			$criteria->addSelectColumn($alias . '.BASE_LONGITUDE');
			$criteria->addSelectColumn($alias . '.TELEPHONE');
			$criteria->addSelectColumn($alias . '.MOBILE');
			$criteria->addSelectColumn($alias . '.FAX');
			$criteria->addSelectColumn($alias . '.EMAIL');
			$criteria->addSelectColumn($alias . '.ADDRESS');
			$criteria->addSelectColumn($alias . '.ZIPCODE');
			$criteria->addSelectColumn($alias . '.COUNTRY');
			$criteria->addSelectColumn($alias . '.DISTRICT');
			$criteria->addSelectColumn($alias . '.MUNICIPALITY');
			$criteria->addSelectColumn($alias . '.LOCALITY');
			$criteria->addSelectColumn($alias . '.OBSERVATIONS');
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
		$criteria->setPrimaryTableName(CompanyPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CompanyPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseCompanyPeer', $criteria, $con);
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
	 * @return     Company
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = CompanyPeer::doSelect($critcopy, $con);
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
		return CompanyPeer::populateObjects(CompanyPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			CompanyPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseCompanyPeer', $criteria, $con);
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
	 * @param      Company $value A Company object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Company $obj, $key = null)
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
	 * @param      mixed $value A Company object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Company) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Company object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Company Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to company
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
		// Invalidate objects in CompanyUserPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		CompanyUserPeer::clearInstancePool();
		// Invalidate objects in VesselPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		VesselPeer::clearInstancePool();
		// Invalidate objects in GuidePeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		GuidePeer::clearInstancePool();
		// Invalidate objects in SkipperPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		SkipperPeer::clearInstancePool();
		// Invalidate objects in GeneralInfoPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		GeneralInfoPeer::clearInstancePool();
		// Invalidate objects in WatchInfoPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		WatchInfoPeer::clearInstancePool();
		// Invalidate objects in WatchmanPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		WatchmanPeer::clearInstancePool();
		// Invalidate objects in WatchPostPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		WatchPostPeer::clearInstancePool();
		// Invalidate objects in ChartIframeInformationPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ChartIframeInformationPeer::clearInstancePool();
		// Invalidate objects in MapIframeInformationPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		MapIframeInformationPeer::clearInstancePool();
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
		$cls = CompanyPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = CompanyPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = CompanyPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				CompanyPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (Company object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = CompanyPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = CompanyPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + CompanyPeer::NUM_COLUMNS;
		} else {
			$cls = CompanyPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			CompanyPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
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
	  $dbMap = Propel::getDatabaseMap(BaseCompanyPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseCompanyPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new CompanyTableMap());
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
		return $withPrefix ? CompanyPeer::CLASS_DEFAULT : CompanyPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Company or Criteria object.
	 *
	 * @param      mixed $values Criteria or Company object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Company object
		}

		if ($criteria->containsKey(CompanyPeer::ID) && $criteria->keyContainsValue(CompanyPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.CompanyPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a Company or Criteria object.
	 *
	 * @param      mixed $values Criteria or Company object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(CompanyPeer::ID);
			$value = $criteria->remove(CompanyPeer::ID);
			if ($value) {
				$selectCriteria->add(CompanyPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(CompanyPeer::TABLE_NAME);
			}

		} else { // $values is Company object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the company table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += CompanyPeer::doOnDeleteCascade(new Criteria(CompanyPeer::DATABASE_NAME), $con);
			CompanyPeer::doOnDeleteSetNull(new Criteria(CompanyPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(CompanyPeer::TABLE_NAME, $con, CompanyPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			CompanyPeer::clearInstancePool();
			CompanyPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Company or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Company object or primary key or array of primary keys
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
			$con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Company) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CompanyPeer::ID, (array) $values, Criteria::IN);
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
			$affectedRows += CompanyPeer::doOnDeleteCascade($c, $con);
			
			// cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
			$c = clone $criteria;
			CompanyPeer::doOnDeleteSetNull($c, $con);
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				CompanyPeer::clearInstancePool();
			} elseif ($values instanceof Company) { // it's a model object
				CompanyPeer::removeInstanceFromPool($values);
			} else { // it's a primary key, or an array of pks
				foreach ((array) $values as $singleval) {
					CompanyPeer::removeInstanceFromPool($singleval);
				}
			}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			CompanyPeer::clearRelatedInstancePool();
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
		$objects = CompanyPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


			// delete related CompanyUser objects
			$criteria = new Criteria(CompanyUserPeer::DATABASE_NAME);
			
			$criteria->add(CompanyUserPeer::COMPANY_ID, $obj->getId());
			$affectedRows += CompanyUserPeer::doDelete($criteria, $con);

			// delete related Vessel objects
			$criteria = new Criteria(VesselPeer::DATABASE_NAME);
			
			$criteria->add(VesselPeer::COMPANY_ID, $obj->getId());
			$affectedRows += VesselPeer::doDelete($criteria, $con);

			// delete related Guide objects
			$criteria = new Criteria(GuidePeer::DATABASE_NAME);
			
			$criteria->add(GuidePeer::COMPANY_ID, $obj->getId());
			$affectedRows += GuidePeer::doDelete($criteria, $con);

			// delete related Skipper objects
			$criteria = new Criteria(SkipperPeer::DATABASE_NAME);
			
			$criteria->add(SkipperPeer::COMPANY_ID, $obj->getId());
			$affectedRows += SkipperPeer::doDelete($criteria, $con);

			// delete related GeneralInfo objects
			$criteria = new Criteria(GeneralInfoPeer::DATABASE_NAME);
			
			$criteria->add(GeneralInfoPeer::COMPANY_ID, $obj->getId());
			$affectedRows += GeneralInfoPeer::doDelete($criteria, $con);

			// delete related WatchInfo objects
			$criteria = new Criteria(WatchInfoPeer::DATABASE_NAME);
			
			$criteria->add(WatchInfoPeer::COMPANY_ID, $obj->getId());
			$affectedRows += WatchInfoPeer::doDelete($criteria, $con);

			// delete related Watchman objects
			$criteria = new Criteria(WatchmanPeer::DATABASE_NAME);
			
			$criteria->add(WatchmanPeer::COMPANY_ID, $obj->getId());
			$affectedRows += WatchmanPeer::doDelete($criteria, $con);

			// delete related WatchPost objects
			$criteria = new Criteria(WatchPostPeer::DATABASE_NAME);
			
			$criteria->add(WatchPostPeer::COMPANY_ID, $obj->getId());
			$affectedRows += WatchPostPeer::doDelete($criteria, $con);

			// delete related ChartIframeInformation objects
			$criteria = new Criteria(ChartIframeInformationPeer::DATABASE_NAME);
			
			$criteria->add(ChartIframeInformationPeer::COMPANY_ID, $obj->getId());
			$affectedRows += ChartIframeInformationPeer::doDelete($criteria, $con);

			// delete related MapIframeInformation objects
			$criteria = new Criteria(MapIframeInformationPeer::DATABASE_NAME);
			
			$criteria->add(MapIframeInformationPeer::COMPANY_ID, $obj->getId());
			$affectedRows += MapIframeInformationPeer::doDelete($criteria, $con);
		}
		return $affectedRows;
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
		$objects = CompanyPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {

			// set fkey col in related ObservationPhoto rows to NULL
			$selectCriteria = new Criteria(CompanyPeer::DATABASE_NAME);
			$updateValues = new Criteria(CompanyPeer::DATABASE_NAME);
			$selectCriteria->add(ObservationPhotoPeer::COMPANY_ID, $obj->getId());
			$updateValues->add(ObservationPhotoPeer::COMPANY_ID, null);

			BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

		}
	}

	/**
	 * Validates all modified columns of given Company object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Company $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Company $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CompanyPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CompanyPeer::TABLE_NAME);

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

		return BasePeer::doValidate(CompanyPeer::DATABASE_NAME, CompanyPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Company
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = CompanyPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CompanyPeer::DATABASE_NAME);
		$criteria->add(CompanyPeer::ID, $pk);

		$v = CompanyPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(CompanyPeer::DATABASE_NAME);
			$criteria->add(CompanyPeer::ID, $pks, Criteria::IN);
			$objs = CompanyPeer::doSelect($criteria, $con);
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
	    return sprintf('BaseCompanyPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BaseCompanyPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseCompanyPeer::buildTableMap();

