<?php
defined('MOODLE_INTERNAL') || die();

function local_groups_plugin_extend_navigation(global_navigation $navigation) {
    global $USER, $PAGE;

    // Add Nodus AI link to navigation
    if (isloggedin()) {
        $nodusainode = navigation_node::create(
            'Nodus AI',
            new moodle_url('/local/groups_plugin/nodus_ai.php'),
            navigation_node::TYPE_CUSTOM,
            'Nodus AI',
            'nodusai',
            new pix_icon('t/message', 'Nodus AI')
        );
        $navigation->add_node($nodusainode);
    }

    // Add Education Module link
    if (isloggedin()) {
        $educationnode = navigation_node::create(
            'Educación',
            new moodle_url('/local/groups_plugin/education.php'),
            navigation_node::TYPE_CUSTOM,
            'Education Module',
            'education',
            new pix_icon('i/course', 'Education')
        );
        $navigation->add_node($educationnode);
    }

    // Add Collaboration Module link
    if (isloggedin()) {
        $collaborationnode = navigation_node::create(
            'Colaboración',
            new moodle_url('/local/groups_plugin/initiatives.php'),
            navigation_node::TYPE_CUSTOM,
            'Collaboration Module',
            'collaboration',
            new pix_icon('i/group', 'Collaboration')
        );
        $navigation->add_node($collaborationnode);
    }

    // Add Research Module link
    if (isloggedin()) {
        $researchnode = navigation_node::create(
            'Investigación',
            new moodle_url('/local/groups_plugin/research.php'),
            navigation_node::TYPE_CUSTOM,
            'Research Module',
            'research',
            new pix_icon('i/repository', 'Research')
        );
        $navigation->add_node($researchnode);
    }

    // Redirect from Moodle homepage to custom home
    if ($PAGE->url->compare(new moodle_url('/'), URL_MATCH_BASE)) {
        redirect(new moodle_url('/local/groups_plugin/home.php'));
    }
}

function local_groups_plugin_before_standard_html_head() {
    global $PAGE;
    
    // Add the module CSS to all pages
    $PAGE->requires->css('/local/groups_plugin/styles/module.css');
}

