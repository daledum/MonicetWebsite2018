<?php


/**
 * Base class that represents a query for the 'option' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Tue Apr 20 15:16:51 2010
 *
 * @method     OptionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     OptionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     OptionQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     OptionQuery orderByInitial($order = Criteria::ASC) Order by the initial column
 * @method     OptionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     OptionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     OptionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     OptionQuery groupById() Group by the id column
 * @method     OptionQuery groupByName() Group by the name column
 * @method     OptionQuery groupByValue() Group by the value column
 * @method     OptionQuery groupByInitial() Group by the initial column
 * @method     OptionQuery groupByDescription() Group by the description column
 * @method     OptionQuery groupByCreatedAt() Group by the created_at column
 * @method     OptionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     Option findOne(PropelPDO $con = null) Return the first Option matching the query
 * @method     Option findOneById(int $id) Return the first Option filtered by the id column
 * @method     Option findOneByName(string $name) Return the first Option filtered by the name column
 * @method     Option findOneByValue(string $value) Return the first Option filtered by the value column
 * @method     Option findOneByInitial(string $initial) Return the first Option filtered by the initial column
 * @method     Option findOneByDescription(string $description) Return the first Option filtered by the description column
 * @method     Option findOneByCreatedAt(string $created_at) Return the first Option filtered by the created_at column
 * @method     Option findOneByUpdatedAt(string $updated_at) Return the first Option filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Option objects filtered by the id column
 * @method     array findByName(string $name) Return Option objects filtered by the name column
 * @method     array findByValue(string $value) Return Option objects filtered by the value column
 * @method     array findByInitial(string $initial) Return Option objects filtered by the initial column
 * @method     array findByDescription(string $description) Return Option objects filtered by the description column
 * @method     array findByCreatedAt(string $created_at) Return Option objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Option objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseOptionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseOptionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Option', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = OptionPeer::getInstanceFromPool((string) $key)))) {
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
	 * @return    OptionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(OptionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    OptionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(OptionPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    OptionQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(OptionPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(OptionPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    OptionQuery The current query, for fluid interface
	 */
	public function filterByName($name = null)
	{
		if(preg_match('/[\%\*]/', $name)) {
			return $this->addUsingAlias(OptionPeer::NAME, str_replace('*', '%', $name), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(OptionPeer::NAME, $name, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the value column
	 * 
	 * @param     string $value The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    OptionQuery The current query, for fluid interface
	 */
	public function filterByValue($value = null)
	{
		if(preg_match('/[\%\*]/', $value)) {
			return $this->addUsingAlias(OptionPeer::VALUE, str_replace('*', '%', $value), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(OptionPeer::VALUE, $value, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the initial column
	 * 
	 * @param     string $initial The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    OptionQuery The current query, for fluid interface
	 */
	public function filterByInitial($initial = null)
	{
		if(preg_match('/[\%\*]/', $initial)) {
			return $this->addUsingAlias(OptionPeer::INITIAL, str_replace('*', '%', $initial), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(OptionPeer::INITIAL, $initial, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    OptionQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null)
	{
		if(preg_match('/[\%\*]/', $description)) {
			return $this->addUsingAlias(OptionPeer::DESCRIPTION, str_replace('*', '%', $description), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(OptionPeer::DESCRIPTION, $description, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    OptionQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(OptionPeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(OptionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(OptionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(OptionPeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updated_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    OptionQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null)
	{
		if (is_array($updatedAt)) {
			if (array_values($updatedAt) === $updatedAt) {
				return $this->addUsingAlias(OptionPeer::UPDATED_AT, $updatedAt, Criteria::IN);
			} else {
				if (isset($updatedAt['min'])) {
					$this->addUsingAlias(OptionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($updatedAt['max'])) {
					$this->addUsingAlias(OptionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(OptionPeer::UPDATED_AT, $updatedAt, Criteria::EQUAL);
		}
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Option $option Object to remove from the list of results
	 *
	 * @return    OptionQuery The current query, for fluid interface
	 */
	public function prune($option = null)
	{
		if ($option) {
			$this->addUsingAlias(OptionPeer::ID, $option->getId(), Criteria::NOT_EQUAL);
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

} // BaseOptionQuery
