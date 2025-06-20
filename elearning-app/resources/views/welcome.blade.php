<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLearning | SMK Negeri 1 Contoh</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth-style.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #3498db, #2ecc71);
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background: rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        header img {
            width: 80px;
        }

        main {
            flex: 1;
            text-align: center;
            padding: 40px 20px;
        }

        main h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        main p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn-group {
            margin-top: 20px;
        }

        .btn {
            background-color: #ffffff;
            color: #2c3e50;
            border: none;
            padding: 14px 28px;
            font-size: 1rem;
            border-radius: 8px;
            margin: 0 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 600;
        }

        .btn:hover {
            background-color: #f1f1f1;
        }

        footer {
            background: rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 10px;
            font-size: 0.9rem;
        }

        @media (max-width: 600px) {
            main h1 {
                font-size: 2rem;
            }
            .btn {
                margin-top: 10px;
                display: block;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo Sekolah">
    </header>

    <main>
        <h1>Selamat Datang di Portal ELearning Submission</h1>
        <p>SMP Negeri 1  - Sistem Pembelajaran Digital untuk Siswa & Guru</p>
        <div class="btn-group">
            <a href="{{ route('login') }}" class="btn">Login Siswa</a>
            <a href="{{ route('login.guru') }}" class="btn">Login Guru</a>
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} ELearning Submission. All rights reserved.
    </footer>
</body>
</html>
