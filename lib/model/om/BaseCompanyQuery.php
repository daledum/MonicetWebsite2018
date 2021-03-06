<?php


/**
 * Base class that represents a query for the 'company' table.
 *
 * 
 *
 * @method     CompanyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CompanyQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     CompanyQuery orderByAcronym($order = Criteria::ASC) Order by the acronym column
 * @method     CompanyQuery orderByRecCetCode($order = Criteria::ASC) Order by the rec_cet_code column
 * @method     CompanyQuery orderByBaseLatitude($order = Criteria::ASC) Order by the base_latitude column
 * @method     CompanyQuery orderByBaseLongitude($order = Criteria::ASC) Order by the base_longitude column
 * @method     CompanyQuery orderByTelephone($order = Criteria::ASC) Order by the telephone column
 * @method     CompanyQuery orderByMobile($order = Criteria::ASC) Order by the mobile column
 * @method     CompanyQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     CompanyQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     CompanyQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     CompanyQuery orderByZipcode($order = Criteria::ASC) Order by the zipcode column
 * @method     CompanyQuery orderByCountry($order = Criteria::ASC) Order by the country column
 * @method     CompanyQuery orderByDistrict($order = Criteria::ASC) Order by the district column
 * @method     CompanyQuery orderByMunicipality($order = Criteria::ASC) Order by the municipality column
 * @method     CompanyQuery orderByLocality($order = Criteria::ASC) Order by the locality column
 * @method     CompanyQuery orderByObservations($order = Criteria::ASC) Order by the observations column
 * @method     CompanyQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     CompanyQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     CompanyQuery groupById() Group by the id column
 * @method     CompanyQuery groupByName() Group by the name column
 * @method     CompanyQuery groupByAcronym() Group by the acronym column
 * @method     CompanyQuery groupByRecCetCode() Group by the rec_cet_code column
 * @method     CompanyQuery groupByBaseLatitude() Group by the base_latitude column
 * @method     CompanyQuery groupByBaseLongitude() Group by the base_longitude column
 * @method     CompanyQuery groupByTelephone() Group by the telephone column
 * @method     CompanyQuery groupByMobile() Group by the mobile column
 * @method     CompanyQuery groupByFax() Group by the fax column
 * @method     CompanyQuery groupByEmail() Group by the email column
 * @method     CompanyQuery groupByAddress() Group by the address column
 * @method     CompanyQuery groupByZipcode() Group by the zipcode column
 * @method     CompanyQuery groupByCountry() Group by the country column
 * @method     CompanyQuery groupByDistrict() Group by the district column
 * @method     CompanyQuery groupByMunicipality() Group by the municipality column
 * @method     CompanyQuery groupByLocality() Group by the locality column
 * @method     CompanyQuery groupByObservations() Group by the observations column
 * @method     CompanyQuery groupByCreatedAt() Group by the created_at column
 * @method     CompanyQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     CompanyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CompanyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CompanyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CompanyQuery leftJoinCompanyUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the CompanyUser relation
 * @method     CompanyQuery rightJoinCompanyUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CompanyUser relation
 * @method     CompanyQuery innerJoinCompanyUser($relationAlias = null) Adds a INNER JOIN clause to the query using the CompanyUser relation
 *
 * @method     CompanyQuery leftJoinVessel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Vessel relation
 * @method     CompanyQuery rightJoinVessel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Vessel relation
 * @method     CompanyQuery innerJoinVessel($relationAlias = null) Adds a INNER JOIN clause to the query using the Vessel relation
 *
 * @method     CompanyQuery leftJoinGuide($relationAlias = null) Adds a LEFT JOIN clause to the query using the Guide relation
 * @method     CompanyQuery rightJoinGuide($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Guide relation
 * @method     CompanyQuery innerJoinGuide($relationAlias = null) Adds a INNER JOIN clause to the query using the Guide relation
 *
 * @method     CompanyQuery leftJoinSkipper($relationAlias = null) Adds a LEFT JOIN clause to the query using the Skipper relation
 * @method     CompanyQuery rightJoinSkipper($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Skipper relation
 * @method     CompanyQuery innerJoinSkipper($relationAlias = null) Adds a INNER JOIN clause to the query using the Skipper relation
 *
 * @method     CompanyQuery leftJoinGeneralInfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the GeneralInfo relation
 * @method     CompanyQuery rightJoinGeneralInfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GeneralInfo relation
 * @method     CompanyQuery innerJoinGeneralInfo($relationAlias = null) Adds a INNER JOIN clause to the query using the GeneralInfo relation
 *
 * @method     CompanyQuery leftJoinWatchInfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the WatchInfo relation
 * @method     CompanyQuery rightJoinWatchInfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WatchInfo relation
 * @method     CompanyQuery innerJoinWatchInfo($relationAlias = null) Adds a INNER JOIN clause to the query using the WatchInfo relation
 *
 * @method     CompanyQuery leftJoinWatchman($relationAlias = null) Adds a LEFT JOIN clause to the query using the Watchman relation
 * @method     CompanyQuery rightJoinWatchman($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Watchman relation
 * @method     CompanyQuery innerJoinWatchman($relationAlias = null) Adds a INNER JOIN clause to the query using the Watchman relation
 *
 * @method     CompanyQuery leftJoinWatchPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the WatchPost relation
 * @method     CompanyQuery rightJoinWatchPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WatchPost relation
 * @method     CompanyQuery innerJoinWatchPost($relationAlias = null) Adds a INNER JOIN clause to the query using the WatchPost relation
 *
 * @method     CompanyQuery leftJoinChartIframeInformation($relationAlias = null) Adds a LEFT JOIN clause to the query using the ChartIframeInformation relation
 * @method     CompanyQuery rightJoinChartIframeInformation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ChartIframeInformation relation
 * @method     CompanyQuery innerJoinChartIframeInformation($relationAlias = null) Adds a INNER JOIN clause to the query using the ChartIframeInformation relation
 *
 * @method     CompanyQuery leftJoinMapIframeInformation($relationAlias = null) Adds a LEFT JOIN clause to the query using the MapIframeInformation relation
 * @method     CompanyQuery rightJoinMapIframeInformation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MapIframeInformation relation
 * @method     CompanyQuery innerJoinMapIframeInformation($relationAlias = null) Adds a INNER JOIN clause to the query using the MapIframeInformation relation
 *
 * @method     CompanyQuery leftJoinObservationPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhoto relation
 * @method     CompanyQuery rightJoinObservationPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhoto relation
 * @method     CompanyQuery innerJoinObservationPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhoto relation
 *
 * @method     Company findOne(PropelPDO $con = null) Return the first Company matching the query
 * @method     Company findOneOrCreate(PropelPDO $con = null) Return the first Company matching the query, or a new Company object populated from the query conditions when no match is found
 *
 * @method     Company findOneById(int $id) Return the first Company filtered by the id column
 * @method     Company findOneByName(string $name) Return the first Company filtered by the name column
 * @method     Company findOneByAcronym(string $acronym) Return the first Company filtered by the acronym column
 * @method     Company findOneByRecCetCode(string $rec_cet_code) Return the first Company filtered by the rec_cet_code column
 * @method     Company findOneByBaseLatitude(string $base_latitude) Return the first Company filtered by the base_latitude column
 * @method     Company findOneByBaseLongitude(string $base_longitude) Return the first Company filtered by the base_longitude column
 * @method     Company findOneByTelephone(string $telephone) Return the first Company filtered by the telephone column
 * @method     Company findOneByMobile(string $mobile) Return the first Company filtered by the mobile column
 * @method     Company findOneByFax(string $fax) Return the first Company filtered by the fax column
 * @method     Company findOneByEmail(string $email) Return the first Company filtered by the email column
 * @method     Company findOneByAddress(string $address) Return the first Company filtered by the address column
 * @method     Company findOneByZipcode(string $zipcode) Return the first Company filtered by the zipcode column
 * @method     Company findOneByCountry(string $country) Return the first Company filtered by the country column
 * @method     Company findOneByDistrict(string $district) Return the first Company filtered by the district column
 * @method     Company findOneByMunicipality(string $municipality) Return the first Company filtered by the municipality column
 * @method     Company findOneByLocality(string $locality) Return the first Company filtered by the locality column
 * @method     Company findOneByObservations(string $observations) Return the first Company filtered by the observations column
 * @method     Company findOneByCreatedAt(string $created_at) Return the first Company filtered by the created_at column
 * @method     Company findOneByUpdatedAt(string $updated_at) Return the first Company filtered by the updated_at column
 *
 * @method     array findById(int $id) Return Company objects filtered by the id column
 * @method     array findByName(string $name) Return Company objects filtered by the name column
 * @method     array findByAcronym(string $acronym) Return Company objects filtered by the acronym column
 * @method     array findByRecCetCode(string $rec_cet_code) Return Company objects filtered by the rec_cet_code column
 * @method     array findByBaseLatitude(string $base_latitude) Return Company objects filtered by the base_latitude column
 * @method     array findByBaseLongitude(string $base_longitude) Return Company objects filtered by the base_longitude column
 * @method     array findByTelephone(string $telephone) Return Company objects filtered by the telephone column
 * @method     array findByMobile(string $mobile) Return Company objects filtered by the mobile column
 * @method     array findByFax(string $fax) Return Company objects filtered by the fax column
 * @method     array findByEmail(string $email) Return Company objects filtered by the email column
 * @method     array findByAddress(string $address) Return Company objects filtered by the address column
 * @method     array findByZipcode(string $zipcode) Return Company objects filtered by the zipcode column
 * @method     array findByCountry(string $country) Return Company objects filtered by the country column
 * @method     array findByDistrict(string $district) Return Company objects filtered by the district column
 * @method     array findByMunicipality(string $municipality) Return Company objects filtered by the municipality column
 * @method     array findByLocality(string $locality) Return Company objects filtered by the locality column
 * @method     array findByObservations(string $observations) Return Company objects filtered by the observations column
 * @method     array findByCreatedAt(string $created_at) Return Company objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Company objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCompanyQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCompanyQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Company', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CompanyQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CompanyQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CompanyQuery) {
			return $criteria;
		}
		$query = new CompanyQuery();
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
	 * @return    Company|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CompanyPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CompanyPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CompanyPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CompanyPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the acronym column
	 * 
	 * @param     string $acronym The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByAcronym($acronym = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($acronym)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $acronym)) {
				$acronym = str_replace('*', '%', $acronym);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::ACRONYM, $acronym, $comparison);
	}

	/**
	 * Filter the query on the rec_cet_code column
	 * 
	 * @param     string $recCetCode The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByRecCetCode($recCetCode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($recCetCode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $recCetCode)) {
				$recCetCode = str_replace('*', '%', $recCetCode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::REC_CET_CODE, $recCetCode, $comparison);
	}

	/**
	 * Filter the query on the base_latitude column
	 * 
	 * @param     string $baseLatitude The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CompanyPeer::BASE_LATITUDE, $baseLatitude, $comparison);
	}

	/**
	 * Filter the query on the base_longitude column
	 * 
	 * @param     string $baseLongitude The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CompanyPeer::BASE_LONGITUDE, $baseLongitude, $comparison);
	}

	/**
	 * Filter the query on the telephone column
	 * 
	 * @param     string $telephone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByTelephone($telephone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telephone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telephone)) {
				$telephone = str_replace('*', '%', $telephone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::TELEPHONE, $telephone, $comparison);
	}

	/**
	 * Filter the query on the mobile column
	 * 
	 * @param     string $mobile The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByMobile($mobile = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mobile)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mobile)) {
				$mobile = str_replace('*', '%', $mobile);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::MOBILE, $mobile, $comparison);
	}

	/**
	 * Filter the query on the fax column
	 * 
	 * @param     string $fax The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByFax($fax = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fax)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fax)) {
				$fax = str_replace('*', '%', $fax);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::FAX, $fax, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the address column
	 * 
	 * @param     string $address The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByAddress($address = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($address)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $address)) {
				$address = str_replace('*', '%', $address);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::ADDRESS, $address, $comparison);
	}

	/**
	 * Filter the query on the zipcode column
	 * 
	 * @param     string $zipcode The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByZipcode($zipcode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($zipcode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $zipcode)) {
				$zipcode = str_replace('*', '%', $zipcode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::ZIPCODE, $zipcode, $comparison);
	}

	/**
	 * Filter the query on the country column
	 * 
	 * @param     string $country The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByCountry($country = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($country)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $country)) {
				$country = str_replace('*', '%', $country);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::COUNTRY, $country, $comparison);
	}

	/**
	 * Filter the query on the district column
	 * 
	 * @param     string $district The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByDistrict($district = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($district)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $district)) {
				$district = str_replace('*', '%', $district);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::DISTRICT, $district, $comparison);
	}

	/**
	 * Filter the query on the municipality column
	 * 
	 * @param     string $municipality The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByMunicipality($municipality = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($municipality)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $municipality)) {
				$municipality = str_replace('*', '%', $municipality);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::MUNICIPALITY, $municipality, $comparison);
	}

	/**
	 * Filter the query on the locality column
	 * 
	 * @param     string $locality The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByLocality($locality = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($locality)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $locality)) {
				$locality = str_replace('*', '%', $locality);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::LOCALITY, $locality, $comparison);
	}

	/**
	 * Filter the query on the observations column
	 * 
	 * @param     string $observations The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByObservations($observations = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($observations)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $observations)) {
				$observations = str_replace('*', '%', $observations);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CompanyPeer::OBSERVATIONS, $observations, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(CompanyPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(CompanyPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CompanyPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(CompanyPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(CompanyPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CompanyPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related CompanyUser object
	 *
	 * @param     CompanyUser $companyUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByCompanyUser($companyUser, $comparison = null)
	{
		return $this
			->addUsingAlias(CompanyPeer::ID, $companyUser->getCompanyId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the CompanyUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function joinCompanyUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CompanyUser');
		
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
			$this->addJoinObject($join, 'CompanyUser');
		}
		
		return $this;
	}

	/**
	 * Use the CompanyUser relation CompanyUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyUserQuery A secondary query class using the current class as primary query
	 */
	public function useCompanyUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCompanyUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CompanyUser', 'CompanyUserQuery');
	}

	/**
	 * Filter the query by a related Vessel object
	 *
	 * @param     Vessel $vessel  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByVessel($vessel, $comparison = null)
	{
		return $this
			->addUsingAlias(CompanyPeer::ID, $vessel->getCompanyId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Vessel relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function joinVessel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useVesselQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinVessel($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Vessel', 'VesselQuery');
	}

	/**
	 * Filter the query by a related Guide object
	 *
	 * @param     Guide $guide  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByGuide($guide, $comparison = null)
	{
		return $this
			->addUsingAlias(CompanyPeer::ID, $guide->getCompanyId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Guide relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function joinGuide($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useGuideQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinGuide($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Guide', 'GuideQuery');
	}

	/**
	 * Filter the query by a related Skipper object
	 *
	 * @param     Skipper $skipper  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterBySkipper($skipper, $comparison = null)
	{
		return $this
			->addUsingAlias(CompanyPeer::ID, $skipper->getCompanyId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Skipper relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function joinSkipper($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useSkipperQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSkipper($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Skipper', 'SkipperQuery');
	}

	/**
	 * Filter the query by a related GeneralInfo object
	 *
	 * @param     GeneralInfo $generalInfo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByGeneralInfo($generalInfo, $comparison = null)
	{
		return $this
			->addUsingAlias(CompanyPeer::ID, $generalInfo->getCompanyId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the GeneralInfo relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function joinGeneralInfo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('GeneralInfo');
		
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
			$this->addJoinObject($join, 'GeneralInfo');
		}
		
		return $this;
	}

	/**
	 * Use the GeneralInfo relation GeneralInfo object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GeneralInfoQuery A secondary query class using the current class as primary query
	 */
	public function useGeneralInfoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinGeneralInfo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'GeneralInfo', 'GeneralInfoQuery');
	}

	/**
	 * Filter the query by a related WatchInfo object
	 *
	 * @param     WatchInfo $watchInfo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByWatchInfo($watchInfo, $comparison = null)
	{
		return $this
			->addUsingAlias(CompanyPeer::ID, $watchInfo->getCompanyId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WatchInfo relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function joinWatchInfo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WatchInfo');
		
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
			$this->addJoinObject($join, 'WatchInfo');
		}
		
		return $this;
	}

	/**
	 * Use the WatchInfo relation WatchInfo object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchInfoQuery A secondary query class using the current class as primary query
	 */
	public function useWatchInfoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinWatchInfo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WatchInfo', 'WatchInfoQuery');
	}

	/**
	 * Filter the query by a related Watchman object
	 *
	 * @param     Watchman $watchman  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByWatchman($watchman, $comparison = null)
	{
		return $this
			->addUsingAlias(CompanyPeer::ID, $watchman->getCompanyId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Watchman relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function joinWatchman($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Watchman');
		
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
			$this->addJoinObject($join, 'Watchman');
		}
		
		return $this;
	}

	/**
	 * Use the Watchman relation Watchman object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchmanQuery A secondary query class using the current class as primary query
	 */
	public function useWatchmanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinWatchman($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Watchman', 'WatchmanQuery');
	}

	/**
	 * Filter the query by a related WatchPost object
	 *
	 * @param     WatchPost $watchPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByWatchPost($watchPost, $comparison = null)
	{
		return $this
			->addUsingAlias(CompanyPeer::ID, $watchPost->getCompanyId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WatchPost relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function joinWatchPost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WatchPost');
		
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
			$this->addJoinObject($join, 'WatchPost');
		}
		
		return $this;
	}

	/**
	 * Use the WatchPost relation WatchPost object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WatchPostQuery A secondary query class using the current class as primary query
	 */
	public function useWatchPostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinWatchPost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WatchPost', 'WatchPostQuery');
	}

	/**
	 * Filter the query by a related ChartIframeInformation object
	 *
	 * @param     ChartIframeInformation $chartIframeInformation  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByChartIframeInformation($chartIframeInformation, $comparison = null)
	{
		return $this
			->addUsingAlias(CompanyPeer::ID, $chartIframeInformation->getCompanyId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ChartIframeInformation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function joinChartIframeInformation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ChartIframeInformation');
		
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
			$this->addJoinObject($join, 'ChartIframeInformation');
		}
		
		return $this;
	}

	/**
	 * Use the ChartIframeInformation relation ChartIframeInformation object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ChartIframeInformationQuery A secondary query class using the current class as primary query
	 */
	public function useChartIframeInformationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinChartIframeInformation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ChartIframeInformation', 'ChartIframeInformationQuery');
	}

	/**
	 * Filter the query by a related MapIframeInformation object
	 *
	 * @param     MapIframeInformation $mapIframeInformation  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByMapIframeInformation($mapIframeInformation, $comparison = null)
	{
		return $this
			->addUsingAlias(CompanyPeer::ID, $mapIframeInformation->getCompanyId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the MapIframeInformation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function joinMapIframeInformation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MapIframeInformation');
		
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
			$this->addJoinObject($join, 'MapIframeInformation');
		}
		
		return $this;
	}

	/**
	 * Use the MapIframeInformation relation MapIframeInformation object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MapIframeInformationQuery A secondary query class using the current class as primary query
	 */
	public function useMapIframeInformationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMapIframeInformation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MapIframeInformation', 'MapIframeInformationQuery');
	}

	/**
	 * Filter the query by a related ObservationPhoto object
	 *
	 * @param     ObservationPhoto $observationPhoto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function filterByObservationPhoto($observationPhoto, $comparison = null)
	{
		return $this
			->addUsingAlias(CompanyPeer::ID, $observationPhoto->getCompanyId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhoto relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function joinObservationPhoto($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhoto');
		
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
			$this->addJoinObject($join, 'ObservationPhoto');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhoto relation ObservationPhoto object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinObservationPhoto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhoto', 'ObservationPhotoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Company $company Object to remove from the list of results
	 *
	 * @return    CompanyQuery The current query, for fluid interface
	 */
	public function prune($company = null)
	{
		if ($company) {
			$this->addUsingAlias(CompanyPeer::ID, $company->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseCompanyQuery
