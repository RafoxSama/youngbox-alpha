<?php
return [
    'Author' => [
        'full_name' => 'Dhia Zhaira',
        'pseudo' => 'Rafox',
        'twitter' => 'https://twitter.com/zrafox',
        'facebook' => 'https://www.facebook.com/rafoxstudio',
        'email' => 'dhia.rafox@gmail.com',
        'address' => '7015 Rafraf Bizerte'
    ],
    'Site' => [
        'name' => 'YoungBox.fr',
        'description' => 'You will find content related to web development like tutorials, my personal tests on new technologies etc',
        'full_url' => 'https://youngbox.dev'
    ],
    'Home' => [
        'articles' => 5,
        'comments' => 5
    ],
    'News' => [
        'article_per_page' => 10,
        'comment_per_page' => 10
    ],
    'User' => [
        'Profile' => [
            'max_news_articles' => 5,
            'max_news_comments' => 5,
            'max_forum_threads' => 5,
            'max_forum_posts' => 5
        ],
        'ResetPassword' => [
            'expire_code' => 10 //In minutes.
        ],
        'user_per_page' => 15,
        'transaction_per_page' => 15,
        'max_notifications' => 5,
        'notifications_per_page' => 10
    ],
    'Group' => [
        'user_per_page' => 10
    ],
    'HtmlPurifier' => [
        'Conversations' => [
            'message' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p, h1, h2, h3, h4, h5, span[style], strong, em, u, img[alt|src|style|title], ol, li, ul,
                a[href], br, blockquote, pre[class]',
                'CSS.AllowedProperties' => 'font-size,height,width',
                'Attr.AllowedClasses' => 'prettyprint, linenums',
                'AutoFormat.RemoveEmpty' => true
            ],
            'message_empty' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p',
                'AutoFormat.RemoveEmpty' => true
            ]
        ],
        'User' => [
            'biography' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p, h1, h2, h3, h4, h5, span[style], strong, em, u, img[alt|src|style|title], ol, li, ul,
                a[href], br, blockquote',
                'CSS.AllowedProperties' => 'font-size,height,width,color',
                'AutoFormat.RemoveEmpty' => true
            ],
            'signature' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p, strong, em, u, a[href], br, img[alt|src|style|title]',
                'AutoFormat.RemoveEmpty' => true
            ]
        ],
        'News' => [
            'comment' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p, h1, h2, h3, h4, h5, span[style], strong, em, u, img[alt|src|style|title], ol, li, ul,
                a[href], br, blockquote, pre[class]',
                'CSS.AllowedProperties' => 'font-size,height,width',
                'Attr.AllowedClasses' => 'prettyprint, linenums',
                'AutoFormat.RemoveEmpty' => true
            ],
            'comment_empty' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p',
                'AutoFormat.RemoveEmpty' => true
            ],
            'article' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p, h1, h2, h3, h4, h5, span[style], strong, em, u, img[alt|src|style|title], ol, li, ul,
                a[href], br, blockquote, pre[class]',
                'CSS.AllowedProperties' => 'font-size,height,width',
                'Attr.AllowedClasses' => 'prettyprint, linenums',
                'AutoFormat.RemoveEmpty' => true
            ],
            'article_empty' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p',
                'AutoFormat.RemoveEmpty' => true
            ],
            'article_meta' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => '',
                'AutoFormat.RemoveEmpty' => true
            ]
        ],
        'Forum' => [
            'post' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p, h1, h2, h3, h4, h5, span[style], strong, em, u, img[alt|src|style|title], ol, li, ul,
                a[href], br, blockquote, pre[class]',
                'CSS.AllowedProperties' => 'font-size,height,width',
                'Attr.AllowedClasses' => 'prettyprint, linenums',
                'AutoFormat.RemoveEmpty' => true
            ],
            'post_empty' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p',
                'AutoFormat.RemoveEmpty' => true
            ],
            'post_meta' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => '',
                'AutoFormat.RemoveEmpty' => true
            ],
            'thread' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p, h1, h2, h3, h4, h5, span[style], strong, em, u, img[alt|src|style|title], ol, li, ul,
                a[href], br, blockquote, pre[class]',
                'CSS.AllowedProperties' => 'font-size,height,width',
                'Attr.AllowedClasses' => 'prettyprint, linenums',
                'AutoFormat.RemoveEmpty' => true
            ],
            'thread_empty' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p',
                'AutoFormat.RemoveEmpty' => true
            ],
            'thread_meta' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => '',
                'AutoFormat.RemoveEmpty' => true
            ]
        ],
        'Chat' => [
            'notice' => [
                'Core.Encoding' => 'UTF-8',
                'URI.Base' => 'https://youngbox.dev',
                'HTML.Allowed' => 'p, strong, b, em, u, a[href|target], br, span[style], img[alt|src|style|title]',
                'CSS.AllowedProperties' => 'font-size,color,height,width',
                'AutoFormat.RemoveEmpty' => true
            ]
        ]
    ],
    'Forum' => [
        'Categories' => [
            'threads_per_page' => 10
        ],
        'Threads' => [
            'posts_per_page' => 10
        ]
    ],
    'Premium' => [
        'color' => '#F2C732'
    ],
    'Boutique' => [
        'active' => false
    ],
    'Radio' => [
        'active' => false
    ],
    'Giveaway' => [
        'active' => true
    ],
    'Draft' => [
        'limit' => 5
    ],
    'Chat' => [
        //Enable/Disable the chat.
        'enabled' => true,
        //Time out in seconds before to delete an user from the Online list.
        'usersTimeOut' => 10,
        //The refrest time in seconds.
        'refreshTime' => 3,
        //Max messages to display in the chat.
        'maxMessages' => 25,
        //Max times to retry to get the messages after an error.
        'maxRetrying' => 5,
        //The seconds to wait between sending 2 mesages.
        'floodRule' => 3,
        //The spam rule in %. (By similarity)
        'spamRule' => 95,
        //Max characters per message.
        'messageMaxLength' => 400
    ]
];
