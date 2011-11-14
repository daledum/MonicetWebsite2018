<?php


/**
 * Base class that represents a query for the 'sf_guard_user_permission' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Mon Nov 14 18:07:55 2011
 *
 * @method     sfGuardUserPermissionQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     sfGuardUserPermissionQuery orderByPermissionId($order = Criteria::ASC) Order by the permission_id column
 *
 * @method     sfGuardUserPermissionQuery groupByUserId() Group by the user_id column
 * @method     sfGuardUserPermissionQuery groupByPermissionId() Group by the permission_id column
 *
 * @method     sfGuardUserPermission findOne(PropelPDO $con = null) Return the first sfGuardUserPermission matching the query
 * @method     sfGuardUserPermission findOneByUserId(int $user_id) Return the first sfGuardUserPermission filtered by the user_id column
 * @method     sfGuardUserPermission findOneByPermissionId(int $permission_id) Return the first sfGuardUserPermission filtered by the permission_id column
 *
 * @method     array findByUserId(int $user_id) Return sfGuardUserPermission objects filtered by the user_id column
 * @method     array findByPermissionId(int $permission_id) Return sfGuardUserPermission objects filtered by the permission_id column
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardUserPermissionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasesfGuardUserPermissionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'sfGuardUserPermission', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = sfGuardUserPermissionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1])))))) {
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
	 * @return    sfGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(sfGuardUserPermissionPeer::USER_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(sfGuardUserPermissionPeer::PERMISSION_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    sfGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(sfGuardUserPermissionPeer::USER_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(sfGuardUserPermissionPeer::PERMISSION_ID, $key[1], Criteria::EQUAL);
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
	 * @return    sfGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null)
	{
		if (is_array($userId)) {
			return $this->addUsingAlias(sfGuardUserPermissionPeer::USER_ID, $userId, Criteria::IN);
		} else {
			return $this->addUsingAlias(sfGuardUserPermissionPeer::USER_ID, $userId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the permission_id column
	 * 
	 * @param     int|array $permission_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    sfGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterByPermissionId($permissionId = null)
	{
		if (is_array($permissionId)) {
			return $this->addUsingAlias(sfGuardUserPermissionPeer::PERMISSION_ID, $permissionId, Criteria::IN);
		} else {
			return $this->addUsingAlias(sfGuardUserPermissionPeer::PERMISSION_ID, $permissionId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 *
	 * @return    sfGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUser($sfGuardUser)
	{
		return $this
			->addUsingAlias(sfGuardUserPermissionPeer::USER_ID, $sfGuardUser->getId(), Criteria::EQUAL);
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
	 * Filter the query by a related sfGuardPermission object
	 *
	 * @param     sfGuardPermission $sfGuardPermission  the related object to use as filter
	 *
	 * @return    sfGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function filterBysfGuardPermission($sfGuardPermission)
	{
		return $this
			->addUsingAlias(sfGuardUserPermissionPeer::PERMISSION_ID, $sfGuardPermission->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the sfGuardPermission relation sfGuardPermission object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardPermissionQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardPermissionQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('sfGuardPermission' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardPermission', 'sfGuardPermissionQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     sfGuardUserPermission $sfGuardUserPermission Object to remove from the list of results
	 *
	 * @return    sfGuardUserPermissionQuery The current query, for fluid interface
	 */
	public function prune($sfGuardUserPermission = null)
	{
		if ($sfGuardUserPermission) {
			$this->addCond('pruneCond0', $this->getAliasedColName(sfGuardUserPermissionPeer::USER_ID), $sfGuardUserPermission->getUserId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(sfGuardUserPermissionPeer::PERMISSION_ID), $sfGuardUserPermission->getPermissionId(), Criteria::NOT_EQUAL);
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

} // BasesfGuardUserPermissionQuery
