<?php
require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir . '/filelib.php');

// Check login requirements
require_login();

// Page setup
$PAGE->set_url(new moodle_url('/local/groups_plugin/nodus_ai.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Nodus AI');
$PAGE->set_heading('Nodus AI');

// Get chat history from session or initialize
if (!isset($SESSION->chat_messages)) {
    $SESSION->chat_messages = array();
}

// Handle new message submission
if ($data = data_submitted()) {
    if (isset($data->message) && trim($data->message) !== '') {
        // Add user message to history
        $SESSION->chat_messages[] = [
            'type' => 'user',
            'content' => trim($data->message)
        ];
        
        // Here you would integrate with your AI service
        // For now, we'll just echo a simple response
        $ai_response = "Esta es una respuesta de prueba. Aquí conectarías con tu servicio de IA.";
        
        $SESSION->chat_messages[] = [
            'type' => 'ai',
            'content' => $ai_response
        ];
        
        redirect($PAGE->url);
    }
}

// Prepare template context
$templatecontext = [
    'messages' => $SESSION->chat_messages,
    'backurl' => new moodle_url('/local/groups_plugin/home.php'),
    'submiturl' => $PAGE->url,
    'loggedin' => isloggedin(),
    'loginurl' => new moodle_url('/login/index.php'),
    'logouturl' => new moodle_url('/login/logout.php', ['sesskey' => sesskey()])
];

// Output page
echo $OUTPUT->header();

// Add Font Awesome
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">';

// Add custom styles
echo "<style>
    .nodus-container {
        max-width: 100%;
        height: calc(100vh - 100px);
        display: flex;
        flex-direction: column;
        background: #fff;
    }

    .nodus-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        background: #fff;
        border-bottom: 1px solid #eee;
    }

    .header-left, .header-right {
        flex: 1;
    }

    .header-center {
        text-align: center;
    }

    .header-center h1 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 500;
    }

    .back-button, .login-button {
        color: #333;
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }

    .back-button:hover, .login-button:hover {
        color: #007bff;
        text-decoration: none;
    }

    .chat-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #f8f9fa;
        overflow: hidden;
    }

    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 2rem;
    }

    .message {
        margin-bottom: 1.5rem;
        display: flex;
        flex-direction: column;
    }

    .user-message {
        align-items: flex-end;
    }

    .ai-message {
        align-items: flex-start;
    }

    .message-content {
        max-width: 70%;
        padding: 1rem;
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .user-message .message-content {
        background: #007bff;
        color: #fff;
    }

    .message-content p {
        margin: 0;
        line-height: 1.5;
    }

    .chat-input-container {
        padding: 1.5rem;
        background: #fff;
        border-top: 1px solid #eee;
    }

    .input-group {
        display: flex;
        gap: 1rem;
    }

    .chat-input {
        border: 1px solid #ddd;
        border-radius: 30px !important;
        padding: 0.8rem 1.5rem !important;
        font-size: 1rem;
    }

    .send-button {
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .send-button:hover {
        background: #0056b3;
    }

    @media (max-width: 768px) {
        .message-content {
            max-width: 85%;
        }
        
        .nodus-header {
            padding: 1rem;
        }
    }
</style>";

// Render template
echo $OUTPUT->render_from_template('local_groups_plugin/nodus_ai', $templatecontext);

// Add custom JavaScript
echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatMessages = document.getElementById('chatMessages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
        
        const chatForm = document.getElementById('chatForm');
        const userInput = document.getElementById('userInput');
        
        chatForm.addEventListener('submit', function() {
            userInput.disabled = true;
        });
    });
</script>";

echo $OUTPUT->footer(); 