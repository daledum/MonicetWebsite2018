<?php


/**
 * Base class that represents a query for the 'observation_photo_dorsal_right_mark' table.
 *
 * 
 *
 * @method     ObservationPhotoDorsalRightMarkQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ObservationPhotoDorsalRightMarkQuery orderByObservationPhotoDorsalRightId($order = Criteria::ASC) Order by the observation_photo_dorsal_right_id column
 * @method     ObservationPhotoDorsalRightMarkQuery orderByMarkId($order = Criteria::ASC) Order by the mark_id column
 * @method     ObservationPhotoDorsalRightMarkQuery orderByLine($order = Criteria::ASC) Order by the line column
 * @method     ObservationPhotoDorsalRightMarkQuery orderByColumn($order = Criteria::ASC) Order by the column column
 * @method     ObservationPhotoDorsalRightMarkQuery orderByObservation($order = Criteria::ASC) Order by the observation column
 *
 * @method     ObservationPhotoDorsalRightMarkQuery groupById() Group by the id column
 * @method     ObservationPhotoDorsalRightMarkQuery groupByObservationPhotoDorsalRightId() Group by the observation_photo_dorsal_right_id column
 * @method     ObservationPhotoDorsalRightMarkQuery groupByMarkId() Group by the mark_id column
 * @method     ObservationPhotoDorsalRightMarkQuery groupByLine() Group by the line column
 * @method     ObservationPhotoDorsalRightMarkQuery groupByColumn() Group by the column column
 * @method     ObservationPhotoDorsalRightMarkQuery groupByObservation() Group by the observation column
 *
 * @method     ObservationPhotoDorsalRightMarkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ObservationPhotoDorsalRightMarkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ObservationPhotoDorsalRightMarkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ObservationPhotoDorsalRightMarkQuery leftJoinObservationPhotoDorsalRight($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoDorsalRight relation
 * @method     ObservationPhotoDorsalRightMarkQuery rightJoinObservationPhotoDorsalRight($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoDorsalRight relation
 * @method     ObservationPhotoDorsalRightMarkQuery innerJoinObservationPhotoDorsalRight($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoDorsalRight relation
 *
 * @method     ObservationPhotoDorsalRightMarkQuery leftJoinMark($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mark relation
 * @method     ObservationPhotoDorsalRightMarkQuery rightJoinMark($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mark relation
 * @method     ObservationPhotoDorsalRightMarkQuery innerJoinMark($relationAlias = null) Adds a INNER JOIN clause to the query using the Mark relation
 *
 * @method     ObservationPhotoDorsalRightMark findOne(PropelPDO $con = null) Return the first ObservationPhotoDorsalRightMark matching the query
 * @method     ObservationPhotoDorsalRightMark findOneOrCreate(PropelPDO $con = null) Return the first ObservationPhotoDorsalRightMark matching the query, or a new ObservationPhotoDorsalRightMark object populated from the query conditions when no match is found
 *
 * @method     ObservationPhotoDorsalRightMark findOneById(int $id) Return the first ObservationPhotoDorsalRightMark filtered by the id column
 * @method     ObservationPhotoDorsalRightMark findOneByObservationPhotoDorsalRightId(int $observation_photo_dorsal_right_id) Return the first ObservationPhotoDorsalRightMark filtered by the observation_photo_dorsal_right_id column
 * @method     ObservationPhotoDorsalRightMark findOneByMarkId(int $mark_id) Return the first ObservationPhotoDorsalRightMark filtered by the mark_id column
 * @method     ObservationPhotoDorsalRightMark findOneByLine(int $line) Return the first ObservationPhotoDorsalRightMark filtered by the line column
 * @method     ObservationPhotoDorsalRightMark findOneByColumn(int $column) Return the first ObservationPhotoDorsalRightMark filtered by the column column
 * @method     ObservationPhotoDorsalRightMark findOneByObservation(string $observation) Return the first ObservationPhotoDorsalRightMark filtered by the observation column
 *
 * @method     array findById(int $id) Return ObservationPhotoDorsalRightMark objects filtered by the id column
 * @method     array findByObservationPhotoDorsalRightId(int $observation_photo_dorsal_right_id) Return ObservationPhotoDorsalRightMark objects filtered by the observation_photo_dorsal_right_id column
 * @method     array findByMarkId(int $mark_id) Return ObservationPhotoDorsalRightMark objects filtered by the mark_id column
 * @method     array findByLine(int $line) Return ObservationPhotoDorsalRightMark objects filtered by the line column
 * @method     array findByColumn(int $column) Return ObservationPhotoDorsalRightMark objects filtered by the column column
 * @method     array findByObservation(string $observation) Return ObservationPhotoDorsalRightMark objects filtered by the observation column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoDorsalRightMarkQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseObservationPhotoDorsalRightMarkQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ObservationPhotoDorsalRightMark', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ObservationPhotoDorsalRightMarkQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ObservationPhotoDorsalRightMarkQuery) {
			return $criteria;
		}
		$query = new ObservationPhotoDorsalRightMarkQuery();
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
	 * @return    ObservationPhotoDorsalRightMark|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ObservationPhotoDorsalRightMarkPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the observation_photo_dorsal_right_id column
	 * 
	 * @param     int|array $observationPhotoDorsalRightId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalRightId($observationPhotoDorsalRightId = null, $comparison = null)
	{
		if (is_array($observationPhotoDorsalRightId)) {
			$useMinMax = false;
			if (isset($observationPhotoDorsalRightId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::OBSERVATION_PHOTO_DORSAL_RIGHT_ID, $observationPhotoDorsalRightId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($observationPhotoDorsalRightId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::OBSERVATION_PHOTO_DORSAL_RIGHT_ID, $observationPhotoDorsalRightId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::OBSERVATION_PHOTO_DORSAL_RIGHT_ID, $observationPhotoDorsalRightId, $comparison);
	}

	/**
	 * Filter the query on the mark_id column
	 * 
	 * @param     int|array $markId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByMarkId($markId = null, $comparison = null)
	{
		if (is_array($markId)) {
			$useMinMax = false;
			if (isset($markId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::MARK_ID, $markId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($markId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::MARK_ID, $markId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::MARK_ID, $markId, $comparison);
	}

	/**
	 * Filter the query on the line column
	 * 
	 * @param     int|array $line The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByLine($line = null, $comparison = null)
	{
		if (is_array($line)) {
			$useMinMax = false;
			if (isset($line['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::LINE, $line['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($line['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::LINE, $line['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::LINE, $line, $comparison);
	}

	/**
	 * Filter the query on the column column
	 * 
	 * @param     int|array $column The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByColumn($column = null, $comparison = null)
	{
		if (is_array($column)) {
			$useMinMax = false;
			if (isset($column['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::COLUMN, $column['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($column['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::COLUMN, $column['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::COLUMN, $column, $comparison);
	}

	/**
	 * Filter the query on the observation column
	 * 
	 * @param     string $observation The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByObservation($observation = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($observation)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $observation)) {
				$observation = str_replace('*', '%', $observation);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::OBSERVATION, $observation, $comparison);
	}

	/**
	 * Filter the query by a related ObservationPhotoDorsalRight object
	 *
	 * @param     ObservationPhotoDorsalRight $observationPhotoDorsalRight  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalRight($observationPhotoDorsalRight, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::OBSERVATION_PHOTO_DORSAL_RIGHT_ID, $observationPhotoDorsalRight->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoDorsalRight relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoDorsalRight($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoDorsalRight');
		
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
			$this->addJoinObject($join, 'ObservationPhotoDorsalRight');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoDorsalRight relation ObservationPhotoDorsalRight object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalRightQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoDorsalRightQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoDorsalRight($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoDorsalRight', 'ObservationPhotoDorsalRightQuery');
	}

	/**
	 * Filter the query by a related Mark object
	 *
	 * @param     Mark $mark  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function filterByMark($mark, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::MARK_ID, $mark->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Mark relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function joinMark($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Mark');
		
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
			$this->addJoinObject($join, 'Mark');
		}
		
		return $this;
	}

	/**
	 * Use the Mark relation Mark object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MarkQuery A secondary query class using the current class as primary query
	 */
	public function useMarkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMark($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Mark', 'MarkQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ObservationPhotoDorsalRightMark $observationPhotoDorsalRightMark Object to remove from the list of results
	 *
	 * @return    ObservationPhotoDorsalRightMarkQuery The current query, for fluid interface
	 */
	public function prune($observationPhotoDorsalRightMark = null)
	{
		if ($observationPhotoDorsalRightMark) {
			$this->addUsingAlias(ObservationPhotoDorsalRightMarkPeer::ID, $observationPhotoDorsalRightMark->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseObservationPhotoDorsalRightMarkQuery
