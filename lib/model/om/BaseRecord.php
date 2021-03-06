<?php


/**
 * Base class that represents a row from the 'record' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRecord extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'RecordPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RecordPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the code_id field.
	 * @var        int
	 */
	protected $code_id;

	/**
	 * The value for the visibility_id field.
	 * @var        int
	 */
	protected $visibility_id;

	/**
	 * The value for the sea_state_id field.
	 * @var        int
	 */
	protected $sea_state_id;

	/**
	 * The value for the general_info_id field.
	 * @var        int
	 */
	protected $general_info_id;

	/**
	 * The value for the time field.
	 * @var        string
	 */
	protected $time;

	/**
	 * The value for the latitude field.
	 * @var        string
	 */
	protected $latitude;

	/**
	 * The value for the longitude field.
	 * @var        string
	 */
	protected $longitude;

	/**
	 * The value for the num_vessels field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $num_vessels;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the updated_at field.
	 * @var        string
	 */
	protected $updated_at;

	/**
	 * @var        Code
	 */
	protected $aCode;

	/**
	 * @var        Visibility
	 */
	protected $aVisibility;

	/**
	 * @var        SeaState
	 */
	protected $aSeaState;

	/**
	 * @var        GeneralInfo
	 */
	protected $aGeneralInfo;

	/**
	 * @var        array Sighting[] Collection to store aggregation of Sighting objects.
	 */
	protected $collSightings;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->num_vessels = 0;
	}

	/**
	 * Initializes internal state of BaseRecord object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [code_id] column value.
	 * 
	 * @return     int
	 */
	public function getCodeId()
	{
		return $this->code_id;
	}

	/**
	 * Get the [visibility_id] column value.
	 * 
	 * @return     int
	 */
	public function getVisibilityId()
	{
		return $this->visibility_id;
	}

	/**
	 * Get the [sea_state_id] column value.
	 * 
	 * @return     int
	 */
	public function getSeaStateId()
	{
		return $this->sea_state_id;
	}

	/**
	 * Get the [general_info_id] column value.
	 * 
	 * @return     int
	 */
	public function getGeneralInfoId()
	{
		return $this->general_info_id;
	}

	/**
	 * Get the [optionally formatted] temporal [time] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getTime($format = 'H:i:s')
	{
		if ($this->time === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->time);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->time, true), $x);
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [latitude] column value.
	 * 
	 * @return     string
	 */
	public function getLatitude()
	{
		return $this->latitude;
	}

	/**
	 * Get the [longitude] column value.
	 * 
	 * @return     string
	 */
	public function getLongitude()
	{
		return $this->longitude;
	}

	/**
	 * Get the [num_vessels] column value.
	 * 
	 * @return     int
	 */
	public function getNumVessels()
	{
		return $this->num_vessels;
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [updated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Record The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RecordPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [code_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Record The current object (for fluent API support)
	 */
	public function setCodeId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->code_id !== $v) {
			$this->code_id = $v;
			$this->modifiedColumns[] = RecordPeer::CODE_ID;
		}

		if ($this->aCode !== null && $this->aCode->getId() !== $v) {
			$this->aCode = null;
		}

		return $this;
	} // setCodeId()

	/**
	 * Set the value of [visibility_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Record The current object (for fluent API support)
	 */
	public function setVisibilityId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->visibility_id !== $v) {
			$this->visibility_id = $v;
			$this->modifiedColumns[] = RecordPeer::VISIBILITY_ID;
		}

		if ($this->aVisibility !== null && $this->aVisibility->getId() !== $v) {
			$this->aVisibility = null;
		}

		return $this;
	} // setVisibilityId()

	/**
	 * Set the value of [sea_state_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Record The current object (for fluent API support)
	 */
	public function setSeaStateId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->sea_state_id !== $v) {
			$this->sea_state_id = $v;
			$this->modifiedColumns[] = RecordPeer::SEA_STATE_ID;
		}

		if ($this->aSeaState !== null && $this->aSeaState->getId() !== $v) {
			$this->aSeaState = null;
		}

		return $this;
	} // setSeaStateId()

	/**
	 * Set the value of [general_info_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Record The current object (for fluent API support)
	 */
	public function setGeneralInfoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->general_info_id !== $v) {
			$this->general_info_id = $v;
			$this->modifiedColumns[] = RecordPeer::GENERAL_INFO_ID;
		}

		if ($this->aGeneralInfo !== null && $this->aGeneralInfo->getId() !== $v) {
			$this->aGeneralInfo = null;
		}

		return $this;
	} // setGeneralInfoId()

	/**
	 * Sets the value of [time] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Record The current object (for fluent API support)
	 */
	public function setTime($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->time !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->time !== null && $tmpDt = new DateTime($this->time)) ? $tmpDt->format('H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->time = ($dt ? $dt->format('H:i:s') : null);
				$this->modifiedColumns[] = RecordPeer::TIME;
			}
		} // if either are not null

		return $this;
	} // setTime()

	/**
	 * Set the value of [latitude] column.
	 * 
	 * @param      string $v new value
	 * @return     Record The current object (for fluent API support)
	 */
	public function setLatitude($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->latitude !== $v) {
			$this->latitude = $v;
			$this->modifiedColumns[] = RecordPeer::LATITUDE;
		}

		return $this;
	} // setLatitude()

	/**
	 * Set the value of [longitude] column.
	 * 
	 * @param      string $v new value
	 * @return     Record The current object (for fluent API support)
	 */
	public function setLongitude($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->longitude !== $v) {
			$this->longitude = $v;
			$this->modifiedColumns[] = RecordPeer::LONGITUDE;
		}

		return $this;
	} // setLongitude()

	/**
	 * Set the value of [num_vessels] column.
	 * 
	 * @param      int $v new value
	 * @return     Record The current object (for fluent API support)
	 */
	public function setNumVessels($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->num_vessels !== $v || $this->isNew()) {
			$this->num_vessels = $v;
			$this->modifiedColumns[] = RecordPeer::NUM_VESSELS;
		}

		return $this;
	} // setNumVessels()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Record The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->created_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = RecordPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Record The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->updated_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->updated_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = RecordPeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->num_vessels !== 0) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->code_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->visibility_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->sea_state_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->general_info_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->time = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->latitude = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->longitude = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->num_vessels = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->created_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->updated_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 11; // 11 = RecordPeer::NUM_COLUMNS - RecordPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Record object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aCode !== null && $this->code_id !== $this->aCode->getId()) {
			$this->aCode = null;
		}
		if ($this->aVisibility !== null && $this->visibility_id !== $this->aVisibility->getId()) {
			$this->aVisibility = null;
		}
		if ($this->aSeaState !== null && $this->sea_state_id !== $this->aSeaState->getId()) {
			$this->aSeaState = null;
		}
		if ($this->aGeneralInfo !== null && $this->general_info_id !== $this->aGeneralInfo->getId()) {
			$this->aGeneralInfo = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RecordPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RecordPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCode = null;
			$this->aVisibility = null;
			$this->aSeaState = null;
			$this->aGeneralInfo = null;
			$this->collSightings = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RecordPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseRecord:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				RecordQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseRecord:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RecordPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseRecord:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			// symfony_timestampable behavior
			if ($this->isModified() && !$this->isColumnModified(RecordPeer::UPDATED_AT))
			{
			  $this->setUpdatedAt(time());
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(RecordPeer::CREATED_AT))
				{
				  $this->setCreatedAt(time());
				}

			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseRecord:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				RecordPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aCode !== null) {
				if ($this->aCode->isModified() || $this->aCode->isNew()) {
					$affectedRows += $this->aCode->save($con);
				}
				$this->setCode($this->aCode);
			}

			if ($this->aVisibility !== null) {
				if ($this->aVisibility->isModified() || $this->aVisibility->isNew()) {
					$affectedRows += $this->aVisibility->save($con);
				}
				$this->setVisibility($this->aVisibility);
			}

			if ($this->aSeaState !== null) {
				if ($this->aSeaState->isModified() || $this->aSeaState->isNew()) {
					$affectedRows += $this->aSeaState->save($con);
				}
				$this->setSeaState($this->aSeaState);
			}

			if ($this->aGeneralInfo !== null) {
				if ($this->aGeneralInfo->isModified() || $this->aGeneralInfo->isNew()) {
					$affectedRows += $this->aGeneralInfo->save($con);
				}
				$this->setGeneralInfo($this->aGeneralInfo);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = RecordPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(RecordPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.RecordPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += RecordPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collSightings !== null) {
				foreach ($this->collSightings as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aCode !== null) {
				if (!$this->aCode->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCode->getValidationFailures());
				}
			}

			if ($this->aVisibility !== null) {
				if (!$this->aVisibility->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aVisibility->getValidationFailures());
				}
			}

			if ($this->aSeaState !== null) {
				if (!$this->aSeaState->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSeaState->getValidationFailures());
				}
			}

			if ($this->aGeneralInfo !== null) {
				if (!$this->aGeneralInfo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGeneralInfo->getValidationFailures());
				}
			}


			if (($retval = RecordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSightings !== null) {
					foreach ($this->collSightings as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RecordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCodeId();
				break;
			case 2:
				return $this->getVisibilityId();
				break;
			case 3:
				return $this->getSeaStateId();
				break;
			case 4:
				return $this->getGeneralInfoId();
				break;
			case 5:
				return $this->getTime();
				break;
			case 6:
				return $this->getLatitude();
				break;
			case 7:
				return $this->getLongitude();
				break;
			case 8:
				return $this->getNumVessels();
				break;
			case 9:
				return $this->getCreatedAt();
				break;
			case 10:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = RecordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCodeId(),
			$keys[2] => $this->getVisibilityId(),
			$keys[3] => $this->getSeaStateId(),
			$keys[4] => $this->getGeneralInfoId(),
			$keys[5] => $this->getTime(),
			$keys[6] => $this->getLatitude(),
			$keys[7] => $this->getLongitude(),
			$keys[8] => $this->getNumVessels(),
			$keys[9] => $this->getCreatedAt(),
			$keys[10] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCode) {
				$result['Code'] = $this->aCode->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aVisibility) {
				$result['Visibility'] = $this->aVisibility->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aSeaState) {
				$result['SeaState'] = $this->aSeaState->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aGeneralInfo) {
				$result['GeneralInfo'] = $this->aGeneralInfo->toArray($keyType, $includeLazyLoadColumns, true);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RecordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCodeId($value);
				break;
			case 2:
				$this->setVisibilityId($value);
				break;
			case 3:
				$this->setSeaStateId($value);
				break;
			case 4:
				$this->setGeneralInfoId($value);
				break;
			case 5:
				$this->setTime($value);
				break;
			case 6:
				$this->setLatitude($value);
				break;
			case 7:
				$this->setLongitude($value);
				break;
			case 8:
				$this->setNumVessels($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
			case 10:
				$this->setUpdatedAt($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RecordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodeId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setVisibilityId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSeaStateId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setGeneralInfoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTime($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLatitude($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLongitude($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumVessels($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RecordPeer::DATABASE_NAME);

		if ($this->isColumnModified(RecordPeer::ID)) $criteria->add(RecordPeer::ID, $this->id);
		if ($this->isColumnModified(RecordPeer::CODE_ID)) $criteria->add(RecordPeer::CODE_ID, $this->code_id);
		if ($this->isColumnModified(RecordPeer::VISIBILITY_ID)) $criteria->add(RecordPeer::VISIBILITY_ID, $this->visibility_id);
		if ($this->isColumnModified(RecordPeer::SEA_STATE_ID)) $criteria->add(RecordPeer::SEA_STATE_ID, $this->sea_state_id);
		if ($this->isColumnModified(RecordPeer::GENERAL_INFO_ID)) $criteria->add(RecordPeer::GENERAL_INFO_ID, $this->general_info_id);
		if ($this->isColumnModified(RecordPeer::TIME)) $criteria->add(RecordPeer::TIME, $this->time);
		if ($this->isColumnModified(RecordPeer::LATITUDE)) $criteria->add(RecordPeer::LATITUDE, $this->latitude);
		if ($this->isColumnModified(RecordPeer::LONGITUDE)) $criteria->add(RecordPeer::LONGITUDE, $this->longitude);
		if ($this->isColumnModified(RecordPeer::NUM_VESSELS)) $criteria->add(RecordPeer::NUM_VESSELS, $this->num_vessels);
		if ($this->isColumnModified(RecordPeer::CREATED_AT)) $criteria->add(RecordPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(RecordPeer::UPDATED_AT)) $criteria->add(RecordPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RecordPeer::DATABASE_NAME);
		$criteria->add(RecordPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Record (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setCodeId($this->code_id);
		$copyObj->setVisibilityId($this->visibility_id);
		$copyObj->setSeaStateId($this->sea_state_id);
		$copyObj->setGeneralInfoId($this->general_info_id);
		$copyObj->setTime($this->time);
		$copyObj->setLatitude($this->latitude);
		$copyObj->setLongitude($this->longitude);
		$copyObj->setNumVessels($this->num_vessels);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getSightings() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSighting($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Record Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     RecordPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RecordPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Code object.
	 *
	 * @param      Code $v
	 * @return     Record The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCode(Code $v = null)
	{
		if ($v === null) {
			$this->setCodeId(NULL);
		} else {
			$this->setCodeId($v->getId());
		}

		$this->aCode = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Code object, it will not be re-added.
		if ($v !== null) {
			$v->addRecord($this);
		}

		return $this;
	}


	/**
	 * Get the associated Code object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Code The associated Code object.
	 * @throws     PropelException
	 */
	public function getCode(PropelPDO $con = null)
	{
		if ($this->aCode === null && ($this->code_id !== null)) {
			$this->aCode = CodeQuery::create()->findPk($this->code_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aCode->addRecords($this);
			 */
		}
		return $this->aCode;
	}

	/**
	 * Declares an association between this object and a Visibility object.
	 *
	 * @param      Visibility $v
	 * @return     Record The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setVisibility(Visibility $v = null)
	{
		if ($v === null) {
			$this->setVisibilityId(NULL);
		} else {
			$this->setVisibilityId($v->getId());
		}

		$this->aVisibility = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Visibility object, it will not be re-added.
		if ($v !== null) {
			$v->addRecord($this);
		}

		return $this;
	}


	/**
	 * Get the associated Visibility object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Visibility The associated Visibility object.
	 * @throws     PropelException
	 */
	public function getVisibility(PropelPDO $con = null)
	{
		if ($this->aVisibility === null && ($this->visibility_id !== null)) {
			$this->aVisibility = VisibilityQuery::create()->findPk($this->visibility_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aVisibility->addRecords($this);
			 */
		}
		return $this->aVisibility;
	}

	/**
	 * Declares an association between this object and a SeaState object.
	 *
	 * @param      SeaState $v
	 * @return     Record The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSeaState(SeaState $v = null)
	{
		if ($v === null) {
			$this->setSeaStateId(NULL);
		} else {
			$this->setSeaStateId($v->getId());
		}

		$this->aSeaState = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SeaState object, it will not be re-added.
		if ($v !== null) {
			$v->addRecord($this);
		}

		return $this;
	}


	/**
	 * Get the associated SeaState object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SeaState The associated SeaState object.
	 * @throws     PropelException
	 */
	public function getSeaState(PropelPDO $con = null)
	{
		if ($this->aSeaState === null && ($this->sea_state_id !== null)) {
			$this->aSeaState = SeaStateQuery::create()->findPk($this->sea_state_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aSeaState->addRecords($this);
			 */
		}
		return $this->aSeaState;
	}

	/**
	 * Declares an association between this object and a GeneralInfo object.
	 *
	 * @param      GeneralInfo $v
	 * @return     Record The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setGeneralInfo(GeneralInfo $v = null)
	{
		if ($v === null) {
			$this->setGeneralInfoId(NULL);
		} else {
			$this->setGeneralInfoId($v->getId());
		}

		$this->aGeneralInfo = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the GeneralInfo object, it will not be re-added.
		if ($v !== null) {
			$v->addRecord($this);
		}

		return $this;
	}


	/**
	 * Get the associated GeneralInfo object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     GeneralInfo The associated GeneralInfo object.
	 * @throws     PropelException
	 */
	public function getGeneralInfo(PropelPDO $con = null)
	{
		if ($this->aGeneralInfo === null && ($this->general_info_id !== null)) {
			$this->aGeneralInfo = GeneralInfoQuery::create()->findPk($this->general_info_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aGeneralInfo->addRecords($this);
			 */
		}
		return $this->aGeneralInfo;
	}

	/**
	 * Clears out the collSightings collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSightings()
	 */
	public function clearSightings()
	{
		$this->collSightings = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSightings collection.
	 *
	 * By default this just sets the collSightings collection to an empty array (like clearcollSightings());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSightings()
	{
		$this->collSightings = new PropelObjectCollection();
		$this->collSightings->setModel('Sighting');
	}

	/**
	 * Gets an array of Sighting objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Record is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Sighting[] List of Sighting objects
	 * @throws     PropelException
	 */
	public function getSightings($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSightings || null !== $criteria) {
			if ($this->isNew() && null === $this->collSightings) {
				// return empty collection
				$this->initSightings();
			} else {
				$collSightings = SightingQuery::create(null, $criteria)
					->filterByRecord($this)
					->find($con);
				if (null !== $criteria) {
					return $collSightings;
				}
				$this->collSightings = $collSightings;
			}
		}
		return $this->collSightings;
	}

	/**
	 * Returns the number of related Sighting objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Sighting objects.
	 * @throws     PropelException
	 */
	public function countSightings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSightings || null !== $criteria) {
			if ($this->isNew() && null === $this->collSightings) {
				return 0;
			} else {
				$query = SightingQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByRecord($this)
					->count($con);
			}
		} else {
			return count($this->collSightings);
		}
	}

	/**
	 * Method called to associate a Sighting object to this object
	 * through the Sighting foreign key attribute.
	 *
	 * @param      Sighting $l Sighting
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSighting(Sighting $l)
	{
		if ($this->collSightings === null) {
			$this->initSightings();
		}
		if (!$this->collSightings->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSightings[]= $l;
			$l->setRecord($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Record is new, it will return
	 * an empty collection; or if this Record has previously
	 * been saved, it will retrieve related Sightings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Record.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Sighting[] List of Sighting objects
	 */
	public function getSightingsJoinSpecie($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SightingQuery::create(null, $criteria);
		$query->joinWith('Specie', $join_behavior);

		return $this->getSightings($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Record is new, it will return
	 * an empty collection; or if this Record has previously
	 * been saved, it will retrieve related Sightings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Record.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Sighting[] List of Sighting objects
	 */
	public function getSightingsJoinBehaviour($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SightingQuery::create(null, $criteria);
		$query->joinWith('Behaviour', $join_behavior);

		return $this->getSightings($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Record is new, it will return
	 * an empty collection; or if this Record has previously
	 * been saved, it will retrieve related Sightings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Record.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Sighting[] List of Sighting objects
	 */
	public function getSightingsJoinAssociation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SightingQuery::create(null, $criteria);
		$query->joinWith('Association', $join_behavior);

		return $this->getSightings($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->code_id = null;
		$this->visibility_id = null;
		$this->sea_state_id = null;
		$this->general_info_id = null;
		$this->time = null;
		$this->latitude = null;
		$this->longitude = null;
		$this->num_vessels = null;
		$this->created_at = null;
		$this->updated_at = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collSightings) {
				foreach ((array) $this->collSightings as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collSightings = null;
		$this->aCode = null;
		$this->aVisibility = null;
		$this->aSeaState = null;
		$this->aGeneralInfo = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseRecord:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseRecord
