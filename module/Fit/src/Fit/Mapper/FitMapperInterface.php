<?php
namespace Fit\Mapper;

use Fit\Model\FitInterface;

/**
 *
 * @author jeremy
 */
interface FitMapperInterface {
    /**
     * 
     * @param ind $id
     * 
     * @return FitInterface
     * @throws \InvalidAgumentException
     */
    public function find($id);
    
    
    /**
     * @return array|FitInterface[]
     */
    public function findAll();
    
    
    /**
     * 
     * @param FitInterface $fitObj
     * 
     * @return FitInterface
     * @throws \Exception
     */
    public function save(FitInterface $fitObj);
    
    /**
     * 
     * @param FitInterface $fitObj
     * 
     * @return bool
     * @throws \Exception
     */
    public function delete(FitInterface $fitObj);
}
