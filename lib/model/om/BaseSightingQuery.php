<?php


/**
 * Base class that represents a query for the 'sighting' table.
 *
 * 
 *
 * @method     SightingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SightingQuery orderByRecordId($order = Criteria::ASC) Order by the record_id column
 * @method     SightingQuery orderBySpecieId($order = Criteria::ASC) Order by the specie_id column
 * @method     SightingQuery orderByBehaviourId($order = Criteria::ASC) Order by the behaviour_id column
 * @method     SightingQuery orderByAssociationId($order = Criteria::ASC) Order by the association_id column
 * @method     SightingQuery orderByAdults($order = Criteria::ASC) Order by the adults column
 * @method     SightingQuery orderByJuveniles($order = Criteria::ASC) Order by the juveniles column
 * @method     SightingQuery orderByCalves($order = Criteria::ASC) Order by the calves column
 * @method     SightingQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     SightingQuery orderByComments($order = Criteria::ASC) Order by the comments column
 * @method     SightingQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     SightingQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     SightingQuery groupById() Group by the id column
 * @method     SightingQuery groupByRecordId() Group by the record_id column
 * @method     SightingQuery groupBySpecieId() Group by the specie_id column
 * @method     SightingQuery groupByBehaviourId() Group by the behaviour_id column
 * @method     SightingQuery groupByAssociationId() Group by the association_id column
 * @method     SightingQuery groupByAdults() Group by the adults column
 * @method     SightingQuery groupByJuveniles() Group by the juveniles column
 * @method     SightingQuery groupByCalves() Group by the calves column
 * @method     SightingQuery groupByTotal() Group by the total column
 * @method     SightingQuery groupByComments() Group by the comments column
 * @method     SightingQuery groupByCreatedAt() Group by the created_at column
 * @method     SightingQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     SightingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SightingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SightingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SightingQuery leftJoinRecord($relationAlias = null) Adds a LEFT JOIN clause to the query using the Record relation
 * @method     SightingQuery rightJoinRecord($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Record relation
 * @method     SightingQuery innerJoinRecord($relationAlias = null) Adds a INNER JOIN clause to the query using the Record relation
 *
 * @method     SightingQuery leftJoinSpecie($relationAlias = null) Adds a LEFT JOIN clause to the query using the Specie relation
 * @method     SightingQuery rightJoinSpecie($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Specie relation
 * @method     SightingQuery innerJoinSpecie($relationAlias = null) Adds a INNER JOIN clause to the query using the Specie relation
 *
 * @method     SightingQuery leftJoinBehaviour($relationAlias = null) Adds a LEFT JOIN clause to the query using the Behaviour relation
 * @method     SightingQuery rightJoinBehaviour($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Behaviour relation
 * @method     SightingQuery innerJoinBehaviour($relationAlias = null) Adds a INNER JOIN clause to the query using the Behaviour relation
 *
 * @method     SightingQuery leftJoinAssociation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Association relation
 * @method     SightingQuery rightJoinAssociation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Association relation
 * @method     SightingQuery innerJoinAssociation($relationAlias = null) Adds a INNER JOIN clause to the query using the Association relation
 *
 * @method     SightingQuery leftJoinObservationPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhoto relation
 * @method     SightingQuery rightJoinObservationPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhoto relation
 * @method     SightingQuery innerJoinObservationPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhoto relation
 *
 * @method     Sighting findOne(PropelPDO $con = null) Return the first Sighting matching the query
 * @method     Sighting findOneOrCreate(PropelPDO $con = null) Return the first Sighting matching the query, or a new Sighting object populated from the query conditions when no match is found
 *
 * @method     Sighting findOneById(int $id) Return the first Sighting filtered by the id column
 * @method     Sighting findOneByRecordId(int $record_id) Return the first Sighting filtered by the record_id column
 * @method     Sighting findOneBySpecieId(int $specie_id) Return the first Sighting filtered by the specie_id column
 * @method     Sighting findOneByBehaviourId(int $behaviour_id) Return the first Sighting filtered by the behaviour_id column
 * @method     Sighting findOneByAssociationId(int $association_id) Return the first Sighting filtered by the association_id column
 * @method     Sighting findOneByAdults(string $adults) Return the first Sighting filtered by the adults column
 * @method     Sighting findOneByJuveniles(string $juveniles) Return the first Sighting filtered by the juveniles column
 * @method     Sighting findOneByCalves(string $calves) Return the first Sighting filtered by the calves column
 * @method     Sighting findOneByTotal(int $total) Return the first Sighting filtered by the total column
 * @method     Sighting findOneByComments(string $comments) Return the first Sighting filtered by the comments column
 * @method     Sighting findOneByCreatedAt(string $created_at) Return the first Sighting filtered by the created_at column
 * @method     Sighting findOneByUpdatedAt(string $updated_at) Return the first Sighting filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Sighting objects filtered by the id column
 * @method     array findByRecordId(int $record_id) Return Sighting objects filtered by the record_id column
 * @method     array findBySpecieId(int $specie_id) Return Sighting objects filtered by the specie_id column
 * @method     array findByBehaviourId(int $behaviour_id) Return Sighting objects filtered by the behaviour_id column
 * @method     array findByAssociationId(int $association_id) Return Sighting objects filtered by the association_id column
 * @method     array findByAdults(string $adults) Return Sighting objects filtered by the adults column
 * @method     array findByJuveniles(string $juveniles) Return Sighting objects filtered by the juveniles column
 * @method     array findByCalves(string $calves) Return Sighting objects filtered by the calves column
 * @method     array findByTotal(int $total) Return Sighting objects filtered by the total column
 * @method     array findByComments(string $comments) Return Sighting objects filtered by the comments column
 * @method     array findByCreatedAt(string $created_at) Return Sighting objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Sighting objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSightingQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSightingQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Sighting', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SightingQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SightingQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SightingQuery) {
			return $criteria;
		}
		$query = new SightingQuery();
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
	 * @return    Sighting|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SightingPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SightingPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SightingPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SightingPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the record_id column
	 * 
	 * @param     int|array $recordId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByRecordId($recordId = null, $comparison = null)
	{
		if (is_array($recordId)) {
			$useMinMax = false;
			if (isset($recordId['min'])) {
				$this->addUsingAlias(SightingPeer::RECORD_ID, $recordId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($recordId['max'])) {
				$this->addUsingAlias(SightingPeer::RECORD_ID, $recordId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SightingPeer::RECORD_ID, $recordId, $comparison);
	}

	/**
	 * Filter the query on the specie_id column
	 * 
	 * @param     int|array $specieId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterBySpecieId($specieId = null, $comparison = null)
	{
		if (is_array($specieId)) {
			$useMinMax = false;
			if (isset($specieId['min'])) {
				$this->addUsingAlias(SightingPeer::SPECIE_ID, $specieId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($specieId['max'])) {
				$this->addUsingAlias(SightingPeer::SPECIE_ID, $specieId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SightingPeer::SPECIE_ID, $specieId, $comparison);
	}

	/**
	 * Filter the query on the behaviour_id column
	 * 
	 * @param     int|array $behaviourId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByBehaviourId($behaviourId = null, $comparison = null)
	{
		if (is_array($behaviourId)) {
			$useMinMax = false;
			if (isset($behaviourId['min'])) {
				$this->addUsingAlias(SightingPeer::BEHAVIOUR_ID, $behaviourId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($behaviourId['max'])) {
				$this->addUsingAlias(SightingPeer::BEHAVIOUR_ID, $behaviourId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SightingPeer::BEHAVIOUR_ID, $behaviourId, $comparison);
	}

	/**
	 * Filter the query on the association_id column
	 * 
	 * @param     int|array $associationId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByAssociationId($associationId = null, $comparison = null)
	{
		if (is_array($associationId)) {
			$useMinMax = false;
			if (isset($associationId['min'])) {
				$this->addUsingAlias(SightingPeer::ASSOCIATION_ID, $associationId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($associationId['max'])) {
				$this->addUsingAlias(SightingPeer::ASSOCIATION_ID, $associationId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SightingPeer::ASSOCIATION_ID, $associationId, $comparison);
	}

	/**
	 * Filter the query on the adults column
	 * 
	 * @param     string $adults The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByAdults($adults = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($adults)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $adults)) {
				$adults = str_replace('*', '%', $adults);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SightingPeer::ADULTS, $adults, $comparison);
	}

	/**
	 * Filter the query on the juveniles column
	 * 
	 * @param     string $juveniles The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByJuveniles($juveniles = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($juveniles)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $juveniles)) {
				$juveniles = str_replace('*', '%', $juveniles);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SightingPeer::JUVENILES, $juveniles, $comparison);
	}

	/**
	 * Filter the query on the calves column
	 * 
	 * @param     string $calves The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByCalves($calves = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($calves)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $calves)) {
				$calves = str_replace('*', '%', $calves);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SightingPeer::CALVES, $calves, $comparison);
	}

	/**
	 * Filter the query on the total column
	 * 
	 * @param     int|array $total The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByTotal($total = null, $comparison = null)
	{
		if (is_array($total)) {
			$useMinMax = false;
			if (isset($total['min'])) {
				$this->addUsingAlias(SightingPeer::TOTAL, $total['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($total['max'])) {
				$this->addUsingAlias(SightingPeer::TOTAL, $total['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SightingPeer::TOTAL, $total, $comparison);
	}

	/**
	 * Filter the query on the comments column
	 * 
	 * @param     string $comments The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByComments($comments = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comments)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comments)) {
				$comments = str_replace('*', '%', $comments);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SightingPeer::COMMENTS, $comments, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(SightingPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(SightingPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SightingPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(SightingPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(SightingPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SightingPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Record object
	 *
	 * @param     Record $record  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByRecord($record, $comparison = null)
	{
		return $this
			->addUsingAlias(SightingPeer::RECORD_ID, $record->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Record relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SightingQuery The current query, for fluid interface
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
	 * Filter the query by a related Specie object
	 *
	 * @param     Specie $specie  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterBySpecie($specie, $comparison = null)
	{
		return $this
			->addUsingAlias(SightingPeer::SPECIE_ID, $specie->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Specie relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SightingQuery The current query, for fluid interface
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
	 * Filter the query by a related Behaviour object
	 *
	 * @param     Behaviour $behaviour  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByBehaviour($behaviour, $comparison = null)
	{
		return $this
			->addUsingAlias(SightingPeer::BEHAVIOUR_ID, $behaviour->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Behaviour relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function joinBehaviour($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Behaviour');
		
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
			$this->addJoinObject($join, 'Behaviour');
		}
		
		return $this;
	}

	/**
	 * Use the Behaviour relation Behaviour object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BehaviourQuery A secondary query class using the current class as primary query
	 */
	public function useBehaviourQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinBehaviour($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Behaviour', 'BehaviourQuery');
	}

	/**
	 * Filter the query by a related Association object
	 *
	 * @param     Association $association  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByAssociation($association, $comparison = null)
	{
		return $this
			->addUsingAlias(SightingPeer::ASSOCIATION_ID, $association->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Association relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function joinAssociation($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Association');
		
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
			$this->addJoinObject($join, 'Association');
		}
		
		return $this;
	}

	/**
	 * Use the Association relation Association object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AssociationQuery A secondary query class using the current class as primary query
	 */
	public function useAssociationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAssociation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Association', 'AssociationQuery');
	}

	/**
	 * Filter the query by a related ObservationPhoto object
	 *
	 * @param     ObservationPhoto $observationPhoto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function filterByObservationPhoto($observationPhoto, $comparison = null)
	{
		return $this
			->addUsingAlias(SightingPeer::ID, $observationPhoto->getSightingId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhoto relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SightingQuery The current query, for fluid interface
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
	 * @param     Sighting $sighting Object to remove from the list of results
	 *
	 * @return    SightingQuery The current query, for fluid interface
	 */
	public function prune($sighting = null)
	{
		if ($sighting) {
			$this->addUsingAlias(SightingPeer::ID, $sighting->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSightingQuery
