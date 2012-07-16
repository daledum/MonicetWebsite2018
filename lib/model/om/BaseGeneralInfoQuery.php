<?php


/**
 * Base class that represents a query for the 'general_info' table.
 *
 * 
 *
 * @method     GeneralInfoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     GeneralInfoQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     GeneralInfoQuery orderByVesselId($order = Criteria::ASC) Order by the vessel_id column
 * @method     GeneralInfoQuery orderBySkipperId($order = Criteria::ASC) Order by the skipper_id column
 * @method     GeneralInfoQuery orderByGuideId($order = Criteria::ASC) Order by the guide_id column
 * @method     GeneralInfoQuery orderByCompanyId($order = Criteria::ASC) Order by the company_id column
 * @method     GeneralInfoQuery orderByBaseLatitude($order = Criteria::ASC) Order by the base_latitude column
 * @method     GeneralInfoQuery orderByBaseLongitude($order = Criteria::ASC) Order by the base_longitude column
 * @method     GeneralInfoQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     GeneralInfoQuery orderByValid($order = Criteria::ASC) Order by the valid column
 * @method     GeneralInfoQuery orderByComments($order = Criteria::ASC) Order by the comments column
 * @method     GeneralInfoQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     GeneralInfoQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method     GeneralInfoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     GeneralInfoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     GeneralInfoQuery groupById() Group by the id column
 * @method     GeneralInfoQuery groupByCode() Group by the code column
 * @method     GeneralInfoQuery groupByVesselId() Group by the vessel_id column
 * @method     GeneralInfoQuery groupBySkipperId() Group by the skipper_id column
 * @method     GeneralInfoQuery groupByGuideId() Group by the guide_id column
 * @method     GeneralInfoQuery groupByCompanyId() Group by the company_id column
 * @method     GeneralInfoQuery groupByBaseLatitude() Group by the base_latitude column
 * @method     GeneralInfoQuery groupByBaseLongitude() Group by the base_longitude column
 * @method     GeneralInfoQuery groupByDate() Group by the date column
 * @method     GeneralInfoQuery groupByValid() Group by the valid column
 * @method     GeneralInfoQuery groupByComments() Group by the comments column
 * @method     GeneralInfoQuery groupByCreatedBy() Group by the created_by column
 * @method     GeneralInfoQuery groupByUpdatedBy() Group by the updated_by column
 * @method     GeneralInfoQuery groupByCreatedAt() Group by the created_at column
 * @method     GeneralInfoQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     GeneralInfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     GeneralInfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     GeneralInfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     GeneralInfoQuery leftJoinVessel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Vessel relation
 * @method     GeneralInfoQuery rightJoinVessel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Vessel relation
 * @method     GeneralInfoQuery innerJoinVessel($relationAlias = null) Adds a INNER JOIN clause to the query using the Vessel relation
 *
 * @method     GeneralInfoQuery leftJoinSkipper($relationAlias = null) Adds a LEFT JOIN clause to the query using the Skipper relation
 * @method     GeneralInfoQuery rightJoinSkipper($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Skipper relation
 * @method     GeneralInfoQuery innerJoinSkipper($relationAlias = null) Adds a INNER JOIN clause to the query using the Skipper relation
 *
 * @method     GeneralInfoQuery leftJoinGuide($relationAlias = null) Adds a LEFT JOIN clause to the query using the Guide relation
 * @method     GeneralInfoQuery rightJoinGuide($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Guide relation
 * @method     GeneralInfoQuery innerJoinGuide($relationAlias = null) Adds a INNER JOIN clause to the query using the Guide relation
 *
 * @method     GeneralInfoQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method     GeneralInfoQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method     GeneralInfoQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method     GeneralInfoQuery leftJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     GeneralInfoQuery rightJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     GeneralInfoQuery innerJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 *
 * @method     GeneralInfoQuery leftJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     GeneralInfoQuery rightJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     GeneralInfoQuery innerJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 *
 * @method     GeneralInfoQuery leftJoinRecord($relationAlias = null) Adds a LEFT JOIN clause to the query using the Record relation
 * @method     GeneralInfoQuery rightJoinRecord($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Record relation
 * @method     GeneralInfoQuery innerJoinRecord($relationAlias = null) Adds a INNER JOIN clause to the query using the Record relation
 *
 * @method     GeneralInfo findOne(PropelPDO $con = null) Return the first GeneralInfo matching the query
 * @method     GeneralInfo findOneOrCreate(PropelPDO $con = null) Return the first GeneralInfo matching the query, or a new GeneralInfo object populated from the query conditions when no match is found
 *
 * @method     GeneralInfo findOneById(int $id) Return the first GeneralInfo filtered by the id column
 * @method     GeneralInfo findOneByCode(string $code) Return the first GeneralInfo filtered by the code column
 * @method     GeneralInfo findOneByVesselId(int $vessel_id) Return the first GeneralInfo filtered by the vessel_id column
 * @method     GeneralInfo findOneBySkipperId(int $skipper_id) Return the first GeneralInfo filtered by the skipper_id column
 * @method     GeneralInfo findOneByGuideId(int $guide_id) Return the first GeneralInfo filtered by the guide_id column
 * @method     GeneralInfo findOneByCompanyId(int $company_id) Return the first GeneralInfo filtered by the company_id column
 * @method     GeneralInfo findOneByBaseLatitude(string $base_latitude) Return the first GeneralInfo filtered by the base_latitude column
 * @method     GeneralInfo findOneByBaseLongitude(string $base_longitude) Return the first GeneralInfo filtered by the base_longitude column
 * @method     GeneralInfo findOneByDate(string $date) Return the first GeneralInfo filtered by the date column
 * @method     GeneralInfo findOneByValid(boolean $valid) Return the first GeneralInfo filtered by the valid column
 * @method     GeneralInfo findOneByComments(string $comments) Return the first GeneralInfo filtered by the comments column
 * @method     GeneralInfo findOneByCreatedBy(int $created_by) Return the first GeneralInfo filtered by the created_by column
 * @method     GeneralInfo findOneByUpdatedBy(int $updated_by) Return the first GeneralInfo filtered by the updated_by column
 * @method     GeneralInfo findOneByCreatedAt(string $created_at) Return the first GeneralInfo filtered by the created_at column
 * @method     GeneralInfo findOneByUpdatedAt(string $updated_at) Return the first GeneralInfo filtered by the updated_at column
 *
 * @method     array findById(int $id) Return GeneralInfo objects filtered by the id column
 * @method     array findByCode(string $code) Return GeneralInfo objects filtered by the code column
 * @method     array findByVesselId(int $vessel_id) Return GeneralInfo objects filtered by the vessel_id column
 * @method     array findBySkipperId(int $skipper_id) Return GeneralInfo objects filtered by the skipper_id column
 * @method     array findByGuideId(int $guide_id) Return GeneralInfo objects filtered by the guide_id column
 * @method     array findByCompanyId(int $company_id) Return GeneralInfo objects filtered by the company_id column
 * @method     array findByBaseLatitude(string $base_latitude) Return GeneralInfo objects filtered by the base_latitude column
 * @method     array findByBaseLongitude(string $base_longitude) Return GeneralInfo objects filtered by the base_longitude column
 * @method     array findByDate(string $date) Return GeneralInfo objects filtered by the date column
 * @method     array findByValid(boolean $valid) Return GeneralInfo objects filtered by the valid column
 * @method     array findByComments(string $comments) Return GeneralInfo objects filtered by the comments column
 * @method     array findByCreatedBy(int $created_by) Return GeneralInfo objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return GeneralInfo objects filtered by the updated_by column
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
	 * Returns a new GeneralInfoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    GeneralInfoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof GeneralInfoQuery) {
			return $criteria;
		}
		$query = new GeneralInfoQuery();
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
	 * @return    GeneralInfo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = GeneralInfoPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(GeneralInfoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the code column
	 * 
	 * @param     string $code The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByCode($code = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($code)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $code)) {
				$code = str_replace('*', '%', $code);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query on the vessel_id column
	 * 
	 * @param     int|array $vesselId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByVesselId($vesselId = null, $comparison = null)
	{
		if (is_array($vesselId)) {
			$useMinMax = false;
			if (isset($vesselId['min'])) {
				$this->addUsingAlias(GeneralInfoPeer::VESSEL_ID, $vesselId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($vesselId['max'])) {
				$this->addUsingAlias(GeneralInfoPeer::VESSEL_ID, $vesselId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::VESSEL_ID, $vesselId, $comparison);
	}

	/**
	 * Filter the query on the skipper_id column
	 * 
	 * @param     int|array $skipperId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterBySkipperId($skipperId = null, $comparison = null)
	{
		if (is_array($skipperId)) {
			$useMinMax = false;
			if (isset($skipperId['min'])) {
				$this->addUsingAlias(GeneralInfoPeer::SKIPPER_ID, $skipperId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($skipperId['max'])) {
				$this->addUsingAlias(GeneralInfoPeer::SKIPPER_ID, $skipperId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::SKIPPER_ID, $skipperId, $comparison);
	}

	/**
	 * Filter the query on the guide_id column
	 * 
	 * @param     int|array $guideId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByGuideId($guideId = null, $comparison = null)
	{
		if (is_array($guideId)) {
			$useMinMax = false;
			if (isset($guideId['min'])) {
				$this->addUsingAlias(GeneralInfoPeer::GUIDE_ID, $guideId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($guideId['max'])) {
				$this->addUsingAlias(GeneralInfoPeer::GUIDE_ID, $guideId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::GUIDE_ID, $guideId, $comparison);
	}

	/**
	 * Filter the query on the company_id column
	 * 
	 * @param     int|array $companyId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByCompanyId($companyId = null, $comparison = null)
	{
		if (is_array($companyId)) {
			$useMinMax = false;
			if (isset($companyId['min'])) {
				$this->addUsingAlias(GeneralInfoPeer::COMPANY_ID, $companyId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($companyId['max'])) {
				$this->addUsingAlias(GeneralInfoPeer::COMPANY_ID, $companyId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::COMPANY_ID, $companyId, $comparison);
	}

	/**
	 * Filter the query on the base_latitude column
	 * 
	 * @param     string $baseLatitude The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByBaseLatitude($baseLatitude = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($baseLatitude)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $baseLatitude)) {
				$baseLatitude = str_replace('*', '%', $baseLatitude);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::BASE_LATITUDE, $baseLatitude, $comparison);
	}

	/**
	 * Filter the query on the base_longitude column
	 * 
	 * @param     string $baseLongitude The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByBaseLongitude($baseLongitude = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($baseLongitude)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $baseLongitude)) {
				$baseLongitude = str_replace('*', '%', $baseLongitude);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::BASE_LONGITUDE, $baseLongitude, $comparison);
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     string|array $date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(GeneralInfoPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(GeneralInfoPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the valid column
	 * 
	 * @param     boolean|string $valid The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByValid($valid = null, $comparison = null)
	{
		if (is_string($valid)) {
			$valid = in_array(strtolower($valid), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(GeneralInfoPeer::VALID, $valid, $comparison);
	}

	/**
	 * Filter the query on the comments column
	 * 
	 * @param     string $comments The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByComments($comments = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comments)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comments)) {
				$comments = str_replace('*', '%', $comments);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::COMMENTS, $comments, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 * 
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(GeneralInfoPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(GeneralInfoPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 * 
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(GeneralInfoPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(GeneralInfoPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(GeneralInfoPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(GeneralInfoPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(GeneralInfoPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(GeneralInfoPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GeneralInfoPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Vessel object
	 *
	 * @param     Vessel $vessel  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByVessel($vessel, $comparison = null)
	{
		return $this
			->addUsingAlias(GeneralInfoPeer::VESSEL_ID, $vessel->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Vessel relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function joinVessel($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Vessel');
		
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
			$this->addJoinObject($join, 'Vessel');
		}
		
		return $this;
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
	public function useVesselQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinVessel($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Vessel', 'VesselQuery');
	}

	/**
	 * Filter the query by a related Skipper object
	 *
	 * @param     Skipper $skipper  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterBySkipper($skipper, $comparison = null)
	{
		return $this
			->addUsingAlias(GeneralInfoPeer::SKIPPER_ID, $skipper->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Skipper relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function joinSkipper($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Skipper');
		
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
			$this->addJoinObject($join, 'Skipper');
		}
		
		return $this;
	}

	/**
	 * Use the Skipper relation Skipper object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SkipperQuery A secondary query class using the current class as primary query
	 */
	public function useSkipperQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSkipper($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Skipper', 'SkipperQuery');
	}

	/**
	 * Filter the query by a related Guide object
	 *
	 * @param     Guide $guide  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByGuide($guide, $comparison = null)
	{
		return $this
			->addUsingAlias(GeneralInfoPeer::GUIDE_ID, $guide->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Guide relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function joinGuide($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Guide');
		
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
			$this->addJoinObject($join, 'Guide');
		}
		
		return $this;
	}

	/**
	 * Use the Guide relation Guide object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GuideQuery A secondary query class using the current class as primary query
	 */
	public function useGuideQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinGuide($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Guide', 'GuideQuery');
	}

	/**
	 * Filter the query by a related Company object
	 *
	 * @param     Company $company  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByCompany($company, $comparison = null)
	{
		return $this
			->addUsingAlias(GeneralInfoPeer::COMPANY_ID, $company->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Company relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function joinCompany($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Company');
		
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
			$this->addJoinObject($join, 'Company');
		}
		
		return $this;
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
	public function useCompanyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCompany($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Company', 'CompanyQuery');
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUserRelatedByCreatedBy($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(GeneralInfoPeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function joinsfGuardUserRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfGuardUserRelatedByCreatedBy');
		
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
			$this->addJoinObject($join, 'sfGuardUserRelatedByCreatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the sfGuardUserRelatedByCreatedBy relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinsfGuardUserRelatedByCreatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedByCreatedBy', 'sfGuardUserQuery');
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUserRelatedByUpdatedBy($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(GeneralInfoPeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function joinsfGuardUserRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfGuardUserRelatedByUpdatedBy');
		
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
			$this->addJoinObject($join, 'sfGuardUserRelatedByUpdatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the sfGuardUserRelatedByUpdatedBy relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinsfGuardUserRelatedByUpdatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedByUpdatedBy', 'sfGuardUserQuery');
	}

	/**
	 * Filter the query by a related Record object
	 *
	 * @param     Record $record  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function filterByRecord($record, $comparison = null)
	{
		return $this
			->addUsingAlias(GeneralInfoPeer::ID, $record->getGeneralInfoId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Record relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneralInfoQuery The current query, for fluid interface
	 */
	public function joinRecord($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Record');
		
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
			$this->addJoinObject($join, 'Record');
		}
		
		return $this;
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
	public function useRecordQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRecord($relationAlias, $joinType)
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

} // BaseGeneralInfoQuery
