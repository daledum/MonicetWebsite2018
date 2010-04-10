<?php


/**
 * Base class that represents a query for the 'visibility' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Sat Apr 10 09:39:39 2010
 *
 * @method     VisibilityQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     VisibilityQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     VisibilityQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     VisibilityQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     VisibilityQuery groupById() Group by the id column
 * @method     VisibilityQuery groupByDescription() Group by the description column
 * @method     VisibilityQuery groupByCreatedAt() Group by the created_at column
 * @method     VisibilityQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     Visibility findOne(PropelPDO $con = null) Return the first Visibility matching the query
 * @method     Visibility findOneById(int $id) Return the first Visibility filtered by the id column
 * @method     Visibility findOneByDescription(string $description) Return the first Visibility filtered by the description column
 * @method     Visibility findOneByCreatedAt(string $created_at) Return the first Visibility filtered by the created_at column
 * @method     Visibility findOneByUpdatedAt(string $updated_at) Return the first Visibility filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Visibility objects filtered by the id column
 * @method     array findByDescription(string $description) Return Visibility objects filtered by the description column
 * @method     array findByCreatedAt(string $created_at) Return Visibility objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Visibility objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseVisibilityQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseVisibilityQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Visibility', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = VisibilityPeer::getInstanceFromPool((string) $key)))) {
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
	 * @return    VisibilityQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(VisibilityPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    VisibilityQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(VisibilityPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    VisibilityQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(VisibilityPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(VisibilityPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    VisibilityQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null)
	{
		if(preg_match('/[\%\*]/', $description)) {
			return $this->addUsingAlias(VisibilityPeer::DESCRIPTION, str_replace('*', '%', $description), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(VisibilityPeer::DESCRIPTION, $description, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    VisibilityQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(VisibilityPeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(VisibilityPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(VisibilityPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(VisibilityPeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updated_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    VisibilityQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null)
	{
		if (is_array($updatedAt)) {
			if (array_values($updatedAt) === $updatedAt) {
				return $this->addUsingAlias(VisibilityPeer::UPDATED_AT, $updatedAt, Criteria::IN);
			} else {
				if (isset($updatedAt['min'])) {
					$this->addUsingAlias(VisibilityPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($updatedAt['max'])) {
					$this->addUsingAlias(VisibilityPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(VisibilityPeer::UPDATED_AT, $updatedAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related Record object
	 *
	 * @param     Record $record  the related object to use as filter
	 *
	 * @return    VisibilityQuery The current query, for fluid interface
	 */
	public function filterByRecord($record)
	{
		return $this
			->addUsingAlias(VisibilityPeer::ID, $record->getVisibilityId(), Criteria::EQUAL);
	}

	/**
	 * Use the Record relation Record object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RecordQuery A secondary query class using the current class as primary query
	 */
	public function useRecordQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('Record' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Record', 'RecordQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Visibility $visibility Object to remove from the list of results
	 *
	 * @return    VisibilityQuery The current query, for fluid interface
	 */
	public function prune($visibility = null)
	{
		if ($visibility) {
			$this->addUsingAlias(VisibilityPeer::ID, $visibility->getId(), Criteria::NOT_EQUAL);
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

} // BaseVisibilityQuery
