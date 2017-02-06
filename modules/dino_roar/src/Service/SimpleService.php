<?php
namespace Drupal\dino_roar\Service;



use Drupal\Core\Entity\Query\QueryFactory;


class SimpleService
{
    protected $entityQuery;

    /**
     * @var
     */
    protected $param;

    public function __construct(QueryFactory $queryFactory,$param)
    {
        $this->entityQuery = $queryFactory;
        $this->param = $param;

    }

    public function getNode($id) {
        $query = $this->entityQuery->get('node');
        $query->condition('status',1);
        $query->condition('type','article');
        $query->condition('nid',$id);
        $entityId = $query->execute();
        return $entityId;
    }
}
