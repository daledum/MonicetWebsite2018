<?php


/**
 * Base class that represents a query for the 'code' table.
 *
 * 
 *
 * @method     CodeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CodeQuery orderByAcronym($order = Criteria::ASC) Order by the acronym column
 * @method     CodeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     CodeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     CodeQuery groupById() Group by the id column
 * @method     CodeQuery groupByAcronym() Group by the acronym column
 * @method     CodeQuery groupByCreatedAt() Group by the created_at column
 * @method     CodeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     CodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CodeQuery leftJoinCodeI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the CodeI18n relation
 * @method     CodeQuery rightJoinCodeI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CodeI18n relation
 * @method     CodeQuery innerJoinCodeI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the CodeI18n relation
 *
 * @method     CodeQuery leftJoinRecord($relationAlias = null) Adds a LEFT JOIN clause to the query using the Record relation
 * @method     CodeQuery rightJoinRecord($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Record relation
 * @method     CodeQuery innerJoinRecord($relationAlias = null) Adds a INNER JOIN clause to the query using the Record relation
 *
 * @method     Code findOne(PropelPDO $con = null) Return the first Code matching the query
 * @method     Code findOneOrCreate(PropelPDO $con = null) Return the first Code matching the query, or a new Code object populated from the query conditions when no match is found
 *
 * @method     Code findOneById(int $id) Return the first Code filtered by the id column
 * @method     Code findOneByAcronym(string $acronym) Return the first Code filtered by the acronym column
 * @method     Code findOneByCreatedAt(string $created_at) Return the first Code filtered by the created_at column
 * @method     Code findOneByUpdatedAt(string $updated_at) Return the first Code filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Code objects filtered by the id column
 * @method     array findByAcronym(string $acronym) Return Code objects filtered by the acronym column
 * @method     array findByCreatedAt(string $created_at) Return Code objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Code objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCodeQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCodeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Code', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CodeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CodeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CodeQuery) {
			return $criteria;
		}
		$query = new CodeQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
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
	 * @return    Code|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CodePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
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
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    CodeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CodePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CodeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CodePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CodeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CodePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the acronym column
	 * 
	 * @param     string $acronym The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CodeQuery The current query, for fluid interface
	 */
	public function filterByAcronym($acronym = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($acronym)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $acronym)) {
				$acronym = str_replace('*', '%', $acronym);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CodePeer::ACRONYM, $acronym, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CodeQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(CodePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(CodePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CodePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CodeQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(CodePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(CodePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CodePeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related CodeI18n object
	 *
	 * @param     CodeI18n $codeI18n  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CodeQuery The current query, for fluid interface
	 */
	public function filterByCodeI18n($codeI18n, $comparison = null)
	{
		return $this
			->addUsingAlias(CodePeer::ID, $codeI18n->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the CodeI18n relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CodeQuery The current query, for fluid interface
	 */
	public function joinCodeI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CodeI18n');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'CodeI18n');
		}
		
		return $this;
	}

	/**
	 * Use the CodeI18n relation CodeI18n object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CodeI18nQuery A secondary query class using the current class as primary query
	 */
	public function useCodeI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCodeI18n($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CodeI18n', 'CodeI18nQuery');
	}

	/**
	 * Filter the query by a related Record object
	 *
	 * @param     Record $record  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CodeQuery The current query, for fluid interface
	 */
	public function filterByRecord($record, $comparison = null)
	{
		return $this
			->addUsingAlias(CodePeer::ID, $record->getCodeId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Record relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CodeQuery The current query, for fluid interface
	 */
	public function joinRecord($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Record');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Record');
		}
		
		return $this;
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
	public function useRecordQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRecord($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Record', 'RecordQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Code $code Object to remove from the list of results
	 *
	 * @return    CodeQuery The current query, for fluid interface
	 */
	public function prune($code = null)
	{
		if ($code) {
			$this->addUsingAlias(CodePeer::ID, $code->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseCodeQuery
