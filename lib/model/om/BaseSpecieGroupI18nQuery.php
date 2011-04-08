<?php


/**
 * Base class that represents a query for the 'specie_group_i18n' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Fri Apr  8 12:07:18 2011
 *
 * @method     SpecieGroupI18nQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SpecieGroupI18nQuery orderByCulture($order = Criteria::ASC) Order by the culture column
 * @method     SpecieGroupI18nQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method     SpecieGroupI18nQuery groupById() Group by the id column
 * @method     SpecieGroupI18nQuery groupByCulture() Group by the culture column
 * @method     SpecieGroupI18nQuery groupByName() Group by the name column
 *
 * @method     SpecieGroupI18n findOne(PropelPDO $con = null) Return the first SpecieGroupI18n matching the query
 * @method     SpecieGroupI18n findOneById(int $id) Return the first SpecieGroupI18n filtered by the id column
 * @method     SpecieGroupI18n findOneByCulture(string $culture) Return the first SpecieGroupI18n filtered by the culture column
 * @method     SpecieGroupI18n findOneByName(string $name) Return the first SpecieGroupI18n filtered by the name column
 *
 * @method     array findById(int $id) Return SpecieGroupI18n objects filtered by the id column
 * @method     array findByCulture(string $culture) Return SpecieGroupI18n objects filtered by the culture column
 * @method     array findByName(string $name) Return SpecieGroupI18n objects filtered by the name column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSpecieGroupI18nQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSpecieGroupI18nQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'SpecieGroupI18n', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Find object by primary key
	 * <code>
	 * $obj = $c->findPk(array(34, 634), $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = SpecieGroupI18nPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1])))))) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			return $this
				->filterByPrimaryKey($key)
				->findOne($con);
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
	 * @return    the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    SpecieGroupI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(SpecieGroupI18nPeer::ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(SpecieGroupI18nPeer::CULTURE, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SpecieGroupI18nQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(SpecieGroupI18nPeer::ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(SpecieGroupI18nPeer::CULTURE, $key[1], Criteria::EQUAL);
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
	 *
	 * @return    SpecieGroupI18nQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(SpecieGroupI18nPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(SpecieGroupI18nPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the culture column
	 * 
	 * @param     string $culture The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    SpecieGroupI18nQuery The current query, for fluid interface
	 */
	public function filterByCulture($culture = null)
	{
		if(preg_match('/[\%\*]/', $culture)) {
			return $this->addUsingAlias(SpecieGroupI18nPeer::CULTURE, str_replace('*', '%', $culture), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(SpecieGroupI18nPeer::CULTURE, $culture, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    SpecieGroupI18nQuery The current query, for fluid interface
	 */
	public function filterByName($name = null)
	{
		if(preg_match('/[\%\*]/', $name)) {
			return $this->addUsingAlias(SpecieGroupI18nPeer::NAME, str_replace('*', '%', $name), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(SpecieGroupI18nPeer::NAME, $name, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related SpecieGroup object
	 *
	 * @param     SpecieGroup $specieGroup  the related object to use as filter
	 *
	 * @return    SpecieGroupI18nQuery The current query, for fluid interface
	 */
	public function filterBySpecieGroup($specieGroup)
	{
		return $this
			->addUsingAlias(SpecieGroupI18nPeer::ID, $specieGroup->getId(), Criteria::EQUAL);
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
	public function useSpecieGroupQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('SpecieGroup' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SpecieGroup', 'SpecieGroupQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SpecieGroupI18n $specieGroupI18n Object to remove from the list of results
	 *
	 * @return    SpecieGroupI18nQuery The current query, for fluid interface
	 */
	public function prune($specieGroupI18n = null)
	{
		if ($specieGroupI18n) {
			$this->addCond('pruneCond0', $this->getAliasedColName(SpecieGroupI18nPeer::ID), $specieGroupI18n->getId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(SpecieGroupI18nPeer::CULTURE), $specieGroupI18n->getCulture(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

	/**
	 * Code to execute before every SELECT statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreSelect(PropelPDO $con)
	{
		return $this->preSelect($con);
	}

	/**
	 * Code to execute before every DELETE statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreDelete(PropelPDO $con)
	{
		return $this->preDelete($con);
	}

	/**
	 * Code to execute before every UPDATE statement
	 * 
	 * @param     array $values The associatiove array of columns and values for the update
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreUpdate(&$values, PropelPDO $con)
	{
		return $this->preUpdate($values, $con);
	}

} // BaseSpecieGroupI18nQuery
