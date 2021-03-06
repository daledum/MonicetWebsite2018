<?php


/**
 * Base class that represents a query for the 'observation_photo' table.
 *
 * 
 *
 * @method     ObservationPhotoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ObservationPhotoQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ObservationPhotoQuery orderByFileName($order = Criteria::ASC) Order by the file_name column
 * @method     ObservationPhotoQuery orderByPhotoDate($order = Criteria::ASC) Order by the photo_date column
 * @method     ObservationPhotoQuery orderByPhotoTime($order = Criteria::ASC) Order by the photo_time column
 * @method     ObservationPhotoQuery orderByIndividualId($order = Criteria::ASC) Order by the individual_id column
 * @method     ObservationPhotoQuery orderBySpecieId($order = Criteria::ASC) Order by the specie_id column
 * @method     ObservationPhotoQuery orderByIsland($order = Criteria::ASC) Order by the island column
 * @method     ObservationPhotoQuery orderByBodyPartId($order = Criteria::ASC) Order by the body_part_id column
 * @method     ObservationPhotoQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method     ObservationPhotoQuery orderByAgeGroup($order = Criteria::ASC) Order by the age_group column
 * @method     ObservationPhotoQuery orderByBehaviourId($order = Criteria::ASC) Order by the behaviour_id column
 * @method     ObservationPhotoQuery orderByLatitude($order = Criteria::ASC) Order by the latitude column
 * @method     ObservationPhotoQuery orderByLongitude($order = Criteria::ASC) Order by the longitude column
 * @method     ObservationPhotoQuery orderByCompanyId($order = Criteria::ASC) Order by the company_id column
 * @method     ObservationPhotoQuery orderByVesselId($order = Criteria::ASC) Order by the vessel_id column
 * @method     ObservationPhotoQuery orderByPhotographerId($order = Criteria::ASC) Order by the photographer_id column
 * @method     ObservationPhotoQuery orderByKindOfPhoto($order = Criteria::ASC) Order by the kind_of_photo column
 * @method     ObservationPhotoQuery orderByPhotoQuality($order = Criteria::ASC) Order by the photo_quality column
 * @method     ObservationPhotoQuery orderBySightingId($order = Criteria::ASC) Order by the sighting_id column
 * @method     ObservationPhotoQuery orderByIsBest($order = Criteria::ASC) Order by the is_best column
 * @method     ObservationPhotoQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method     ObservationPhotoQuery orderByUploadedAt($order = Criteria::ASC) Order by the uploaded_at column
 * @method     ObservationPhotoQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ObservationPhotoQuery orderByLastEditedBy($order = Criteria::ASC) Order by the last_edited_by column
 * @method     ObservationPhotoQuery orderByValidatedBy($order = Criteria::ASC) Order by the validated_by column
 * @method     ObservationPhotoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ObservationPhotoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ObservationPhotoQuery groupById() Group by the id column
 * @method     ObservationPhotoQuery groupByCode() Group by the code column
 * @method     ObservationPhotoQuery groupByFileName() Group by the file_name column
 * @method     ObservationPhotoQuery groupByPhotoDate() Group by the photo_date column
 * @method     ObservationPhotoQuery groupByPhotoTime() Group by the photo_time column
 * @method     ObservationPhotoQuery groupByIndividualId() Group by the individual_id column
 * @method     ObservationPhotoQuery groupBySpecieId() Group by the specie_id column
 * @method     ObservationPhotoQuery groupByIsland() Group by the island column
 * @method     ObservationPhotoQuery groupByBodyPartId() Group by the body_part_id column
 * @method     ObservationPhotoQuery groupByGender() Group by the gender column
 * @method     ObservationPhotoQuery groupByAgeGroup() Group by the age_group column
 * @method     ObservationPhotoQuery groupByBehaviourId() Group by the behaviour_id column
 * @method     ObservationPhotoQuery groupByLatitude() Group by the latitude column
 * @method     ObservationPhotoQuery groupByLongitude() Group by the longitude column
 * @method     ObservationPhotoQuery groupByCompanyId() Group by the company_id column
 * @method     ObservationPhotoQuery groupByVesselId() Group by the vessel_id column
 * @method     ObservationPhotoQuery groupByPhotographerId() Group by the photographer_id column
 * @method     ObservationPhotoQuery groupByKindOfPhoto() Group by the kind_of_photo column
 * @method     ObservationPhotoQuery groupByPhotoQuality() Group by the photo_quality column
 * @method     ObservationPhotoQuery groupBySightingId() Group by the sighting_id column
 * @method     ObservationPhotoQuery groupByIsBest() Group by the is_best column
 * @method     ObservationPhotoQuery groupByNotes() Group by the notes column
 * @method     ObservationPhotoQuery groupByUploadedAt() Group by the uploaded_at column
 * @method     ObservationPhotoQuery groupByStatus() Group by the status column
 * @method     ObservationPhotoQuery groupByLastEditedBy() Group by the last_edited_by column
 * @method     ObservationPhotoQuery groupByValidatedBy() Group by the validated_by column
 * @method     ObservationPhotoQuery groupByCreatedAt() Group by the created_at column
 * @method     ObservationPhotoQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ObservationPhotoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ObservationPhotoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ObservationPhotoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ObservationPhotoQuery leftJoinIndividual($relationAlias = null) Adds a LEFT JOIN clause to the query using the Individual relation
 * @method     ObservationPhotoQuery rightJoinIndividual($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Individual relation
 * @method     ObservationPhotoQuery innerJoinIndividual($relationAlias = null) Adds a INNER JOIN clause to the query using the Individual relation
 *
 * @method     ObservationPhotoQuery leftJoinSpecie($relationAlias = null) Adds a LEFT JOIN clause to the query using the Specie relation
 * @method     ObservationPhotoQuery rightJoinSpecie($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Specie relation
 * @method     ObservationPhotoQuery innerJoinSpecie($relationAlias = null) Adds a INNER JOIN clause to the query using the Specie relation
 *
 * @method     ObservationPhotoQuery leftJoinBodyPart($relationAlias = null) Adds a LEFT JOIN clause to the query using the BodyPart relation
 * @method     ObservationPhotoQuery rightJoinBodyPart($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BodyPart relation
 * @method     ObservationPhotoQuery innerJoinBodyPart($relationAlias = null) Adds a INNER JOIN clause to the query using the BodyPart relation
 *
 * @method     ObservationPhotoQuery leftJoinBehaviour($relationAlias = null) Adds a LEFT JOIN clause to the query using the Behaviour relation
 * @method     ObservationPhotoQuery rightJoinBehaviour($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Behaviour relation
 * @method     ObservationPhotoQuery innerJoinBehaviour($relationAlias = null) Adds a INNER JOIN clause to the query using the Behaviour relation
 *
 * @method     ObservationPhotoQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method     ObservationPhotoQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method     ObservationPhotoQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method     ObservationPhotoQuery leftJoinVessel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Vessel relation
 * @method     ObservationPhotoQuery rightJoinVessel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Vessel relation
 * @method     ObservationPhotoQuery innerJoinVessel($relationAlias = null) Adds a INNER JOIN clause to the query using the Vessel relation
 *
 * @method     ObservationPhotoQuery leftJoinPhotographer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Photographer relation
 * @method     ObservationPhotoQuery rightJoinPhotographer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Photographer relation
 * @method     ObservationPhotoQuery innerJoinPhotographer($relationAlias = null) Adds a INNER JOIN clause to the query using the Photographer relation
 *
 * @method     ObservationPhotoQuery leftJoinSighting($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sighting relation
 * @method     ObservationPhotoQuery rightJoinSighting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sighting relation
 * @method     ObservationPhotoQuery innerJoinSighting($relationAlias = null) Adds a INNER JOIN clause to the query using the Sighting relation
 *
 * @method     ObservationPhotoQuery leftJoinsfGuardUserRelatedByLastEditedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByLastEditedBy relation
 * @method     ObservationPhotoQuery rightJoinsfGuardUserRelatedByLastEditedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByLastEditedBy relation
 * @method     ObservationPhotoQuery innerJoinsfGuardUserRelatedByLastEditedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByLastEditedBy relation
 *
 * @method     ObservationPhotoQuery leftJoinsfGuardUserRelatedByValidatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByValidatedBy relation
 * @method     ObservationPhotoQuery rightJoinsfGuardUserRelatedByValidatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByValidatedBy relation
 * @method     ObservationPhotoQuery innerJoinsfGuardUserRelatedByValidatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByValidatedBy relation
 *
 * @method     ObservationPhotoQuery leftJoinObservationPhotoI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoI18n relation
 * @method     ObservationPhotoQuery rightJoinObservationPhotoI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoI18n relation
 * @method     ObservationPhotoQuery innerJoinObservationPhotoI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoI18n relation
 *
 * @method     ObservationPhotoQuery leftJoinObservationPhotoTail($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoTail relation
 * @method     ObservationPhotoQuery rightJoinObservationPhotoTail($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoTail relation
 * @method     ObservationPhotoQuery innerJoinObservationPhotoTail($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoTail relation
 *
 * @method     ObservationPhotoQuery leftJoinObservationPhotoDorsalLeft($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoDorsalLeft relation
 * @method     ObservationPhotoQuery rightJoinObservationPhotoDorsalLeft($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoDorsalLeft relation
 * @method     ObservationPhotoQuery innerJoinObservationPhotoDorsalLeft($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoDorsalLeft relation
 *
 * @method     ObservationPhotoQuery leftJoinObservationPhotoDorsalRight($relationAlias = null) Adds a LEFT JOIN clause to the query using the ObservationPhotoDorsalRight relation
 * @method     ObservationPhotoQuery rightJoinObservationPhotoDorsalRight($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ObservationPhotoDorsalRight relation
 * @method     ObservationPhotoQuery innerJoinObservationPhotoDorsalRight($relationAlias = null) Adds a INNER JOIN clause to the query using the ObservationPhotoDorsalRight relation
 *
 * @method     ObservationPhoto findOne(PropelPDO $con = null) Return the first ObservationPhoto matching the query
 * @method     ObservationPhoto findOneOrCreate(PropelPDO $con = null) Return the first ObservationPhoto matching the query, or a new ObservationPhoto object populated from the query conditions when no match is found
 *
 * @method     ObservationPhoto findOneById(int $id) Return the first ObservationPhoto filtered by the id column
 * @method     ObservationPhoto findOneByCode(string $code) Return the first ObservationPhoto filtered by the code column
 * @method     ObservationPhoto findOneByFileName(string $file_name) Return the first ObservationPhoto filtered by the file_name column
 * @method     ObservationPhoto findOneByPhotoDate(string $photo_date) Return the first ObservationPhoto filtered by the photo_date column
 * @method     ObservationPhoto findOneByPhotoTime(string $photo_time) Return the first ObservationPhoto filtered by the photo_time column
 * @method     ObservationPhoto findOneByIndividualId(int $individual_id) Return the first ObservationPhoto filtered by the individual_id column
 * @method     ObservationPhoto findOneBySpecieId(int $specie_id) Return the first ObservationPhoto filtered by the specie_id column
 * @method     ObservationPhoto findOneByIsland(string $island) Return the first ObservationPhoto filtered by the island column
 * @method     ObservationPhoto findOneByBodyPartId(int $body_part_id) Return the first ObservationPhoto filtered by the body_part_id column
 * @method     ObservationPhoto findOneByGender(string $gender) Return the first ObservationPhoto filtered by the gender column
 * @method     ObservationPhoto findOneByAgeGroup(string $age_group) Return the first ObservationPhoto filtered by the age_group column
 * @method     ObservationPhoto findOneByBehaviourId(int $behaviour_id) Return the first ObservationPhoto filtered by the behaviour_id column
 * @method     ObservationPhoto findOneByLatitude(string $latitude) Return the first ObservationPhoto filtered by the latitude column
 * @method     ObservationPhoto findOneByLongitude(string $longitude) Return the first ObservationPhoto filtered by the longitude column
 * @method     ObservationPhoto findOneByCompanyId(int $company_id) Return the first ObservationPhoto filtered by the company_id column
 * @method     ObservationPhoto findOneByVesselId(int $vessel_id) Return the first ObservationPhoto filtered by the vessel_id column
 * @method     ObservationPhoto findOneByPhotographerId(int $photographer_id) Return the first ObservationPhoto filtered by the photographer_id column
 * @method     ObservationPhoto findOneByKindOfPhoto(string $kind_of_photo) Return the first ObservationPhoto filtered by the kind_of_photo column
 * @method     ObservationPhoto findOneByPhotoQuality(string $photo_quality) Return the first ObservationPhoto filtered by the photo_quality column
 * @method     ObservationPhoto findOneBySightingId(int $sighting_id) Return the first ObservationPhoto filtered by the sighting_id column
 * @method     ObservationPhoto findOneByIsBest(boolean $is_best) Return the first ObservationPhoto filtered by the is_best column
 * @method     ObservationPhoto findOneByNotes(string $notes) Return the first ObservationPhoto filtered by the notes column
 * @method     ObservationPhoto findOneByUploadedAt(string $uploaded_at) Return the first ObservationPhoto filtered by the uploaded_at column
 * @method     ObservationPhoto findOneByStatus(string $status) Return the first ObservationPhoto filtered by the status column
 * @method     ObservationPhoto findOneByLastEditedBy(int $last_edited_by) Return the first ObservationPhoto filtered by the last_edited_by column
 * @method     ObservationPhoto findOneByValidatedBy(int $validated_by) Return the first ObservationPhoto filtered by the validated_by column
 * @method     ObservationPhoto findOneByCreatedAt(string $created_at) Return the first ObservationPhoto filtered by the created_at column
 * @method     ObservationPhoto findOneByUpdatedAt(string $updated_at) Return the first ObservationPhoto filtered by the updated_at column
 *
 * @method     array findById(int $id) Return ObservationPhoto objects filtered by the id column
 * @method     array findByCode(string $code) Return ObservationPhoto objects filtered by the code column
 * @method     array findByFileName(string $file_name) Return ObservationPhoto objects filtered by the file_name column
 * @method     array findByPhotoDate(string $photo_date) Return ObservationPhoto objects filtered by the photo_date column
 * @method     array findByPhotoTime(string $photo_time) Return ObservationPhoto objects filtered by the photo_time column
 * @method     array findByIndividualId(int $individual_id) Return ObservationPhoto objects filtered by the individual_id column
 * @method     array findBySpecieId(int $specie_id) Return ObservationPhoto objects filtered by the specie_id column
 * @method     array findByIsland(string $island) Return ObservationPhoto objects filtered by the island column
 * @method     array findByBodyPartId(int $body_part_id) Return ObservationPhoto objects filtered by the body_part_id column
 * @method     array findByGender(string $gender) Return ObservationPhoto objects filtered by the gender column
 * @method     array findByAgeGroup(string $age_group) Return ObservationPhoto objects filtered by the age_group column
 * @method     array findByBehaviourId(int $behaviour_id) Return ObservationPhoto objects filtered by the behaviour_id column
 * @method     array findByLatitude(string $latitude) Return ObservationPhoto objects filtered by the latitude column
 * @method     array findByLongitude(string $longitude) Return ObservationPhoto objects filtered by the longitude column
 * @method     array findByCompanyId(int $company_id) Return ObservationPhoto objects filtered by the company_id column
 * @method     array findByVesselId(int $vessel_id) Return ObservationPhoto objects filtered by the vessel_id column
 * @method     array findByPhotographerId(int $photographer_id) Return ObservationPhoto objects filtered by the photographer_id column
 * @method     array findByKindOfPhoto(string $kind_of_photo) Return ObservationPhoto objects filtered by the kind_of_photo column
 * @method     array findByPhotoQuality(string $photo_quality) Return ObservationPhoto objects filtered by the photo_quality column
 * @method     array findBySightingId(int $sighting_id) Return ObservationPhoto objects filtered by the sighting_id column
 * @method     array findByIsBest(boolean $is_best) Return ObservationPhoto objects filtered by the is_best column
 * @method     array findByNotes(string $notes) Return ObservationPhoto objects filtered by the notes column
 * @method     array findByUploadedAt(string $uploaded_at) Return ObservationPhoto objects filtered by the uploaded_at column
 * @method     array findByStatus(string $status) Return ObservationPhoto objects filtered by the status column
 * @method     array findByLastEditedBy(int $last_edited_by) Return ObservationPhoto objects filtered by the last_edited_by column
 * @method     array findByValidatedBy(int $validated_by) Return ObservationPhoto objects filtered by the validated_by column
 * @method     array findByCreatedAt(string $created_at) Return ObservationPhoto objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ObservationPhoto objects filtered by the updated_at column
 *
 * @package    propel.generator.plugins.photoRepoPlugin.lib.model.om
 */
