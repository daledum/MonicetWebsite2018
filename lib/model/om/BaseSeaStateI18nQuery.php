<?php


/**
 * Base class that represents a query for the 'sea_state_i18n' table.
 *
 * 
 *
 * @method     SeaStateI18nQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SeaStateI18nQuery orderByCulture($order = Criteria::ASC) Order by the culture column
 * @method     SeaStateI18nQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     SeaStateI18nQuery groupById() Group by the id column
 * @method     SeaStateI18nQuery groupByCulture() Group by the culture column
 * @method     SeaStateI18nQuery groupByDescription() Group by the description column
 *
 * @method     SeaStateI18nQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SeaStateI18nQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SeaStateI18nQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SeaStateI18nQuery leftJoinSeaState($relationAlias = null) Adds a LEFT JOIN clause to the query using the SeaState relation
 * @method     SeaStateI18nQuery rightJoinSeaState($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SeaState relation
 * @method     SeaStateI18nQuery innerJoinSeaState($relationAlias = null) Adds a INNER JOIN clause to the query using the SeaState relation
 *
 * @method     SeaStateI18n findOne(PropelPDO $con = null) Return the first SeaStateI18n matching the query
 * @method     SeaStateI18n findOneOrCreate(PropelPDO $con = null) Return the first SeaStateI18n matching the query, or a new SeaStateI18n object populated from the query conditions when no match is found
 *
 * @method     SeaStateI18n findOneById(int $id) Return the first SeaStateI18n filtered by the id column
 * @method     SeaStateI18n findOneByCulture(string $culture) Return the first SeaStateI18n filtered by the culture column
 * @method     SeaStateI18n findOneByDescription(string $description) Return the first SeaStateI18n filtered by the description column
 *
 * @method     array findById(int $id) Return SeaStateI18n objects filtered by the id column
 * @method     array findByCulture(string $culture) Return SeaStateI18n objects filtered by the culture column
 * @method     array findByDescription(string $description) Return SeaStateI18n objects filtered by the description column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSeaStateI18nQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSeaStateI18nQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'SeaStateI18n', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SeaStateI18nQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SeaStateI18nQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SeaStateI18nQuery) {
			return $criteria;
		}
		$query = new SeaStateI18nQuery();
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
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$id, $culture] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    SeaStateI18n|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SeaStateI18nPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    SeaStateI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(SeaStateI18nPeer::ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(SeaStateI18nPeer::CULTURE, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SeaStateI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(SeaStateI18nPeer::ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(SeaStateI18nPeer::CULTURE, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SeaStateI18nQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SeaStateI18nPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the culture column
	 * 
	 * @param     string $culture The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SeaStateI18nQuery The current query, for fluid interface
	 */
	public function filterByCulture($culture = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($culture)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $culture)) {
				$culture = str_replace('*', '%', $culture);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SeaStateI18nPeer::CULTURE, $culture, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SeaStateI18nQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SeaStateI18nPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query by a related SeaState object
	 *
	 * @param     SeaState $seaState  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SeaStateI18nQuery The current query, for fluid interface
	 */
	public function filterBySeaState($seaState, $comparison = null)
	{
		return $this
			->addUsingAlias(SeaStateI18nPeer::ID, $seaState->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SeaState relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SeaStateI18nQuery The current query, for fluid interface
	 */
	public function joinSeaState($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SeaState');
		
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
			$this->addJoinObject($join, 'SeaState');
		}
		
		return $this;
	}

	/**
	 * Use the SeaState relation SeaState object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SeaStateQuery A secondary query class using the current class as primary query
	 */
	public function useSeaStateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSeaState($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SeaState', 'SeaStateQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SeaStateI18n $seaStateI18n Object to remove from the list of results
	 *
	 * @return    SeaStateI18nQuery The current query, for fluid interface
	 */
	public function prune($seaStateI18n = null)
	{
		if ($seaStateI18n) {
			$this->addCond('pruneCond0', $this->getAliasedColName(SeaStateI18nPeer::ID), $seaStateI18n->getId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(SeaStateI18nPeer::CULTURE), $seaStateI18n->getCulture(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseSeaStateI18nQuery
