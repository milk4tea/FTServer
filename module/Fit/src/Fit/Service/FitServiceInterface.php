<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Fit\Service;

use Fit\Model\FitInterface;

/**
 *
 * @author jeremy
 */
interface FitServiceInterface {
    
    /**
     * 
     * @return array|FitInterface[]
     */
    public function findAll();
    
    /**
     * 
     * @param int $id
     * 
     * @return FitInterface
     */
    public function find($id);
    
    /**
     * 
     * @param FitInterface $fitObj
     * 
     * @return FitInterface $fitObj
     * @throws \Exception
     */
    public function save(FitInterface $fitObj);
    
}
