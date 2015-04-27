<?php
namespace BlackBoxCode\Pando\Bundle\TicketBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\TypeTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
trait TicketStatusTypeTrait
{
    use TypeTrait;
}
