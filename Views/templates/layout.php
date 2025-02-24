<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notebook - CodeIgniter 4</title>
    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <!-- Кастомные стили -->
    <style>
        body {
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }
        .container {
            padding-top: 20px;
            max-width: 800px;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .input-field label {
            color: #424242;
        }
        .input-field input:focus + label,
        .input-field textarea:focus + label {
            color: #1976d2 !important;
        }
        .input-field input:focus,
        .input-field textarea:focus {
            border-bottom: 1px solid #1976d2 !important;
            box-shadow: 0 1px 0 0 #1976d2 !important;
        }
        .accordion-header {
            cursor: pointer;
            padding: 15px;
            background: #fff;
            border-bottom: 1px solid #e0e0e0;
        }
        .accordion-content {
            display: none;
            padding: 15px;
            background: #fafafa;
        }
        .importance-chip {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 12px;
            color: white;
            font-size: 12px;
            margin-left: 10px;
        }
        .low { background: #4caf50; }
        .medium { background: #ff9800; }
        .high { background: #d32f2f; }
    </style>
</head>
<body>
<div class="container">
    <!-- Здесь будет основной контент -->
    <?= $this->renderSection('content') ?>
</div>

<!-- Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- Кастомный JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Аккордеон
        const headers = document.querySelectorAll('.accordion-header');
        headers.forEach(header => {
            header.addEventListener('click', function () {
                const content = this.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });

        // Фильтрация по важности
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                const filter = this.getAttribute('data-filter');
                const notes = document.querySelectorAll('.note-item');
                notes.forEach(note => {
                    if (filter === 'all' || note.getAttribute('data-importance') === filter) {
                        note.style.display = 'block';
                    } else {
                        note.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
</body>
</html>