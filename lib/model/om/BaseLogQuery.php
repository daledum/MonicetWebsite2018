<?php


/**
 * Base class that represents a query for the 'log' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Tue Apr 20 15:16:51 2010
 *
 * @method     LogQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LogQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     LogQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     LogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     LogQuery groupById() Group by the id column
 * @method     LogQuery groupByType() Group by the type column
 * @method     LogQuery groupByMessage() Group by the message column
 * @method     LogQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     Log findOne(PropelPDO $con = null) Return the first Log matching the query
 * @method     Log findOneById(int $id) Return the first Log filtered by the id column
 * @method     Log findOneByType(string $type) Return the first Log filtered by the type column
 * @method     Log findOneByMessage(string $message) Return the first Log filtered by the message column
 * @method     Log findOneByCreatedAt(string $created_at) Return the first Log filtered by the created_at column
 *
 * @method     array findById(int $id) Return Log objects filtered by the id column
 * @method     array findByType(string $type) Return Log objects filtered by the type column
 * @method     array findByMessage(string $message) Return Log objects filtered by the message column
 * @method     array findByCreatedAt(string $created_at) Return Log objects filtered by the created_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseLogQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseLogQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Log', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = LogPeer::getInstanceFromPool((string) $key)))) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			return $this
				->filterByPrimaryKey($key)
				->findOne($con);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LogPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LogPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(LogPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(LogPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByType($type = null)
	{
		if(preg_match('/[\%\*]/', $type)) {
			return $this->addUsingAlias(LogPeer::TYPE, str_replace('*', '%', $type), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(LogPeer::TYPE, $type, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the message column
	 * 
	 * @param     string $message The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByMessage($message = null)
	{
		if(preg_match('/[\%\*]/', $message)) {
			return $this->addUsingAlias(LogPeer::MESSAGE, str_replace('*', '%', $message), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(LogPeer::MESSAGE, $message, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(LogPeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(LogPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(LogPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(LogPeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Log $log Object to remove from the list of results
	 *
	 * @return    LogQuery The current query, for fluid interface
	 */
	public function prune($log = null)
	{
		if ($log) {
			$this->addUsingAlias(LogPeer::ID, $log->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	/**
	 * Code to execute before every SELECT statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreSelect(PropelPDO $con)
	{
		return $this->preSelect($con);
	}

	/**
	 * Code to execute before every DELETE statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreDelete(PropelPDO $con)
	{
		return $this->preDelete($con);
	}

	/**
	 * Code to execute before every UPDATE statement
	 * 
	 * @param     array $values The associatiove array of columns and values for the update
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreUpdate(&$values, PropelPDO $con)
	{
		return $this->preUpdate($values, $con);
	}

} // BaseLogQuery
