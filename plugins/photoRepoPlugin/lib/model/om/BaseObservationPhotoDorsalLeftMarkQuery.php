<?php


/**
 * Base class that represents a query for the 'observation_photo_dorsal_left_mark' table.
 *
 * 
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByObservationPhotoDorsalLeftId($order = Criteria::ASC) Order by the observation_photo_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByMarkId($order = Criteria::ASC) Order by the mark_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByLine($order = Criteria::ASC) Order by the line column
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByColumn($order = Criteria::ASC) Order by the column column
 * @method     ObservationPhotoDorsalLeftMarkQuery orderByObservation($order = Criteria::ASC) Order by the observation column
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery groupById() Group by the id column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByObservationPhotoDorsalLeftId() Group by the observation_photo_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByMarkId() Group by the mark_id column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByLine() Group by the line column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByColumn() Group by the column column
 * @method     ObservationPhotoDorsalLeftMarkQuery groupByObservation() Group by the observation column
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ObservationPhotoDorsalLeftMarkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ObservationPhotoDorsalLeftMarkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery leftJoinObservationPhotoDorsalLeft($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoDorsalLeft relation
 * @method     ObservationPhotoDorsalLeftMarkQuery rightJoinObservationPhotoDorsalLeft($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoDorsalLeft relation
 * @method     ObservationPhotoDorsalLeftMarkQuery innerJoinObservationPhotoDorsalLeft($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoDorsalLeft relation
 *
 * @method     ObservationPhotoDorsalLeftMarkQuery leftJoinMark($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mark relation
 * @method     ObservationPhotoDorsalLeftMarkQuery rightJoinMark($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mark relation
 * @method     ObservationPhotoDorsalLeftMarkQuery innerJoinMark($relationAlias = null) Adds a INNER JOIN clause to the query using the Mark relation
 *
 * @method     ObservationPhotoDorsalLeftMark findOne(PropelPDO $con = null) Return the first ObservationPhotoDorsalLeftMark matching the query
 * @method     ObservationPhotoDorsalLeftMark findOneOrCreate(PropelPDO $con = null) Return the first ObservationPhotoDorsalLeftMark matching the query, or a new ObservationPhotoDorsalLeftMark object populated from the query conditions when no match is found
 *
 * @method     ObservationPhotoDorsalLeftMark findOneById(int $id) Return the first ObservationPhotoDorsalLeftMark filtered by the id column
 * @method     ObservationPhotoDorsalLeftMark findOneByObservationPhotoDorsalLeftId(int $observation_photo_dorsal_left_id) Return the first ObservationPhotoDorsalLeftMark filtered by the observation_photo_dorsal_left_id column
 * @method     ObservationPhotoDorsalLeftMark findOneByMarkId(int $mark_id) Return the first ObservationPhotoDorsalLeftMark filtered by the mark_id column
 * @method     ObservationPhotoDorsalLeftMark findOneByLine(int $line) Return the first ObservationPhotoDorsalLeftMark filtered by the line column
 * @method     ObservationPhotoDorsalLeftMark findOneByColumn(int $column) Return the first ObservationPhotoDorsalLeftMark filtered by the column column
 * @method     ObservationPhotoDorsalLeftMark findOneByObservation(string $observation) Return the first ObservationPhotoDorsalLeftMark filtered by the observation column
 *
 * @method     array findById(int $id) Return ObservationPhotoDorsalLeftMark objects filtered by the id column
 * @method     array findByObservationPhotoDorsalLeftId(int $observation_photo_dorsal_left_id) Return ObservationPhotoDorsalLeftMark objects filtered by the observation_photo_dorsal_left_id column
 * @method     array findByMarkId(int $mark_id) Return ObservationPhotoDorsalLeftMark objects filtered by the mark_id column
 * @method     array findByLine(int $line) Return ObservationPhotoDorsalLeftMark objects filtered by the line column
 * @method     array findByColumn(int $column) Return ObservationPhotoDorsalLeftMark objects filtered by the column column
 * @method     array findByObservation(string $observation) Return ObservationPhotoDorsalLeftMark objects filtered by the observation column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoDorsalLeftMarkQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseObservationPhotoDorsalLeftMarkQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ObservationPhotoDorsalLeftMark', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ObservationPhotoDorsalLeftMarkQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ObservationPhotoDorsalLeftMarkQuery) {
			return $criteria;
		}
		$query = new ObservationPhotoDorsalLeftMarkQuery();
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
	 * @return    ObservationPhotoDorsalLeftMark|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ObservationPhotoDorsalLeftMarkPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the observation_photo_dorsal_left_id column
	 * 
	 * @param     int|array $observationPhotoDorsalLeftId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalLeftId($observationPhotoDorsalLeftId = null, $comparison = null)
	{
		if (is_array($observationPhotoDorsalLeftId)) {
			$useMinMax = false;
			if (isset($observationPhotoDorsalLeftId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION_PHOTO_DORSAL_LEFT_ID, $observationPhotoDorsalLeftId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($observationPhotoDorsalLeftId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION_PHOTO_DORSAL_LEFT_ID, $observationPhotoDorsalLeftId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION_PHOTO_DORSAL_LEFT_ID, $observationPhotoDorsalLeftId, $comparison);
	}

	/**
	 * Filter the query on the mark_id column
	 * 
	 * @param     int|array $markId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByMarkId($markId = null, $comparison = null)
	{
		if (is_array($markId)) {
			$useMinMax = false;
			if (isset($markId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::MARK_ID, $markId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($markId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::MARK_ID, $markId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::MARK_ID, $markId, $comparison);
	}

	/**
	 * Filter the query on the line column
	 * 
	 * @param     int|array $line The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByLine($line = null, $comparison = null)
	{
		if (is_array($line)) {
			$useMinMax = false;
			if (isset($line['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::LINE, $line['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($line['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::LINE, $line['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::LINE, $line, $comparison);
	}

	/**
	 * Filter the query on the column column
	 * 
	 * @param     int|array $column The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByColumn($column = null, $comparison = null)
	{
		if (is_array($column)) {
			$useMinMax = false;
			if (isset($column['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::COLUMN, $column['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($column['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::COLUMN, $column['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::COLUMN, $column, $comparison);
	}

	/**
	 * Filter the query on the observation column
	 * 
	 * @param     string $observation The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION, $observation, $comparison);
	}

	/**
	 * Filter the query by a related ObservationPhotoDorsalLeft object
	 *
	 * @param     ObservationPhotoDorsalLeft $observationPhotoDorsalLeft  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalLeft($observationPhotoDorsalLeft, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::OBSERVATION_PHOTO_DORSAL_LEFT_ID, $observationPhotoDorsalLeft->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoDorsalLeft relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoDorsalLeft($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoDorsalLeft');
		
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
			$this->addJoinObject($join, 'ObservationPhotoDorsalLeft');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoDorsalLeft relation ObservationPhotoDorsalLeft object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoDorsalLeftQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoDorsalLeft($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoDorsalLeft', 'ObservationPhotoDorsalLeftQuery');
	}

	/**
	 * Filter the query by a related Mark object
	 *
	 * @param     Mark $mark  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function filterByMark($mark, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::MARK_ID, $mark->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Mark relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
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
	 * @param     ObservationPhotoDorsalLeftMark $observationPhotoDorsalLeftMark Object to remove from the list of results
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery The current query, for fluid interface
	 */
	public function prune($observationPhotoDorsalLeftMark = null)
	{
		if ($observationPhotoDorsalLeftMark) {
			$this->addUsingAlias(ObservationPhotoDorsalLeftMarkPeer::ID, $observationPhotoDorsalLeftMark->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseObservationPhotoDorsalLeftMarkQuery
