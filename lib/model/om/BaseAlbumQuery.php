<?php


/**
 * Base class that represents a query for the 'album' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Mon Nov 15 15:38:36 2010
 *
 * @method     AlbumQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AlbumQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method     AlbumQuery orderByIsPublic($order = Criteria::ASC) Order by the is_public column
 * @method     AlbumQuery orderByPublishDate($order = Criteria::ASC) Order by the publish_date column
 * @method     AlbumQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     AlbumQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     AlbumQuery groupById() Group by the id column
 * @method     AlbumQuery groupBySlug() Group by the slug column
 * @method     AlbumQuery groupByIsPublic() Group by the is_public column
 * @method     AlbumQuery groupByPublishDate() Group by the publish_date column
 * @method     AlbumQuery groupByCreatedAt() Group by the created_at column
 * @method     AlbumQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     Album findOne(PropelPDO $con = null) Return the first Album matching the query
 * @method     Album findOneById(int $id) Return the first Album filtered by the id column
 * @method     Album findOneBySlug(string $slug) Return the first Album filtered by the slug column
 * @method     Album findOneByIsPublic(boolean $is_public) Return the first Album filtered by the is_public column
 * @method     Album findOneByPublishDate(string $publish_date) Return the first Album filtered by the publish_date column
 * @method     Album findOneByCreatedAt(string $created_at) Return the first Album filtered by the created_at column
 * @method     Album findOneByUpdatedAt(string $updated_at) Return the first Album filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Album objects filtered by the id column
 * @method     array findBySlug(string $slug) Return Album objects filtered by the slug column
 * @method     array findByIsPublic(boolean $is_public) Return Album objects filtered by the is_public column
 * @method     array findByPublishDate(string $publish_date) Return Album objects filtered by the publish_date column
 * @method     array findByCreatedAt(string $created_at) Return Album objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Album objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAlbumQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAlbumQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Album', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = AlbumPeer::getInstanceFromPool((string) $key)))) {
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
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AlbumPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AlbumPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(AlbumPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(AlbumPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterBySlug($slug = null)
	{
		if(preg_match('/[\%\*]/', $slug)) {
			return $this->addUsingAlias(AlbumPeer::SLUG, str_replace('*', '%', $slug), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(AlbumPeer::SLUG, $slug, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the is_public column
	 * 
	 * @param     boolean|string $isPublic The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByIsPublic($isPublic = null)
	{
		if(is_string($isPublic)) {
			$is_public = in_array(strtolower($isPublic), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(AlbumPeer::IS_PUBLIC, $isPublic, Criteria::EQUAL);
	}

	/**
	 * Filter the query on the publish_date column
	 * 
	 * @param     string|array $publish_date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByPublishDate($publishDate = null)
	{
		if (is_array($publishDate)) {
			if (array_values($publishDate) === $publishDate) {
				return $this->addUsingAlias(AlbumPeer::PUBLISH_DATE, $publishDate, Criteria::IN);
			} else {
				if (isset($publishDate['min'])) {
					$this->addUsingAlias(AlbumPeer::PUBLISH_DATE, $publishDate['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($publishDate['max'])) {
					$this->addUsingAlias(AlbumPeer::PUBLISH_DATE, $publishDate['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(AlbumPeer::PUBLISH_DATE, $publishDate, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(AlbumPeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(AlbumPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(AlbumPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(AlbumPeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updated_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null)
	{
		if (is_array($updatedAt)) {
			if (array_values($updatedAt) === $updatedAt) {
				return $this->addUsingAlias(AlbumPeer::UPDATED_AT, $updatedAt, Criteria::IN);
			} else {
				if (isset($updatedAt['min'])) {
					$this->addUsingAlias(AlbumPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($updatedAt['max'])) {
					$this->addUsingAlias(AlbumPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(AlbumPeer::UPDATED_AT, $updatedAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related AlbumI18n object
	 *
	 * @param     AlbumI18n $albumI18n  the related object to use as filter
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByAlbumI18n($albumI18n)
	{
		return $this
			->addUsingAlias(AlbumPeer::ID, $albumI18n->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the AlbumI18n relation AlbumI18n object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumI18nQuery A secondary query class using the current class as primary query
	 */
	public function useAlbumI18nQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('AlbumI18n' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AlbumI18n', 'AlbumI18nQuery');
	}

	/**
	 * Filter the query by a related Photo object
	 *
	 * @param     Photo $photo  the related object to use as filter
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByPhoto($photo)
	{
		return $this
			->addUsingAlias(AlbumPeer::ID, $photo->getAlbumId(), Criteria::EQUAL);
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
	public function usePhotoQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('Photo' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Photo', 'PhotoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Album $album Object to remove from the list of results
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function prune($album = null)
	{
		if ($album) {
			$this->addUsingAlias(AlbumPeer::ID, $album->getId(), Criteria::NOT_EQUAL);
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

} // BaseAlbumQuery