abstract class BaseObservationPhotoQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseObservationPhotoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ObservationPhoto', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ObservationPhotoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ObservationPhotoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ObservationPhotoQuery) {
			return $criteria;
		}
		$query = new ObservationPhotoQuery();
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
	 * @return    ObservationPhoto|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ObservationPhotoPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ObservationPhotoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ObservationPhotoPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ObservationPhotoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the code column
	 * 
	 * @param     string $code The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ObservationPhotoPeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query on the file_name column
	 * 
	 * @param     string $fileName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByFileName($fileName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fileName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fileName)) {
				$fileName = str_replace('*', '%', $fileName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::FILE_NAME, $fileName, $comparison);
	}

	/**
	 * Filter the query on the photo_date column
	 * 
	 * @param     string|array $photoDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByPhotoDate($photoDate = null, $comparison = null)
	{
		if (is_array($photoDate)) {
			$useMinMax = false;
			if (isset($photoDate['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::PHOTO_DATE, $photoDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($photoDate['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::PHOTO_DATE, $photoDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::PHOTO_DATE, $photoDate, $comparison);
	}

	/**
	 * Filter the query on the photo_time column
	 * 
	 * @param     string|array $photoTime The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByPhotoTime($photoTime = null, $comparison = null)
	{
		if (is_array($photoTime)) {
			$useMinMax = false;
			if (isset($photoTime['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::PHOTO_TIME, $photoTime['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($photoTime['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::PHOTO_TIME, $photoTime['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::PHOTO_TIME, $photoTime, $comparison);
	}

	/**
	 * Filter the query on the individual_id column
	 * 
	 * @param     int|array $individualId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByIndividualId($individualId = null, $comparison = null)
	{
		if (is_array($individualId)) {
			$useMinMax = false;
			if (isset($individualId['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::INDIVIDUAL_ID, $individualId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($individualId['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::INDIVIDUAL_ID, $individualId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::INDIVIDUAL_ID, $individualId, $comparison);
	}

	/**
	 * Filter the query on the specie_id column
	 * 
	 * @param     int|array $specieId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterBySpecieId($specieId = null, $comparison = null)
	{
		if (is_array($specieId)) {
			$useMinMax = false;
			if (isset($specieId['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::SPECIE_ID, $specieId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($specieId['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::SPECIE_ID, $specieId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::SPECIE_ID, $specieId, $comparison);
	}

	/**
	 * Filter the query on the island column
	 * 
	 * @param     string $island The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByIsland($island = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($island)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $island)) {
				$island = str_replace('*', '%', $island);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::ISLAND, $island, $comparison);
	}

	/**
	 * Filter the query on the body_part_id column
	 * 
	 * @param     int|array $bodyPartId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByBodyPartId($bodyPartId = null, $comparison = null)
	{
		if (is_array($bodyPartId)) {
			$useMinMax = false;
			if (isset($bodyPartId['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::BODY_PART_ID, $bodyPartId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($bodyPartId['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::BODY_PART_ID, $bodyPartId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::BODY_PART_ID, $bodyPartId, $comparison);
	}

	/**
	 * Filter the query on the gender column
	 * 
	 * @param     string $gender The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByGender($gender = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($gender)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $gender)) {
				$gender = str_replace('*', '%', $gender);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::GENDER, $gender, $comparison);
	}

	/**
	 * Filter the query on the age_group column
	 * 
	 * @param     string $ageGroup The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByAgeGroup($ageGroup = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ageGroup)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ageGroup)) {
				$ageGroup = str_replace('*', '%', $ageGroup);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::AGE_GROUP, $ageGroup, $comparison);
	}

	/**
	 * Filter the query on the behaviour_id column
	 * 
	 * @param     int|array $behaviourId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByBehaviourId($behaviourId = null, $comparison = null)
	{
		if (is_array($behaviourId)) {
			$useMinMax = false;
			if (isset($behaviourId['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::BEHAVIOUR_ID, $behaviourId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($behaviourId['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::BEHAVIOUR_ID, $behaviourId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::BEHAVIOUR_ID, $behaviourId, $comparison);
	}

	/**
	 * Filter the query on the latitude column
	 * 
	 * @param     string $latitude The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByLatitude($latitude = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($latitude)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $latitude)) {
				$latitude = str_replace('*', '%', $latitude);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::LATITUDE, $latitude, $comparison);
	}

	/**
	 * Filter the query on the longitude column
	 * 
	 * @param     string $longitude The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByLongitude($longitude = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($longitude)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $longitude)) {
				$longitude = str_replace('*', '%', $longitude);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::LONGITUDE, $longitude, $comparison);
	}

	/**
	 * Filter the query on the company_id column
	 * 
	 * @param     int|array $companyId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByCompanyId($companyId = null, $comparison = null)
	{
		if (is_array($companyId)) {
			$useMinMax = false;
			if (isset($companyId['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::COMPANY_ID, $companyId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($companyId['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::COMPANY_ID, $companyId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::COMPANY_ID, $companyId, $comparison);
	}

	/**
	 * Filter the query on the vessel_id column
	 * 
	 * @param     int|array $vesselId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByVesselId($vesselId = null, $comparison = null)
	{
		if (is_array($vesselId)) {
			$useMinMax = false;
			if (isset($vesselId['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::VESSEL_ID, $vesselId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($vesselId['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::VESSEL_ID, $vesselId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::VESSEL_ID, $vesselId, $comparison);
	}

	/**
	 * Filter the query on the photographer_id column
	 * 
	 * @param     int|array $photographerId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByPhotographerId($photographerId = null, $comparison = null)
	{
		if (is_array($photographerId)) {
			$useMinMax = false;
			if (isset($photographerId['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::PHOTOGRAPHER_ID, $photographerId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($photographerId['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::PHOTOGRAPHER_ID, $photographerId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::PHOTOGRAPHER_ID, $photographerId, $comparison);
	}

	/**
	 * Filter the query on the kind_of_photo column
	 * 
	 * @param     string $kindOfPhoto The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByKindOfPhoto($kindOfPhoto = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($kindOfPhoto)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $kindOfPhoto)) {
				$kindOfPhoto = str_replace('*', '%', $kindOfPhoto);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::KIND_OF_PHOTO, $kindOfPhoto, $comparison);
	}

	/**
	 * Filter the query on the photo_quality column
	 * 
	 * @param     string $photoQuality The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByPhotoQuality($photoQuality = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($photoQuality)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $photoQuality)) {
				$photoQuality = str_replace('*', '%', $photoQuality);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::PHOTO_QUALITY, $photoQuality, $comparison);
	}

	/**
	 * Filter the query on the sighting_id column
	 * 
	 * @param     int|array $sightingId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterBySightingId($sightingId = null, $comparison = null)
	{
		if (is_array($sightingId)) {
			$useMinMax = false;
			if (isset($sightingId['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::SIGHTING_ID, $sightingId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($sightingId['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::SIGHTING_ID, $sightingId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::SIGHTING_ID, $sightingId, $comparison);
	}

	/**
	 * Filter the query on the is_best column
	 * 
	 * @param     boolean|string $isBest The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByIsBest($isBest = null, $comparison = null)
	{
		if (is_string($isBest)) {
			$is_best = in_array(strtolower($isBest), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ObservationPhotoPeer::IS_BEST, $isBest, $comparison);
	}

	/**
	 * Filter the query on the notes column
	 * 
	 * @param     string $notes The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByNotes($notes = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($notes)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $notes)) {
				$notes = str_replace('*', '%', $notes);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::NOTES, $notes, $comparison);
	}

	/**
	 * Filter the query on the uploaded_at column
	 * 
	 * @param     string|array $uploadedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByUploadedAt($uploadedAt = null, $comparison = null)
	{
		if (is_array($uploadedAt)) {
			$useMinMax = false;
			if (isset($uploadedAt['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::UPLOADED_AT, $uploadedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($uploadedAt['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::UPLOADED_AT, $uploadedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::UPLOADED_AT, $uploadedAt, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($status)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $status)) {
				$status = str_replace('*', '%', $status);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the last_edited_by column
	 * 
	 * @param     int|array $lastEditedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByLastEditedBy($lastEditedBy = null, $comparison = null)
	{
		if (is_array($lastEditedBy)) {
			$useMinMax = false;
			if (isset($lastEditedBy['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::LAST_EDITED_BY, $lastEditedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastEditedBy['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::LAST_EDITED_BY, $lastEditedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::LAST_EDITED_BY, $lastEditedBy, $comparison);
	}

	/**
	 * Filter the query on the validated_by column
	 * 
	 * @param     int|array $validatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByValidatedBy($validatedBy = null, $comparison = null)
	{
		if (is_array($validatedBy)) {
			$useMinMax = false;
			if (isset($validatedBy['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::VALIDATED_BY, $validatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($validatedBy['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::VALIDATED_BY, $validatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::VALIDATED_BY, $validatedBy, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(ObservationPhotoPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(ObservationPhotoPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ObservationPhotoPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Individual object
	 *
	 * @param     Individual $individual  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByIndividual($individual, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::INDIVIDUAL_ID, $individual->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Individual relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinIndividual($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Individual');
		
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
			$this->addJoinObject($join, 'Individual');
		}
		
		return $this;
	}

	/**
	 * Use the Individual relation Individual object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IndividualQuery A secondary query class using the current class as primary query
	 */
	public function useIndividualQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinIndividual($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Individual', 'IndividualQuery');
	}

	/**
	 * Filter the query by a related Specie object
	 *
	 * @param     Specie $specie  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterBySpecie($specie, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::SPECIE_ID, $specie->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Specie relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinSpecie($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Specie');
		
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
			$this->addJoinObject($join, 'Specie');
		}
		
		return $this;
	}

	/**
	 * Use the Specie relation Specie object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SpecieQuery A secondary query class using the current class as primary query
	 */
	public function useSpecieQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSpecie($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Specie', 'SpecieQuery');
	}

	/**
	 * Filter the query by a related BodyPart object
	 *
	 * @param     BodyPart $bodyPart  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByBodyPart($bodyPart, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::BODY_PART_ID, $bodyPart->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the BodyPart relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinBodyPart($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('BodyPart');
		
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
			$this->addJoinObject($join, 'BodyPart');
		}
		
		return $this;
	}

	/**
	 * Use the BodyPart relation BodyPart object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BodyPartQuery A secondary query class using the current class as primary query
	 */
	public function useBodyPartQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinBodyPart($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'BodyPart', 'BodyPartQuery');
	}

	/**
	 * Filter the query by a related Behaviour object
	 *
	 * @param     Behaviour $behaviour  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByBehaviour($behaviour, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::BEHAVIOUR_ID, $behaviour->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Behaviour relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinBehaviour($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Behaviour');
		
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
			$this->addJoinObject($join, 'Behaviour');
		}
		
		return $this;
	}

	/**
	 * Use the Behaviour relation Behaviour object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BehaviourQuery A secondary query class using the current class as primary query
	 */
	public function useBehaviourQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinBehaviour($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Behaviour', 'BehaviourQuery');
	}

	/**
	 * Filter the query by a related Company object
	 *
	 * @param     Company $company  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByCompany($company, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::COMPANY_ID, $company->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Company relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinCompany($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useCompanyQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCompany($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Company', 'CompanyQuery');
	}

	/**
	 * Filter the query by a related Vessel object
	 *
	 * @param     Vessel $vessel  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByVessel($vessel, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::VESSEL_ID, $vessel->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Vessel relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
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
	 * Filter the query by a related Photographer object
	 *
	 * @param     Photographer $photographer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByPhotographer($photographer, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::PHOTOGRAPHER_ID, $photographer->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Photographer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinPhotographer($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Photographer');
		
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
			$this->addJoinObject($join, 'Photographer');
		}
		
		return $this;
	}

	/**
	 * Use the Photographer relation Photographer object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PhotographerQuery A secondary query class using the current class as primary query
	 */
	public function usePhotographerQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPhotographer($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Photographer', 'PhotographerQuery');
	}

	/**
	 * Filter the query by a related Sighting object
	 *
	 * @param     Sighting $sighting  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterBySighting($sighting, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::SIGHTING_ID, $sighting->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Sighting relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinSighting($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Sighting');
		
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
			$this->addJoinObject($join, 'Sighting');
		}
		
		return $this;
	}

	/**
	 * Use the Sighting relation Sighting object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SightingQuery A secondary query class using the current class as primary query
	 */
	public function useSightingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSighting($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Sighting', 'SightingQuery');
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUserRelatedByLastEditedBy($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::LAST_EDITED_BY, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfGuardUserRelatedByLastEditedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinsfGuardUserRelatedByLastEditedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfGuardUserRelatedByLastEditedBy');
		
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
			$this->addJoinObject($join, 'sfGuardUserRelatedByLastEditedBy');
		}
		
		return $this;
	}

	/**
	 * Use the sfGuardUserRelatedByLastEditedBy relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserRelatedByLastEditedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinsfGuardUserRelatedByLastEditedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedByLastEditedBy', 'sfGuardUserQuery');
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUserRelatedByValidatedBy($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::VALIDATED_BY, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfGuardUserRelatedByValidatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinsfGuardUserRelatedByValidatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfGuardUserRelatedByValidatedBy');
		
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
			$this->addJoinObject($join, 'sfGuardUserRelatedByValidatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the sfGuardUserRelatedByValidatedBy relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserRelatedByValidatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinsfGuardUserRelatedByValidatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedByValidatedBy', 'sfGuardUserQuery');
	}

	/**
	 * Filter the query by a related ObservationPhotoI18n object
	 *
	 * @param     ObservationPhotoI18n $observationPhotoI18n  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoI18n($observationPhotoI18n, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::ID, $observationPhotoI18n->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoI18n relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoI18n($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoI18n');
		
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
			$this->addJoinObject($join, 'ObservationPhotoI18n');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoI18n relation ObservationPhotoI18n object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoI18nQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoI18nQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoI18n($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoI18n', 'ObservationPhotoI18nQuery');
	}

	/**
	 * Filter the query by a related ObservationPhotoTail object
	 *
	 * @param     ObservationPhotoTail $observationPhotoTail  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoTail($observationPhotoTail, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::ID, $observationPhotoTail->getPhotoId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoTail relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoTail($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoTail');
		
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
			$this->addJoinObject($join, 'ObservationPhotoTail');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoTail relation ObservationPhotoTail object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoTailQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoTailQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoTail($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoTail', 'ObservationPhotoTailQuery');
	}

	/**
	 * Filter the query by a related ObservationPhotoDorsalLeft object
	 *
	 * @param     ObservationPhotoDorsalLeft $observationPhotoDorsalLeft  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalLeft($observationPhotoDorsalLeft, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::ID, $observationPhotoDorsalLeft->getPhotoId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoDorsalLeft relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoDorsalLeft($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoDorsalLeft');
		
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
			$this->addJoinObject($join, 'ObservationPhotoDorsalLeft');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoDorsalLeft relation ObservationPhotoDorsalLeft object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalLeftQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoDorsalLeftQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoDorsalLeft($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoDorsalLeft', 'ObservationPhotoDorsalLeftQuery');
	}

	/**
	 * Filter the query by a related ObservationPhotoDorsalRight object
	 *
	 * @param     ObservationPhotoDorsalRight $observationPhotoDorsalRight  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function filterByObservationPhotoDorsalRight($observationPhotoDorsalRight, $comparison = null)
	{
		return $this
			->addUsingAlias(ObservationPhotoPeer::ID, $observationPhotoDorsalRight->getPhotoId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ObservationPhotoDorsalRight relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function joinObservationPhotoDorsalRight($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ObservationPhotoDorsalRight');
		
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
			$this->addJoinObject($join, 'ObservationPhotoDorsalRight');
		}
		
		return $this;
	}

	/**
	 * Use the ObservationPhotoDorsalRight relation ObservationPhotoDorsalRight object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ObservationPhotoDorsalRightQuery A secondary query class using the current class as primary query
	 */
	public function useObservationPhotoDorsalRightQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinObservationPhotoDorsalRight($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ObservationPhotoDorsalRight', 'ObservationPhotoDorsalRightQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ObservationPhoto $observationPhoto Object to remove from the list of results
	 *
	 * @return    ObservationPhotoQuery The current query, for fluid interface
	 */
	public function prune($observationPhoto = null)
	{
		if ($observationPhoto) {
			$this->addUsingAlias(ObservationPhotoPeer::ID, $observationPhoto->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseObservationPhotoQuery
