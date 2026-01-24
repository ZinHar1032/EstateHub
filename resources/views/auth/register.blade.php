<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EstateHub | Inscription</title>
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
            width: 1000px;
            max-width: 100%;
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0,0,0,.25);
            animation: fadeUp .7s ease;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* LEFT */
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
            background: rgba(0,0,0,.6);
        }

        .estatehub-left-content {
            position: relative;
            padding: 45px;
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

        /* RIGHT */
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

        .login-link {
            font-size: 14px;
            color: #2c5364;
            text-decoration: none;
        }

        .login-link:hover {
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
            <h2>Rejoignez EstateHub</h2>
            <p>
                Créez votre compte et commencez à gérer
                vos biens immobiliers efficacement.
            </p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="estatehub-right">

        <div class="estatehub-logo mb-3">
            <i class="bi bi-building"></i> EstateHub
        </div>

        <h4 class="fw-bold mb-4">Créer un compte</h4>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nom complet -->
            <div class="mb-3">
                <label class="form-label">Nom complet</label>
                <input type="text"
                       name="nom_complet"
                       value="{{ old('nom_complet') }}"
                       class="form-control @error('nom_complet') is-invalid @enderror"
                       required autofocus>

                @error('nom_complet')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Téléphone -->
            <div class="mb-3">
                <label class="form-label">Téléphone</label>
                <input type="tel"
                       name="tel"
                       value="{{ old('tel') }}"
                       class="form-control @error('tel') is-invalid @enderror"
                       required>

                @error('tel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Ville -->
            <div class="mb-3">
                <label class="form-label">Ville</label>
                <input type="text"
                       name="ville"
                       value="{{ old('ville') }}"
                       class="form-control @error('ville') is-invalid @enderror"
                       required>

                @error('ville')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror"
                       required>

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
                           required>

                    <span class="input-group-text toggle-password" onclick="togglePassword('password','eye1')">
                        <i class="bi bi-eye" id="eye1"></i>
                    </span>
                </div>

                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm -->
            <div class="mb-4">
                <label class="form-label">Confirmer le mot de passe</label>
                <div class="input-group">
                    <input type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           class="form-control"
                           required>

                    <span class="input-group-text toggle-password" onclick="togglePassword('password_confirmation','eye2')">
                        <i class="bi bi-eye" id="eye2"></i>
                    </span>
                </div>
            </div>

            <!-- Button -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-estatehub">
                    Créer mon compte
                </button>
            </div>

            <!-- Login -->
            <div class="text-center">
                <a href="{{ route('login') }}" class="login-link">
                    Déjà inscrit ? Se connecter
                </a>
            </div>

        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS -->
<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
</script>

</body>
</html>
