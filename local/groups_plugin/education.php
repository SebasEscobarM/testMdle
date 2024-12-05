<?php
require_once(__DIR__ . '/../../config.php');

$templatecontext = [
    'backurl' => new moodle_url('/local/groups_plugin/home.php'),
    'username' => $USER->firstname . ' ' . $USER->lastname,
    'description' => 'Explicación informativa más a detalle de lo que hace el nodo en Educación y MAS Multimedia',
    'searchPlaceholder' => 'Buscar en oferta educativa...',
    'canAdd' => true,
    'canEdit' => true,
    'addButtonText' => 'AGREGAR UNA INICIATIVA',
    'editButtonText' => 'EDITAR MIS INICIATIVAS',
    'filterGroups' => [
        [
            'groupTitle' => 'BÚSQUEDA POR TEMA',
            'filters' => [
                ['id' => 'all_topics', 'name' => 'topics', 'label' => 'TODOS'],
                ['id' => 'entrepreneurship', 'name' => 'topics', 'label' => 'EMPRENDIMIENTO'],
                ['id' => 'teaching', 'name' => 'topics', 'label' => 'DOCENCIA']
            ]
        ],
        // Add other filter groups...
    ],
    'items' => [
        [
            'image' => (string)new moodle_url('/local/groups_plugin/assets/investigacion.jpg'),
            'title' => 'STARTUPSHIP - EDICIÓN SEPTIEMBRE 2024',
            'details' => [
                ['label' => 'FECHA', 'value' => 'Septiembre 2024'],
                ['label' => 'FORMATO', 'value' => 'VIRTUAL'],
                ['label' => 'ALIADOS', 'value' => 'Universidad X, Empresa Y']
            ],
            'actions' => [
                ['url' => '#', 'text' => 'CONTÁCTANOS', 'class' => 'primary']
            ],
        ],
        [
            'image' => (string)new moodle_url('/local/groups_plugin/assets/banner.png'),
            'title' => 'STARTUPSHIP - EDICIÓN SEPTIEMBRE 2024',
            'details' => [
                ['label' => 'FECHA', 'value' => 'Septiembre 2024'],
                ['label' => 'FORMATO', 'value' => 'VIRTUAL'],
                ['label' => 'ALIADOS', 'value' => 'Universidad X, Empresa Y']
            ],
            'actions' => [
                ['url' => '#', 'text' => 'CONTÁCTANOS', 'class' => 'primary']
            ],
        ],
    ],
    'showPartnerLogos' => true,
    'partnerSectionTitle' => 'INSTITUCIONES Y CENTROS EDUCATIVOS ALIADOS',
    'partners' => [
        ['logo' => 'path/to/logo1.png', 'name' => 'Partner 1'],
        // Add more partners...
    ]
];

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_groups_plugin/education_base', $templatecontext);
echo $OUTPUT->footer();

echo "<style>
    /* Module Container */
    .module-container {
        padding: 2rem;
        max-width: 100%;
        background: #fff;
    }

    /* Header Styles */
    .module-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .back-button {
        color: #333;
        text-decoration: none;
        font-weight: 500;
    }

    /* Search and Actions Bar */
    .search-actions-bar {
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
    }

    /* Module Content Layout */
    .module-content {
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
        font-size: 1.1rem;
        margin-bottom: 1rem;
        color: #333;
    }

    .filter-item {
        margin-bottom: 0.5rem;
    }

    /* Cards Container */
    .cards-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
    }

    /* Module Card */
    .course-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .course-card:hover {
        transform: translateY(-5px);
    }

    .card-image {
        position: relative;
        height: 200px;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-badge {
        position: absolute;
        right: 1rem;
        top: 1rem;
        background: #007bff;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
    }

    .card-content {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
        color: #333;
    }

    .card-subtitle {
        font-size: 1rem;
        color: #666;
        margin-bottom: 1rem;
    }

    .card-details {
        margin-bottom: 1rem;
    }

    .card-button {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        background: transparent;
        border: 2px solid #007bff;
        color: #007bff;
        text-decoration: none;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .card-button:hover {
        background: #007bff;
        color: white;
    }

    /* Partners Section */
    .partners-section {
        grid-column: 1 / -1;
        margin-top: 2rem;
    }

    .partner-logos {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        gap: 2rem;
        align-items: center;
    }

    .partner-logo {
        max-width: 100%;
        height: auto;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .module-content {
            grid-template-columns: 1fr;
        }

        .search-actions-bar {
            flex-direction: column;
            gap: 1rem;
        }

        .search-container {
            max-width: 100%;
        }
    }
</style>";