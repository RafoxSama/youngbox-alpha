<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Cache\Cache;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;


/**
 * Account component
 */
class AccountComponent extends Component
{
    protected $_defaultConfig = [];

    public function initialize(array $config)
    {
        $this->_controller = $this->_registry->getController();
    }

    public function avatar($nbr)
    {
      if (($avatars = Cache::read('avatars_random')) === false) {
        $file = new File(WWW_ROOT . '/dbjson/avatars_random.json');
        $json = $file->read(true, 'r');
        $json2array = json_decode($json,true);
        $avatars = $json2array['avatars'];
        Cache::write('avatars_random', $avatars);

      }
      return $avatars[$nbr]['file'];


  }

}
