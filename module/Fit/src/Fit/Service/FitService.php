<?php
namespace Fit\Service;

use Fit\Mapper\FitMapperInterface;
use Fit\Model\FitInterface;

/**
 * Description of FitService
 *
 * @author jeremy
 */
class FitService implements FitServiceInterface {
    protected $fitMapper;
    
    public function __construct(FitMapperInterface $fitMapper) {
        $this->fitMapper = $fitMapper;
    }

    public function find($id) {
        return $this->fitMapper->find($id);
    }

    public function findAll() {
        return $this->fitMapper->findAll();
    }

    public function save(FitInterface $fitObj) {
        return $this->fitMapper->save($fitObj);
    }

}
