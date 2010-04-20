<?php


/**
 * Base class that represents a query for the 'sf_guard_permission' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Tue Apr 20 15:16:49 2010
 *
 * @method     sfGuardPermissionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     sfGuardPermissionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     sfGuardPermissionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     sfGuardPermissionQuery groupById() Group by the id column
 * @method     sfGuardPermissionQuery groupByName() Group by the name column
 * @method     sfGuardPermissionQuery groupByDescription() Group by the description column
 *
 * @method     sfGuardPermission findOne(PropelPDO $con = null) Return the first sfGuardPermission matching the query
 * @method     sfGuardPermission findOneById(int $id) Return the first sfGuardPermission filtered by the id column
 * @method     sfGuardPermission findOneByName(string $name) Return the first sfGuardPermission filtered by the name column
 * @method     sfGuardPermission findOneByDescription(string $description) Return the first sfGuardPermission filtered by the description column
 *
 * @method     array findById(int $id) Return sfGuardPermission objects filtered by the id column
 * @method     array findByName(string $name) Return sfGuardPermission objects filtered by the name column
 * @method     array findByDescription(string $description) Return sfGuardPermission objects filtered by the description column
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardPermissionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasesfGuardPermissionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'sfGuardPermission', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = sfGuardPermissionPeer::getInstanceFromPool((string) $key)))) {
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
	 * @return    sfGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(sfGuardPermissionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    sfGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(sfGuardPermissionPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    sfGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(sfGuardPermissionPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(sfGuardPermissionPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    sfGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterByName($name = null)
	{
		if(preg_match('/[\%\*]/', $name)) {
			return $this->addUsingAlias(sfGuardPermissionPeer::NAME, str_replace('*', '%', $name), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(sfGuardPermissionPeer::NAME, $name, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    sfGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null)
	{
		if(preg_match('/[\%\*]/', $description)) {
			return $this->addUsingAlias(sfGuardPermissionPeer::DESCRIPTION, str_replace('*', '%', $description), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(sfGuardPermissionPeer::DESCRIPTION, $description, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related sfGuardGroupPermission object
	 *
	 * @param     sfGuardGroupPermission $sfGuardGroupPermission  the related object to use as filter
	 *
	 * @return    sfGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterBysfGuardGroupPermission($sfGuardGroupPermission)
	{
		return $this
			->addUsingAlias(sfGuardPermissionPeer::ID, $sfGuardGroupPermission->getPermissionId(), Criteria::EQUAL);
	}

	/**
	 * Use the sfGuardGroupPermission relation sfGuardGroupPermission object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardGroupPermissionQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardGroupPermissionQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('sfGuardGroupPermission' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardGroupPermission', 'sfGuardGroupPermissionQuery');
	}

	/**
	 * Filter the query by a related sfGuardUserPermission object
	 *
	 * @param     sfGuardUserPermission $sfGuardUserPermission  the related object to use as filter
	 *
	 * @return    sfGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUserPermission($sfGuardUserPermission)
	{
		return $this
			->addUsingAlias(sfGuardPermissionPeer::ID, $sfGuardUserPermission->getPermissionId(), Criteria::EQUAL);
	}

	/**
	 * Use the sfGuardUserPermission relation sfGuardUserPermission object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserPermissionQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserPermissionQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('sfGuardUserPermission' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUserPermission', 'sfGuardUserPermissionQuery');
	}

	/**
	 * Filter the query by a related mfMenu object
	 *
	 * @param     mfMenu $mfMenu  the related object to use as filter
	 *
	 * @return    sfGuardPermissionQuery The current query, for fluid interface
	 */
	public function filterBymfMenu($mfMenu)
	{
		return $this
			->addUsingAlias(sfGuardPermissionPeer::ID, $mfMenu->getPermissaoId(), Criteria::EQUAL);
	}

	/**
	 * Use the mfMenu relation mfMenu object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    mfMenuQuery A secondary query class using the current class as primary query
	 */
	public function usemfMenuQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('mfMenu' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'mfMenu', 'mfMenuQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     sfGuardPermission $sfGuardPermission Object to remove from the list of results
	 *
	 * @return    sfGuardPermissionQuery The current query, for fluid interface
	 */
	public function prune($sfGuardPermission = null)
	{
		if ($sfGuardPermission) {
			$this->addUsingAlias(sfGuardPermissionPeer::ID, $sfGuardPermission->getId(), Criteria::NOT_EQUAL);
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

} // BasesfGuardPermissionQuery
