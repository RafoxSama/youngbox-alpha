<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Event\Badges;
use App\Event\Forum\Notifications;
use App\Event\Forum\Statistics;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Network\Email\Email;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookSession;


class AuthController extends AppController
{

 public function beforeFilter(Event $event)
 {
     parent::beforeFilter($event);

     $this->Auth->allow(['facebook']);
 }



  public function facebook() {
    $this->loadModel('Users');
    $username = $this->Users->newEntity($this->request->data, ['validate' => 'social']);

    if ($this->request->is('post')) {
      $session_yb = $this->request->session();
      $username->facebook_token = $session_yb->read('fb_auth.id');
      $username->email = $session_yb->read('fb_auth.mail');
      $username->register_ip = $this->request->clientIp();
      $username->last_login_ip = $this->request->clientIp();
      $username->username = ucfirst($username->username);
      $username->last_login = new Time();
      $username->active = 1;
      if ($this->Users->save($username)) {
        $userLogin = $this->Auth->identify($username);
        debug($userLogin);
        die('stop');
        if ($userLogin) {

              if ($userLogin['is_deleted'] == true) {
                  $this->Flash->error("Ce compte a été supprimé");
                  $url = ['controller' => 'pages', 'action' => 'home'];
                  return $this->redirect($url);
              }
              if ($userLogin['active'] == 0) {
                  $this->Flash->error("Vous devez valider votre compte pour continuer.");
                  $url = ['controller' => 'pages', 'action' => 'home'];
                  return $this->redirect($url);
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
              $this->Flash->success(
              "Authentifié avec succès."
            );
            return $this->redirect($this->Auth->redirectUrl());

        }

      }

    }




      FacebookSession::setDefaultApplication('1385062638462151', 'd1a58885784570ffeabf4852e4dcfc21');
      $helper = new FacebookRedirectLoginHelper('http://youngbox.dev/auth/facebook');
      $session = $helper->getSessionFromRedirect();
      if (empty($session)) {
        $this->redirect($helper->getReRequestUrl(['scope' => 'email']));
      }
      if (!(empty($session))) {
        $request = new FacebookRequest($session, 'GET', '/me');
        $user = $request->execute()->getGraphObject('Facebook\GraphUser');
        $fb_user = [
          'id' => $user->getId(),
          'mail' => $user->getEmail()
        ];
        $loginUser = $this->Users
            ->find()
            ->where([
              'Users.facebook' => $fb_user['id'],
              'Users.email' => $fb_user['mail']
            ])
            ->first();
            if ($loginUser) {
                     if ($loginUser['is_deleted'] == true) {
                         $this->Flash->error("Ce compte a été supprimé");
                         $url = ['controller' => 'pages', 'action' => 'home'];
                         return $this->redirect($url);
                     }
                     if ($loginUser['active'] == 0) {
                         $this->Flash->error("Vous devez valider votre compte pour continuer.");
                         $url = ['controller' => 'pages', 'action' => 'home'];
                         return $this->redirect($url);
                     }
                   $this->Auth->setUser($userLogin);
                   $user = $this->Users->newEntity($userLogin);
                   $user->isNew(false);
                   $user->last_login = new Time();
                   $user->last_login_ip = $this->request->clientIp();
                   $this->Users->save($user);

                   //Write in the session the virtual field.
                  // $this->request->session()->write('Auth.User.premium', $user->premium);
                  $this->Flash->success(
                  "Authentifié avec succès."
                );
                  return $this->redirect($this->Auth->redirectUrl());

            }else {
                $session_yb = $this->request->session();
                $session_yb->write([
                  'fb_auth.id' => $fb_user['id'],
                  'fb_auth.mail' => $fb_user['mail'],
                ]);

              $this->set(compact('username', 'fb_user'));
            }
        if (empty($fb_user['mail'])) {

          $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
      }


  }


}
