<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
     public function initialize()
      {
          $this->loadComponent('Flash');
          $this->loadComponent('Cookie');

          // $this->loadComponent('Csrf');
          $this->loadComponent('Auth',[
            'authenticate' => [
               'Form',
               'Xety/Cake3CookieAuth.Cookie'
           ],
        'loginAction' => [
            'controller' => 'Users',
            'action' => 'login',
            'prefix' => false
        ],
        [
            'loginRedirect' => [
                   'controller' => 'pages',
                   'action' => 'home'
               ],
              'logoutRedirect' => [
                  'controller' => 'pages',
                  'action' => 'home'
              ]
        ],
        'error' => 'Vous n\'êtes pas autorisé à accéder à cette page !'
        ]);
      }




    public function beforeFilter(Event $event) {
       //Automaticaly Login.
       if (!$this->Auth->user() && $this->Cookie->read('CookieAuth')) {

           $user = $this->Auth->identify();
           if ($user) {
               $this->Auth->setUser($user);
           } else {
               $this->Cookie->delete('CookieAuth');
           }
       }
    }

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        if (isset($this->request->params['prefix'])) {
            $prefix = explode('/', $this->request->params['prefix'])[0];

            switch($prefix) {
                case 'admin':
                $this->viewBuilder()->layout('admin');

                    break;
            }
        }
    }
}
