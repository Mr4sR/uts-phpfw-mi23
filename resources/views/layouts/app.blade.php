<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎮 Game Manager</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        :root {
            --neon-blue: #00f0ff;
            --neon-blue-dark: #0099cc;
            --neon-purple: #7b2cbf;
            --dark-bg: #0a0a0f;
            --dark-card: #12121a;
            --dark-card-hover: #1a1a2e;
            --dark-border: #1e1e30;
            --text-primary: #ffffff;
            --text-secondary: #a0a0b0;
            --gradient-neon: linear-gradient(135deg, #00f0ff, #7b2cbf);
            --glow-blue: 0 0 20px rgba(0, 240, 255, 0.5);
            --glow-purple: 0 0 20px rgba(123, 44, 191, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at 20% 20%, rgba(0, 240, 255, 0.1) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 80%, rgba(123, 44, 191, 0.1) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 50%, rgba(0, 240, 255, 0.05) 0%, transparent 70%);
            z-index: -1;
            animation: backgroundPulse 8s ease-in-out infinite;
        }

        @keyframes backgroundPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        /* Grid Pattern Overlay */
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(0, 240, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 240, 255, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: -1;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        /* Navbar Styling */
        .navbar-gaming {
            background: linear-gradient(180deg, rgba(18, 18, 26, 0.98) 0%, rgba(10, 10, 15, 0.95) 100%);
            border-bottom: 2px solid transparent;
            border-image: var(--gradient-neon) 1;
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            position: relative;
            overflow: hidden;
        }

        .navbar-gaming::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 200%;
            height: 2px;
            background: var(--gradient-neon);
            animation: scanLine 3s linear infinite;
        }

        @keyframes scanLine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .navbar-brand-gaming {
            font-family: 'Orbitron', monospace;
            font-size: 1.8rem;
            font-weight: 800;
            background: var(--gradient-neon);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(0, 240, 255, 0.5);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .navbar-brand-gaming:hover {
            transform: scale(1.05);
            filter: brightness(1.2);
        }

        .navbar-brand-gaming i {
            font-size: 2rem;
            animation: iconPulse 2s ease-in-out infinite;
        }

        @keyframes iconPulse {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 0 10px var(--neon-blue)); }
            50% { transform: scale(1.1); filter: drop-shadow(0 0 20px var(--neon-blue)); }
        }

        /* Container */
        .container-gaming {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Cards */
        .card-gaming {
            background: linear-gradient(145deg, var(--dark-card) 0%, rgba(18, 18, 26, 0.8) 100%);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card-gaming::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gradient-neon);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card-gaming:hover {
            transform: translateY(-5px);
            border-color: var(--neon-blue);
            box-shadow: var(--glow-blue), 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .card-gaming:hover::before {
            opacity: 1;
        }

        .card-header-gaming {
            background: linear-gradient(135deg, rgba(0, 240, 255, 0.1) 0%, rgba(123, 44, 191, 0.1) 100%);
            border-bottom: 1px solid var(--dark-border);
            padding: 1.25rem 1.5rem;
            font-family: 'Orbitron', monospace;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--neon-blue);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header-gaming i {
            animation: iconGlow 2s ease-in-out infinite;
        }

        @keyframes iconGlow {
            0%, 100% { filter: drop-shadow(0 0 5px var(--neon-blue)); }
            50% { filter: drop-shadow(0 0 15px var(--neon-blue)); }
        }

        .card-body-gaming {
            padding: 1.5rem;
        }

        /* Table Styling */
        .table-gaming {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        .table-gaming thead th {
            background: linear-gradient(135deg, rgba(0, 240, 255, 0.15) 0%, rgba(123, 44, 191, 0.15) 100%);
            color: var(--neon-blue);
            font-family: 'Orbitron', monospace;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 1rem 1.25rem;
            border: none;
            position: relative;
        }

        .table-gaming thead th:first-child {
            border-radius: 10px 0 0 10px;
        }

        .table-gaming thead th:last-child {
            border-radius: 0 10px 10px 0;
        }

        .table-gaming tbody tr {
            background: rgba(26, 26, 46, 0.5);
            transition: all 0.3s ease;
        }

        .table-gaming tbody tr:hover {
            background: rgba(0, 240, 255, 0.1);
            transform: scale(1.01);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.2);
        }

        .table-gaming tbody td {
            padding: 1rem 1.25rem;
            border: none;
            color: var(--text-secondary);
            font-size: 1rem;
            vertical-align: middle;
        }

        .table-gaming tbody td:first-child {
            border-radius: 10px 0 0 10px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .table-gaming tbody td:last-child {
            border-radius: 0 10px 10px 0;
        }

        /* Buttons */
        .btn-gaming {
            font-family: 'Orbitron', monospace;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-gaming::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-gaming:hover::before {
            left: 100%;
        }

        .btn-primary-gaming {
            background: var(--gradient-neon);
            color: var(--dark-bg);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.3);
        }

        .btn-primary-gaming:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(0, 240, 255, 0.5), 0 10px 20px rgba(0, 0, 0, 0.3);
            color: var(--dark-bg);
        }

        .btn-success-gaming {
            background: linear-gradient(135deg, #00ff88 0%, #00cc6a 100%);
            color: var(--dark-bg);
            box-shadow: 0 0 20px rgba(0, 255, 136, 0.3);
        }

        .btn-success-gaming:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(0, 255, 136, 0.5);
            color: var(--dark-bg);
        }

        .btn-warning-gaming {
            background: linear-gradient(135deg, #ffd700 0%, #ffaa00 100%);
            color: var(--dark-bg);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        }

        .btn-warning-gaming:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.5);
            color: var(--dark-bg);
        }

        .btn-danger-gaming {
            background: linear-gradient(135deg, #ff4757 0%, #ff3344 100%);
            color: white;
            box-shadow: 0 0 20px rgba(255, 71, 87, 0.3);
        }

        .btn-danger-gaming:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(255, 71, 87, 0.5);
        }

        .btn-secondary-gaming {
            background: linear-gradient(135deg, #4a4a5a 0%, #3a3a4a 100%);
            color: var(--text-primary);
            border: 1px solid var(--dark-border);
        }

        .btn-secondary-gaming:hover {
            transform: translateY(-2px);
            border-color: var(--neon-blue);
            box-shadow: var(--glow-blue);
            color: var(--neon-blue);
        }

        .btn-sm-gaming {
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }

        /* Form Controls */
        .form-control-gaming {
            background: rgba(26, 26, 46, 0.8);
            border: 2px solid var(--dark-border);
            border-radius: 10px;
            color: var(--text-primary);
            padding: 0.875rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control-gaming:focus {
            background: rgba(26, 26, 46, 0.95);
            border-color: var(--neon-blue);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.2);
            outline: none;
            color: var(--text-primary);
        }

        .form-control-gaming::placeholder {
            color: var(--text-secondary);
        }

        .form-label-gaming {
            font-family: 'Orbitron', monospace;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--neon-blue);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Page Title */
        .page-title-gaming {
            font-family: 'Orbitron', monospace;
            font-size: 2rem;
            font-weight: 700;
            background: var(--gradient-neon);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 0;
        }

        .page-title-gaming i {
            font-size: 1.8rem;
            color: var(--neon-blue);
            -webkit-text-fill-color: var(--neon-blue);
            animation: iconFloat 3s ease-in-out infinite;
        }

        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        /* Price Tag */
        .price-tag {
            background: linear-gradient(135deg, rgba(0, 255, 136, 0.2) 0%, rgba(0, 204, 106, 0.2) 100%);
            color: #00ff88;
            padding: 0.35rem 0.75rem;
            border-radius: 6px;
            font-family: 'Orbitron', monospace;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid rgba(0, 255, 136, 0.3);
        }

        /* Genre Badge */
        .genre-badge {
            background: linear-gradient(135deg, rgba(123, 44, 191, 0.3) 0%, rgba(0, 240, 255, 0.2) 100%);
            color: var(--neon-blue);
            padding: 0.35rem 0.75rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid rgba(0, 240, 255, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--neon-blue);
            margin-bottom: 1rem;
            opacity: 0.5;
            animation: emptyPulse 2s ease-in-out infinite;
        }

        @keyframes emptyPulse {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.05); }
        }

        .empty-state p {
            font-size: 1.2rem;
            margin: 0;
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .slide-in {
            animation: slideIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Row Animation */
        .table-gaming tbody tr {
            animation: rowFadeIn 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes rowFadeIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .table-gaming tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .table-gaming tbody tr:nth-child(2) { animation-delay: 0.15s; }
        .table-gaming tbody tr:nth-child(3) { animation-delay: 0.2s; }
        .table-gaming tbody tr:nth-child(4) { animation-delay: 0.25s; }
        .table-gaming tbody tr:nth-child(5) { animation-delay: 0.3s; }
        .table-gaming tbody tr:nth-child(6) { animation-delay: 0.35s; }
        .table-gaming tbody tr:nth-child(7) { animation-delay: 0.4s; }
        .table-gaming tbody tr:nth-child(8) { animation-delay: 0.45s; }
        .table-gaming tbody tr:nth-child(9) { animation-delay: 0.5s; }
        .table-gaming tbody tr:nth-child(10) { animation-delay: 0.55s; }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gradient-neon);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--neon-blue);
        }

        /* Action Buttons Group */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        /* Responsive Mobile - Tablet */
        @media (max-width: 991px) {
            .navbar-gaming {
                padding: 0.75rem 0;
            }

            .navbar-brand-gaming {
                font-size: 1.4rem;
            }

            .navbar-brand-gaming i {
                font-size: 1.6rem;
            }

            .page-title-gaming {
                font-size: 1.5rem;
                gap: 10px;
            }

            .page-title-gaming i {
                font-size: 1.5rem;
            }

            .container-gaming {
                padding: 1rem;
            }

            .card-header-gaming {
                padding: 1rem 1rem;
                font-size: 1rem;
            }

            .card-body-gaming {
                padding: 1rem;
            }

            .btn-gaming {
                padding: 0.65rem 1.2rem;
                font-size: 0.75rem;
            }

            .btn-sm-gaming {
                padding: 0.45rem 0.8rem;
                font-size: 0.7rem;
            }

            .table-gaming tbody td {
                padding: 0.8rem 0.8rem;
                font-size: 0.9rem;
            }

            .table-gaming thead th {
                padding: 0.8rem 0.8rem;
                font-size: 0.75rem;
            }

            .form-control-gaming {
                padding: 0.75rem 1rem;
                font-size: 0.95rem;
            }

            .form-label-gaming {
                font-size: 0.8rem;
                margin-bottom: 0.4rem;
            }

            .price-tag, .genre-badge {
                font-size: 0.8rem;
                padding: 0.25rem 0.6rem;
            }
        }

        /* Mobile Phones - Small */
        @media (max-width: 576px) {
            :root {
                font-size: 14px;
            }

            body {
                overflow-x: hidden;
            }

            .navbar-gaming {
                padding: 0.6rem 0;
                border-bottom: 1px solid var(--dark-border);
            }

            .container {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }

            .navbar-brand-gaming {
                font-size: 1.1rem;
                gap: 8px;
            }

            .navbar-brand-gaming i {
                font-size: 1.3rem;
            }

            .page-title-gaming {
                font-size: 1.2rem;
                gap: 8px;
                flex-wrap: wrap;
            }

            .page-title-gaming i {
                font-size: 1.2rem;
            }

            .container-gaming {
                padding: 0.75rem;
            }

            .d-flex {
                flex-wrap: wrap;
                gap: 0.75rem;
            }

            .card-gaming {
                border-radius: 12px;
            }

            .card-header-gaming {
                padding: 0.85rem 1rem;
                font-size: 0.95rem;
                gap: 8px;
            }

            .card-header-gaming i {
                font-size: 1rem;
            }

            .card-body-gaming {
                padding: 0.85rem;
            }

            .btn-gaming {
                padding: 0.6rem 1rem;
                font-size: 0.7rem;
                letter-spacing: 0.5px;
                min-height: 38px;
                display: flex;
                align-items: center;
                justify-content: center;
                width: auto;
            }

            .btn-sm-gaming {
                padding: 0.4rem 0.6rem;
                font-size: 0.65rem;
                min-height: 36px;
            }

            .btn-primary-gaming, .btn-success-gaming, 
            .btn-warning-gaming, .btn-danger-gaming, 
            .btn-secondary-gaming {
                white-space: nowrap;
            }

            .action-buttons {
                gap: 4px;
                flex-wrap: wrap;
            }

            /* Table Mobile View */
            .table-gaming {
                border-spacing: 0 6px;
            }

            .table-gaming thead {
                display: none;
            }

            .table-gaming, .table-gaming tbody, 
            .table-gaming tr, .table-gaming td {
                display: block;
                width: 100%;
            }

            .table-gaming tr {
                background: rgba(26, 26, 46, 0.5);
                margin-bottom: 1rem;
                border-radius: 10px;
                padding: 0.5rem 0;
                border: 1px solid var(--dark-border);
                overflow: hidden;
            }

            .table-gaming tr:hover {
                background: rgba(0, 240, 255, 0.1);
            }

            .table-gaming td {
                padding: 0.7rem 1rem;
                text-align: left;
                border-radius: 0;
            }

            .table-gaming td:first-child {
                border-radius: 0;
                padding-top: 1rem;
                font-weight: 600;
                color: var(--neon-blue);
                border-bottom: 1px solid var(--dark-border);
            }

            .table-gaming td:last-child {
                border-radius: 0;
                padding-bottom: 0.7rem;
            }

            .table-gaming td::before {
                content: attr(data-label);
                font-family: 'Orbitron', monospace;
                font-weight: 600;
                color: var(--neon-blue);
                display: block;
                font-size: 0.75rem;
                text-transform: uppercase;
                letter-spacing: 1px;
                margin-bottom: 0.3rem;
            }

            /* Form Mobile */
            .row {
                flex-direction: column;
            }

            .col-md-6, .col-md-4 {
                flex: 100% !important;
                max-width: 100% !important;
                width: 100%;
                margin-bottom: 0;
            }

            .form-control-gaming {
                padding: 0.75rem 1rem;
                font-size: 1rem;
                min-height: 44px;
                border-radius: 8px;
            }

            .form-label-gaming {
                font-size: 0.8rem;
                margin-bottom: 0.5rem;
            }

            .price-tag, .genre-badge {
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
                display: inline-block;
            }

            .empty-state {
                padding: 2rem 1rem;
            }

            .empty-state i {
                font-size: 3rem;
                margin-bottom: 0.8rem;
            }

            .empty-state p {
                font-size: 1rem;
            }

            /* Buttons Layout on Mobile */
            .justify-content-between {
                justify-content: stretch !important;
                flex-direction: column;
                gap: 0.5rem;
            }

            .justify-content-between .btn-gaming {
                width: 100%;
            }

            /* SweetAlert Mobile */
            .swal2-popup.gaming-popup {
                width: 90vw !important;
                max-width: 100%;
                border-radius: 12px;
            }

            .swal2-popup.gaming-popup .swal2-title {
                font-size: 1.1rem;
            }

            .swal2-popup.gaming-popup .swal2-html-container {
                font-size: 0.9rem;
            }

            .swal2-popup.gaming-popup .swal2-actions {
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .swal2-popup.gaming-popup .swal2-confirm,
            .swal2-popup.gaming-popup .swal2-cancel {
                width: 100% !important;
                margin: 0 !important;
                font-size: 0.8rem;
            }
        }

        /* Extra Small Devices */
        @media (max-width: 360px) {
            .navbar-brand-gaming {
                font-size: 1rem;
            }

            .navbar-brand-gaming i {
                font-size: 1.1rem;
            }

            .page-title-gaming {
                font-size: 1rem;
            }

            .btn-gaming {
                font-size: 0.65rem;
                padding: 0.5rem 0.8rem;
            }

            .container-gaming {
                padding: 0.5rem;
            }

            .table-gaming td {
                padding: 0.6rem 0.8rem;
            }
        }

        /* Landscape Mode */
        @media (max-height: 600px) and (orientation: landscape) {
            .container-gaming {
                padding: 0.5rem;
            }

            .card-gaming {
                margin-bottom: 0.5rem;
            }

            .page-title-gaming {
                margin-bottom: 0.5rem;
            }
        }

        /* SweetAlert Custom Theme */
        .swal2-popup.gaming-popup {
            background: linear-gradient(145deg, var(--dark-card) 0%, rgba(18, 18, 26, 0.98) 100%);
            border: 2px solid var(--neon-blue);
            border-radius: 16px;
            box-shadow: 0 0 40px rgba(0, 240, 255, 0.3);
        }

        .swal2-popup.gaming-popup .swal2-title {
            font-family: 'Orbitron', monospace;
            color: var(--neon-blue);
        }

        .swal2-popup.gaming-popup .swal2-html-container {
            color: var(--text-secondary);
        }

        .swal2-popup.gaming-popup .swal2-confirm {
            background: linear-gradient(135deg, #ff4757 0%, #ff3344 100%) !important;
            font-family: 'Orbitron', monospace;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .swal2-popup.gaming-popup .swal2-cancel {
            background: linear-gradient(135deg, #4a4a5a 0%, #3a3a4a 100%) !important;
            font-family: 'Orbitron', monospace;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar-gaming">
    <div class="container">
        <a class="navbar-brand-gaming" href="{{ route('games.index') }}">
            <i class="fas fa-gamepad"></i>
            Game Manager
        </a>
    </div>
</nav>

<!-- Content -->
<div class="container-gaming">
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Success Alert with SweetAlert
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            background: 'linear-gradient(145deg, #12121a 0%, rgba(18, 18, 26, 0.98) 100%)',
            color: '#00f0ff',
            iconColor: '#00ff88',
            customClass: {
                popup: 'gaming-popup'
            }
        });
    @endif

    // Delete Confirmation Function
    function confirmDelete(formId, gameName) {
        Swal.fire({
            title: 'Hapus Game?',
            html: `Apakah kamu yakin ingin menghapus <strong style="color: #00f0ff;">${gameName}</strong>?<br><small style="color: #ff4757;">Aksi ini tidak dapat dibatalkan!</small>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-trash-alt"></i> Ya, Hapus!',
            cancelButtonText: '<i class="fas fa-times"></i> Batal',
            reverseButtons: true,
            customClass: {
                popup: 'gaming-popup'
            },
            background: 'linear-gradient(145deg, #12121a 0%, rgba(18, 18, 26, 0.98) 100%)',
            color: '#ffffff',
            iconColor: '#ff4757'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>

</body>
</html>
