<?php
namespace Fit\Mapper;

use Fit\Model\FitInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Delete;

/**
 * Description of ZendDbSqlMapper
 *
 * @author jeremy
 */
class ZendDbSqlMapper implements FitMapperInterface {
    protected $dbAdapter;
    protected $tableName;
    protected $hydrator;
    protected $protoType;
    
    public function __construct(
            AdapterInterface $dbAdapter,
            $tableName,
            HydratorInterface $hydrator,
            FitInterface $protoType
    ) {
        $this->dbAdapter = $dbAdapter;
        $this->tableName = $tableName;
        $this->hydrator = $hydrator;
        $this->protoType = $protoType;
    }



    /**
     * 
     * @return array|FitInterface[]
     */
    public function findAll() {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select($this->tableName);
        
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        
        if($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new HydratingResultSet($this->hydrator, $this->protoType);
            
            return $resultSet->initialize($result);
        }
        
        return array();
    }

    /**
     * 
     * @param int $id
     * @return FitInterface
     * @throws \InvalidArgumentException
     */
    public function find($id) {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select($this->tableName);
        $select->where(array('id = ?' => $id));
        $stmt = $sql->prepareStatementForSqlObject($select);
        
        $result = $stmt->execute();
        if($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
            return $this->hydrator->hydrate($result->current(), $this->protoType);
        }
        
        throw new \InvalidArgumentException("Fit with given ID: {$id} not found.");
    }
    
    /**
     * 
     * @param FitInterface $fitObj
     * 
     * @return FitInterface
     * @throws \Exception
     */
    public function save(FitInterface $fitObj) {
        $fitData = $this->hydrator->extract($fitObj);
        unset($fitData['id']);
        
        if($fitObj->getId()) {
            $action = new Update($this->tableName);
            $action->set($fitData);
            $action->where(array('id = ?' => $fitObj->getId()));
        } else {
            $action = new Insert($this->tableName);
            $action->values($fitData);
        }
        
        $sql = new Sql($this->dbAdapter);
        $stmt = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();
        
        if($result instanceof ResultInterface) {
            if($newId = $result->getGeneratedValue()) {
                $fitObj->setId($newId);
            }
            
            return $fitObj;
        }
        
        throw new \Exception("Database error");
        
    }
    
    public function delete(FitInterface $fitObj) {
        $action = new Delete();
        $action->where(array('id = ?' => $fitObj->getId()));
        
        $sql = new Sql($this->dbAdapter);
        $stmt = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();
        
        return (bool) $result->getAffectedRows();
        
    }    

}
