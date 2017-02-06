 <?php

namespace Drupal\dino_roar\Service;

class RoarService
{
    public function getRoar($length)
    {
        return 'R'.str_repeat('O',$length).'AR!';
    }
}