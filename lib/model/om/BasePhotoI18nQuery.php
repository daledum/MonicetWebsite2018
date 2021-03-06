<?php


/**
 * Base class that represents a query for the 'photo_i18n' table.
 *
 * 
 *
 * @method     PhotoI18nQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PhotoI18nQuery orderByCulture($order = Criteria::ASC) Order by the culture column
 * @method     PhotoI18nQuery orderByCaption($order = Criteria::ASC) Order by the caption column
 *
 * @method     PhotoI18nQuery groupById() Group by the id column
 * @method     PhotoI18nQuery groupByCulture() Group by the culture column
 * @method     PhotoI18nQuery groupByCaption() Group by the caption column
 *
 * @method     PhotoI18nQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PhotoI18nQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PhotoI18nQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PhotoI18nQuery leftJoinPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Photo relation
 * @method     PhotoI18nQuery rightJoinPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Photo relation
 * @method     PhotoI18nQuery innerJoinPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the Photo relation
 *
 * @method     PhotoI18n findOne(PropelPDO $con = null) Return the first PhotoI18n matching the query
 * @method     PhotoI18n findOneOrCreate(PropelPDO $con = null) Return the first PhotoI18n matching the query, or a new PhotoI18n object populated from the query conditions when no match is found
 *
 * @method     PhotoI18n findOneById(int $id) Return the first PhotoI18n filtered by the id column
 * @method     PhotoI18n findOneByCulture(string $culture) Return the first PhotoI18n filtered by the culture column
 * @method     PhotoI18n findOneByCaption(string $caption) Return the first PhotoI18n filtered by the caption column
 *
 * @method     array findById(int $id) Return PhotoI18n objects filtered by the id column
 * @method     array findByCulture(string $culture) Return PhotoI18n objects filtered by the culture column
 * @method     array findByCaption(string $caption) Return PhotoI18n objects filtered by the caption column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePhotoI18nQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePhotoI18nQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'PhotoI18n', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PhotoI18nQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PhotoI18nQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PhotoI18nQuery) {
			return $criteria;
		}
		$query = new PhotoI18nQuery();
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
	 * @return    PhotoI18n|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PhotoI18nPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PhotoI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(PhotoI18nPeer::ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(PhotoI18nPeer::CULTURE, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PhotoI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(PhotoI18nPeer::ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(PhotoI18nPeer::CULTURE, $key[1], Criteria::EQUAL);
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
	 * @return    PhotoI18nQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PhotoI18nPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the culture column
	 * 
	 * @param     string $culture The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoI18nQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PhotoI18nPeer::CULTURE, $culture, $comparison);
	}

	/**
	 * Filter the query on the caption column
	 * 
	 * @param     string $caption The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoI18nQuery The current query, for fluid interface
	 */
	public function filterByCaption($caption = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($caption)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $caption)) {
				$caption = str_replace('*', '%', $caption);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PhotoI18nPeer::CAPTION, $caption, $comparison);
	}

	/**
	 * Filter the query by a related Photo object
	 *
	 * @param     Photo $photo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoI18nQuery The current query, for fluid interface
	 */
	public function filterByPhoto($photo, $comparison = null)
	{
		return $this
			->addUsingAlias(PhotoI18nPeer::ID, $photo->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Photo relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PhotoI18nQuery The current query, for fluid interface
	 */
	public function joinPhoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Photo');
		
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
			$this->addJoinObject($join, 'Photo');
		}
		
		return $this;
	}

	/**
	 * Use the Photo relation Photo object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PhotoQuery A secondary query class using the current class as primary query
	 */
	public function usePhotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPhoto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Photo', 'PhotoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PhotoI18n $photoI18n Object to remove from the list of results
	 *
	 * @return    PhotoI18nQuery The current query, for fluid interface
	 */
	public function prune($photoI18n = null)
	{
		if ($photoI18n) {
			$this->addCond('pruneCond0', $this->getAliasedColName(PhotoI18nPeer::ID), $photoI18n->getId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(PhotoI18nPeer::CULTURE), $photoI18n->getCulture(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BasePhotoI18nQuery
