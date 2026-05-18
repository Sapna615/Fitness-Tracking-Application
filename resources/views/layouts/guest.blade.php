<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Portal - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Outfit', sans-serif; 
            background: linear-gradient(135deg, #1e3a8a 0%, #4c1d95 100%);
            min-h-screen: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .auth-card { 
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            padding: 40px;
        }
        .auth-logo { 
            font-weight: 800; 
            letter-spacing: -1px; 
            color: #1e3a8a;
            font-size: 2rem;
            margin-bottom: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="auth-logo uppercase italic">
            FITNESS<span class="text-primary">PORTAL</span>
        </div>
        {{ $slot }}
    </div>
</body>
</html>
