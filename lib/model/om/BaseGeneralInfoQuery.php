<?php


/**
 * Base class that represents a query for the 'general_info' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Tue Apr 20 15:16:53 2010
 *
 * @method     GeneralInfoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     GeneralInfoQuery orderByVesselId($order = Criteria::ASC) Order by the vessel_id column
 * @method     GeneralInfoQuery orderBySkipperId($order = Criteria::ASC) Order by the skipper_id column
 * @method     GeneralInfoQuery orderByGuideId($order = Criteria::ASC) Order by the guide_id column
 * @method     GeneralInfoQuery orderByBaseLatitude($order = Criteria::ASC) Order by the base_latitude column
 * @method     GeneralInfoQuery orderByBaseLongitude($order = Criteria::ASC) Order by the base_longitude column
 * @method     GeneralInfoQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     GeneralInfoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     GeneralInfoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     GeneralInfoQuery groupById() Group by the id column
 * @method     GeneralInfoQuery groupByVesselId() Group by the vessel_id column
 * @method     GeneralInfoQuery groupBySkipperId() Group by the skipper_id column
 * @method     GeneralInfoQuery groupByGuideId() Group by the guide_id column
 * @method     GeneralInfoQuery groupByBaseLatitude() Group by the base_latitude column
 * @method     GeneralInfoQuery groupByBaseLongitude() Group by the base_longitude column
 * @method     GeneralInfoQuery groupByDate() Group by the date column
 * @method     GeneralInfoQuery groupByCreatedAt() Group by the created_at column
 * @method     GeneralInfoQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     GeneralInfo findOne(PropelPDO $con = null) Return the first GeneralInfo matching the query
 * @method     GeneralInfo findOneById(int $id) Return the first GeneralInfo filtered by the id column
 * @method     GeneralInfo findOneByVesselId(int $vessel_id) Return the first GeneralInfo filtered by the vessel_id column
 * @method     GeneralInfo findOneBySkipperId(int $skipper_id) Return the first GeneralInfo filtered by the skipper_id column
 * @method     GeneralInfo findOneByGuideId(int $guide_id) Return the first GeneralInfo filtered by the guide_id column
 * @method     GeneralInfo findOneByBaseLatitude(string $base_latitude) Return the first GeneralInfo filtered by the base_latitude column
 * @method     GeneralInfo findOneByBaseLongitude(string $base_longitude) Return the first GeneralInfo filtered by the base_longitude column
 * @method     GeneralInfo findOneByDate(string $date) Return the first GeneralInfo filtered by the date column
 * @method     GeneralInfo findOneByCreatedAt(string $created_at) Return the first GeneralInfo filtered by the created_at column
 * @method     GeneralInfo findOneByUpdatedAt(string $updated_at) Return the first GeneralInfo filtered by the updated_at column
 *
 * @method     array findById(int $id) Return GeneralInfo objects filtered by the id column
 * @method     array findByVesselId(int $vessel_id) Return GeneralInfo objects filtered by the vessel_id column
 * @method     array findBySkipperId(int $skipper_id) Return GeneralInfo objects filtered by the skipper_id column
 * @method     array findByGuideId(int $guide_id) Return GeneralInfo objects filtered by the guide_id column
 * @method     array findByBaseLatitude(string $base_latitude) Return GeneralInfo objects filtered by the base_latitude column
 * @method     array findByBaseLongitude(string $base_longitude) Return GeneralInfo objects filtered by the base_longitude column
 * @method     array findByDate(string $date) Return GeneralInfo objects filtered by the date column
 * @method     array findByCreatedAt(string $created_at) Return GeneralInfo objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return GeneralInfo objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseGeneralInfoQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseGeneralInfoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'GeneralInfo', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = GeneralInfoPeer::getInstanceFromPool((string) $key)))) {
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
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(GeneralInfoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(GeneralInfoPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(GeneralInfoPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(GeneralInfoPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the vessel_id column
	 * 
	 * @param     int|array $vessel_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByVesselId($vesselId = null)
	{
		if (is_array($vesselId)) {
			if (array_values($vesselId) === $vesselId) {
				return $this->addUsingAlias(GeneralInfoPeer::VESSEL_ID, $vesselId, Criteria::IN);
			} else {
				if (isset($vesselId['min'])) {
					$this->addUsingAlias(GeneralInfoPeer::VESSEL_ID, $vesselId['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($vesselId['max'])) {
					$this->addUsingAlias(GeneralInfoPeer::VESSEL_ID, $vesselId['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(GeneralInfoPeer::VESSEL_ID, $vesselId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the skipper_id column
	 * 
	 * @param     int|array $skipper_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterBySkipperId($skipperId = null)
	{
		if (is_array($skipperId)) {
			if (array_values($skipperId) === $skipperId) {
				return $this->addUsingAlias(GeneralInfoPeer::SKIPPER_ID, $skipperId, Criteria::IN);
			} else {
				if (isset($skipperId['min'])) {
					$this->addUsingAlias(GeneralInfoPeer::SKIPPER_ID, $skipperId['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($skipperId['max'])) {
					$this->addUsingAlias(GeneralInfoPeer::SKIPPER_ID, $skipperId['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(GeneralInfoPeer::SKIPPER_ID, $skipperId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the guide_id column
	 * 
	 * @param     int|array $guide_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByGuideId($guideId = null)
	{
		if (is_array($guideId)) {
			if (array_values($guideId) === $guideId) {
				return $this->addUsingAlias(GeneralInfoPeer::GUIDE_ID, $guideId, Criteria::IN);
			} else {
				if (isset($guideId['min'])) {
					$this->addUsingAlias(GeneralInfoPeer::GUIDE_ID, $guideId['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($guideId['max'])) {
					$this->addUsingAlias(GeneralInfoPeer::GUIDE_ID, $guideId['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(GeneralInfoPeer::GUIDE_ID, $guideId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the base_latitude column
	 * 
	 * @param     string $base_latitude The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByBaseLatitude($baseLatitude = null)
	{
		if(preg_match('/[\%\*]/', $baseLatitude)) {
			return $this->addUsingAlias(GeneralInfoPeer::BASE_LATITUDE, str_replace('*', '%', $baseLatitude), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(GeneralInfoPeer::BASE_LATITUDE, $baseLatitude, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the base_longitude column
	 * 
	 * @param     string $base_longitude The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByBaseLongitude($baseLongitude = null)
	{
		if(preg_match('/[\%\*]/', $baseLongitude)) {
			return $this->addUsingAlias(GeneralInfoPeer::BASE_LONGITUDE, str_replace('*', '%', $baseLongitude), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(GeneralInfoPeer::BASE_LONGITUDE, $baseLongitude, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     string|array $date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null)
	{
		if (is_array($date)) {
			if (array_values($date) === $date) {
				return $this->addUsingAlias(GeneralInfoPeer::DATE, $date, Criteria::IN);
			} else {
				if (isset($date['min'])) {
					$this->addUsingAlias(GeneralInfoPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($date['max'])) {
					$this->addUsingAlias(GeneralInfoPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(GeneralInfoPeer::DATE, $date, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(GeneralInfoPeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(GeneralInfoPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(GeneralInfoPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(GeneralInfoPeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updated_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null)
	{
		if (is_array($updatedAt)) {
			if (array_values($updatedAt) === $updatedAt) {
				return $this->addUsingAlias(GeneralInfoPeer::UPDATED_AT, $updatedAt, Criteria::IN);
			} else {
				if (isset($updatedAt['min'])) {
					$this->addUsingAlias(GeneralInfoPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($updatedAt['max'])) {
					$this->addUsingAlias(GeneralInfoPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(GeneralInfoPeer::UPDATED_AT, $updatedAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related Vessel object
	 *
	 * @param     Vessel $vessel  the related object to use as filter
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByVessel($vessel)
	{
		return $this
			->addUsingAlias(GeneralInfoPeer::VESSEL_ID, $vessel->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the Vessel relation Vessel object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    VesselQuery A secondary query class using the current class as primary query
	 */
	public function useVesselQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('Vessel' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Vessel', 'VesselQuery');
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUserRelatedBySkipperId($sfGuardUser)
	{
		return $this
			->addUsingAlias(GeneralInfoPeer::SKIPPER_ID, $sfGuardUser->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the sfGuardUserRelatedBySkipperId relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserRelatedBySkipperIdQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('sfGuardUserRelatedBySkipperId' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedBySkipperId', 'sfGuardUserQuery');
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUserRelatedByGuideId($sfGuardUser)
	{
		return $this
			->addUsingAlias(GeneralInfoPeer::GUIDE_ID, $sfGuardUser->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the sfGuardUserRelatedByGuideId relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserRelatedByGuideIdQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('sfGuardUserRelatedByGuideId' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedByGuideId', 'sfGuardUserQuery');
	}

	/**
	 * Filter the query by a related Record object
	 *
	 * @param     Record $record  the related object to use as filter
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByRecord($record)
	{
		return $this
			->addUsingAlias(GeneralInfoPeer::ID, $record->getGeneralInfoId(), Criteria::EQUAL);
	}

	/**
	 * Use the Record relation Record object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RecordQuery A secondary query class using the current class as primary query
	 */
	public function useRecordQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('Record' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Record', 'RecordQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     GeneralInfo $generalInfo Object to remove from the list of results
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function prune($generalInfo = null)
	{
		if ($generalInfo) {
			$this->addUsingAlias(GeneralInfoPeer::ID, $generalInfo->getId(), Criteria::NOT_EQUAL);
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

} // BaseGeneralInfoQuery
