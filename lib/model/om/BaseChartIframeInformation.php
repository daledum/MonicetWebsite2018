<?php


/**
 * Base class that represents a row from the 'chart_iframe_information' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseChartIframeInformation extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ChartIframeInformationPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ChartIframeInformationPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the company_id field.
	 * @var        int
	 */
	protected $company_id;

	/**
	 * The value for the hash field.
	 * @var        string
	 */
	protected $hash;

	/**
	 * The value for the graph_type field.
	 * @var        string
	 */
	protected $graph_type;

	/**
	 * The value for the year field.
	 * @var        int
	 */
	protected $year;

	/**
	 * The value for the month field.
	 * @var        int
	 */
	protected $month;

	/**
	 * The value for the chart_item field.
	 * @var        string
	 */
	protected $chart_item;

	/**
	 * The value for the chart_type field.
	 * @var        string
	 */
	protected $chart_type;

	/**
	 * The value for the selected field.
	 * @var        string
	 */
	protected $selected;

	/**
	 * @var        Company
	 */
	protected $aCompany;

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
	 * Get the [company_id] column value.
	 * 
	 * @return     int
	 */
	public function getCompanyId()
	{
		return $this->company_id;
	}

	/**
	 * Get the [hash] column value.
	 * 
	 * @return     string
	 */
	public function getHash()
	{
		return $this->hash;
	}

	/**
	 * Get the [graph_type] column value.
	 * 
	 * @return     string
	 */
	public function getGraphType()
	{
		return $this->graph_type;
	}

	/**
	 * Get the [year] column value.
	 * 
	 * @return     int
	 */
	public function getYear()
	{
		return $this->year;
	}

	/**
	 * Get the [month] column value.
	 * 
	 * @return     int
	 */
	public function getMonth()
	{
		return $this->month;
	}

	/**
	 * Get the [chart_item] column value.
	 * 
	 * @return     string
	 */
	public function getChartItem()
	{
		return $this->chart_item;
	}

	/**
	 * Get the [chart_type] column value.
	 * 
	 * @return     string
	 */
	public function getChartType()
	{
		return $this->chart_type;
	}

	/**
	 * Get the [selected] column value.
	 * 
	 * @return     string
	 */
	public function getSelected()
	{
		return $this->selected;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ChartIframeInformation The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ChartIframeInformationPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [company_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ChartIframeInformation The current object (for fluent API support)
	 */
	public function setCompanyId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->company_id !== $v) {
			$this->company_id = $v;
			$this->modifiedColumns[] = ChartIframeInformationPeer::COMPANY_ID;
		}

		if ($this->aCompany !== null && $this->aCompany->getId() !== $v) {
			$this->aCompany = null;
		}

		return $this;
	} // setCompanyId()

	/**
	 * Set the value of [hash] column.
	 * 
	 * @param      string $v new value
	 * @return     ChartIframeInformation The current object (for fluent API support)
	 */
	public function setHash($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->hash !== $v) {
			$this->hash = $v;
			$this->modifiedColumns[] = ChartIframeInformationPeer::HASH;
		}

		return $this;
	} // setHash()

	/**
	 * Set the value of [graph_type] column.
	 * 
	 * @param      string $v new value
	 * @return     ChartIframeInformation The current object (for fluent API support)
	 */
	public function setGraphType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->graph_type !== $v) {
			$this->graph_type = $v;
			$this->modifiedColumns[] = ChartIframeInformationPeer::GRAPH_TYPE;
		}

		return $this;
	} // setGraphType()

	/**
	 * Set the value of [year] column.
	 * 
	 * @param      int $v new value
	 * @return     ChartIframeInformation The current object (for fluent API support)
	 */
	public function setYear($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->year !== $v) {
			$this->year = $v;
			$this->modifiedColumns[] = ChartIframeInformationPeer::YEAR;
		}

		return $this;
	} // setYear()

	/**
	 * Set the value of [month] column.
	 * 
	 * @param      int $v new value
	 * @return     ChartIframeInformation The current object (for fluent API support)
	 */
	public function setMonth($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->month !== $v) {
			$this->month = $v;
			$this->modifiedColumns[] = ChartIframeInformationPeer::MONTH;
		}

		return $this;
	} // setMonth()

	/**
	 * Set the value of [chart_item] column.
	 * 
	 * @param      string $v new value
	 * @return     ChartIframeInformation The current object (for fluent API support)
	 */
	public function setChartItem($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->chart_item !== $v) {
			$this->chart_item = $v;
			$this->modifiedColumns[] = ChartIframeInformationPeer::CHART_ITEM;
		}

		return $this;
	} // setChartItem()

	/**
	 * Set the value of [chart_type] column.
	 * 
	 * @param      string $v new value
	 * @return     ChartIframeInformation The current object (for fluent API support)
	 */
	public function setChartType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->chart_type !== $v) {
			$this->chart_type = $v;
			$this->modifiedColumns[] = ChartIframeInformationPeer::CHART_TYPE;
		}

		return $this;
	} // setChartType()

	/**
	 * Set the value of [selected] column.
	 * 
	 * @param      string $v new value
	 * @return     ChartIframeInformation The current object (for fluent API support)
	 */
	public function setSelected($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->selected !== $v) {
			$this->selected = $v;
			$this->modifiedColumns[] = ChartIframeInformationPeer::SELECTED;
		}

		return $this;
	} // setSelected()

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
			$this->company_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->hash = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->graph_type = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->year = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->month = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->chart_item = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->chart_type = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->selected = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 9; // 9 = ChartIframeInformationPeer::NUM_COLUMNS - ChartIframeInformationPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ChartIframeInformation object", $e);
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

		if ($this->aCompany !== null && $this->company_id !== $this->aCompany->getId()) {
			$this->aCompany = null;
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
			$con = Propel::getConnection(ChartIframeInformationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ChartIframeInformationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCompany = null;
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
			$con = Propel::getConnection(ChartIframeInformationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseChartIframeInformation:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				ChartIframeInformationQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseChartIframeInformation:delete:post') as $callable)
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
			$con = Propel::getConnection(ChartIframeInformationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseChartIframeInformation:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseChartIframeInformation:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				ChartIframeInformationPeer::addInstanceToPool($this);
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

			if ($this->aCompany !== null) {
				if ($this->aCompany->isModified() || $this->aCompany->isNew()) {
					$affectedRows += $this->aCompany->save($con);
				}
				$this->setCompany($this->aCompany);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ChartIframeInformationPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(ChartIframeInformationPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.ChartIframeInformationPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += ChartIframeInformationPeer::doUpdate($this, $con);
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

			if ($this->aCompany !== null) {
				if (!$this->aCompany->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCompany->getValidationFailures());
				}
			}


			if (($retval = ChartIframeInformationPeer::doValidate($this, $columns)) !== true) {
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
		$pos = ChartIframeInformationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCompanyId();
				break;
			case 2:
				return $this->getHash();
				break;
			case 3:
				return $this->getGraphType();
				break;
			case 4:
				return $this->getYear();
				break;
			case 5:
				return $this->getMonth();
				break;
			case 6:
				return $this->getChartItem();
				break;
			case 7:
				return $this->getChartType();
				break;
			case 8:
				return $this->getSelected();
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
		$keys = ChartIframeInformationPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCompanyId(),
			$keys[2] => $this->getHash(),
			$keys[3] => $this->getGraphType(),
			$keys[4] => $this->getYear(),
			$keys[5] => $this->getMonth(),
			$keys[6] => $this->getChartItem(),
			$keys[7] => $this->getChartType(),
			$keys[8] => $this->getSelected(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCompany) {
				$result['Company'] = $this->aCompany->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = ChartIframeInformationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCompanyId($value);
				break;
			case 2:
				$this->setHash($value);
				break;
			case 3:
				$this->setGraphType($value);
				break;
			case 4:
				$this->setYear($value);
				break;
			case 5:
				$this->setMonth($value);
				break;
			case 6:
				$this->setChartItem($value);
				break;
			case 7:
				$this->setChartType($value);
				break;
			case 8:
				$this->setSelected($value);
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
		$keys = ChartIframeInformationPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCompanyId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHash($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGraphType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setYear($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonth($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setChartItem($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setChartType($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSelected($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ChartIframeInformationPeer::DATABASE_NAME);

		if ($this->isColumnModified(ChartIframeInformationPeer::ID)) $criteria->add(ChartIframeInformationPeer::ID, $this->id);
		if ($this->isColumnModified(ChartIframeInformationPeer::COMPANY_ID)) $criteria->add(ChartIframeInformationPeer::COMPANY_ID, $this->company_id);
		if ($this->isColumnModified(ChartIframeInformationPeer::HASH)) $criteria->add(ChartIframeInformationPeer::HASH, $this->hash);
		if ($this->isColumnModified(ChartIframeInformationPeer::GRAPH_TYPE)) $criteria->add(ChartIframeInformationPeer::GRAPH_TYPE, $this->graph_type);
		if ($this->isColumnModified(ChartIframeInformationPeer::YEAR)) $criteria->add(ChartIframeInformationPeer::YEAR, $this->year);
		if ($this->isColumnModified(ChartIframeInformationPeer::MONTH)) $criteria->add(ChartIframeInformationPeer::MONTH, $this->month);
		if ($this->isColumnModified(ChartIframeInformationPeer::CHART_ITEM)) $criteria->add(ChartIframeInformationPeer::CHART_ITEM, $this->chart_item);
		if ($this->isColumnModified(ChartIframeInformationPeer::CHART_TYPE)) $criteria->add(ChartIframeInformationPeer::CHART_TYPE, $this->chart_type);
		if ($this->isColumnModified(ChartIframeInformationPeer::SELECTED)) $criteria->add(ChartIframeInformationPeer::SELECTED, $this->selected);

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
		$criteria = new Criteria(ChartIframeInformationPeer::DATABASE_NAME);
		$criteria->add(ChartIframeInformationPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ChartIframeInformation (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setCompanyId($this->company_id);
		$copyObj->setHash($this->hash);
		$copyObj->setGraphType($this->graph_type);
		$copyObj->setYear($this->year);
		$copyObj->setMonth($this->month);
		$copyObj->setChartItem($this->chart_item);
		$copyObj->setChartType($this->chart_type);
		$copyObj->setSelected($this->selected);

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
	 * @return     ChartIframeInformation Clone of current object.
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
	 * @return     ChartIframeInformationPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ChartIframeInformationPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Company object.
	 *
	 * @param      Company $v
	 * @return     ChartIframeInformation The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCompany(Company $v = null)
	{
		if ($v === null) {
			$this->setCompanyId(NULL);
		} else {
			$this->setCompanyId($v->getId());
		}

		$this->aCompany = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Company object, it will not be re-added.
		if ($v !== null) {
			$v->addChartIframeInformation($this);
		}

		return $this;
	}


	/**
	 * Get the associated Company object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Company The associated Company object.
	 * @throws     PropelException
	 */
	public function getCompany(PropelPDO $con = null)
	{
		if ($this->aCompany === null && ($this->company_id !== null)) {
			$this->aCompany = CompanyQuery::create()->findPk($this->company_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aCompany->addChartIframeInformations($this);
			 */
		}
		return $this->aCompany;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->company_id = null;
		$this->hash = null;
		$this->graph_type = null;
		$this->year = null;
		$this->month = null;
		$this->chart_item = null;
		$this->chart_type = null;
		$this->selected = null;
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

		$this->aCompany = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseChartIframeInformation:' . $name))
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

} // BaseChartIframeInformation
