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




}
