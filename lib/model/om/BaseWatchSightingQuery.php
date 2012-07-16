<?php


/**
 * Base class that represents a query for the 'watch_sighting' table.
 *
 * 
 *
 * @method     WatchSightingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     WatchSightingQuery orderByWatchInfoId($order = Criteria::ASC) Order by the watch_info_id column
 * @method     WatchSightingQuery orderByWatchCodeId($order = Criteria::ASC) Order by the watch_code_id column
 * @method     WatchSightingQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     WatchSightingQuery orderByWatchVisibilityId($order = Criteria::ASC) Order by the watch_visibility_id column
 * @method     WatchSightingQuery orderBySpecieId($order = Criteria::ASC) Order by the specie_id column
 * @method     WatchSightingQuery orderByGroup($order = Criteria::ASC) Order by the group column
 * @method     WatchSightingQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     WatchSightingQuery orderByBehaviourId($order = Criteria::ASC) Order by the behaviour_id column
 * @method     WatchSightingQuery orderByDirectionId($order = Criteria::ASC) Order by the direction_id column
 * @method     WatchSightingQuery orderByHorizontal($order = Criteria::ASC) Order by the horizontal column
 * @method     WatchSightingQuery orderByVertical($order = Criteria::ASC) Order by the vertical column
 * @method     WatchSightingQuery orderByVesselId($order = Criteria::ASC) Order by the vessel_id column
 * @method     WatchSightingQuery orderByComments($order = Criteria::ASC) Order by the comments column
 * @method     WatchSightingQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     WatchSightingQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     WatchSightingQuery groupById() Group by the id column
 * @method     WatchSightingQuery groupByWatchInfoId() Group by the watch_info_id column
 * @method     WatchSightingQuery groupByWatchCodeId() Group by the watch_code_id column
 * @method     WatchSightingQuery groupByTime() Group by the time column
 * @method     WatchSightingQuery groupByWatchVisibilityId() Group by the watch_visibility_id column
 * @method     WatchSightingQuery groupBySpecieId() Group by the specie_id column
 * @method     WatchSightingQuery groupByGroup() Group by the group column
 * @method     WatchSightingQuery groupByTotal() Group by the total column
 * @method     WatchSightingQuery groupByBehaviourId() Group by the behaviour_id column
 * @method     WatchSightingQuery groupByDirectionId() Group by the direction_id column
 * @method     WatchSightingQuery groupByHorizontal() Group by the horizontal column
 * @method     WatchSightingQuery groupByVertical() Group by the vertical column
 * @method     WatchSightingQuery groupByVesselId() Group by the vessel_id column
 * @method     WatchSightingQuery groupByComments() Group by the comments column
 * @method     WatchSightingQuery groupByCreatedAt() Group by the created_at column
 * @method     WatchSightingQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     WatchSightingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     WatchSightingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     WatchSightingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     WatchSightingQuery leftJoinWatchInfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the WatchInfo relation
 * @method     WatchSightingQuery rightJoinWatchInfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WatchInfo relation
 * @method     WatchSightingQuery innerJoinWatchInfo($relationAlias = null) Adds a INNER JOIN clause to the query using the WatchInfo relation
 *
 * @method     WatchSightingQuery leftJoinWatchCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the WatchCode relation
 * @method     WatchSightingQuery rightJoinWatchCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WatchCode relation
 * @method     WatchSightingQuery innerJoinWatchCode($relationAlias = null) Adds a INNER JOIN clause to the query using the WatchCode relation
 *
 * @method     WatchSightingQuery leftJoinWatchVisibility($relationAlias = null) Adds a LEFT JOIN clause to the query using the WatchVisibility relation
 * @method     WatchSightingQuery rightJoinWatchVisibility($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WatchVisibility relation
 * @method     WatchSightingQuery innerJoinWatchVisibility($relationAlias = null) Adds a INNER JOIN clause to the query using the WatchVisibility relation
 *
 * @method     WatchSightingQuery leftJoinSpecie($relationAlias = null) Adds a LEFT JOIN clause to the query using the Specie relation
 * @method     WatchSightingQuery rightJoinSpecie($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Specie relation
 * @method     WatchSightingQuery innerJoinSpecie($relationAlias = null) Adds a INNER JOIN clause to the query using the Specie relation
 *
 * @method     WatchSightingQuery leftJoinBehaviour($relationAlias = null) Adds a LEFT JOIN clause to the query using the Behaviour relation
 * @method     WatchSightingQuery rightJoinBehaviour($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Behaviour relation
 * @method     WatchSightingQuery innerJoinBehaviour($relationAlias = null) Adds a INNER JOIN clause to the query using the Behaviour relation
 *
 * @method     WatchSightingQuery leftJoinDirection($relationAlias = null) Adds a LEFT JOIN clause to the query using the Direction relation
 * @method     WatchSightingQuery rightJoinDirection($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Direction relation
 * @method     WatchSightingQuery innerJoinDirection($relationAlias = null) Adds a INNER JOIN clause to the query using the Direction relation
 *
 * @method     WatchSightingQuery leftJoinVessel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Vessel relation
 * @method     WatchSightingQuery rightJoinVessel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Vessel relation
 * @method     WatchSightingQuery innerJoinVessel($relationAlias = null) Adds a INNER JOIN clause to the query using the Vessel relation
 *
 * @method     WatchSighting findOne(PropelPDO $con = null) Return the first WatchSighting matching the query
 * @method     WatchSighting findOneOrCreate(PropelPDO $con = null) Return the first WatchSighting matching the query, or a new WatchSighting object populated from the query conditions when no match is found
 *
 * @method     WatchSighting findOneById(int $id) Return the first WatchSighting filtered by the id column
 * @method     WatchSighting findOneByWatchInfoId(int $watch_info_id) Return the first WatchSighting filtered by the watch_info_id column
 * @method     WatchSighting findOneByWatchCodeId(int $watch_code_id) Return the first WatchSighting filtered by the watch_code_id column
 * @method     WatchSighting findOneByTime(string $time) Return the first WatchSighting filtered by the time column
 * @method     WatchSighting findOneByWatchVisibilityId(int $watch_visibility_id) Return the first WatchSighting filtered by the watch_visibility_id column
 * @method     WatchSighting findOneBySpecieId(int $specie_id) Return the first WatchSighting filtered by the specie_id column
 * @method     WatchSighting findOneByGroup(string $group) Return the first WatchSighting filtered by the group column
 * @method     WatchSighting findOneByTotal(int $total) Return the first WatchSighting filtered by the total column
 * @method     WatchSighting findOneByBehaviourId(int $behaviour_id) Return the first WatchSighting filtered by the behaviour_id column
 * @method     WatchSighting findOneByDirectionId(int $direction_id) Return the first WatchSighting filtered by the direction_id column
 * @method     WatchSighting findOneByHorizontal(double $horizontal) Return the first WatchSighting filtered by the horizontal column
 * @method     WatchSighting findOneByVertical(double $vertical) Return the first WatchSighting filtered by the vertical column
 * @method     WatchSighting findOneByVesselId(int $vessel_id) Return the first WatchSighting filtered by the vessel_id column
 * @method     WatchSighting findOneByComments(string $comments) Return the first WatchSighting filtered by the comments column
 * @method     WatchSighting findOneByCreatedAt(string $created_at) Return the first WatchSighting filtered by the created_at column
 * @method     WatchSighting findOneByUpdatedAt(string $updated_at) Return the first WatchSighting filtered by the updated_at column
 *
 * @method     array findById(int $id) Return WatchSighting objects filtered by the id column
 * @method     array findByWatchInfoId(int $watch_info_id) Return WatchSighting objects filtered by the watch_info_id column
 * @method     array findByWatchCodeId(int $watch_code_id) Return WatchSighting objects filtered by the watch_code_id column
 * @method     array findByTime(string $time) Return WatchSighting objects filtered by the time column
 * @method     array findByWatchVisibilityId(int $watch_visibility_id) Return WatchSighting objects filtered by the watch_visibility_id column
 * @method     array findBySpecieId(int $specie_id) Return WatchSighting objects filtered by the specie_id column
 * @method     array findByGroup(string $group) Return WatchSighting objects filtered by the group column
 * @method     array findByTotal(int $total) Return WatchSighting objects filtered by the total column
 * @method     array findByBehaviourId(int $behaviour_id) Return WatchSighting objects filtered by the behaviour_id column
 * @method     array findByDirectionId(int $direction_id) Return WatchSighting objects filtered by the direction_id column
 * @method     array findByHorizontal(double $horizontal) Return WatchSighting objects filtered by the horizontal column
 * @method     array findByVertical(double $vertical) Return WatchSighting objects filtered by the vertical column
 * @method     array findByVesselId(int $vessel_id) Return WatchSighting objects filtered by the vessel_id column
 * @method     array findByComments(string $comments) Return WatchSighting objects filtered by the comments column
 * @method     array findByCreatedAt(string $created_at) Return WatchSighting objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return WatchSighting objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseWatchSightingQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseWatchSightingQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'WatchSighting', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new WatchSightingQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    WatchSightingQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof WatchSightingQuery) {
			return $criteria;
		}
		$query = new WatchSightingQuery();
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
	 * @return    WatchSighting|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = WatchSightingPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(WatchSightingPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(WatchSightingPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(WatchSightingPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the watch_info_id column
	 * 
	 * @param     int|array $watchInfoId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByWatchInfoId($watchInfoId = null, $comparison = null)
	{
		if (is_array($watchInfoId)) {
			$useMinMax = false;
			if (isset($watchInfoId['min'])) {
				$this->addUsingAlias(WatchSightingPeer::WATCH_INFO_ID, $watchInfoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($watchInfoId['max'])) {
				$this->addUsingAlias(WatchSightingPeer::WATCH_INFO_ID, $watchInfoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::WATCH_INFO_ID, $watchInfoId, $comparison);
	}

	/**
	 * Filter the query on the watch_code_id column
	 * 
	 * @param     int|array $watchCodeId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByWatchCodeId($watchCodeId = null, $comparison = null)
	{
		if (is_array($watchCodeId)) {
			$useMinMax = false;
			if (isset($watchCodeId['min'])) {
				$this->addUsingAlias(WatchSightingPeer::WATCH_CODE_ID, $watchCodeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($watchCodeId['max'])) {
				$this->addUsingAlias(WatchSightingPeer::WATCH_CODE_ID, $watchCodeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::WATCH_CODE_ID, $watchCodeId, $comparison);
	}

	/**
	 * Filter the query on the time column
	 * 
	 * @param     string|array $time The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByTime($time = null, $comparison = null)
	{
		if (is_array($time)) {
			$useMinMax = false;
			if (isset($time['min'])) {
				$this->addUsingAlias(WatchSightingPeer::TIME, $time['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($time['max'])) {
				$this->addUsingAlias(WatchSightingPeer::TIME, $time['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::TIME, $time, $comparison);
	}

	/**
	 * Filter the query on the watch_visibility_id column
	 * 
	 * @param     int|array $watchVisibilityId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByWatchVisibilityId($watchVisibilityId = null, $comparison = null)
	{
		if (is_array($watchVisibilityId)) {
			$useMinMax = false;
			if (isset($watchVisibilityId['min'])) {
				$this->addUsingAlias(WatchSightingPeer::WATCH_VISIBILITY_ID, $watchVisibilityId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($watchVisibilityId['max'])) {
				$this->addUsingAlias(WatchSightingPeer::WATCH_VISIBILITY_ID, $watchVisibilityId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::WATCH_VISIBILITY_ID, $watchVisibilityId, $comparison);
	}

	/**
	 * Filter the query on the specie_id column
	 * 
	 * @param     int|array $specieId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterBySpecieId($specieId = null, $comparison = null)
	{
		if (is_array($specieId)) {
			$useMinMax = false;
			if (isset($specieId['min'])) {
				$this->addUsingAlias(WatchSightingPeer::SPECIE_ID, $specieId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($specieId['max'])) {
				$this->addUsingAlias(WatchSightingPeer::SPECIE_ID, $specieId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::SPECIE_ID, $specieId, $comparison);
	}

	/**
	 * Filter the query on the group column
	 * 
	 * @param     string $group The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByGroup($group = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($group)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $group)) {
				$group = str_replace('*', '%', $group);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::GROUP, $group, $comparison);
	}

	/**
	 * Filter the query on the total column
	 * 
	 * @param     int|array $total The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByTotal($total = null, $comparison = null)
	{
		if (is_array($total)) {
			$useMinMax = false;
			if (isset($total['min'])) {
				$this->addUsingAlias(WatchSightingPeer::TOTAL, $total['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($total['max'])) {
				$this->addUsingAlias(WatchSightingPeer::TOTAL, $total['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::TOTAL, $total, $comparison);
	}

	/**
	 * Filter the query on the behaviour_id column
	 * 
	 * @param     int|array $behaviourId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByBehaviourId($behaviourId = null, $comparison = null)
	{
		if (is_array($behaviourId)) {
			$useMinMax = false;
			if (isset($behaviourId['min'])) {
				$this->addUsingAlias(WatchSightingPeer::BEHAVIOUR_ID, $behaviourId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($behaviourId['max'])) {
				$this->addUsingAlias(WatchSightingPeer::BEHAVIOUR_ID, $behaviourId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::BEHAVIOUR_ID, $behaviourId, $comparison);
	}

	/**
	 * Filter the query on the direction_id column
	 * 
	 * @param     int|array $directionId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByDirectionId($directionId = null, $comparison = null)
	{
		if (is_array($directionId)) {
			$useMinMax = false;
			if (isset($directionId['min'])) {
				$this->addUsingAlias(WatchSightingPeer::DIRECTION_ID, $directionId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($directionId['max'])) {
				$this->addUsingAlias(WatchSightingPeer::DIRECTION_ID, $directionId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::DIRECTION_ID, $directionId, $comparison);
	}

	/**
	 * Filter the query on the horizontal column
	 * 
	 * @param     double|array $horizontal The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByHorizontal($horizontal = null, $comparison = null)
	{
		if (is_array($horizontal)) {
			$useMinMax = false;
			if (isset($horizontal['min'])) {
				$this->addUsingAlias(WatchSightingPeer::HORIZONTAL, $horizontal['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($horizontal['max'])) {
				$this->addUsingAlias(WatchSightingPeer::HORIZONTAL, $horizontal['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::HORIZONTAL, $horizontal, $comparison);
	}

	/**
	 * Filter the query on the vertical column
	 * 
	 * @param     double|array $vertical The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByVertical($vertical = null, $comparison = null)
	{
		if (is_array($vertical)) {
			$useMinMax = false;
			if (isset($vertical['min'])) {
				$this->addUsingAlias(WatchSightingPeer::VERTICAL, $vertical['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($vertical['max'])) {
				$this->addUsingAlias(WatchSightingPeer::VERTICAL, $vertical['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::VERTICAL, $vertical, $comparison);
	}

	/**
	 * Filter the query on the vessel_id column
	 * 
	 * @param     int|array $vesselId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByVesselId($vesselId = null, $comparison = null)
	{
		if (is_array($vesselId)) {
			$useMinMax = false;
			if (isset($vesselId['min'])) {
				$this->addUsingAlias(WatchSightingPeer::VESSEL_ID, $vesselId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($vesselId['max'])) {
				$this->addUsingAlias(WatchSightingPeer::VESSEL_ID, $vesselId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::VESSEL_ID, $vesselId, $comparison);
	}

	/**
	 * Filter the query on the comments column
	 * 
	 * @param     string $comments The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WatchSightingPeer::COMMENTS, $comments, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(WatchSightingPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(WatchSightingPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(WatchSightingPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(WatchSightingPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WatchSightingPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related WatchInfo object
	 *
	 * @param     WatchInfo $watchInfo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByWatchInfo($watchInfo, $comparison = null)
	{
		return $this
			->addUsingAlias(WatchSightingPeer::WATCH_INFO_ID, $watchInfo->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WatchInfo relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function joinWatchInfo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WatchInfo');
		
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
			$this->addJoinObject($join, 'WatchInfo');
		}
		
		return $this;
	}

	/**
	 * Use the WatchInfo relation WatchInfo object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchInfoQuery A secondary query class using the current class as primary query
	 */
	public function useWatchInfoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinWatchInfo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WatchInfo', 'WatchInfoQuery');
	}

	/**
	 * Filter the query by a related WatchCode object
	 *
	 * @param     WatchCode $watchCode  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByWatchCode($watchCode, $comparison = null)
	{
		return $this
			->addUsingAlias(WatchSightingPeer::WATCH_CODE_ID, $watchCode->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WatchCode relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function joinWatchCode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WatchCode');
		
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
			$this->addJoinObject($join, 'WatchCode');
		}
		
		return $this;
	}

	/**
	 * Use the WatchCode relation WatchCode object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchCodeQuery A secondary query class using the current class as primary query
	 */
	public function useWatchCodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinWatchCode($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WatchCode', 'WatchCodeQuery');
	}

	/**
	 * Filter the query by a related WatchVisibility object
	 *
	 * @param     WatchVisibility $watchVisibility  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByWatchVisibility($watchVisibility, $comparison = null)
	{
		return $this
			->addUsingAlias(WatchSightingPeer::WATCH_VISIBILITY_ID, $watchVisibility->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WatchVisibility relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function joinWatchVisibility($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WatchVisibility');
		
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
			$this->addJoinObject($join, 'WatchVisibility');
		}
		
		return $this;
	}

	/**
	 * Use the WatchVisibility relation WatchVisibility object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchVisibilityQuery A secondary query class using the current class as primary query
	 */
	public function useWatchVisibilityQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinWatchVisibility($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WatchVisibility', 'WatchVisibilityQuery');
	}

	/**
	 * Filter the query by a related Specie object
	 *
	 * @param     Specie $specie  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterBySpecie($specie, $comparison = null)
	{
		return $this
			->addUsingAlias(WatchSightingPeer::SPECIE_ID, $specie->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Specie relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
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
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByBehaviour($behaviour, $comparison = null)
	{
		return $this
			->addUsingAlias(WatchSightingPeer::BEHAVIOUR_ID, $behaviour->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Behaviour relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
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
	 * Filter the query by a related Direction object
	 *
	 * @param     Direction $direction  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByDirection($direction, $comparison = null)
	{
		return $this
			->addUsingAlias(WatchSightingPeer::DIRECTION_ID, $direction->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Direction relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function joinDirection($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Direction');
		
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
			$this->addJoinObject($join, 'Direction');
		}
		
		return $this;
	}

	/**
	 * Use the Direction relation Direction object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DirectionQuery A secondary query class using the current class as primary query
	 */
	public function useDirectionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinDirection($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Direction', 'DirectionQuery');
	}

	/**
	 * Filter the query by a related Vessel object
	 *
	 * @param     Vessel $vessel  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function filterByVessel($vessel, $comparison = null)
	{
		return $this
			->addUsingAlias(WatchSightingPeer::VESSEL_ID, $vessel->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Vessel relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function joinVessel($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Vessel');
		
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
			$this->addJoinObject($join, 'Vessel');
		}
		
		return $this;
	}

	/**
	 * Use the Vessel relation Vessel object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    VesselQuery A secondary query class using the current class as primary query
	 */
	public function useVesselQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinVessel($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Vessel', 'VesselQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     WatchSighting $watchSighting Object to remove from the list of results
	 *
	 * @return    WatchSightingQuery The current query, for fluid interface
	 */
	public function prune($watchSighting = null)
	{
		if ($watchSighting) {
			$this->addUsingAlias(WatchSightingPeer::ID, $watchSighting->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseWatchSightingQuery
