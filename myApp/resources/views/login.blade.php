<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kasir - Modern Bakery</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fffaf0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 400px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        }

        .logo {
            text-align: center;
            color: #65151b;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #2e211c;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #65151b;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #8f2028;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #65151b;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="login-box">

        <div class="logo">MODERN BAKERY</div>

        <div class="subtitle">
            Login Kasir
        </div>

        <form>
            <label>Email</label>
            <input type="email" placeholder="Masukkan email">

            <label>Password</label>
            <input type="password" placeholder="Masukkan password">

            <button type="submit">
                Login
            </button>
        </form>

        <a href="/" class="back">
            ← Kembali ke Beranda
        </a>

    </div>

</body>
</html>