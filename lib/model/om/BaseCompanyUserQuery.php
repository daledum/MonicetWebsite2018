<?php


/**
 * Base class that represents a query for the 'company_user' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Mon Jan 31 12:55:45 2011
 *
 * @method     CompanyUserQuery orderByCompanyId($order = Criteria::ASC) Order by the company_id column
 * @method     CompanyUserQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     CompanyUserQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     CompanyUserQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     CompanyUserQuery groupByCompanyId() Group by the company_id column
 * @method     CompanyUserQuery groupByUserId() Group by the user_id column
 * @method     CompanyUserQuery groupByCreatedAt() Group by the created_at column
 * @method     CompanyUserQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     CompanyUser findOne(PropelPDO $con = null) Return the first CompanyUser matching the query
 * @method     CompanyUser findOneByCompanyId(int $company_id) Return the first CompanyUser filtered by the company_id column
 * @method     CompanyUser findOneByUserId(int $user_id) Return the first CompanyUser filtered by the user_id column
 * @method     CompanyUser findOneByCreatedAt(string $created_at) Return the first CompanyUser filtered by the created_at column
 * @method     CompanyUser findOneByUpdatedAt(string $updated_at) Return the first CompanyUser filtered by the updated_at column
 *
 * @method     array findByCompanyId(int $company_id) Return CompanyUser objects filtered by the company_id column
 * @method     array findByUserId(int $user_id) Return CompanyUser objects filtered by the user_id column
 * @method     array findByCreatedAt(string $created_at) Return CompanyUser objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return CompanyUser objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCompanyUserQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCompanyUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'CompanyUser', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = CompanyUserPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1])))))) {
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
	 * @return    CompanyUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(CompanyUserPeer::COMPANY_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(CompanyUserPeer::USER_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CompanyUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(CompanyUserPeer::COMPANY_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(CompanyUserPeer::USER_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the company_id column
	 * 
	 * @param     int|array $company_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    CompanyUserQuery The current query, for fluid interface
	 */
	public function filterByCompanyId($companyId = null)
	{
		if (is_array($companyId)) {
			return $this->addUsingAlias(CompanyUserPeer::COMPANY_ID, $companyId, Criteria::IN);
		} else {
			return $this->addUsingAlias(CompanyUserPeer::COMPANY_ID, $companyId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the user_id column
	 * 
	 * @param     int|array $user_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    CompanyUserQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null)
	{
		if (is_array($userId)) {
			return $this->addUsingAlias(CompanyUserPeer::USER_ID, $userId, Criteria::IN);
		} else {
			return $this->addUsingAlias(CompanyUserPeer::USER_ID, $userId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    CompanyUserQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(CompanyUserPeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(CompanyUserPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(CompanyUserPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(CompanyUserPeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updated_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    CompanyUserQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null)
	{
		if (is_array($updatedAt)) {
			if (array_values($updatedAt) === $updatedAt) {
				return $this->addUsingAlias(CompanyUserPeer::UPDATED_AT, $updatedAt, Criteria::IN);
			} else {
				if (isset($updatedAt['min'])) {
					$this->addUsingAlias(CompanyUserPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($updatedAt['max'])) {
					$this->addUsingAlias(CompanyUserPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(CompanyUserPeer::UPDATED_AT, $updatedAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related Company object
	 *
	 * @param     Company $company  the related object to use as filter
	 *
	 * @return    CompanyUserQuery The current query, for fluid interface
	 */
	public function filterByCompany($company)
	{
		return $this
			->addUsingAlias(CompanyUserPeer::COMPANY_ID, $company->getId(), Criteria::EQUAL);
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
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 *
	 * @return    CompanyUserQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUser($sfGuardUser)
	{
		return $this
			->addUsingAlias(CompanyUserPeer::USER_ID, $sfGuardUser->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the sfGuardUser relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('sfGuardUser' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUser', 'sfGuardUserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     CompanyUser $companyUser Object to remove from the list of results
	 *
	 * @return    CompanyUserQuery The current query, for fluid interface
	 */
	public function prune($companyUser = null)
	{
		if ($companyUser) {
			$this->addCond('pruneCond0', $this->getAliasedColName(CompanyUserPeer::COMPANY_ID), $companyUser->getCompanyId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(CompanyUserPeer::USER_ID), $companyUser->getUserId(), Criteria::NOT_EQUAL);
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

} // BaseCompanyUserQuery
