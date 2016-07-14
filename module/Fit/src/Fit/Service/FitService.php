<?php
namespace Fit\Service;

use Fit\Mapper\FitMapperInterface;

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

}
