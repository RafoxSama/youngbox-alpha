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
  public $components = ['Login', 'Account'];

 public function beforeFilter(Event $event)
 {
     parent::beforeFilter($event);

     $this->Auth->allow(['facebook', 'login']);
 }

 public function facebook()
 {
   $session_yb = $this->request->session();
   $this->loadModel('Users');
   $username = $this->Users->newEntity($this->request->data, ['validate' => 'social']);
   if ($this->request->is('post')) {
     $username->facebook_token = $session_yb->read('fb_auth.id');
     $username->email = $session_yb->read('fb_auth.mail');
     $username->username = ucfirst($username->username);
     $username->password = md5(rand() . uniqid() . time());
     $username->active = 1;
     $username->avatar = $this->Account->avatar(rand(0,9));
     if ($this->Users->save($username)) {
       $loginUser = $this->Users
                 ->find()
                 ->where([
                   'Users.facebook_token' => $session_yb->read('fb_auth.id'),
                   'Users.email' => $session_yb->read('fb_auth.mail')
                 ])
                 ->first();
       if ($loginUser) {
         $this->Login->socialLogin($loginUser);

       }else {
         return $this->redirect(['controller' => 'Users', 'action' => 'login']);
       }
     }
  }else {
   FacebookSession::setDefaultApplication('1385062638462151', 'd1a58885784570ffeabf4852e4dcfc21');
  $helper = new FacebookRedirectLoginHelper('http://youngbox.dev/auth/facebook');

  if(empty($session_yb) && empty($session_yb->read('fb_auth.fb_token'))){
              $session = new FacebookSession($session_yb->read('fb_auth.fb_token'));
          }else{
              $session = $helper->getSessionFromRedirect();
          }
  if ($session) {
    try{
      $session_yb->write([
        'fb_auth.fb_token' => $session->getToken(),
      ]);
      $request = new FacebookRequest($session, 'GET', '/me');
      $user = $request->execute()->getGraphObject('Facebook\GraphUser');
      if($user->getEmail() === null){
                   throw new \Exception('L\'email n\'est pas disponible');
               }
     $fb_user = [
       'id' => $user->getId(),
       'mail' => $user->getEmail()
     ];
     $loginUser = $this->Users
               ->find()
               ->where([
                 'Users.facebook_token' => $fb_user['id'],
                 'Users.email' => $fb_user['mail']
               ])
               ->first();
               if ($loginUser) {
                 $this->Login->socialLogin($loginUser);
               }else {
                   $session_yb = $this->request->session();
                   $session_yb->write([
                     'fb_auth.id' => $fb_user['id'],
                     'fb_auth.mail' => $fb_user['mail'],
                   ]);
                   $this->set(compact('username', 'fb_user'));
               }
       } catch (\Exception $e){
                $session_yb->delete('fb_auth.fb_token');
                $this->redirect($helper->getReRequestUrl(['scope' => 'email']));
            }


        }else {
          $this->redirect($helper->getReRequestUrl(['scope' => 'email']));
        }
 }
}



 }
