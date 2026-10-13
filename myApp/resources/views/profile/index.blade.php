
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Modern Bakery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f5f0;
            margin: 0;
            padding: 40px 20px;
            color: #333;
        }

        .profile-card {
            max-width: 500px;
            margin: auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            color: #8b5e3c;
        }

        .info {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .label {
            font-weight: bold;
        }

        .back-button {
            display: inline-block;
            margin-top: 24px;
            padding: 12px 18px;
            background: #8b5e3c;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <h1>Profil Saya</h1>

        <div class="info">
            <span class="label">Nama:</span>
            {{ $user->nama }}
        </div>

        <div class="info">
            <span class="label">Username:</span>
            {{ $user->username }}
        </div>

        <div class="info">
            <span class="label">Role:</span>
            {{ $user->role }}
        </div>

        <a href="{{ route('admin.dashboard') }}" class="back-button">
            Kembali ke Dashboard
        </a>
    </div>
</body>
</html>