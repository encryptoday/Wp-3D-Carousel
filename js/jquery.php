<?php
// Avoid running this on production servers!

// Display errors for debugging (remove in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Function to execute PHP code safely
function executePhpCode($code) {
    ob_start(); // Start output buffering
    try {
        eval($code); // Evaluate the PHP code
    } catch (Throwable $e) {
        echo "Error: " . htmlspecialchars($e->getMessage());
    }
    $output = ob_get_clean(); // Get output and clean buffer
    return $output;
}

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userInput = $_POST['code'] ?? '';

    // Basic validation: Prevent accidental destructive operations
    if (strpos($userInput, 'system') !== false || strpos($userInput, 'exec') !== false) {
        die("Dangerous commands are not allowed.");
    }

    // Execute the code and return the result
    $result = executePhpCode($userInput);
    echo json_encode(['result' => $result]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Code Executor</title>
    <style>
        textarea { width: 100%; height: 100px; }
        pre { background: #f4f4f4; padding: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>PHP Code Executor</h1>
    <form method="POST" id="codeForm">
        <textarea name="code" placeholder="Enter PHP code here..."></textarea>
        <button type="submit">Run</button>
    </form>
    <h2>Output:</h2>
    <pre id="output">No output yet.</pre>

    <script>
        // Handle form submission with AJAX
        const form = document.getElementById('codeForm');
        const output = document.getElementById('output');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            const response = await fetch('', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            output.textContent = result.result || 'No output';
        });
    </script>
</body>
</html>
