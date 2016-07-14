<?php
namespace Fit\Model;

/**
 *
 * @author jeremy
 */
interface FitInterface {
    
    /**
     * 
     * @return int 
     */
    public function getId();
    
    /**
     * 
     * @return int
     */
    public function getSteps();
    
    /**
     * @return date
     */
    public function getDate();
    
    /**
     * 
     * @param int $id
     */
    public function setId($id);
    
    /**
     * 
     * @param int $steps steps
     */
    public function setSteps($steps);
    
    
    /**
     * 
     * @param date $date date
     */
    public function setDate($date);
}
