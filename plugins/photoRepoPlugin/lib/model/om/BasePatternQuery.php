<?php


/**
 * Base class that represents a query for the 'pattern' table.
 *
 * 
 *
 * @method     PatternQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PatternQuery orderBySpecieId($order = Criteria::ASC) Order by the specie_id column
 * @method     PatternQuery orderByImageTail($order = Criteria::ASC) Order by the image_tail column
 * @method     PatternQuery orderByImageDorsalLeft($order = Criteria::ASC) Order by the image_dorsal_left column
 * @method     PatternQuery orderByImageDorsalRight($order = Criteria::ASC) Order by the image_dorsal_right column
 * @method     PatternQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     PatternQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     PatternQuery groupById() Group by the id column
 * @method     PatternQuery groupBySpecieId() Group by the specie_id column
 * @method     PatternQuery groupByImageTail() Group by the image_tail column
 * @method     PatternQuery groupByImageDorsalLeft() Group by the image_dorsal_left column
 * @method     PatternQuery groupByImageDorsalRight() Group by the image_dorsal_right column
 * @method     PatternQuery groupByCreatedAt() Group by the created_at column
 * @method     PatternQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     PatternQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PatternQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PatternQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PatternQuery leftJoinSpecie($relationAlias = null) Adds a LEFT JOIN clause to the query using the Specie relation
 * @method     PatternQuery rightJoinSpecie($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Specie relation
 * @method     PatternQuery innerJoinSpecie($relationAlias = null) Adds a INNER JOIN clause to the query using the Specie relation
 *
 * @method     PatternQuery leftJoinPatternCellTail($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellTail relation
 * @method     PatternQuery rightJoinPatternCellTail($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellTail relation
 * @method     PatternQuery innerJoinPatternCellTail($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellTail relation
 *
 * @method     PatternQuery leftJoinPatternCellDorsalLeft($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellDorsalLeft relation
 * @method     PatternQuery rightJoinPatternCellDorsalLeft($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellDorsalLeft relation
 * @method     PatternQuery innerJoinPatternCellDorsalLeft($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellDorsalLeft relation
 *
 * @method     PatternQuery leftJoinPatternCellDorsalRight($relationAlias = null) Adds a LEFT JOIN clause to the query using the PatternCellDorsalRight relation
 * @method     PatternQuery rightJoinPatternCellDorsalRight($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PatternCellDorsalRight relation
 * @method     PatternQuery innerJoinPatternCellDorsalRight($relationAlias = null) Adds a INNER JOIN clause to the query using the PatternCellDorsalRight relation
 *
 * @method     Pattern findOne(PropelPDO $con = null) Return the first Pattern matching the query
 * @method     Pattern findOneOrCreate(PropelPDO $con = null) Return the first Pattern matching the query, or a new Pattern object populated from the query conditions when no match is found
 *
 * @method     Pattern findOneById(int $id) Return the first Pattern filtered by the id column
 * @method     Pattern findOneBySpecieId(int $specie_id) Return the first Pattern filtered by the specie_id column
 * @method     Pattern findOneByImageTail(string $image_tail) Return the first Pattern filtered by the image_tail column
 * @method     Pattern findOneByImageDorsalLeft(string $image_dorsal_left) Return the first Pattern filtered by the image_dorsal_left column
 * @method     Pattern findOneByImageDorsalRight(string $image_dorsal_right) Return the first Pattern filtered by the image_dorsal_right column
 * @method     Pattern findOneByCreatedAt(string $created_at) Return the first Pattern filtered by the created_at column
 * @method     Pattern findOneByUpdatedAt(string $updated_at) Return the first Pattern filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Pattern objects filtered by the id column
 * @method     array findBySpecieId(int $specie_id) Return Pattern objects filtered by the specie_id column
 * @method     array findByImageTail(string $image_tail) Return Pattern objects filtered by the image_tail column
 * @method     array findByImageDorsalLeft(string $image_dorsal_left) Return Pattern objects filtered by the image_dorsal_left column
 * @method     array findByImageDorsalRight(string $image_dorsal_right) Return Pattern objects filtered by the image_dorsal_right column
 * @method     array findByCreatedAt(string $created_at) Return Pattern objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Pattern objects filtered by the updated_at column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BasePatternQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePatternQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Pattern', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PatternQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PatternQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PatternQuery) {
			return $criteria;
		}
		$query = new PatternQuery();
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
	 * @return    Pattern|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PatternPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PatternPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PatternPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PatternPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the specie_id column
	 * 
	 * @param     int|array $specieId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterBySpecieId($specieId = null, $comparison = null)
	{
		if (is_array($specieId)) {
			$useMinMax = false;
			if (isset($specieId['min'])) {
				$this->addUsingAlias(PatternPeer::SPECIE_ID, $specieId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($specieId['max'])) {
				$this->addUsingAlias(PatternPeer::SPECIE_ID, $specieId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PatternPeer::SPECIE_ID, $specieId, $comparison);
	}

	/**
	 * Filter the query on the image_tail column
	 * 
	 * @param     string $imageTail The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterByImageTail($imageTail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($imageTail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $imageTail)) {
				$imageTail = str_replace('*', '%', $imageTail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PatternPeer::IMAGE_TAIL, $imageTail, $comparison);
	}

	/**
	 * Filter the query on the image_dorsal_left column
	 * 
	 * @param     string $imageDorsalLeft The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterByImageDorsalLeft($imageDorsalLeft = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($imageDorsalLeft)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $imageDorsalLeft)) {
				$imageDorsalLeft = str_replace('*', '%', $imageDorsalLeft);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PatternPeer::IMAGE_DORSAL_LEFT, $imageDorsalLeft, $comparison);
	}

	/**
	 * Filter the query on the image_dorsal_right column
	 * 
	 * @param     string $imageDorsalRight The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterByImageDorsalRight($imageDorsalRight = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($imageDorsalRight)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $imageDorsalRight)) {
				$imageDorsalRight = str_replace('*', '%', $imageDorsalRight);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PatternPeer::IMAGE_DORSAL_RIGHT, $imageDorsalRight, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(PatternPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(PatternPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PatternPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(PatternPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(PatternPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PatternPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Specie object
	 *
	 * @param     Specie $specie  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterBySpecie($specie, $comparison = null)
	{
		return $this
			->addUsingAlias(PatternPeer::SPECIE_ID, $specie->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Specie relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function joinSpecie($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Specie');
		
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
			$this->addJoinObject($join, 'Specie');
		}
		
		return $this;
	}

	/**
	 * Use the Specie relation Specie object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SpecieQuery A secondary query class using the current class as primary query
	 */
	public function useSpecieQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSpecie($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Specie', 'SpecieQuery');
	}

	/**
	 * Filter the query by a related PatternCellTail object
	 *
	 * @param     PatternCellTail $patternCellTail  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterByPatternCellTail($patternCellTail, $comparison = null)
	{
		return $this
			->addUsingAlias(PatternPeer::ID, $patternCellTail->getPatternId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellTail relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function joinPatternCellTail($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellTail');
		
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
			$this->addJoinObject($join, 'PatternCellTail');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellTail relation PatternCellTail object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellTailQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellTailQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPatternCellTail($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellTail', 'PatternCellTailQuery');
	}

	/**
	 * Filter the query by a related PatternCellDorsalLeft object
	 *
	 * @param     PatternCellDorsalLeft $patternCellDorsalLeft  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterByPatternCellDorsalLeft($patternCellDorsalLeft, $comparison = null)
	{
		return $this
			->addUsingAlias(PatternPeer::ID, $patternCellDorsalLeft->getPatternId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellDorsalLeft relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function joinPatternCellDorsalLeft($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellDorsalLeft');
		
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
			$this->addJoinObject($join, 'PatternCellDorsalLeft');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellDorsalLeft relation PatternCellDorsalLeft object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalLeftQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellDorsalLeftQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPatternCellDorsalLeft($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellDorsalLeft', 'PatternCellDorsalLeftQuery');
	}

	/**
	 * Filter the query by a related PatternCellDorsalRight object
	 *
	 * @param     PatternCellDorsalRight $patternCellDorsalRight  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function filterByPatternCellDorsalRight($patternCellDorsalRight, $comparison = null)
	{
		return $this
			->addUsingAlias(PatternPeer::ID, $patternCellDorsalRight->getPatternId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PatternCellDorsalRight relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function joinPatternCellDorsalRight($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PatternCellDorsalRight');
		
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
			$this->addJoinObject($join, 'PatternCellDorsalRight');
		}
		
		return $this;
	}

	/**
	 * Use the PatternCellDorsalRight relation PatternCellDorsalRight object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternCellDorsalRightQuery A secondary query class using the current class as primary query
	 */
	public function usePatternCellDorsalRightQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPatternCellDorsalRight($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PatternCellDorsalRight', 'PatternCellDorsalRightQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Pattern $pattern Object to remove from the list of results
	 *
	 * @return    PatternQuery The current query, for fluid interface
	 */
	public function prune($pattern = null)
	{
		if ($pattern) {
			$this->addUsingAlias(PatternPeer::ID, $pattern->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePatternQuery
