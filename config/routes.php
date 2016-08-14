<?php

use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::extensions(['json', 'xml']);
Router::defaultRouteClass('InflectedRoute');

//Public routes.
Router::scope('/', function ($routes) {


    $routes->connect(
        '/',
        [
            'controller' => 'pages',
            'action' => 'home'
        ]
    );
    $routes->connect(
        '/news',
        [
            'controller' => 'news',
            'action' => 'index'
        ],
          [
        '_name' => 'news-index',
          ]
    );


    //Blog Routes.
    $routes->connect(
        '/news/article/:slug-:id',
        [
            'controller' => 'news',
            'action' => 'article'
        ],
        [
            '_name' => 'news-article',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/news/category/:slug-:id',
        [
            'controller' => 'news',
            'action' => 'category',
        ],
        [
            '_name' => 'news-category',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/news/tag/:slug-:id',
        [
            'controller' => 'news',
            'action' => 'tag',
        ],
        [
            '_name' => 'news-tag',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    //Vods Routes
    $routes->connect(
        '/vods',
        [
            'controller' => 'vods',
            'action' => 'index',
        ]
    );
    $routes->connect(
        '/vods/category/:slug-:id',
        [
            'controller' => 'vods',
            'action' => 'category',
        ],
        [
            '_name' => 'vods-category',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/vods/playlist/:slug-:id',
        [
            'controller' => 'vods',
            'action' => 'playlist',
        ],
        [
            '_name' => 'vods-playlist',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/vods/video/:slug-:id',
        [
            'controller' => 'vods',
            'action' => 'video',
        ],
        [
            '_name' => 'vods-video',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );



    //Users Routes.
    $routes->connect(
        '/login',
        [
            'controller' => 'users',
            'action' => 'login'
        ]
    );
    $routes->connect(
        '/inscription',
        [
            'controller' => 'users',
            'action' => 'signup'
        ]
    );

    $routes->connect(
        '/users/profile/:slug.:id',
        [
            'controller' => 'users',
            'action' => 'profile'
        ],
        [
            '_name' => 'users-profile',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/users/resetPassword/:code.:id',
        [
            'controller' => 'users',
            'action' => 'resetPassword'
        ],
        [
            '_name' => 'users-resetpassword',
            'pass' => [
                'id',
                'code'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/confirmation/:token',
        [
            'controller' => 'users',
            'action' => 'confirmation'
        ],
        [
            '_name' => 'users-confirmation',
            'pass' => [
                'token'
            ]
        ]
    );

    //Attachments Routes.
    $routes->connect(
        '/attachments/download/:type/:id',
        [
            'controller' => 'attachments',
            'action' => 'download',
        ],
        [
            '_name' => 'attachment-download',
            'pass' => [
                'type',
                'id'
            ]
        ]
    );

    //Groups Routes.
    $routes->connect(
        '/groups/view/:slug.:id',
        [
            'controller' => 'groups',
            'action' => 'view'
        ],
        [
            '_name' => 'groups-view',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    //Conversations Routes.
    $routes->connect(
        '/conversations/view/:slug.:id',
        [
            'controller' => 'conversations',
            'action' => 'view'
        ],
        [
            '_name' => 'conversations-view',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/messageEdit/:id',
        [
            'controller' => 'conversations',
            'action' => 'messageEdit'
        ],
        [
            '_name' => 'conversations-messageEdit',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/quote/:id',
        [
            'controller' => 'conversations',
            'action' => 'quote'
        ],
        [
            '_name' => 'conversations-quote',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/invite/:slug.:id',
        [
            'controller' => 'conversations',
            'action' => 'invite'
        ],
        [
            '_name' => 'conversations-invite',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/edit/:slug.:id',
        [
            'controller' => 'conversations',
            'action' => 'edit'
        ],
        [
            '_name' => 'conversations-edit',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/leave/:slug.:id',
        [
            'controller' => 'conversations',
            'action' => 'leave'
        ],
        [
            '_name' => 'conversations-leave',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/kick/:id/:user_id',
        [
            'controller' => 'conversations',
            'action' => 'kick'
        ],
        [
            '_name' => 'conversations-kick',
            'pass' => [
                'id',
                'user_id'
            ],
            'id' => '[0-9]+',
            'user_id' => '[0-9]+'
        ]
    );

    $routes->connect(
        '/conversations/reply/:slug.:id',
        [
            'controller' => 'conversations',
            'action' => 'reply'
        ],
        [
            '_name' => 'conversations-reply',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );

    $routes->fallbacks();
});

//Forum routes.
Router::prefix('forum', function ($routes) {
    $routes->connect(
        '/',
        [
            'controller' => 'forum',
            'action' => 'index'
        ]
    );
    $routes->connect(
        '/home',
        [
            'controller' => 'forum',
            'action' => 'home'
        ]
    );
    //Forum Routes.
    $routes->connect(
        '/categories/:slug.:id',
        [
            'controller' => 'forum',
            'action' => 'categories'
        ],
        [
            '_name' => 'forum-categories',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/threads/:slug.:id',
        [
            'controller' => 'forum',
            'action' => 'threads'
        ],
        [
            '_name' => 'forum-threads',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    //Threads Routes
    $routes->connect(
        '/threads/create/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'create'
        ],
        [
            '_name' => 'threads-create',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/threads/edit/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'edit'
        ],
        [
            '_name' => 'threads-edit',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/threads/reply/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'reply'
        ],
        [
            '_name' => 'threads-reply',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/threads/lock/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'lock'
        ],
        [
            '_name' => 'threads-lock',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/threads/unlock/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'unlock'
        ],
        [
            '_name' => 'threads-unlock',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/threads/follow/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'follow'
        ],
        [
            '_name' => 'threads-follow',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/threads/unfollow/:slug.:id',
        [
            'controller' => 'threads',
            'action' => 'unfollow'
        ],
        [
            '_name' => 'threads-unfollow',
            'routeClass' => 'SlugRoute',
            'pass' => [
                'id',
                'slug'
            ],
            'id' => '[0-9]+'
        ]
    );
    //Posts Routes.
    $routes->connect(
        '/posts/edit/:id',
        [
            'controller' => 'posts',
            'action' => 'edit'
        ],
        [
            '_name' => 'posts-edit',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/posts/delete/:id',
        [
            'controller' => 'posts',
            'action' => 'delete'
        ],
        [
            '_name' => 'posts-delete',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->connect(
        '/posts/quote/:id',
        [
            'controller' => 'posts',
            'action' => 'quote'
        ],
        [
            '_name' => 'posts-quote',
            'pass' => [
                'id'
            ],
            'id' => '[0-9]+'
        ]
    );
    $routes->fallbacks();
});


//Admin routes.
Router::prefix('admin', function ($routes) {
  $routes->connect(
      '/',
      [
          'controller' => 'admin',
          'action' => 'index'
      ]
  );

  $routes->fallbacks();
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
    Plugin::routes();
