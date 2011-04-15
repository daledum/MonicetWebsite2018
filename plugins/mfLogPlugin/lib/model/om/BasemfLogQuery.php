<?php


/**
 * Base class that represents a query for the 'mf_log' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Wed Apr 13 16:27:08 2011
 *
 * @method     mfLogQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     mfLogQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method     mfLogQuery orderByMensagem($order = Criteria::ASC) Order by the mensagem column
 * @method     mfLogQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     mfLogQuery groupById() Group by the id column
 * @method     mfLogQuery groupByTipo() Group by the tipo column
 * @method     mfLogQuery groupByMensagem() Group by the mensagem column
 * @method     mfLogQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     mfLog findOne(PropelPDO $con = null) Return the first mfLog matching the query
 * @method     mfLog findOneById(int $id) Return the first mfLog filtered by the id column
 * @method     mfLog findOneByTipo(string $tipo) Return the first mfLog filtered by the tipo column
 * @method     mfLog findOneByMensagem(string $mensagem) Return the first mfLog filtered by the mensagem column
 * @method     mfLog findOneByCreatedAt(string $created_at) Return the first mfLog filtered by the created_at column
 *
 * @method     array findById(int $id) Return mfLog objects filtered by the id column
 * @method     array findByTipo(string $tipo) Return mfLog objects filtered by the tipo column
 * @method     array findByMensagem(string $mensagem) Return mfLog objects filtered by the mensagem column
 * @method     array findByCreatedAt(string $created_at) Return mfLog objects filtered by the created_at column
 *
 * @package    propel.generator.plugins.mfLogPlugin.lib.model.om
 */
abstract class BasemfLogQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasemfLogQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'mfLog', $modelAlias = null)
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
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = mfLogPeer::getInstanceFromPool((string) $key)))) {
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
	 * @return    mfLogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(mfLogPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    mfLogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(mfLogPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    mfLogQuery The current query, for fluid interface
	 */
	public function filterById($id = null)
	{
		if (is_array($id)) {
			return $this->addUsingAlias(mfLogPeer::ID, $id, Criteria::IN);
		} else {
			return $this->addUsingAlias(mfLogPeer::ID, $id, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the tipo column
	 * 
	 * @param     string $tipo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    mfLogQuery The current query, for fluid interface
	 */
	public function filterByTipo($tipo = null)
	{
		if(preg_match('/[\%\*]/', $tipo)) {
			return $this->addUsingAlias(mfLogPeer::TIPO, str_replace('*', '%', $tipo), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(mfLogPeer::TIPO, $tipo, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the mensagem column
	 * 
	 * @param     string $mensagem The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 *
	 * @return    mfLogQuery The current query, for fluid interface
	 */
	public function filterByMensagem($mensagem = null)
	{
		if(preg_match('/[\%\*]/', $mensagem)) {
			return $this->addUsingAlias(mfLogPeer::MENSAGEM, str_replace('*', '%', $mensagem), Criteria::LIKE);
		} else {
			return $this->addUsingAlias(mfLogPeer::MENSAGEM, $mensagem, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $created_at The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    mfLogQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null)
	{
		if (is_array($createdAt)) {
			if (array_values($createdAt) === $createdAt) {
				return $this->addUsingAlias(mfLogPeer::CREATED_AT, $createdAt, Criteria::IN);
			} else {
				if (isset($createdAt['min'])) {
					$this->addUsingAlias(mfLogPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				}
				if (isset($createdAt['max'])) {
					$this->addUsingAlias(mfLogPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				}
				return $this;	
			}
		} else {
			return $this->addUsingAlias(mfLogPeer::CREATED_AT, $createdAt, Criteria::EQUAL);
		}
	}

	/**
	 * Exclude object from result
	 *
	 * @param     mfLog $mfLog Object to remove from the list of results
	 *
	 * @return    mfLogQuery The current query, for fluid interface
	 */
	public function prune($mfLog = null)
	{
		if ($mfLog) {
			$this->addUsingAlias(mfLogPeer::ID, $mfLog->getId(), Criteria::NOT_EQUAL);
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

} // BasemfLogQuery
