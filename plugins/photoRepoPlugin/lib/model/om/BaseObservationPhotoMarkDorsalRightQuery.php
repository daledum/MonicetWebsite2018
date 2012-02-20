<?php


/**
 * Base class that represents a query for the 'observation_photo_mark_dorsal_right' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Mon Feb 20 14:52:39 2012
 *
 * @method     ObservationPhotoMarkDorsalRightQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ObservationPhotoMarkDorsalRightQuery orderByPhotoId($order = Criteria::ASC) Order by the photo_id column
 * @method     ObservationPhotoMarkDorsalRightQuery orderByMarkId($order = Criteria::ASC) Order by the mark_id column
 * @method     ObservationPhotoMarkDorsalRightQuery orderByLine($order = Criteria::ASC) Order by the line column
 * @method     ObservationPhotoMarkDorsalRightQuery orderByColumn($order = Criteria::ASC) Order by the column column
 * @method     ObservationPhotoMarkDorsalRightQuery orderByObservation($order = Criteria::ASC) Order by the observation column
 *
 * @method     ObservationPhotoMarkDorsalRightQuery groupById() Group by the id column
 * @method     ObservationPhotoMarkDorsalRightQuery groupByPhotoId() Group by the photo_id column
 * @method     ObservationPhotoMarkDorsalRightQuery groupByMarkId() Group by the mark_id column
 * @method     ObservationPhotoMarkDorsalRightQuery groupByLine() Group by the line column
 * @method     ObservationPhotoMarkDorsalRightQuery groupByColumn() Group by the column column
 * @method     ObservationPhotoMarkDorsalRightQuery groupByObservation() Group by the observation column
 *
 * @method     ObservationPhotoMarkDorsalRightQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ObservationPhotoMarkDorsalRightQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ObservationPhotoMarkDorsalRightQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ObservationPhotoMarkDorsalRightQuery leftJoinObservationPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhoto relation
 * @method     ObservationPhotoMarkDorsalRightQuery rightJoinObservationPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhoto relation
 * @method     ObservationPhotoMarkDorsalRightQuery innerJoinObservationPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhoto relation
 *
 * @method     ObservationPhotoMarkDorsalRightQuery leftJoinMark($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mark relation
 * @method     ObservationPhotoMarkDorsalRightQuery rightJoinMark($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mark relation
 * @method     ObservationPhotoMarkDorsalRightQuery innerJoinMark($relationAlias = null) Adds a INNER JOIN clause to the query using the Mark relation
 *
 * @method     ObservationPhotoMarkDorsalRight findOne(PropelPDO $con = null) Return the first ObservationPhotoMarkDorsalRight matching the query
 * @method     ObservationPhotoMarkDorsalRight findOneOrCreate(PropelPDO $con = null) Return the first ObservationPhotoMarkDorsalRight matching the query, or a new ObservationPhotoMarkDorsalRight object populated from the query conditions when no match is found
 *
 * @method     ObservationPhotoMarkDorsalRight findOneById(int $id) Return the first ObservationPhotoMarkDorsalRight filtered by the id column
 * @method     ObservationPhotoMarkDorsalRight findOneByPhotoId(int $photo_id) Return the first ObservationPhotoMarkDorsalRight filtered by the photo_id column
 * @method     ObservationPhotoMarkDorsalRight findOneByMarkId(int $mark_id) Return the first ObservationPhotoMarkDorsalRight filtered by the mark_id column
 * @method     ObservationPhotoMarkDorsalRight findOneByLine(int $line) Return the first ObservationPhotoMarkDorsalRight filtered by the line column
 * @method     ObservationPhotoMarkDorsalRight findOneByColumn(int $column) Return the first ObservationPhotoMarkDorsalRight filtered by the column column
 * @method     ObservationPhotoMarkDorsalRight findOneByObservation(string $observation) Return the first ObservationPhotoMarkDorsalRight filtered by the observation column
 *
 * @method     array findById(int $id) Return ObservationPhotoMarkDorsalRight objects filtered by the id column
 * @method     array findByPhotoId(int $photo_id) Return ObservationPhotoMarkDorsalRight objects filtered by the photo_id column
 * @method     array findByMarkId(int $mark_id) Return ObservationPhotoMarkDorsalRight objects filtered by the mark_id column
 * @method     array findByLine(int $line) Return ObservationPhotoMarkDorsalRight objects filtered by the line column
 * @method     array findByColumn(int $column) Return ObservationPhotoMarkDorsalRight objects filtered by the column column
 * @method     array findByObservation(string $observation) Return ObservationPhotoMarkDorsalRight objects filtered by the observation column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoMarkDorsalRightQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseObservationPhotoMarkDorsalRightQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ObservationPhotoMarkDorsalRight', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ObservationPhotoMarkDorsalRightQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ObservationPhotoMarkDorsalRightQuery) {
			return $criteria;
		}
		$query = new ObservationPhotoMarkDorsalRightQuery();
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
	 * @return    ObservationPhotoMarkDorsalRight|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ObservationPhotoMarkDorsalRightPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the photo_id column
	 * 
	 * @param     int|array $photoId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByPhotoId($photoId = null, $comparison = null)
	{
		if (is_array($photoId)) {
			$useMinMax = false;
			if (isset($photoId['min'])) {
				$this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::PHOTO_ID, $photoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($photoId['max'])) {
				$this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::PHOTO_ID, $photoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::PHOTO_ID, $photoId, $comparison);
	}

	/**
	 * Filter the query on the mark_id column
	 * 
	 * @param     int|array $markId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByMarkId($markId = null, $comparison = null)
	{
		if (is_array($markId)) {
			$useMinMax = false;
			if (isset($markId['min'])) {
				$this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::MARK_ID, $markId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($markId['max'])) {
				$this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::MARK_ID, $markId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::MARK_ID, $markId, $comparison);
	}

	/**
	 * Filter the query on the line column
	 * 
	 * @param     int|array $line The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByLine($line = null, $comparison = null)
	{
		if (is_array($line)) {
			$useMinMax = false;
			if (isset($line['min'])) {
				$this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::LINE, $line['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($line['max'])) {
				$this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::LINE, $line['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::LINE, $line, $comparison);
	}

	/**
	 * Filter the query on the column column
	 * 
	 * @param     int|array $column The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByColumn($column = null, $comparison = null)
	{
		if (is_array($column)) {
			$useMinMax = false;
			if (isset($column['min'])) {
				$this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::COLUMN, $column['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($column['max'])) {
				$this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::COLUMN, $column['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::COLUMN, $column, $comparison);
	}

	/**
	 * Filter the query on the observation column
	 * 
	 * @param     string $observation The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::OBSERVATION, $observation, $comparison);
	}

	/**
	 * Filter the query by a related ObservationPhoto object
	 *
	 * @param     ObservationPhoto $observationPhoto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByObservationPhoto($observationPhoto, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::PHOTO_ID, $observationPhoto->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhoto relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
	 */
	public function joinObservationPhoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhoto');
		
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
			$this->addJoinObject($join, 'ObservationPhoto');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhoto relation ObservationPhoto object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhoto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhoto', 'ObservationPhotoQuery');
	}

	/**
	 * Filter the query by a related Mark object
	 *
	 * @param     Mark $mark  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
	 */
	public function filterByMark($mark, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::MARK_ID, $mark->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Mark relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
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
	 * @param     ObservationPhotoMarkDorsalRight $observationPhotoMarkDorsalRight Object to remove from the list of results
	 *
	 * @return    ObservationPhotoMarkDorsalRightQuery The current query, for fluid interface
	 */
	public function prune($observationPhotoMarkDorsalRight = null)
	{
		if ($observationPhotoMarkDorsalRight) {
			$this->addUsingAlias(ObservationPhotoMarkDorsalRightPeer::ID, $observationPhotoMarkDorsalRight->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseObservationPhotoMarkDorsalRightQuery
