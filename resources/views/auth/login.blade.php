<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EstateHub | Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- EstateHub CSS -->
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(120deg, #0f2027, #203a43, #2c5364);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .estatehub-container {
            display: flex;
            width: 900px;
            max-width: 100%;
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0,0,0,.25);
            animation: fadeUp .7s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* LEFT SIDE */
        .estatehub-left {
            flex: 1;
            background: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa')
                        center/cover no-repeat;
            position: relative;
            color: #fff;
        }

        .estatehub-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,.55);
        }

        .estatehub-left-content {
            position: relative;
            padding: 40px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .estatehub-left h2 {
            font-weight: 700;
        }

        .estatehub-left p {
            opacity: .9;
        }

        /* RIGHT SIDE */
        .estatehub-right {
            flex: 1;
            padding: 45px;
        }

        .estatehub-logo {
            font-size: 26px;
            font-weight: 800;
            color: #2c5364;
        }

        .estatehub-logo i {
            color: #1cc88a;
        }

        .estatehub-right h4 {
            margin-top: 20px;
            font-weight: 700;
        }

        .form-control {
            height: 50px;
            border-radius: 12px;
        }

        .btn-estatehub {
            background: linear-gradient(135deg, #1cc88a, #28a745);
            border: none;
            height: 50px;
            font-weight: 600;
            border-radius: 12px;
        }

        .btn-estatehub:hover {
            opacity: .9;
        }

        .toggle-password {
            cursor: pointer;
        }

        .forgot-link {
            font-size: 14px;
            color: #2c5364;
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .estatehub-left {
                display: none;
            }
            .estatehub-container {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="estatehub-container">

    <!-- LEFT -->
    <div class="estatehub-left">
        <div class="estatehub-left-content">
            <h2>Bienvenue sur EstateHub</h2>
            <p>
                Gérez vos biens immobiliers, ventes et locations
                depuis une seule plateforme moderne et sécurisée.
            </p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="estatehub-right">

        <div class="estatehub-logo">
            <i class="bi bi-building"></i> EstateHub
        </div>

        <h4>Connexion</h4>

        <!-- Session status -->
        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Adresse Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="agent@estatehub.com"
                       required autofocus>

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <div class="input-group">
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="••••••••"
                           required>

                    <span class="input-group-text toggle-password" onclick="togglePassword()">
                        <i class="bi bi-eye" id="eyeIcon"></i>
                    </span>
                </div>

                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Se souvenir de moi
                </label>
            </div>

            <!-- Button -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-estatehub">
                    Accéder au tableau de bord
                </button>
            </div>

            <!-- Forgot -->
            @if (Route::has('password.request'))
                <div class="text-center">
                    <a href="{{ route('password.request') }}" class="forgot-link">
                        Mot de passe oublié ?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS -->
<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');

        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
</script>

</body>
</html>
