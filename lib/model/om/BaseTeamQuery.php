<?php


/**
 * Base class that represents a query for the 'team' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Mon Nov 22 16:41:06 2010
 *
 * @method     TeamQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TeamQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method     TeamQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     TeamQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     TeamQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     TeamQuery orderByPhoto($order = Criteria::ASC) Order by the photo column
 * @method     TeamQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     TeamQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     TeamQuery groupById() Group by the id column
 * @method     TeamQuery groupBySlug() Group by the slug column
 * @method     TeamQuery groupByType() Group by the type column
 * @method     TeamQuery groupByName() Group by the name column
 * @method     TeamQuery groupByLink() Group by the link column
 * @method     TeamQuery groupByPhoto() Group by the photo column
 * @method     TeamQuery groupByCreatedAt() Group by the created_at column
 * @method     TeamQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     Team findOne(PropelPDO $con = null) Return the first Team matching the query
 * @method     Team findOneById(int $id) Return the first Team filtered by the id column
 * @method     Team findOneBySlug(string $slug) Return the first Team filtered by the slug column
 * @method     Team findOneByType(string $type) Return the first Team filtered by the type column
 * @method     Team findOneByName(string $name) Return the first Team filtered by the name column
 * @method     Team findOneByLink(string $link) Return the first Team filtered by the link column
 * @method     Team findOneByPhoto(string $photo) Return the first Team filtered by the photo column
 * @method     Team findOneByCreatedAt(string $created_at) Return the first Team filtered by the created_at column
 * @method     Team findOneByUpdatedAt(string $updated_at) Return the first Team filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Team objects filtered by the id column
 * @method     array findBySlug(string $slug) Return Team objects filtered by the slug column
 * @method     array findByType(string $type) Return Team objects filtered by the type column
 * @method     array findByName(string $name) Return Team objects filtered by the name column
 * @method     array findByLink(string $link) Return Team objects filtered by the link column
 * @method     array findByPhoto(string $photo) Return Team objects filtered by the photo column
 * @method     array findByCreatedAt(string $created_at) Return Team objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Team objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTeamQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseTeamQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Team', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = TeamPeer::getInstanceFromPool((string) $key)))) {
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
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TeamPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TeamPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(TeamPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(TeamPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function filterBySlug($slug = null)
	{
		if(preg_match('/[\%\*]/', $slug)) {
			return $this->addUsingAlias(TeamPeer::SLUG, str_replace('*', '%', $slug), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(TeamPeer::SLUG, $slug, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function filterByType($type = null)
	{
		if(preg_match('/[\%\*]/', $type)) {
			return $this->addUsingAlias(TeamPeer::TYPE, str_replace('*', '%', $type), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(TeamPeer::TYPE, $type, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function filterByName($name = null)
	{
		if(preg_match('/[\%\*]/', $name)) {
			return $this->addUsingAlias(TeamPeer::NAME, str_replace('*', '%', $name), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(TeamPeer::NAME, $name, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the link column
	 * 
	 * @param     string $link The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function filterByLink($link = null)
	{
		if(preg_match('/[\%\*]/', $link)) {
			return $this->addUsingAlias(TeamPeer::LINK, str_replace('*', '%', $link), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(TeamPeer::LINK, $link, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the photo column
	 * 
	 * @param     string $photo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function filterByPhoto($photo = null)
	{
		if(preg_match('/[\%\*]/', $photo)) {
			return $this->addUsingAlias(TeamPeer::PHOTO, str_replace('*', '%', $photo), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(TeamPeer::PHOTO, $photo, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(TeamPeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(TeamPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(TeamPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(TeamPeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updated_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null)
	{
		if (is_array($updatedAt)) {
			if (array_values($updatedAt) === $updatedAt) {
				return $this->addUsingAlias(TeamPeer::UPDATED_AT, $updatedAt, Criteria::IN);
			} else {
				if (isset($updatedAt['min'])) {
					$this->addUsingAlias(TeamPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($updatedAt['max'])) {
					$this->addUsingAlias(TeamPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(TeamPeer::UPDATED_AT, $updatedAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related TeamI18n object
	 *
	 * @param     TeamI18n $teamI18n  the related object to use as filter
	 *
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function filterByTeamI18n($teamI18n)
	{
		return $this
			->addUsingAlias(TeamPeer::ID, $teamI18n->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the TeamI18n relation TeamI18n object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TeamI18nQuery A secondary query class using the current class as primary query
	 */
	public function useTeamI18nQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('TeamI18n' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TeamI18n', 'TeamI18nQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Team $team Object to remove from the list of results
	 *
	 * @return    TeamQuery The current query, for fluid interface
	 */
	public function prune($team = null)
	{
		if ($team) {
			$this->addUsingAlias(TeamPeer::ID, $team->getId(), Criteria::NOT_EQUAL);
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

} // BaseTeamQuery
