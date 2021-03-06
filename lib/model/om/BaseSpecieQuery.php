<?php


/**
 * Base class that represents a query for the 'specie' table.
 *
 * 
 *
 * @method     SpecieQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SpecieQuery orderBySpecieGroupId($order = Criteria::ASC) Order by the specie_group_id column
 * @method     SpecieQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     SpecieQuery orderByRecCetCode($order = Criteria::ASC) Order by the rec_cet_code column
 * @method     SpecieQuery orderByScientificName($order = Criteria::ASC) Order by the scientific_name column
 * @method     SpecieQuery orderByColor($order = Criteria::ASC) Order by the color column
 * @method     SpecieQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     SpecieQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     SpecieQuery groupById() Group by the id column
 * @method     SpecieQuery groupBySpecieGroupId() Group by the specie_group_id column
 * @method     SpecieQuery groupByCode() Group by the code column
 * @method     SpecieQuery groupByRecCetCode() Group by the rec_cet_code column
 * @method     SpecieQuery groupByScientificName() Group by the scientific_name column
 * @method     SpecieQuery groupByColor() Group by the color column
 * @method     SpecieQuery groupByCreatedAt() Group by the created_at column
 * @method     SpecieQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     SpecieQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SpecieQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SpecieQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SpecieQuery leftJoinSpecieGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpecieGroup relation
 * @method     SpecieQuery rightJoinSpecieGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpecieGroup relation
 * @method     SpecieQuery innerJoinSpecieGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the SpecieGroup relation
 *
 * @method     SpecieQuery leftJoinSpecieI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpecieI18n relation
 * @method     SpecieQuery rightJoinSpecieI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpecieI18n relation
 * @method     SpecieQuery innerJoinSpecieI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the SpecieI18n relation
 *
 * @method     SpecieQuery leftJoinSighting($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sighting relation
 * @method     SpecieQuery rightJoinSighting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sighting relation
 * @method     SpecieQuery innerJoinSighting($relationAlias = null) Adds a INNER JOIN clause to the query using the Sighting relation
 *
 * @method     SpecieQuery leftJoinWatchSighting($relationAlias = null) Adds a LEFT JOIN clause to the query using the WatchSighting relation
 * @method     SpecieQuery rightJoinWatchSighting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WatchSighting relation
 * @method     SpecieQuery innerJoinWatchSighting($relationAlias = null) Adds a INNER JOIN clause to the query using the WatchSighting relation
 *
 * @method     SpecieQuery leftJoinIndividual($relationAlias = null) Adds a LEFT JOIN clause to the query using the Individual relation
 * @method     SpecieQuery rightJoinIndividual($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Individual relation
 * @method     SpecieQuery innerJoinIndividual($relationAlias = null) Adds a INNER JOIN clause to the query using the Individual relation
 *
 * @method     SpecieQuery leftJoinPattern($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pattern relation
 * @method     SpecieQuery rightJoinPattern($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pattern relation
 * @method     SpecieQuery innerJoinPattern($relationAlias = null) Adds a INNER JOIN clause to the query using the Pattern relation
 *
 * @method     SpecieQuery leftJoinObservationPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhoto relation
 * @method     SpecieQuery rightJoinObservationPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhoto relation
 * @method     SpecieQuery innerJoinObservationPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhoto relation
 *
 * @method     Specie findOne(PropelPDO $con = null) Return the first Specie matching the query
 * @method     Specie findOneOrCreate(PropelPDO $con = null) Return the first Specie matching the query, or a new Specie object populated from the query conditions when no match is found
 *
 * @method     Specie findOneById(int $id) Return the first Specie filtered by the id column
 * @method     Specie findOneBySpecieGroupId(int $specie_group_id) Return the first Specie filtered by the specie_group_id column
 * @method     Specie findOneByCode(string $code) Return the first Specie filtered by the code column
 * @method     Specie findOneByRecCetCode(string $rec_cet_code) Return the first Specie filtered by the rec_cet_code column
 * @method     Specie findOneByScientificName(string $scientific_name) Return the first Specie filtered by the scientific_name column
 * @method     Specie findOneByColor(string $color) Return the first Specie filtered by the color column
 * @method     Specie findOneByCreatedAt(string $created_at) Return the first Specie filtered by the created_at column
 * @method     Specie findOneByUpdatedAt(string $updated_at) Return the first Specie filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Specie objects filtered by the id column
 * @method     array findBySpecieGroupId(int $specie_group_id) Return Specie objects filtered by the specie_group_id column
 * @method     array findByCode(string $code) Return Specie objects filtered by the code column
 * @method     array findByRecCetCode(string $rec_cet_code) Return Specie objects filtered by the rec_cet_code column
 * @method     array findByScientificName(string $scientific_name) Return Specie objects filtered by the scientific_name column
 * @method     array findByColor(string $color) Return Specie objects filtered by the color column
 * @method     array findByCreatedAt(string $created_at) Return Specie objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Specie objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSpecieQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSpecieQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Specie', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SpecieQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SpecieQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SpecieQuery) {
			return $criteria;
		}
		$query = new SpecieQuery();
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
	 * @return    Specie|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SpeciePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SpeciePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SpeciePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SpeciePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the specie_group_id column
	 * 
	 * @param     int|array $specieGroupId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterBySpecieGroupId($specieGroupId = null, $comparison = null)
	{
		if (is_array($specieGroupId)) {
			$useMinMax = false;
			if (isset($specieGroupId['min'])) {
				$this->addUsingAlias(SpeciePeer::SPECIE_GROUP_ID, $specieGroupId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($specieGroupId['max'])) {
				$this->addUsingAlias(SpeciePeer::SPECIE_GROUP_ID, $specieGroupId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SpeciePeer::SPECIE_GROUP_ID, $specieGroupId, $comparison);
	}

	/**
	 * Filter the query on the code column
	 * 
	 * @param     string $code The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByCode($code = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($code)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $code)) {
				$code = str_replace('*', '%', $code);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SpeciePeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query on the rec_cet_code column
	 * 
	 * @param     string $recCetCode The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByRecCetCode($recCetCode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($recCetCode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $recCetCode)) {
				$recCetCode = str_replace('*', '%', $recCetCode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SpeciePeer::REC_CET_CODE, $recCetCode, $comparison);
	}

	/**
	 * Filter the query on the scientific_name column
	 * 
	 * @param     string $scientificName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByScientificName($scientificName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($scientificName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $scientificName)) {
				$scientificName = str_replace('*', '%', $scientificName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SpeciePeer::SCIENTIFIC_NAME, $scientificName, $comparison);
	}

	/**
	 * Filter the query on the color column
	 * 
	 * @param     string $color The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByColor($color = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($color)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $color)) {
				$color = str_replace('*', '%', $color);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SpeciePeer::COLOR, $color, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(SpeciePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(SpeciePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SpeciePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(SpeciePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(SpeciePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SpeciePeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related SpecieGroup object
	 *
	 * @param     SpecieGroup $specieGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterBySpecieGroup($specieGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(SpeciePeer::SPECIE_GROUP_ID, $specieGroup->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SpecieGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function joinSpecieGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SpecieGroup');
		
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
			$this->addJoinObject($join, 'SpecieGroup');
		}
		
		return $this;
	}

	/**
	 * Use the SpecieGroup relation SpecieGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SpecieGroupQuery A secondary query class using the current class as primary query
	 */
	public function useSpecieGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSpecieGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SpecieGroup', 'SpecieGroupQuery');
	}

	/**
	 * Filter the query by a related SpecieI18n object
	 *
	 * @param     SpecieI18n $specieI18n  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterBySpecieI18n($specieI18n, $comparison = null)
	{
		return $this
			->addUsingAlias(SpeciePeer::ID, $specieI18n->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SpecieI18n relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function joinSpecieI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SpecieI18n');
		
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
			$this->addJoinObject($join, 'SpecieI18n');
		}
		
		return $this;
	}

	/**
	 * Use the SpecieI18n relation SpecieI18n object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SpecieI18nQuery A secondary query class using the current class as primary query
	 */
	public function useSpecieI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSpecieI18n($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SpecieI18n', 'SpecieI18nQuery');
	}

	/**
	 * Filter the query by a related Sighting object
	 *
	 * @param     Sighting $sighting  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterBySighting($sighting, $comparison = null)
	{
		return $this
			->addUsingAlias(SpeciePeer::ID, $sighting->getSpecieId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Sighting relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function joinSighting($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Sighting');
		
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
			$this->addJoinObject($join, 'Sighting');
		}
		
		return $this;
	}

	/**
	 * Use the Sighting relation Sighting object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SightingQuery A secondary query class using the current class as primary query
	 */
	public function useSightingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSighting($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Sighting', 'SightingQuery');
	}

	/**
	 * Filter the query by a related WatchSighting object
	 *
	 * @param     WatchSighting $watchSighting  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByWatchSighting($watchSighting, $comparison = null)
	{
		return $this
			->addUsingAlias(SpeciePeer::ID, $watchSighting->getSpecieId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WatchSighting relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function joinWatchSighting($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WatchSighting');
		
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
			$this->addJoinObject($join, 'WatchSighting');
		}
		
		return $this;
	}

	/**
	 * Use the WatchSighting relation WatchSighting object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchSightingQuery A secondary query class using the current class as primary query
	 */
	public function useWatchSightingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinWatchSighting($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WatchSighting', 'WatchSightingQuery');
	}

	/**
	 * Filter the query by a related Individual object
	 *
	 * @param     Individual $individual  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByIndividual($individual, $comparison = null)
	{
		return $this
			->addUsingAlias(SpeciePeer::ID, $individual->getSpecieId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Individual relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function joinIndividual($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Individual');
		
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
			$this->addJoinObject($join, 'Individual');
		}
		
		return $this;
	}

	/**
	 * Use the Individual relation Individual object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IndividualQuery A secondary query class using the current class as primary query
	 */
	public function useIndividualQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinIndividual($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Individual', 'IndividualQuery');
	}

	/**
	 * Filter the query by a related Pattern object
	 *
	 * @param     Pattern $pattern  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByPattern($pattern, $comparison = null)
	{
		return $this
			->addUsingAlias(SpeciePeer::ID, $pattern->getSpecieId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Pattern relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function joinPattern($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Pattern');
		
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
			$this->addJoinObject($join, 'Pattern');
		}
		
		return $this;
	}

	/**
	 * Use the Pattern relation Pattern object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PatternQuery A secondary query class using the current class as primary query
	 */
	public function usePatternQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPattern($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pattern', 'PatternQuery');
	}

	/**
	 * Filter the query by a related ObservationPhoto object
	 *
	 * @param     ObservationPhoto $observationPhoto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function filterByObservationPhoto($observationPhoto, $comparison = null)
	{
		return $this
			->addUsingAlias(SpeciePeer::ID, $observationPhoto->getSpecieId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhoto relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function joinObservationPhoto($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useObservationPhotoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinObservationPhoto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhoto', 'ObservationPhotoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Specie $specie Object to remove from the list of results
	 *
	 * @return    SpecieQuery The current query, for fluid interface
	 */
	public function prune($specie = null)
	{
		if ($specie) {
			$this->addUsingAlias(SpeciePeer::ID, $specie->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSpecieQuery
