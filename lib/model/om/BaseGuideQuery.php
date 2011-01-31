<?php


/**
 * Base class that represents a query for the 'guide' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Mon Jan 31 12:55:45 2011
 *
 * @method     GuideQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     GuideQuery orderByCompanyId($order = Criteria::ASC) Order by the company_id column
 * @method     GuideQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     GuideQuery orderByObservations($order = Criteria::ASC) Order by the observations column
 * @method     GuideQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     GuideQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     GuideQuery groupById() Group by the id column
 * @method     GuideQuery groupByCompanyId() Group by the company_id column
 * @method     GuideQuery groupByName() Group by the name column
 * @method     GuideQuery groupByObservations() Group by the observations column
 * @method     GuideQuery groupByCreatedAt() Group by the created_at column
 * @method     GuideQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     Guide findOne(PropelPDO $con = null) Return the first Guide matching the query
 * @method     Guide findOneById(int $id) Return the first Guide filtered by the id column
 * @method     Guide findOneByCompanyId(int $company_id) Return the first Guide filtered by the company_id column
 * @method     Guide findOneByName(string $name) Return the first Guide filtered by the name column
 * @method     Guide findOneByObservations(string $observations) Return the first Guide filtered by the observations column
 * @method     Guide findOneByCreatedAt(string $created_at) Return the first Guide filtered by the created_at column
 * @method     Guide findOneByUpdatedAt(string $updated_at) Return the first Guide filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Guide objects filtered by the id column
 * @method     array findByCompanyId(int $company_id) Return Guide objects filtered by the company_id column
 * @method     array findByName(string $name) Return Guide objects filtered by the name column
 * @method     array findByObservations(string $observations) Return Guide objects filtered by the observations column
 * @method     array findByCreatedAt(string $created_at) Return Guide objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Guide objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseGuideQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseGuideQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Guide', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
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
	 * @return    mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = GuidePeer::getInstanceFromPool((string) $key)))) {
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
	 * $objs = $c->findPks(array(12, 56, 832), $con);
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
	 * @return    GuideQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(GuidePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    GuideQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(GuidePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    GuideQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(GuidePeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(GuidePeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the company_id column
	 * 
	 * @param     int|array $company_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    GuideQuery The current query, for fluid interface
	 */
	public function filterByCompanyId($companyId = null)
	{
		if (is_array($companyId)) {
			if (array_values($companyId) === $companyId) {
				return $this->addUsingAlias(GuidePeer::COMPANY_ID, $companyId, Criteria::IN);
			} else {
				if (isset($companyId['min'])) {
					$this->addUsingAlias(GuidePeer::COMPANY_ID, $companyId['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($companyId['max'])) {
					$this->addUsingAlias(GuidePeer::COMPANY_ID, $companyId['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(GuidePeer::COMPANY_ID, $companyId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    GuideQuery The current query, for fluid interface
	 */
	public function filterByName($name = null)
	{
		if(preg_match('/[\%\*]/', $name)) {
			return $this->addUsingAlias(GuidePeer::NAME, str_replace('*', '%', $name), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(GuidePeer::NAME, $name, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the observations column
	 * 
	 * @param     string $observations The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    GuideQuery The current query, for fluid interface
	 */
	public function filterByObservations($observations = null)
	{
		if(preg_match('/[\%\*]/', $observations)) {
			return $this->addUsingAlias(GuidePeer::OBSERVATIONS, str_replace('*', '%', $observations), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(GuidePeer::OBSERVATIONS, $observations, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    GuideQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(GuidePeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(GuidePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(GuidePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(GuidePeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updated_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    GuideQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null)
	{
		if (is_array($updatedAt)) {
			if (array_values($updatedAt) === $updatedAt) {
				return $this->addUsingAlias(GuidePeer::UPDATED_AT, $updatedAt, Criteria::IN);
			} else {
				if (isset($updatedAt['min'])) {
					$this->addUsingAlias(GuidePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($updatedAt['max'])) {
					$this->addUsingAlias(GuidePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(GuidePeer::UPDATED_AT, $updatedAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related Company object
	 *
	 * @param     Company $company  the related object to use as filter
	 *
	 * @return    GuideQuery The current query, for fluid interface
	 */
	public function filterByCompany($company)
	{
		return $this
			->addUsingAlias(GuidePeer::COMPANY_ID, $company->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the Company relation Company object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery A secondary query class using the current class as primary query
	 */
	public function useCompanyQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('Company' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Company', 'CompanyQuery');
	}

	/**
	 * Filter the query by a related GeneralInfo object
	 *
	 * @param     GeneralInfo $generalInfo  the related object to use as filter
	 *
	 * @return    GuideQuery The current query, for fluid interface
	 */
	public function filterByGeneralInfo($generalInfo)
	{
		return $this
			->addUsingAlias(GuidePeer::ID, $generalInfo->getGuideId(), Criteria::EQUAL);
	}

	/**
	 * Use the GeneralInfo relation GeneralInfo object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneralInfoQuery A secondary query class using the current class as primary query
	 */
	public function useGeneralInfoQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('GeneralInfo' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'GeneralInfo', 'GeneralInfoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Guide $guide Object to remove from the list of results
	 *
	 * @return    GuideQuery The current query, for fluid interface
	 */
	public function prune($guide = null)
	{
		if ($guide) {
			$this->addUsingAlias(GuidePeer::ID, $guide->getId(), Criteria::NOT_EQUAL);
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

} // BaseGuideQuery
