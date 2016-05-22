<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'sswsnav navbar-collapse collapse',
 
    // Here comes the menu strcture
    'items' => [
        
                // This is a menu item
        'start'  => [
            'text'  => 'Start',
            'url'   => $this->di->get('url')->create(''),
            'title' => 'Översikt av frågor, taggar och användare på webbplatsen'
        ],
        
        // This is a menu item
        'questions'  => [
            'text'  => 'Frågor',
            'url'   => $this->di->get('url')->create('question/all'),
            'title' => 'Visa alla frågor'
        ],
        
        // This is a menu item
        'tags'  => [
            'text'  => 'Taggar',
            'url'   => $this->di->get('url')->create('tags'),
            'title' => 'Visar alla taggar som används'
        ],
        
        // This is a menu item
        'users'  => [
            'text'  => 'Användare',
            'url'   => $this->di->get('url')->create('view_users'),
            'title' => 'Visar webbplatsens alla användare'
        ],
        
        // This is a menu item
        'newquestion'  => [
            'text'  => 'Ny fråga',
            'url'   => $this->di->get('url')->create('question/new'),
            'title' => 'Fråga en ny fråga'
        ],
        
        // This is a menu item
        'about'  => [
            'text'  => 'Om webbplatsen',
            'url'   => $this->di->get('url')->create('about'),
            'title' => 'Information om webbplatsen och om mig'
        ],
        
        // This is a menu item
        'source' => [
            'text'  =>'Källkod',
            'url'   => $this->di->get('url')->create('source'),
            'title' => 'Granska denna webbplats källkod'
        ],
               
        
        // This is a menu item
        'reports' => [
            'text'  =>'Rapporter',
            'url'   => $this->di->get('url')->create('redovisning'),
            'title' => 'Rapporter för denna BTH-kurs'
        ],
        
       
    ],
 


    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getCurrentUrl(false)) {
            return true;
        }
    },



    /**
     * Callback to check if current page is a decendant of the menuitem, this check applies for those
     * menuitems that has the setting 'mark-if-parent' set to true.
     *
     */
    'is_parent' => function ($parent) {
        $route = $this->di->get('request')->getRoute();
        return !substr_compare($parent, $route, 0, strlen($parent));
    },



   /**
     * Callback to create the url, if needed, else comment out.
     *
     */
   /*
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },
    */
];
