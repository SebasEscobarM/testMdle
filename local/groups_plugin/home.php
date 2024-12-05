<?php
require_once(__DIR__ . '/../../config.php');

// Configuración de la página en Moodle
$PAGE->set_url(new moodle_url('/local/groups_plugin/home.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Nodo de Innovación Económica');

$images = [
    (object)[
        'url' => (string)new moodle_url('/local/groups_plugin/assets/investigacion.jpg'),
        'isfirst' => true  // La primera imagen se marca como "isfirst"
    ],
    (object)[
        'url' => (string)new moodle_url('/local/groups_plugin/assets/banner.png'),
        'isfirst' => false 
    ],
    (object)[
        'url' => (string)new moodle_url('/local/groups_plugin/assets/banner2.png'),
        'isfirst' => false
    ]
];

// Datos para la plantilla
$templatecontext = (object)[
    'images' => $images,
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In purus diam, maximus sit amet interdum ac, sodales vel massa. Phasellus elementum a nunc eget semper. Donec dictum venenatis sagittis. Nulla libero odio, maximus ut efficitur non, condimentum ac elit. Proin bibendum consectetur erat. Sed tristique varius erat in blandit. Proin a ipsum vitae velit aliquam ultricies non ut purus.',
    'education' => 'Conoce la oferta educativa actual y la innovación educativa realizada por el Nodo e instituciones aliadas.',
    'collaboration' => 'Conoce las iniciativas desearrolladas por el Nodo y organizaciones aliadas.
                        Revisa vacantes de voluntarios de acuerdo a tus intereses y perfil.
                        Si eres una organización que busca colaborar, también contáctanos.',
    'research' => ' Conoce las distintas publicaciones generadas por el Nodo y su red de investigadores.
                    Si eres investigador también puedes contactarnos para pertenecer a esta red, colaborar con investigadores y difundir tus artículos.',
    'ai' => 'Participa en nuestros cursos educativos, colbora con nuestras iniciativas o genera investigación para tener acceso a NODUS, nuestra intelgiencia artificial entrenada en temas de sostenibilidad y triple impacto.',
    'educationurl' => new moodle_url('/local/groups_plugin/education.php'),
    'collaborationurl' => new moodle_url('/local/groups_plugin/initiatives.php'),
    'researchurl' => new moodle_url('/path/to/research'),
    'aiurl' => new moodle_url('/local/groups_plugin/nodus_ai.php'),
    'imageDescription' => (string)new moodle_url('/local/groups_plugin/assets/descripcion.png'),
];

// Renderizar la plantilla
echo $OUTPUT->header();

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';

echo $OUTPUT->render_from_template('local_groups_plugin/home', $templatecontext);
echo $OUTPUT->footer();
echo "<style>
    /* Header Styles */
    .navbar {
        padding: 16px; /* Add padding to the header */
    }

    /* Modern Container */
    .modern-container {
        padding: 0;
        max-width: 100%;
    }

    /* Carousel Styles */
    .modern-carousel {
        height: 70vh;
        margin-bottom: 4rem;
        margin-top: -5rem; /* Remove space between header and carousel */
        margin-left: -4.45rem;
        margin-right: -4.45rem;
    }

    .carousel-item img {
        width: 100%;
        height: 70vh;
        object-fit: cover;
    }
    
    .carousel-control-prev {
        margin-left: 1rem;
    }

    .carousel-control-next {
        margin-right: 1rem;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 3rem;
        height: 3rem;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
    }

    

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(1);
    }

    /* About Section */
    .modern-section {
        padding: 4rem 8%; /* Ensure consistent padding */
        background: #ffffff;
    }

    .modern-title {
        font-size: 2.5rem;
        font-weight: 300;
        margin-bottom: 1.5rem;
        color: #333;
    }

    .modern-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #666;
    }

    .modern-image {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }

    /* Categories Section */
    .modern-categories {
        padding: 4rem 8%; /* Ensure consistent padding */
        background: #f8f9fa;
        margin-left: -4.45rem;
        margin-right: -4.45rem;
    }

    .category-card {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        height: 100%;
        transition: transform 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .category-card:hover {
        transform: translateY(-5px);
    }

    .category-card h4 {
        color: #333;
        font-size: 1.5rem;
        font-weight: 500;
        margin-bottom: 1rem;
    }

    .category-card p {
        color: #666;
        margin-bottom: 1.5rem;
        font-size: 1rem;
        line-height: 1.6;
    }

    .modern-button {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        background: transparent;
        border: 2px solid #007bff;
        color: #007bff;
        text-decoration: none;
        border-radius: 30px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .modern-button:hover {
        background: #007bff;
        color: white;
        text-decoration: none;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .modern-section {
            padding: 2rem 5%;
        }
        
        .modern-categories {
            padding: 2rem 5%;
        }
        
        .modern-title {
            font-size: 2rem;
        }
        
        .category-card {
            margin-bottom: 1rem;
        }
    }
</style>";
