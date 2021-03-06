<?php
/**
 * Config-file for Anax, theme related settings, return it all as array.
 *
 */
return [

    /**
     * Settings for Which theme to use, theme directory is found by path and name.
     *
     * path: where is the base path to the theme directory, end with a slash.
     * name: name of the theme is mapped to a directory right below the path.
     */
    'settings' => [
        'path' => ANAX_INSTALL_PATH . 'theme/',
        'name' => 'urban',
    ],

    
    /**
     * Add default views.
     
    'views' => [
        ['region' => 'header', 'template' => 'welcome/header', 'data' => [], 'sort' => -1],
        ['region' => 'footer', 'template' => 'welcome/footer', 'data' => [], 'sort' => -1],
    ],*/
    
    'views' => [
    ['region' => 'navbar', 'template' => ['callback' => function() 
        {return $this->di->navbar->create();}], 'data' => [], 'sort' => -1],
    ['region'   =>  'header', 'template' => 'me/header', 
                    'data'     => [
                                   'siteTitle' => "WG TO TW",
                                   'siteTagline' => "We Gonna Take Over The World",
                                  ], 
     'sort'     => -1],
    ['region' => 'footer', 'template' => 'me/footer', 'data' => [], 'sort' => -1], 
    ],
    


    /**
     * Data to extract and send as variables to the main template file.
     */
    'data' => [

        // Language for this page.
        'lang' => 'sv',

        // Append this value to each <title>
        'title_append' => ' | SSWS',

        // Stylesheets
        //'stylesheets' => ['css/style.css'],
        'stylesheets' => ['css/main.css','css/navbar.css','css/footer.css','font-awesome-4.5.0/css/font-awesome.min.css','css/bootstrap/bootstrap.css'],

        // Inline style
        'style' => null,

        // Favicon
        'favicon' => 'favicon.ico',

        // Path to modernizr or null to disable
        'modernizr' => 'js/modernizr.js',

        // Path to jquery or null to disable
        'jquery' => 'js/jquery-1.12.3.min.js',

        // Array with javscript-files to include
        'javascript_include' => ['js/bootstrap.min.js','js/profile.js'],

        // Use google analytics for tracking, set key or null to disable
        'google_analytics' => null,
    ],
];
