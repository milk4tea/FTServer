<?php

namespace Fit\Model;

/**
 * Description of Fit
 *
 * @author jeremy
 */
class Fit implements FitInterface {
    protected $id;
    protected $steps;
    protected $date;


    public function getDate() {
        return $this->date;
    }

    public function getId() {
        return $this->id;
    }

    public function getSteps() {
        return $this->steps;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSteps($steps) {
        $this->steps = $steps;
    }

}
