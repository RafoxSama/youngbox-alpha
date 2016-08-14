<div class="footer_title">
                Nos derniers tweets
              </div>
<?php foreach ($tweets as $tweet): ?>
  <div class="ui segments">
    <div class="ui segment">
      <?= $autolink->autoLink($tweet->text); ?>
    </div>
    <div class="ui secondary segment grid ">
      <div class="column">
        <a href="https://twitter.com/<?= $tweet->user->screen_name ?>/status/<?= $tweet->id_str ?>" target="_blank">
        <i class="twitter square blue icon"></i>
        </a>
      </div>
        <div data-datetime="<?= date("c", strtotime($tweet->created_at)); ?>" class="column fourteen wide tweet_date right aligned">

        </div>
    </div>
  </div>
<?php //Debug($tweet);?>
<?php endforeach?>
