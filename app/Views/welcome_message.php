<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CodeIgniter 4</title>
    <style>
        /* CSS стили */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .container {
            text-align: center;
            color: white;
            padding: 20px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            animation: slideIn 1s ease-out;
        }

        h1 {
            font-size: 3em;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        p {
            font-size: 1.2em;
            margin: 10px 0;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 1.1em;
            color: white;
            background: #ff9f1c;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: transform 0.3s, background 0.3s;
        }

        .btn:hover {
            transform: scale(1.1);
            background: #ffbf69;
        }

        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            animation: float 5s infinite ease-in-out;
        }

        /* Анимации */
        @keyframes slideIn {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body>
<div class="particles" id="particles"></div>
<div class="container">
    <h1>Welcome to CodeIgniter 4!</h1>
    <p>Fast. Flexible. Powerful. Let's build something awesome!</p>
    <button class="btn" onclick="wowEffect()">Click for Wow!</button>
</div>

<script>
    // JavaScript код
    function createParticle() {
        const particle = document.createElement('div');
        particle.classList.add('particle');
        const size = Math.random() * 10 + 5;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.left = `${Math.random() * 100}vw`;
        particle.style.top = `${Math.random() * 100}vh`;
        particle.style.animationDelay = `${Math.random() * 5}s`;
        document.getElementById('particles').appendChild(particle);

        setTimeout(() => particle.remove(), 5000); // Удаляем частицы через 5 секунд
    }

    // Создаём частицы каждые 300мс
    setInterval(createParticle, 300);

    function wowEffect() {
        const container = document.querySelector('.container');
        container.style.transition = 'all 0.5s';
        container.style.transform = 'rotate(360deg) scale(1.2)';
        setTimeout(() => {
            container.style.transform = 'rotate(0deg) scale(1)';
        }, 500);
        alert('Wow! You just unleashed the CodeIgniter magic!');
    }
</script>
</body>
</html>