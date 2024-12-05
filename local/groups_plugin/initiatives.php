<?php
require_once(__DIR__ . '/../../config.php');

// Page setup
$PAGE->set_url(new moodle_url('/local/groups_plugin/initiatives.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Iniciativas');

// Template context
$templatecontext = [
    'backurl' => new moodle_url('/local/groups_plugin/home.php'),
    'addInitiativeUrl' => new moodle_url('/local/groups_plugin/add_initiative.php'),
    'editInitiativesUrl' => new moodle_url('/local/groups_plugin/edit_initiatives.php'),
    
    // Filters
    'themeFilters' => [
        ['id' => 'all_themes', 'name' => 'theme', 'label' => 'TODOS'],
        ['id' => 'environmental', 'name' => 'theme', 'label' => 'AMBIENTAL'],
        ['id' => 'social', 'name' => 'theme', 'label' => 'SOCIAL']
    ],
    'profileFilters' => [
        ['id' => 'all_profiles', 'name' => 'profile', 'label' => 'TODOS'],
        ['id' => 'volunteer', 'name' => 'profile', 'label' => 'VOLUNTARIADO'],
        ['id' => 'job', 'name' => 'profile', 'label' => 'VACANTE LABORAL']
    ],
    'typeFilters' => [
        ['id' => 'all_types', 'name' => 'type', 'label' => 'TODOS'],
        ['id' => 'operational', 'name' => 'type', 'label' => 'MEJORA OPERATIVA'],
        ['id' => 'social', 'name' => 'type', 'label' => 'CAUSA SOCIAL']
    ],
    'allyFilters' => [
        ['id' => 'all_allies', 'name' => 'ally', 'label' => 'TODOS'],
        ['id' => 'frisa', 'name' => 'ally', 'label' => 'FRISA'],
        ['id' => 'impact_hub', 'name' => 'ally', 'label' => 'IMPACT HUB']
    ],
    
    // Sample initiatives
    'initiatives' => [
        [
            'image' => (string)new moodle_url('/local/groups_plugin/assets/investigacion.jpg'),
            'title' => 'FRISA REDUCCIÓN ENERGÉTICA',
            'allies' => 'FRISA, Impact Hub',
            'description' => 'Descripción de la iniciativa...',
            'contactUrl' => '#'
        ],
        [
            'image' => (string)new moodle_url('/local/groups_plugin/assets/banner2.png'),
            'title' => 'FRISA REDUCCIÓN ENERGÉTICA',
            'allies' => 'FRISA, Impact Hub',
            'description' => 'Descripción de la iniciativa...',
            'contactUrl' => '#'
        ],
        [
            'image' => (string)new moodle_url('/local/groups_plugin/assets/banner.png'),
            'title' => 'FRISA REDUCCIÓN ENERGÉTICA',
            'allies' => 'FRISA, Impact Hub',
            'description' => 'Descripción de la iniciativa...',
            'contactUrl' => '#'
        ],
        // Add more initiatives as needed
    ]
];

// Output the page
echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_groups_plugin/initiatives', $templatecontext);
echo $OUTPUT->footer(); 

echo "<style>
.initiatives-container {
    padding: 2rem;
    max-width: 100%;
    background: #fff;
}

/* Secondary Navigation */
.secondary-nav {
    background: #f5f5f5;
    padding: 1rem 0;
    margin: -6rem -6.45rem 2rem -6.45rem;
}

.secondary-nav .nav-items {
    display: flex;
    justify-content: center;
    gap: 2rem;
}

.secondary-nav .nav-item {
    color: #666;
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    transition: all 0.3s ease;
}

.secondary-nav .nav-item.active {
    background: #007bff;
    color: white;
}

/* Content Layout */
.initiatives-content {
    display: grid;
    grid-template-columns: 250px 1fr;
    gap: 2rem;
}

/* Filters Sidebar */
.filters-sidebar {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 10px;
}

.filter-group {
    margin-bottom: 1.5rem;
}

.filter-group h3 {
    font-size: 1rem;
    font-weight: 500;
    margin-bottom: 1rem;
    color: #333;
}

.filter-item {
    margin-bottom: 0.5rem;
}

/* Actions Bar */
.actions-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.search-container {
    display: flex;
    align-items: center;
    flex: 1;
    max-width: 500px;
}

.search-input {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ddd;
    border-radius: 30px;
    margin-right: 1rem;
}

.search-button,
.add-button,
.edit-button {
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 30px;
    background: #007bff;
    color: white;
    cursor: pointer;
    transition: background 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

/* Initiative Card */
.initiatives-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
}

.initiative-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.initiative-card:hover {
    transform: translateY(-5px);
}

.initiative-image {
    height: 200px;
}

.initiative-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.initiative-content {
    padding: 1.5rem;
}

.initiative-title {
    font-size: 1.25rem;
    margin-bottom: 1rem;
    color: #333;
}

.initiative-allies,
.initiative-description {
    margin-bottom: 1rem;
    font-size: 0.9rem;
    color: #666;
}

.contact-button {
    display: inline-block;
    padding: 0.8rem 1.5rem;
    background: transparent;
    border: 2px solid #007bff;
    color: #007bff;
    text-decoration: none;
    border-radius: 30px;
    transition: all 0.3s ease;
}

.contact-button:hover {
    background: #007bff;
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .initiatives-content {
        grid-template-columns: 1fr;
    }

    .actions-bar {
        flex-direction: column;
        gap: 1rem;
    }

    .search-container {
        max-width: 100%;
    }

    .nav-items {
        flex-direction: column;
        align-items: center;
    }
}
</style>";