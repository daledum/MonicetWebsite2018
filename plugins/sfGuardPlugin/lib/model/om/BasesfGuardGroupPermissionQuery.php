<?php


/**
 * Base class that represents a query for the 'sf_guard_group_permission' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Fri Mar 12 16:26:56 2010
 *
 * @method     sfGuardGroupPermissionQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method     sfGuardGroupPermissionQuery orderByPermissionId($order = Criteria::ASC) Order by the permission_id column
 *
 * @method     sfGuardGroupPermissionQuery groupByGroupId() Group by the group_id column
 * @method     sfGuardGroupPermissionQuery groupByPermissionId() Group by the permission_id column
 *
 * @method     sfGuardGroupPermission findOne(PropelPDO $con = null) Return the first sfGuardGroupPermission matching the query
 * @method     sfGuardGroupPermission findOneByGroupId(int $group_id) Return the first sfGuardGroupPermission filtered by the group_id column
 * @method     sfGuardGroupPermission findOneByPermissionId(int $permission_id) Return the first sfGuardGroupPermission filtered by the permission_id column
 *
 * @method     array findByGroupId(int $group_id) Return sfGuardGroupPermission objects filtered by the group_id column
 * @method     array findByPermissionId(int $permission_id) Return sfGuardGroupPermission objects filtered by the permission_id column
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardGroupPermissionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasesfGuardGroupPermissionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'sfGuardGroupPermission', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = sfGuardGroupPermissionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1])))))) {
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
	 * @return    sfGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(sfGuardGroupPermissionPeer::GROUP_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(sfGuardGroupPermissionPeer::PERMISSION_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    sfGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(sfGuardGroupPermissionPeer::GROUP_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(sfGuardGroupPermissionPeer::PERMISSION_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the group_id column
	 * 
	 * @param     int|array $group_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    sfGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterByGroupId($groupId = null)
	{
		if (is_array($groupId)) {
			return $this->addUsingAlias(sfGuardGroupPermissionPeer::GROUP_ID, $groupId, Criteria::IN);
		} else {
			return $this->addUsingAlias(sfGuardGroupPermissionPeer::GROUP_ID, $groupId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the permission_id column
	 * 
	 * @param     int|array $permission_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    sfGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterByPermissionId($permissionId = null)
	{
		if (is_array($permissionId)) {
			return $this->addUsingAlias(sfGuardGroupPermissionPeer::PERMISSION_ID, $permissionId, Criteria::IN);
		} else {
			return $this->addUsingAlias(sfGuardGroupPermissionPeer::PERMISSION_ID, $permissionId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related sfGuardGroup object
	 *
	 * @param     sfGuardGroup $sfGuardGroup  the related object to use as filter
	 *
	 * @return    sfGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterBysfGuardGroup($sfGuardGroup)
	{
		return $this
			->addUsingAlias(sfGuardGroupPermissionPeer::GROUP_ID, $sfGuardGroup->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the sfGuardGroup relation sfGuardGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardGroupQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardGroupQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('sfGuardGroup' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardGroup', 'sfGuardGroupQuery');
	}

	/**
	 * Filter the query by a related sfGuardPermission object
	 *
	 * @param     sfGuardPermission $sfGuardPermission  the related object to use as filter
	 *
	 * @return    sfGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function filterBysfGuardPermission($sfGuardPermission)
	{
		return $this
			->addUsingAlias(sfGuardGroupPermissionPeer::PERMISSION_ID, $sfGuardPermission->getId(), Criteria::EQUAL);
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
	 * @param     sfGuardGroupPermission $sfGuardGroupPermission Object to remove from the list of results
	 *
	 * @return    sfGuardGroupPermissionQuery The current query, for fluid interface
	 */
	public function prune($sfGuardGroupPermission = null)
	{
		if ($sfGuardGroupPermission) {
			$this->addCond('pruneCond0', $this->getAliasedColName(sfGuardGroupPermissionPeer::GROUP_ID), $sfGuardGroupPermission->getGroupId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(sfGuardGroupPermissionPeer::PERMISSION_ID), $sfGuardGroupPermission->getPermissionId(), Criteria::NOT_EQUAL);
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

} // BasesfGuardGroupPermissionQuery
