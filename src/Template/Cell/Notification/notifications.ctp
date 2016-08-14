<div class="navbar-notification dropdown" <?= ($hasNewNotifs) ? "data-number=\"{$statistics['unread']}\"" : '' ?>>

        <?php if (!empty($notifications)): ?>

        <?php foreach ($notifications as $notification): ?>
            <?php if (!$notification->is_read): ?>

                <div id="notification-<?= $notification->id ?>" class="notification-item" data-new="notification-new" data-id="<?= $notification->id ?>" >
                  <a href="<?= $notification->link ?>">
                        <?php if ($notification->type === 'bot'): ?>
                            <?= $this->Html->image($notification->icon, ['class' => 'notification-avatar']) ?>
                        <?php elseif ($notification->type === 'badge'): ?>
                            <?= $this->Html->image($notification->data['badge']->picture, ['class' => 'notification-avatar']) ?>
                        <?php else: ?>
                            <?= $this->Html->image($notification->data['sender']->avatar, ['class' => 'notification-avatar']) ?>
                        <?php endif; ?>

                        <div class="notifications_text">
                            <?= $notification->text ?>
                        </div>

                    </a>

                </div>
              <?php else: ?>
              <div id="notification-<?= $notification->id ?>" class="notification-item notification-readed" data-id="<?= $notification->id ?>" >

                  <a href="<?= $notification->link ?>">
                      <?php if ($notification->type === 'bot'): ?>
                          <?= $this->Html->image($notification->icon, ['class' => 'notification-avatar']) ?>
                      <?php elseif ($notification->type === 'badge'): ?>
                          <?= $this->Html->image($notification->data['badge']->picture, ['class' => 'notification-avatar']) ?>
                      <?php else: ?>
                          <?= $this->Html->image($notification->data['sender']->avatar, ['class' => 'notification-avatar']) ?>
                      <?php endif; ?>

                      <div class="notifications_text">
                          <?= $notification->text ?>
                      </div>




                  </a>

              </div>

              <?php endif; ?>


            <?php endforeach; ?>

        <?php else: ?>
            <li class="dropdown-header">
                <?= __("You don't have any notifications.") ?>
            </li>
        <?php endif; ?>
</div>
