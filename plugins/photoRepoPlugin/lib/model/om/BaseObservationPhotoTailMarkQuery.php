<?php


/**
 * Base class that represents a query for the 'observation_photo_tail_mark' table.
 *
 * 
 *
 * @method     ObservationPhotoTailMarkQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ObservationPhotoTailMarkQuery orderByObservationPhotoTailId($order = Criteria::ASC) Order by the observation_photo_tail_id column
 * @method     ObservationPhotoTailMarkQuery orderByMarkId($order = Criteria::ASC) Order by the mark_id column
 * @method     ObservationPhotoTailMarkQuery orderByLine($order = Criteria::ASC) Order by the line column
 * @method     ObservationPhotoTailMarkQuery orderByColumn($order = Criteria::ASC) Order by the column column
 * @method     ObservationPhotoTailMarkQuery orderByObservation($order = Criteria::ASC) Order by the observation column
 *
 * @method     ObservationPhotoTailMarkQuery groupById() Group by the id column
 * @method     ObservationPhotoTailMarkQuery groupByObservationPhotoTailId() Group by the observation_photo_tail_id column
 * @method     ObservationPhotoTailMarkQuery groupByMarkId() Group by the mark_id column
 * @method     ObservationPhotoTailMarkQuery groupByLine() Group by the line column
 * @method     ObservationPhotoTailMarkQuery groupByColumn() Group by the column column
 * @method     ObservationPhotoTailMarkQuery groupByObservation() Group by the observation column
 *
 * @method     ObservationPhotoTailMarkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ObservationPhotoTailMarkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ObservationPhotoTailMarkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ObservationPhotoTailMarkQuery leftJoinObservationPhotoTail($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoTail relation
 * @method     ObservationPhotoTailMarkQuery rightJoinObservationPhotoTail($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoTail relation
 * @method     ObservationPhotoTailMarkQuery innerJoinObservationPhotoTail($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoTail relation
 *
 * @method     ObservationPhotoTailMarkQuery leftJoinMark($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mark relation
 * @method     ObservationPhotoTailMarkQuery rightJoinMark($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mark relation
 * @method     ObservationPhotoTailMarkQuery innerJoinMark($relationAlias = null) Adds a INNER JOIN clause to the query using the Mark relation
 *
 * @method     ObservationPhotoTailMark findOne(PropelPDO $con = null) Return the first ObservationPhotoTailMark matching the query
 * @method     ObservationPhotoTailMark findOneOrCreate(PropelPDO $con = null) Return the first ObservationPhotoTailMark matching the query, or a new ObservationPhotoTailMark object populated from the query conditions when no match is found
 *
 * @method     ObservationPhotoTailMark findOneById(int $id) Return the first ObservationPhotoTailMark filtered by the id column
 * @method     ObservationPhotoTailMark findOneByObservationPhotoTailId(int $observation_photo_tail_id) Return the first ObservationPhotoTailMark filtered by the observation_photo_tail_id column
 * @method     ObservationPhotoTailMark findOneByMarkId(int $mark_id) Return the first ObservationPhotoTailMark filtered by the mark_id column
 * @method     ObservationPhotoTailMark findOneByLine(int $line) Return the first ObservationPhotoTailMark filtered by the line column
 * @method     ObservationPhotoTailMark findOneByColumn(int $column) Return the first ObservationPhotoTailMark filtered by the column column
 * @method     ObservationPhotoTailMark findOneByObservation(string $observation) Return the first ObservationPhotoTailMark filtered by the observation column
 *
 * @method     array findById(int $id) Return ObservationPhotoTailMark objects filtered by the id column
 * @method     array findByObservationPhotoTailId(int $observation_photo_tail_id) Return ObservationPhotoTailMark objects filtered by the observation_photo_tail_id column
 * @method     array findByMarkId(int $mark_id) Return ObservationPhotoTailMark objects filtered by the mark_id column
 * @method     array findByLine(int $line) Return ObservationPhotoTailMark objects filtered by the line column
 * @method     array findByColumn(int $column) Return ObservationPhotoTailMark objects filtered by the column column
 * @method     array findByObservation(string $observation) Return ObservationPhotoTailMark objects filtered by the observation column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoTailMarkQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseObservationPhotoTailMarkQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ObservationPhotoTailMark', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ObservationPhotoTailMarkQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ObservationPhotoTailMarkQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ObservationPhotoTailMarkQuery) {
			return $criteria;
		}
		$query = new ObservationPhotoTailMarkQuery();
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
	 * @return    ObservationPhotoTailMark|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ObservationPhotoTailMarkPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the observation_photo_tail_id column
	 * 
	 * @param     int|array $observationPhotoTailId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoTailId($observationPhotoTailId = null, $comparison = null)
	{
		if (is_array($observationPhotoTailId)) {
			$useMinMax = false;
			if (isset($observationPhotoTailId['min'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, $observationPhotoTailId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($observationPhotoTailId['max'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, $observationPhotoTailId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, $observationPhotoTailId, $comparison);
	}

	/**
	 * Filter the query on the mark_id column
	 * 
	 * @param     int|array $markId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByMarkId($markId = null, $comparison = null)
	{
		if (is_array($markId)) {
			$useMinMax = false;
			if (isset($markId['min'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::MARK_ID, $markId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($markId['max'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::MARK_ID, $markId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::MARK_ID, $markId, $comparison);
	}

	/**
	 * Filter the query on the line column
	 * 
	 * @param     int|array $line The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByLine($line = null, $comparison = null)
	{
		if (is_array($line)) {
			$useMinMax = false;
			if (isset($line['min'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::LINE, $line['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($line['max'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::LINE, $line['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::LINE, $line, $comparison);
	}

	/**
	 * Filter the query on the column column
	 * 
	 * @param     int|array $column The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByColumn($column = null, $comparison = null)
	{
		if (is_array($column)) {
			$useMinMax = false;
			if (isset($column['min'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::COLUMN, $column['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($column['max'])) {
				$this->addUsingAlias(ObservationPhotoTailMarkPeer::COLUMN, $column['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::COLUMN, $column, $comparison);
	}

	/**
	 * Filter the query on the observation column
	 * 
	 * @param     string $observation The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ObservationPhotoTailMarkPeer::OBSERVATION, $observation, $comparison);
	}

	/**
	 * Filter the query by a related ObservationPhotoTail object
	 *
	 * @param     ObservationPhotoTail $observationPhotoTail  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoTail($observationPhotoTail, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoTailMarkPeer::OBSERVATION_PHOTO_TAIL_ID, $observationPhotoTail->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoTail relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoTail($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoTail');
		
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
			$this->addJoinObject($join, 'ObservationPhotoTail');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoTail relation ObservationPhotoTail object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoTailQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoTailQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoTail($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoTail', 'ObservationPhotoTailQuery');
	}

	/**
	 * Filter the query by a related Mark object
	 *
	 * @param     Mark $mark  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function filterByMark($mark, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoTailMarkPeer::MARK_ID, $mark->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Mark relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
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
	 * @param     ObservationPhotoTailMark $observationPhotoTailMark Object to remove from the list of results
	 *
	 * @return    ObservationPhotoTailMarkQuery The current query, for fluid interface
	 */
	public function prune($observationPhotoTailMark = null)
	{
		if ($observationPhotoTailMark) {
			$this->addUsingAlias(ObservationPhotoTailMarkPeer::ID, $observationPhotoTailMark->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseObservationPhotoTailMarkQuery
