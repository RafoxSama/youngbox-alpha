<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Abraham\TwitterOAuth\TwitterOAuth;
use Cake\Cache\Cache;
use Twitter_Autolink;

/**
 * Lasttweet cell
 */
class LasttweetCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {

      $c_key='72IRyI3LCbVlGckhldVoPf8y3';
      $c_secret='Iv2ln9SnNJgkBDuZ2ANTHiPbeMSrsdRmahvyOmXaYNoCkCqwdn';

      $oauth = new TwitterOAuth($c_key, $c_secret);
      $oauth->setTimeouts(10, 15);
      $accessToken = $oauth->oauth2('oauth2/token', ['grant_type' => 'client_credentials']);
      $access_token = $accessToken->access_token;
      // on appel l'API
      $twitter = new TwitterOAuth($c_key, $c_secret, null, $access_token);
      $twitter->setTimeouts(10, 15);
      $tweets = $twitter->get('statuses/user_timeline', [
          'screen_name' => 'yboxofficiel',
          'exclude_replies' => true,
          'count' => 50 // On est obligé de filtrer après coup (cf doc)
      ]);
      $tweets = array_splice($tweets, 0, 3);
      $autolink = Twitter_Autolink::create();
      $this->set(compact('tweets', 'autolink'));
    }
}
