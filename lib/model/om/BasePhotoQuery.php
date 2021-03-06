<?php


/**
 * Base class that represents a query for the 'photo' table.
 *
 * 
 *
 * @method     PhotoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PhotoQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method     PhotoQuery orderByAlbumId($order = Criteria::ASC) Order by the album_id column
 * @method     PhotoQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     PhotoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     PhotoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     PhotoQuery groupById() Group by the id column
 * @method     PhotoQuery groupBySlug() Group by the slug column
 * @method     PhotoQuery groupByAlbumId() Group by the album_id column
 * @method     PhotoQuery groupByImage() Group by the image column
 * @method     PhotoQuery groupByCreatedAt() Group by the created_at column
 * @method     PhotoQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     PhotoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PhotoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PhotoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PhotoQuery leftJoinAlbum($relationAlias = null) Adds a LEFT JOIN clause to the query using the Album relation
 * @method     PhotoQuery rightJoinAlbum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Album relation
 * @method     PhotoQuery innerJoinAlbum($relationAlias = null) Adds a INNER JOIN clause to the query using the Album relation
 *
 * @method     PhotoQuery leftJoinPhotoI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the PhotoI18n relation
 * @method     PhotoQuery rightJoinPhotoI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PhotoI18n relation
 * @method     PhotoQuery innerJoinPhotoI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the PhotoI18n relation
 *
 * @method     Photo findOne(PropelPDO $con = null) Return the first Photo matching the query
 * @method     Photo findOneOrCreate(PropelPDO $con = null) Return the first Photo matching the query, or a new Photo object populated from the query conditions when no match is found
 *
 * @method     Photo findOneById(int $id) Return the first Photo filtered by the id column
 * @method     Photo findOneBySlug(string $slug) Return the first Photo filtered by the slug column
 * @method     Photo findOneByAlbumId(int $album_id) Return the first Photo filtered by the album_id column
 * @method     Photo findOneByImage(string $image) Return the first Photo filtered by the image column
 * @method     Photo findOneByCreatedAt(string $created_at) Return the first Photo filtered by the created_at column
 * @method     Photo findOneByUpdatedAt(string $updated_at) Return the first Photo filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Photo objects filtered by the id column
 * @method     array findBySlug(string $slug) Return Photo objects filtered by the slug column
 * @method     array findByAlbumId(int $album_id) Return Photo objects filtered by the album_id column
 * @method     array findByImage(string $image) Return Photo objects filtered by the image column
 * @method     array findByCreatedAt(string $created_at) Return Photo objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Photo objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePhotoQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePhotoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Photo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PhotoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PhotoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PhotoQuery) {
			return $criteria;
		}
		$query = new PhotoQuery();
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
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Photo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PhotoPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(12, 56, 832), $con);
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
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PhotoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PhotoPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PhotoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterBySlug($slug = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($slug)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $slug)) {
				$slug = str_replace('*', '%', $slug);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PhotoPeer::SLUG, $slug, $comparison);
	}

	/**
	 * Filter the query on the album_id column
	 * 
	 * @param     int|array $albumId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByAlbumId($albumId = null, $comparison = null)
	{
		if (is_array($albumId)) {
			$useMinMax = false;
			if (isset($albumId['min'])) {
				$this->addUsingAlias(PhotoPeer::ALBUM_ID, $albumId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($albumId['max'])) {
				$this->addUsingAlias(PhotoPeer::ALBUM_ID, $albumId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PhotoPeer::ALBUM_ID, $albumId, $comparison);
	}

	/**
	 * Filter the query on the image column
	 * 
	 * @param     string $image The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByImage($image = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($image)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $image)) {
				$image = str_replace('*', '%', $image);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PhotoPeer::IMAGE, $image, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(PhotoPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(PhotoPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PhotoPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(PhotoPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(PhotoPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PhotoPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Album object
	 *
	 * @param     Album $album  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByAlbum($album, $comparison = null)
	{
		return $this
			->addUsingAlias(PhotoPeer::ALBUM_ID, $album->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Album relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function joinAlbum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Album');
		
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
			$this->addJoinObject($join, 'Album');
		}
		
		return $this;
	}

	/**
	 * Use the Album relation Album object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumQuery A secondary query class using the current class as primary query
	 */
	public function useAlbumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAlbum($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Album', 'AlbumQuery');
	}

	/**
	 * Filter the query by a related PhotoI18n object
	 *
	 * @param     PhotoI18n $photoI18n  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByPhotoI18n($photoI18n, $comparison = null)
	{
		return $this
			->addUsingAlias(PhotoPeer::ID, $photoI18n->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PhotoI18n relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function joinPhotoI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PhotoI18n');
		
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
			$this->addJoinObject($join, 'PhotoI18n');
		}
		
		return $this;
	}

	/**
	 * Use the PhotoI18n relation PhotoI18n object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PhotoI18nQuery A secondary query class using the current class as primary query
	 */
	public function usePhotoI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPhotoI18n($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PhotoI18n', 'PhotoI18nQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Photo $photo Object to remove from the list of results
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function prune($photo = null)
	{
		if ($photo) {
			$this->addUsingAlias(PhotoPeer::ID, $photo->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePhotoQuery
