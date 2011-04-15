<?php


/**
 * Base class that represents a query for the 'mf_formulario_utilizador' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.0-dev on:
 *
 * Wed Apr 13 16:27:17 2011
 *
 * @method     mfFormularioUtilizadorQuery orderByFormularioId($order = Criteria::ASC) Order by the formulario_id column
 * @method     mfFormularioUtilizadorQuery orderByUtilizadorId($order = Criteria::ASC) Order by the utilizador_id column
 *
 * @method     mfFormularioUtilizadorQuery groupByFormularioId() Group by the formulario_id column
 * @method     mfFormularioUtilizadorQuery groupByUtilizadorId() Group by the utilizador_id column
 *
 * @method     mfFormularioUtilizador findOne(PropelPDO $con = null) Return the first mfFormularioUtilizador matching the query
 * @method     mfFormularioUtilizador findOneByFormularioId(int $formulario_id) Return the first mfFormularioUtilizador filtered by the formulario_id column
 * @method     mfFormularioUtilizador findOneByUtilizadorId(int $utilizador_id) Return the first mfFormularioUtilizador filtered by the utilizador_id column
 *
 * @method     array findByFormularioId(int $formulario_id) Return mfFormularioUtilizador objects filtered by the formulario_id column
 * @method     array findByUtilizadorId(int $utilizador_id) Return mfFormularioUtilizador objects filtered by the utilizador_id column
 *
 * @package    propel.generator.plugins.mfFormularioPlugin.lib.model.om
 */
abstract class BasemfFormularioUtilizadorQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasemfFormularioUtilizadorQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'mfFormularioUtilizador', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Find object by primary key
	 * <code>
	 * $obj = $c->findPk(array(34, 634), $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($this->getFormatter()->isObjectFormatter() && (null !== ($obj = mfFormularioUtilizadorPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1])))))) {
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    mfFormularioUtilizadorQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(mfFormularioUtilizadorPeer::FORMULARIO_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(mfFormularioUtilizadorPeer::UTILIZADOR_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    mfFormularioUtilizadorQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(mfFormularioUtilizadorPeer::FORMULARIO_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(mfFormularioUtilizadorPeer::UTILIZADOR_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the formulario_id column
	 * 
	 * @param     int|array $formulario_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    mfFormularioUtilizadorQuery The current query, for fluid interface
	 */
	public function filterByFormularioId($formularioId = null)
	{
		if (is_array($formularioId)) {
			return $this->addUsingAlias(mfFormularioUtilizadorPeer::FORMULARIO_ID, $formularioId, Criteria::IN);
		} else {
			return $this->addUsingAlias(mfFormularioUtilizadorPeer::FORMULARIO_ID, $formularioId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query on the utilizador_id column
	 * 
	 * @param     int|array $utilizador_id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 *
	 * @return    mfFormularioUtilizadorQuery The current query, for fluid interface
	 */
	public function filterByUtilizadorId($utilizadorId = null)
	{
		if (is_array($utilizadorId)) {
			return $this->addUsingAlias(mfFormularioUtilizadorPeer::UTILIZADOR_ID, $utilizadorId, Criteria::IN);
		} else {
			return $this->addUsingAlias(mfFormularioUtilizadorPeer::UTILIZADOR_ID, $utilizadorId, Criteria::EQUAL);
		}
	}

	/**
	 * Filter the query by a related mfFormulario object
	 *
	 * @param     mfFormulario $mfFormulario  the related object to use as filter
	 *
	 * @return    mfFormularioUtilizadorQuery The current query, for fluid interface
	 */
	public function filterBymfFormulario($mfFormulario)
	{
		return $this
			->addUsingAlias(mfFormularioUtilizadorPeer::FORMULARIO_ID, $mfFormulario->getId(), Criteria::EQUAL);
	}

	/**
	 * Use the mfFormulario relation mfFormulario object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    mfFormularioQuery A secondary query class using the current class as primary query
	 */
	public function usemfFormularioQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->join('mfFormulario' . ($relationAlias ? ' ' . $relationAlias : ''), $joinType)
			->useQuery($relationAlias ? $relationAlias : 'mfFormulario', 'mfFormularioQuery');
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 *
	 * @return    mfFormularioUtilizadorQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUser($sfGuardUser)
	{
		return $this
			->addUsingAlias(mfFormularioUtilizadorPeer::UTILIZADOR_ID, $sfGuardUser->getId(), Criteria::EQUAL);
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
	 * @param     mfFormularioUtilizador $mfFormularioUtilizador Object to remove from the list of results
	 *
	 * @return    mfFormularioUtilizadorQuery The current query, for fluid interface
	 */
	public function prune($mfFormularioUtilizador = null)
	{
		if ($mfFormularioUtilizador) {
			$this->addCond('pruneCond0', $this->getAliasedColName(mfFormularioUtilizadorPeer::FORMULARIO_ID), $mfFormularioUtilizador->getFormularioId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(mfFormularioUtilizadorPeer::UTILIZADOR_ID), $mfFormularioUtilizador->getUtilizadorId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
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

} // BasemfFormularioUtilizadorQuery
