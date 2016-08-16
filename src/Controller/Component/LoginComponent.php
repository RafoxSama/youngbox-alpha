<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Controller\Controller;
use Cake\Network\Request;
use Cake\ORM\Entity;
use Cake\Routing\Router;
use Cake\I18n\Time;


class LoginComponent extends Component
{
  protected $_defaultConfig = [];

  public $components = ['Flash', 'Auth', 'Cookie'];

  public function initialize(array $config)
  {
      $this->_controller = $this->_registry->getController();
      $this->_request = $this->_controller->request;
  }


  public function socialLogin($userLogin)
  {
    if ($userLogin) {
          if ($userLogin['is_deleted'] == true) {
              $this->Flash->error("Ce compte a été supprimé");
              $url = ['controller' => 'pages', 'action' => 'home'];
              return $this->_registry->getController()->redirect($url);
          }
          if ($userLogin['active'] == 0) {
              $this->Flash->error("Vous devez valider votre compte pour continuer.");
              $url = ['controller' => 'pages', 'action' => 'home'];
              return $this->_registry->getController()->redirect($url);
          }
        $this->Auth->setUser($userLogin);
        $this->Cookie->configKey('CookieAuth', [
            'expires' => '+1 year',
            'httpOnly' => true
        ]);
        $this->Cookie->write('CookieAuth', [
            'username' => $this->request->data('username'),
            'password' => $this->request->data('password')
        ]);
        $this->_controller->loadModel('Users');
        $user = $userLogin;
        $user->isNew(false);
        $user->last_login = new Time();
        $user->last_login_ip = $this->_request->clientIp();
        $this->_controller->Users->save($user);

        //Write in the session the virtual field.
       // $this->request->session()->write('Auth.User.premium', $user->premium);
       $this->Flash->success(
       "Authentifié avec succès."
     );
       return $this->_registry->getController()->redirect(['controller' => 'Pages', 'action' => 'home']);
    }else {
      $this->Flash->error("Une erreur c'est produite !");
      return $this->_registry->getController()->redirect(['controller' => 'Users', 'action' => 'login']);
    }


  }














}
