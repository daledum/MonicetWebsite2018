<?php


/**
 * Base class that represents a row from the 'observation_photo_dorsal_left_mark' table.
 *
 * 
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoDorsalLeftMark extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ObservationPhotoDorsalLeftMarkPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ObservationPhotoDorsalLeftMarkPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the observation_photo_dorsal_left_id field.
	 * @var        int
	 */
	protected $observation_photo_dorsal_left_id;

	/**
	 * The value for the mark_id field.
	 * @var        int
	 */
	protected $mark_id;

	/**
	 * The value for the line field.
	 * @var        int
	 */
	protected $line;

	/**
	 * The value for the column field.
	 * @var        int
	 */
	protected $column;

	/**
	 * The value for the observation field.
	 * @var        string
	 */
	protected $observation;

	/**
	 * @var        ObservationPhotoDorsalLeft
	 */
	protected $aObservationPhotoDorsalLeft;

	/**
	 * @var        Mark
	 */
	protected $aMark;

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
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [observation_photo_dorsal_left_id] column value.
	 * 
	 * @return     int
	 */
	public function getObservationPhotoDorsalLeftId()
	{
		return $this->observation_photo_dorsal_left_id;
	}

	/**
	 * Get the [mark_id] column value.
	 * 
	 * @return     int
	 */
	public function getMarkId()
	{
		return $this->mark_id;
	}

	/**
	 * Get the [line] column value.
	 * 
	 * @return     int
	 */
	public function getLine()
	{
		return $this->line;
	}

	/**
	 * Get the [column] column value.
	 * 
	 * @return     int
	 */
	public function getColumn()
	{
		return $this->column;
	}

	/**
	 * Get the [observation] column value.
	 * 
	 * @return     string
	 */
	public function getObservation()
	{
		return $this->observation;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ObservationPhotoDorsalLeftMark The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ObservationPhotoDorsalLeftMarkPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [observation_photo_dorsal_left_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ObservationPhotoDorsalLeftMark The current object (for fluent API support)
	 */
	public function setObservationPhotoDorsalLeftId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->observation_photo_dorsal_left_id !== $v) {
			$this->observation_photo_dorsal_left_id = $v;
			$this->modifiedColumns[] = ObservationPhotoDorsalLeftMarkPeer::OBSERVATION_PHOTO_DORSAL_LEFT_ID;
		}

		if ($this->aObservationPhotoDorsalLeft !== null && $this->aObservationPhotoDorsalLeft->getId() !== $v) {
			$this->aObservationPhotoDorsalLeft = null;
		}

		return $this;
	} // setObservationPhotoDorsalLeftId()

	/**
	 * Set the value of [mark_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ObservationPhotoDorsalLeftMark The current object (for fluent API support)
	 */
	public function setMarkId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->mark_id !== $v) {
			$this->mark_id = $v;
			$this->modifiedColumns[] = ObservationPhotoDorsalLeftMarkPeer::MARK_ID;
		}

		if ($this->aMark !== null && $this->aMark->getId() !== $v) {
			$this->aMark = null;
		}

		return $this;
	} // setMarkId()

	/**
	 * Set the value of [line] column.
	 * 
	 * @param      int $v new value
	 * @return     ObservationPhotoDorsalLeftMark The current object (for fluent API support)
	 */
	public function setLine($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->line !== $v) {
			$this->line = $v;
			$this->modifiedColumns[] = ObservationPhotoDorsalLeftMarkPeer::LINE;
		}

		return $this;
	} // setLine()

	/**
	 * Set the value of [column] column.
	 * 
	 * @param      int $v new value
	 * @return     ObservationPhotoDorsalLeftMark The current object (for fluent API support)
	 */
	public function setColumn($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->column !== $v) {
			$this->column = $v;
			$this->modifiedColumns[] = ObservationPhotoDorsalLeftMarkPeer::COLUMN;
		}

		return $this;
	} // setColumn()

	/**
	 * Set the value of [observation] column.
	 * 
	 * @param      string $v new value
	 * @return     ObservationPhotoDorsalLeftMark The current object (for fluent API support)
	 */
	public function setObservation($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observation !== $v) {
			$this->observation = $v;
			$this->modifiedColumns[] = ObservationPhotoDorsalLeftMarkPeer::OBSERVATION;
		}

		return $this;
	} // setObservation()

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
			$this->observation_photo_dorsal_left_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->mark_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->line = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->column = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->observation = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = ObservationPhotoDorsalLeftMarkPeer::NUM_COLUMNS - ObservationPhotoDorsalLeftMarkPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ObservationPhotoDorsalLeftMark object", $e);
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

		if ($this->aObservationPhotoDorsalLeft !== null && $this->observation_photo_dorsal_left_id !== $this->aObservationPhotoDorsalLeft->getId()) {
			$this->aObservationPhotoDorsalLeft = null;
		}
		if ($this->aMark !== null && $this->mark_id !== $this->aMark->getId()) {
			$this->aMark = null;
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
			$con = Propel::getConnection(ObservationPhotoDorsalLeftMarkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ObservationPhotoDorsalLeftMarkPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aObservationPhotoDorsalLeft = null;
			$this->aMark = null;
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
			$con = Propel::getConnection(ObservationPhotoDorsalLeftMarkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseObservationPhotoDorsalLeftMark:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				ObservationPhotoDorsalLeftMarkQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseObservationPhotoDorsalLeftMark:delete:post') as $callable)
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
			$con = Propel::getConnection(ObservationPhotoDorsalLeftMarkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseObservationPhotoDorsalLeftMark:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
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
				foreach (sfMixer::getCallables('BaseObservationPhotoDorsalLeftMark:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				ObservationPhotoDorsalLeftMarkPeer::addInstanceToPool($this);
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

			if ($this->aObservationPhotoDorsalLeft !== null) {
				if ($this->aObservationPhotoDorsalLeft->isModified() || $this->aObservationPhotoDorsalLeft->isNew()) {
					$affectedRows += $this->aObservationPhotoDorsalLeft->save($con);
				}
				$this->setObservationPhotoDorsalLeft($this->aObservationPhotoDorsalLeft);
			}

			if ($this->aMark !== null) {
				if ($this->aMark->isModified() || $this->aMark->isNew()) {
					$affectedRows += $this->aMark->save($con);
				}
				$this->setMark($this->aMark);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ObservationPhotoDorsalLeftMarkPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(ObservationPhotoDorsalLeftMarkPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.ObservationPhotoDorsalLeftMarkPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += ObservationPhotoDorsalLeftMarkPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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

			if ($this->aObservationPhotoDorsalLeft !== null) {
				if (!$this->aObservationPhotoDorsalLeft->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aObservationPhotoDorsalLeft->getValidationFailures());
				}
			}

			if ($this->aMark !== null) {
				if (!$this->aMark->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMark->getValidationFailures());
				}
			}


			if (($retval = ObservationPhotoDorsalLeftMarkPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = ObservationPhotoDorsalLeftMarkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getObservationPhotoDorsalLeftId();
				break;
			case 2:
				return $this->getMarkId();
				break;
			case 3:
				return $this->getLine();
				break;
			case 4:
				return $this->getColumn();
				break;
			case 5:
				return $this->getObservation();
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
		$keys = ObservationPhotoDorsalLeftMarkPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getObservationPhotoDorsalLeftId(),
			$keys[2] => $this->getMarkId(),
			$keys[3] => $this->getLine(),
			$keys[4] => $this->getColumn(),
			$keys[5] => $this->getObservation(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aObservationPhotoDorsalLeft) {
				$result['ObservationPhotoDorsalLeft'] = $this->aObservationPhotoDorsalLeft->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aMark) {
				$result['Mark'] = $this->aMark->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = ObservationPhotoDorsalLeftMarkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setObservationPhotoDorsalLeftId($value);
				break;
			case 2:
				$this->setMarkId($value);
				break;
			case 3:
				$this->setLine($value);
				break;
			case 4:
				$this->setColumn($value);
				break;
			case 5:
				$this->setObservation($value);
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
		$keys = ObservationPhotoDorsalLeftMarkPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setObservationPhotoDorsalLeftId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMarkId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLine($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setColumn($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObservation($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ObservationPhotoDorsalLeftMarkPeer::DATABASE_NAME);

		if ($this->isColumnModified(ObservationPhotoDorsalLeftMarkPeer::ID)) $criteria->add(ObservationPhotoDorsalLeftMarkPeer::ID, $this->id);
		if ($this->isColumnModified(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION_PHOTO_DORSAL_LEFT_ID)) $criteria->add(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION_PHOTO_DORSAL_LEFT_ID, $this->observation_photo_dorsal_left_id);
		if ($this->isColumnModified(ObservationPhotoDorsalLeftMarkPeer::MARK_ID)) $criteria->add(ObservationPhotoDorsalLeftMarkPeer::MARK_ID, $this->mark_id);
		if ($this->isColumnModified(ObservationPhotoDorsalLeftMarkPeer::LINE)) $criteria->add(ObservationPhotoDorsalLeftMarkPeer::LINE, $this->line);
		if ($this->isColumnModified(ObservationPhotoDorsalLeftMarkPeer::COLUMN)) $criteria->add(ObservationPhotoDorsalLeftMarkPeer::COLUMN, $this->column);
		if ($this->isColumnModified(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION)) $criteria->add(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION, $this->observation);

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
		$criteria = new Criteria(ObservationPhotoDorsalLeftMarkPeer::DATABASE_NAME);
		$criteria->add(ObservationPhotoDorsalLeftMarkPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ObservationPhotoDorsalLeftMark (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setObservationPhotoDorsalLeftId($this->observation_photo_dorsal_left_id);
		$copyObj->setMarkId($this->mark_id);
		$copyObj->setLine($this->line);
		$copyObj->setColumn($this->column);
		$copyObj->setObservation($this->observation);

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
	 * @return     ObservationPhotoDorsalLeftMark Clone of current object.
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
	 * @return     ObservationPhotoDorsalLeftMarkPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ObservationPhotoDorsalLeftMarkPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ObservationPhotoDorsalLeft object.
	 *
	 * @param      ObservationPhotoDorsalLeft $v
	 * @return     ObservationPhotoDorsalLeftMark The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setObservationPhotoDorsalLeft(ObservationPhotoDorsalLeft $v = null)
	{
		if ($v === null) {
			$this->setObservationPhotoDorsalLeftId(NULL);
		} else {
			$this->setObservationPhotoDorsalLeftId($v->getId());
		}

		$this->aObservationPhotoDorsalLeft = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ObservationPhotoDorsalLeft object, it will not be re-added.
		if ($v !== null) {
			$v->addObservationPhotoDorsalLeftMark($this);
		}

		return $this;
	}


	/**
	 * Get the associated ObservationPhotoDorsalLeft object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ObservationPhotoDorsalLeft The associated ObservationPhotoDorsalLeft object.
	 * @throws     PropelException
	 */
	public function getObservationPhotoDorsalLeft(PropelPDO $con = null)
	{
		if ($this->aObservationPhotoDorsalLeft === null && ($this->observation_photo_dorsal_left_id !== null)) {
			$this->aObservationPhotoDorsalLeft = ObservationPhotoDorsalLeftQuery::create()->findPk($this->observation_photo_dorsal_left_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aObservationPhotoDorsalLeft->addObservationPhotoDorsalLeftMarks($this);
			 */
		}
		return $this->aObservationPhotoDorsalLeft;
	}

	/**
	 * Declares an association between this object and a Mark object.
	 *
	 * @param      Mark $v
	 * @return     ObservationPhotoDorsalLeftMark The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setMark(Mark $v = null)
	{
		if ($v === null) {
			$this->setMarkId(NULL);
		} else {
			$this->setMarkId($v->getId());
		}

		$this->aMark = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Mark object, it will not be re-added.
		if ($v !== null) {
			$v->addObservationPhotoDorsalLeftMark($this);
		}

		return $this;
	}


	/**
	 * Get the associated Mark object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Mark The associated Mark object.
	 * @throws     PropelException
	 */
	public function getMark(PropelPDO $con = null)
	{
		if ($this->aMark === null && ($this->mark_id !== null)) {
			$this->aMark = MarkQuery::create()->findPk($this->mark_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aMark->addObservationPhotoDorsalLeftMarks($this);
			 */
		}
		return $this->aMark;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->observation_photo_dorsal_left_id = null;
		$this->mark_id = null;
		$this->line = null;
		$this->column = null;
		$this->observation = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
		} // if ($deep)

		$this->aObservationPhotoDorsalLeft = null;
		$this->aMark = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseObservationPhotoDorsalLeftMark:' . $name))
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

} // BaseObservationPhotoDorsalLeftMark
