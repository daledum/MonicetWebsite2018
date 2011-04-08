<?php


/**
 * Base class that represents a query for the 'sf_guard_remember_key' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Fri Apr  8 12:07:23 2011
 *
 * @method     sfGuardRememberKeyQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     sfGuardRememberKeyQuery orderByRememberKey($order = Criteria::ASC) Order by the remember_key column
 * @method     sfGuardRememberKeyQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method     sfGuardRememberKeyQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     sfGuardRememberKeyQuery groupByUserId() Group by the user_id column
 * @method     sfGuardRememberKeyQuery groupByRememberKey() Group by the remember_key column
 * @method     sfGuardRememberKeyQuery groupByIpAddress() Group by the ip_address column
 * @method     sfGuardRememberKeyQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     sfGuardRememberKey findOne(PropelPDO $con = null) Return the first sfGuardRememberKey matching the query
 * @method     sfGuardRememberKey findOneByUserId(int $user_id) Return the first sfGuardRememberKey filtered by the user_id column
 * @method     sfGuardRememberKey findOneByRememberKey(string $remember_key) Return the first sfGuardRememberKey filtered by the remember_key column
 * @method     sfGuardRememberKey findOneByIpAddress(string $ip_address) Return the first sfGuardRememberKey filtered by the ip_address column
 * @method     sfGuardRememberKey findOneByCreatedAt(string $created_at) Return the first sfGuardRememberKey filtered by the created_at column
 *
 * @method     array findByUserId(int $user_id) Return sfGuardRememberKey objects filtered by the user_id column
 * @method     array findByRememberKey(string $remember_key) Return sfGuardRememberKey objects filtered by the remember_key column
 * @method     array findByIpAddress(string $ip_address) Return sfGuardRememberKey objects filtered by the ip_address column
 * @method     array findByCreatedAt(string $created_at) Return sfGuardRememberKey objects filtered by the created_at column
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardRememberKeyQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasesfGuardRememberKeyQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'sfGuardRememberKey', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = sfGuardRememberKeyPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1])))))) {
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
	 * @return    sfGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(sfGuardRememberKeyPeer::USER_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(sfGuardRememberKeyPeer::IP_ADDRESS, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    sfGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(sfGuardRememberKeyPeer::USER_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(sfGuardRememberKeyPeer::IP_ADDRESS, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the user_id column
	 * 
	 * @param     int|array $user_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    sfGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null)
	{
		if (is_array($userId)) {
			return $this->addUsingAlias(sfGuardRememberKeyPeer::USER_ID, $userId, Criteria::IN);
		} else {
			return $this->addUsingAlias(sfGuardRememberKeyPeer::USER_ID, $userId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the remember_key column
	 * 
	 * @param     string $remember_key The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    sfGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByRememberKey($rememberKey = null)
	{
		if(preg_match('/[\%\*]/', $rememberKey)) {
			return $this->addUsingAlias(sfGuardRememberKeyPeer::REMEMBER_KEY, str_replace('*', '%', $rememberKey), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(sfGuardRememberKeyPeer::REMEMBER_KEY, $rememberKey, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the ip_address column
	 * 
	 * @param     string $ip_address The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    sfGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByIpAddress($ipAddress = null)
	{
		if(preg_match('/[\%\*]/', $ipAddress)) {
			return $this->addUsingAlias(sfGuardRememberKeyPeer::IP_ADDRESS, str_replace('*', '%', $ipAddress), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(sfGuardRememberKeyPeer::IP_ADDRESS, $ipAddress, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    sfGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(sfGuardRememberKeyPeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(sfGuardRememberKeyPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(sfGuardRememberKeyPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(sfGuardRememberKeyPeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 *
	 * @return    sfGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUser($sfGuardUser)
	{
		return $this
			->addUsingAlias(sfGuardRememberKeyPeer::USER_ID, $sfGuardUser->getId(), Criteria::EQUAL);
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
	 * @param     sfGuardRememberKey $sfGuardRememberKey Object to remove from the list of results
	 *
	 * @return    sfGuardRememberKeyQuery The current query, for fluid interface
	 */
	public function prune($sfGuardRememberKey = null)
	{
		if ($sfGuardRememberKey) {
			$this->addCond('pruneCond0', $this->getAliasedColName(sfGuardRememberKeyPeer::USER_ID), $sfGuardRememberKey->getUserId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(sfGuardRememberKeyPeer::IP_ADDRESS), $sfGuardRememberKey->getIpAddress(), Criteria::NOT_EQUAL);
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

} // BasesfGuardRememberKeyQuery
