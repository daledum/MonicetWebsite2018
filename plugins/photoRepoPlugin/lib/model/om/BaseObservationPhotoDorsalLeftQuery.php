<?php


/**
 * Base class that represents a query for the 'observation_photo_dorsal_left' table.
 *
 * 
 *
 * @method     ObservationPhotoDorsalLeftQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ObservationPhotoDorsalLeftQuery orderByPhotoId($order = Criteria::ASC) Order by the photo_id column
 * @method     ObservationPhotoDorsalLeftQuery orderByIsSmooth($order = Criteria::ASC) Order by the is_smooth column
 * @method     ObservationPhotoDorsalLeftQuery orderByIsIrregular($order = Criteria::ASC) Order by the is_irregular column
 *
 * @method     ObservationPhotoDorsalLeftQuery groupById() Group by the id column
 * @method     ObservationPhotoDorsalLeftQuery groupByPhotoId() Group by the photo_id column
 * @method     ObservationPhotoDorsalLeftQuery groupByIsSmooth() Group by the is_smooth column
 * @method     ObservationPhotoDorsalLeftQuery groupByIsIrregular() Group by the is_irregular column
 *
 * @method     ObservationPhotoDorsalLeftQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ObservationPhotoDorsalLeftQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ObservationPhotoDorsalLeftQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ObservationPhotoDorsalLeftQuery leftJoinObservationPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhoto relation
 * @method     ObservationPhotoDorsalLeftQuery rightJoinObservationPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhoto relation
 * @method     ObservationPhotoDorsalLeftQuery innerJoinObservationPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhoto relation
 *
 * @method     ObservationPhotoDorsalLeftQuery leftJoinObservationPhotoDorsalLeftMark($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoDorsalLeftMark relation
 * @method     ObservationPhotoDorsalLeftQuery rightJoinObservationPhotoDorsalLeftMark($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoDorsalLeftMark relation
 * @method     ObservationPhotoDorsalLeftQuery innerJoinObservationPhotoDorsalLeftMark($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoDorsalLeftMark relation
 *
 * @method     ObservationPhotoDorsalLeft findOne(PropelPDO $con = null) Return the first ObservationPhotoDorsalLeft matching the query
 * @method     ObservationPhotoDorsalLeft findOneOrCreate(PropelPDO $con = null) Return the first ObservationPhotoDorsalLeft matching the query, or a new ObservationPhotoDorsalLeft object populated from the query conditions when no match is found
 *
 * @method     ObservationPhotoDorsalLeft findOneById(int $id) Return the first ObservationPhotoDorsalLeft filtered by the id column
 * @method     ObservationPhotoDorsalLeft findOneByPhotoId(int $photo_id) Return the first ObservationPhotoDorsalLeft filtered by the photo_id column
 * @method     ObservationPhotoDorsalLeft findOneByIsSmooth(boolean $is_smooth) Return the first ObservationPhotoDorsalLeft filtered by the is_smooth column
 * @method     ObservationPhotoDorsalLeft findOneByIsIrregular(boolean $is_irregular) Return the first ObservationPhotoDorsalLeft filtered by the is_irregular column
 *
 * @method     array findById(int $id) Return ObservationPhotoDorsalLeft objects filtered by the id column
 * @method     array findByPhotoId(int $photo_id) Return ObservationPhotoDorsalLeft objects filtered by the photo_id column
 * @method     array findByIsSmooth(boolean $is_smooth) Return ObservationPhotoDorsalLeft objects filtered by the is_smooth column
 * @method     array findByIsIrregular(boolean $is_irregular) Return ObservationPhotoDorsalLeft objects filtered by the is_irregular column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoDorsalLeftQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseObservationPhotoDorsalLeftQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ObservationPhotoDorsalLeft', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ObservationPhotoDorsalLeftQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ObservationPhotoDorsalLeftQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ObservationPhotoDorsalLeftQuery) {
			return $criteria;
		}
		$query = new ObservationPhotoDorsalLeftQuery();
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
	 * @return    ObservationPhotoDorsalLeft|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ObservationPhotoDorsalLeftPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ObservationPhotoDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalLeftPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ObservationPhotoDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ObservationPhotoDorsalLeftPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the photo_id column
	 * 
	 * @param     int|array $photoId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByPhotoId($photoId = null, $comparison = null)
	{
		if (is_array($photoId)) {
			$useMinMax = false;
			if (isset($photoId['min'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftPeer::PHOTO_ID, $photoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($photoId['max'])) {
				$this->addUsingAlias(ObservationPhotoDorsalLeftPeer::PHOTO_ID, $photoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftPeer::PHOTO_ID, $photoId, $comparison);
	}

	/**
	 * Filter the query on the is_smooth column
	 * 
	 * @param     boolean|string $isSmooth The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByIsSmooth($isSmooth = null, $comparison = null)
	{
		if (is_string($isSmooth)) {
			$is_smooth = in_array(strtolower($isSmooth), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftPeer::IS_SMOOTH, $isSmooth, $comparison);
	}

	/**
	 * Filter the query on the is_irregular column
	 * 
	 * @param     boolean|string $isIrregular The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByIsIrregular($isIrregular = null, $comparison = null)
	{
		if (is_string($isIrregular)) {
			$is_irregular = in_array(strtolower($isIrregular), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ObservationPhotoDorsalLeftPeer::IS_IRREGULAR, $isIrregular, $comparison);
	}

	/**
	 * Filter the query by a related ObservationPhoto object
	 *
	 * @param     ObservationPhoto $observationPhoto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByObservationPhoto($observationPhoto, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalLeftPeer::PHOTO_ID, $observationPhoto->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhoto relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftQuery The current query, for fluid interface
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
	 * Filter the query by a related ObservationPhotoDorsalLeftMark object
	 *
	 * @param     ObservationPhotoDorsalLeftMark $observationPhotoDorsalLeftMark  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoDorsalLeftQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalLeftMark($observationPhotoDorsalLeftMark, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoDorsalLeftPeer::ID, $observationPhotoDorsalLeftMark->getObservationPhotoDorsalLeftId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoDorsalLeftMark relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoDorsalLeftMark($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoDorsalLeftMark');
		
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
			$this->addJoinObject($join, 'ObservationPhotoDorsalLeftMark');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoDorsalLeftMark relation ObservationPhotoDorsalLeftMark object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftMarkQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoDorsalLeftMarkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoDorsalLeftMark($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoDorsalLeftMark', 'ObservationPhotoDorsalLeftMarkQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ObservationPhotoDorsalLeft $observationPhotoDorsalLeft Object to remove from the list of results
	 *
	 * @return    ObservationPhotoDorsalLeftQuery The current query, for fluid interface
	 */
	public function prune($observationPhotoDorsalLeft = null)
	{
		if ($observationPhotoDorsalLeft) {
			$this->addUsingAlias(ObservationPhotoDorsalLeftPeer::ID, $observationPhotoDorsalLeft->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseObservationPhotoDorsalLeftQuery
