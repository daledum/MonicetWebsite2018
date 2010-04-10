<?php


/**
 * Base class that represents a query for the 'user' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Sat Apr 10 09:39:40 2010
 *
 * @method     UserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UserQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     UserQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     UserQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     UserQuery orderByBirthday($order = Criteria::ASC) Order by the birthday column
 * @method     UserQuery orderByBi($order = Criteria::ASC) Order by the bi column
 * @method     UserQuery orderByNif($order = Criteria::ASC) Order by the nif column
 * @method     UserQuery orderByCountry($order = Criteria::ASC) Order by the country column
 * @method     UserQuery orderByIsland($order = Criteria::ASC) Order by the island column
 * @method     UserQuery orderByCounty($order = Criteria::ASC) Order by the county column
 * @method     UserQuery orderByLocality($order = Criteria::ASC) Order by the locality column
 * @method     UserQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     UserQuery orderByZipcode($order = Criteria::ASC) Order by the zipcode column
 * @method     UserQuery orderByTelephone($order = Criteria::ASC) Order by the telephone column
 * @method     UserQuery orderByMobile($order = Criteria::ASC) Order by the mobile column
 * @method     UserQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     UserQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     UserQuery orderByLang($order = Criteria::ASC) Order by the lang column
 * @method     UserQuery orderByPhoto($order = Criteria::ASC) Order by the photo column
 * @method     UserQuery orderBySituation($order = Criteria::ASC) Order by the situation column
 * @method     UserQuery orderByObservations($order = Criteria::ASC) Order by the observations column
 * @method     UserQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     UserQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     UserQuery groupById() Group by the id column
 * @method     UserQuery groupByUserId() Group by the user_id column
 * @method     UserQuery groupByName() Group by the name column
 * @method     UserQuery groupByLastname() Group by the lastname column
 * @method     UserQuery groupByBirthday() Group by the birthday column
 * @method     UserQuery groupByBi() Group by the bi column
 * @method     UserQuery groupByNif() Group by the nif column
 * @method     UserQuery groupByCountry() Group by the country column
 * @method     UserQuery groupByIsland() Group by the island column
 * @method     UserQuery groupByCounty() Group by the county column
 * @method     UserQuery groupByLocality() Group by the locality column
 * @method     UserQuery groupByAddress() Group by the address column
 * @method     UserQuery groupByZipcode() Group by the zipcode column
 * @method     UserQuery groupByTelephone() Group by the telephone column
 * @method     UserQuery groupByMobile() Group by the mobile column
 * @method     UserQuery groupByEmail() Group by the email column
 * @method     UserQuery groupByUrl() Group by the url column
 * @method     UserQuery groupByLang() Group by the lang column
 * @method     UserQuery groupByPhoto() Group by the photo column
 * @method     UserQuery groupBySituation() Group by the situation column
 * @method     UserQuery groupByObservations() Group by the observations column
 * @method     UserQuery groupByCreatedAt() Group by the created_at column
 * @method     UserQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     User findOne(PropelPDO $con = null) Return the first User matching the query
 * @method     User findOneById(int $id) Return the first User filtered by the id column
 * @method     User findOneByUserId(int $user_id) Return the first User filtered by the user_id column
 * @method     User findOneByName(string $name) Return the first User filtered by the name column
 * @method     User findOneByLastname(string $lastname) Return the first User filtered by the lastname column
 * @method     User findOneByBirthday(string $birthday) Return the first User filtered by the birthday column
 * @method     User findOneByBi(string $bi) Return the first User filtered by the bi column
 * @method     User findOneByNif(string $nif) Return the first User filtered by the nif column
 * @method     User findOneByCountry(string $country) Return the first User filtered by the country column
 * @method     User findOneByIsland(string $island) Return the first User filtered by the island column
 * @method     User findOneByCounty(string $county) Return the first User filtered by the county column
 * @method     User findOneByLocality(string $locality) Return the first User filtered by the locality column
 * @method     User findOneByAddress(string $address) Return the first User filtered by the address column
 * @method     User findOneByZipcode(string $zipcode) Return the first User filtered by the zipcode column
 * @method     User findOneByTelephone(string $telephone) Return the first User filtered by the telephone column
 * @method     User findOneByMobile(string $mobile) Return the first User filtered by the mobile column
 * @method     User findOneByEmail(string $email) Return the first User filtered by the email column
 * @method     User findOneByUrl(string $url) Return the first User filtered by the url column
 * @method     User findOneByLang(string $lang) Return the first User filtered by the lang column
 * @method     User findOneByPhoto(string $photo) Return the first User filtered by the photo column
 * @method     User findOneBySituation(string $situation) Return the first User filtered by the situation column
 * @method     User findOneByObservations(string $observations) Return the first User filtered by the observations column
 * @method     User findOneByCreatedAt(string $created_at) Return the first User filtered by the created_at column
 * @method     User findOneByUpdatedAt(string $updated_at) Return the first User filtered by the updated_at column
 *
 * @method     array findById(int $id) Return User objects filtered by the id column
 * @method     array findByUserId(int $user_id) Return User objects filtered by the user_id column
 * @method     array findByName(string $name) Return User objects filtered by the name column
 * @method     array findByLastname(string $lastname) Return User objects filtered by the lastname column
 * @method     array findByBirthday(string $birthday) Return User objects filtered by the birthday column
 * @method     array findByBi(string $bi) Return User objects filtered by the bi column
 * @method     array findByNif(string $nif) Return User objects filtered by the nif column
 * @method     array findByCountry(string $country) Return User objects filtered by the country column
 * @method     array findByIsland(string $island) Return User objects filtered by the island column
 * @method     array findByCounty(string $county) Return User objects filtered by the county column
 * @method     array findByLocality(string $locality) Return User objects filtered by the locality column
 * @method     array findByAddress(string $address) Return User objects filtered by the address column
 * @method     array findByZipcode(string $zipcode) Return User objects filtered by the zipcode column
 * @method     array findByTelephone(string $telephone) Return User objects filtered by the telephone column
 * @method     array findByMobile(string $mobile) Return User objects filtered by the mobile column
 * @method     array findByEmail(string $email) Return User objects filtered by the email column
 * @method     array findByUrl(string $url) Return User objects filtered by the url column
 * @method     array findByLang(string $lang) Return User objects filtered by the lang column
 * @method     array findByPhoto(string $photo) Return User objects filtered by the photo column
 * @method     array findBySituation(string $situation) Return User objects filtered by the situation column
 * @method     array findByObservations(string $observations) Return User objects filtered by the observations column
 * @method     array findByCreatedAt(string $created_at) Return User objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return User objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseUserQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'User', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = UserPeer::getInstanceFromPool((string) $key)))) {
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
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UserPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UserPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(UserPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(UserPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the user_id column
	 * 
	 * @param     int|array $user_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null)
	{
		if (is_array($userId)) {
			if (array_values($userId) === $userId) {
				return $this->addUsingAlias(UserPeer::USER_ID, $userId, Criteria::IN);
			} else {
				if (isset($userId['min'])) {
					$this->addUsingAlias(UserPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($userId['max'])) {
					$this->addUsingAlias(UserPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(UserPeer::USER_ID, $userId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByName($name = null)
	{
		if(preg_match('/[\%\*]/', $name)) {
			return $this->addUsingAlias(UserPeer::NAME, str_replace('*', '%', $name), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::NAME, $name, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the lastname column
	 * 
	 * @param     string $lastname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByLastname($lastname = null)
	{
		if(preg_match('/[\%\*]/', $lastname)) {
			return $this->addUsingAlias(UserPeer::LASTNAME, str_replace('*', '%', $lastname), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::LASTNAME, $lastname, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the birthday column
	 * 
	 * @param     string|array $birthday The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByBirthday($birthday = null)
	{
		if (is_array($birthday)) {
			if (array_values($birthday) === $birthday) {
				return $this->addUsingAlias(UserPeer::BIRTHDAY, $birthday, Criteria::IN);
			} else {
				if (isset($birthday['min'])) {
					$this->addUsingAlias(UserPeer::BIRTHDAY, $birthday['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($birthday['max'])) {
					$this->addUsingAlias(UserPeer::BIRTHDAY, $birthday['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(UserPeer::BIRTHDAY, $birthday, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the bi column
	 * 
	 * @param     string $bi The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByBi($bi = null)
	{
		if(preg_match('/[\%\*]/', $bi)) {
			return $this->addUsingAlias(UserPeer::BI, str_replace('*', '%', $bi), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::BI, $bi, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the nif column
	 * 
	 * @param     string $nif The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByNif($nif = null)
	{
		if(preg_match('/[\%\*]/', $nif)) {
			return $this->addUsingAlias(UserPeer::NIF, str_replace('*', '%', $nif), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::NIF, $nif, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the country column
	 * 
	 * @param     string $country The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByCountry($country = null)
	{
		if(preg_match('/[\%\*]/', $country)) {
			return $this->addUsingAlias(UserPeer::COUNTRY, str_replace('*', '%', $country), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::COUNTRY, $country, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the island column
	 * 
	 * @param     string $island The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByIsland($island = null)
	{
		if(preg_match('/[\%\*]/', $island)) {
			return $this->addUsingAlias(UserPeer::ISLAND, str_replace('*', '%', $island), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::ISLAND, $island, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the county column
	 * 
	 * @param     string $county The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByCounty($county = null)
	{
		if(preg_match('/[\%\*]/', $county)) {
			return $this->addUsingAlias(UserPeer::COUNTY, str_replace('*', '%', $county), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::COUNTY, $county, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the locality column
	 * 
	 * @param     string $locality The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByLocality($locality = null)
	{
		if(preg_match('/[\%\*]/', $locality)) {
			return $this->addUsingAlias(UserPeer::LOCALITY, str_replace('*', '%', $locality), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::LOCALITY, $locality, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the address column
	 * 
	 * @param     string $address The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByAddress($address = null)
	{
		if(preg_match('/[\%\*]/', $address)) {
			return $this->addUsingAlias(UserPeer::ADDRESS, str_replace('*', '%', $address), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::ADDRESS, $address, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the zipcode column
	 * 
	 * @param     string $zipcode The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByZipcode($zipcode = null)
	{
		if(preg_match('/[\%\*]/', $zipcode)) {
			return $this->addUsingAlias(UserPeer::ZIPCODE, str_replace('*', '%', $zipcode), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::ZIPCODE, $zipcode, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the telephone column
	 * 
	 * @param     string $telephone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByTelephone($telephone = null)
	{
		if(preg_match('/[\%\*]/', $telephone)) {
			return $this->addUsingAlias(UserPeer::TELEPHONE, str_replace('*', '%', $telephone), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::TELEPHONE, $telephone, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the mobile column
	 * 
	 * @param     string $mobile The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByMobile($mobile = null)
	{
		if(preg_match('/[\%\*]/', $mobile)) {
			return $this->addUsingAlias(UserPeer::MOBILE, str_replace('*', '%', $mobile), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::MOBILE, $mobile, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null)
	{
		if(preg_match('/[\%\*]/', $email)) {
			return $this->addUsingAlias(UserPeer::EMAIL, str_replace('*', '%', $email), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::EMAIL, $email, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the url column
	 * 
	 * @param     string $url The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUrl($url = null)
	{
		if(preg_match('/[\%\*]/', $url)) {
			return $this->addUsingAlias(UserPeer::URL, str_replace('*', '%', $url), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::URL, $url, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the lang column
	 * 
	 * @param     string $lang The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByLang($lang = null)
	{
		if(preg_match('/[\%\*]/', $lang)) {
			return $this->addUsingAlias(UserPeer::LANG, str_replace('*', '%', $lang), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::LANG, $lang, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the photo column
	 * 
	 * @param     string $photo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPhoto($photo = null)
	{
		if(preg_match('/[\%\*]/', $photo)) {
			return $this->addUsingAlias(UserPeer::PHOTO, str_replace('*', '%', $photo), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::PHOTO, $photo, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the situation column
	 * 
	 * @param     string $situation The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBySituation($situation = null)
	{
		if(preg_match('/[\%\*]/', $situation)) {
			return $this->addUsingAlias(UserPeer::SITUATION, str_replace('*', '%', $situation), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::SITUATION, $situation, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the observations column
	 * 
	 * @param     string $observations The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByObservations($observations = null)
	{
		if(preg_match('/[\%\*]/', $observations)) {
			return $this->addUsingAlias(UserPeer::OBSERVATIONS, str_replace('*', '%', $observations), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(UserPeer::OBSERVATIONS, $observations, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(UserPeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(UserPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(UserPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(UserPeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updated_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null)
	{
		if (is_array($updatedAt)) {
			if (array_values($updatedAt) === $updatedAt) {
				return $this->addUsingAlias(UserPeer::UPDATED_AT, $updatedAt, Criteria::IN);
			} else {
				if (isset($updatedAt['min'])) {
					$this->addUsingAlias(UserPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($updatedAt['max'])) {
					$this->addUsingAlias(UserPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(UserPeer::UPDATED_AT, $updatedAt, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUser($sfGuardUser)
	{
		return $this
			->addUsingAlias(UserPeer::USER_ID, $sfGuardUser->getId(), Criteria::EQUAL);
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
	 * Exclude object from result
	 *
	 * @param     User $user Object to remove from the list of results
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function prune($user = null)
	{
		if ($user) {
			$this->addUsingAlias(UserPeer::ID, $user->getId(), Criteria::NOT_EQUAL);
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

} // BaseUserQuery
