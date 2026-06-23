<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Painel da Cozinha - Cantina IFFar' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/cozinha.css') ?>">
</head>
<body>
    <header class="totem-header">
        <div class="header-container">
            <div class="logo-section">
                <h1 class="logo" style="cursor: pointer;" onclick="location.href='<?= base_url() ?>'">🍳 Cantina IFFar - Cozinha</h1>
            </div>
            <div class="info-section">
                <div class="pedidos-pendentes" style="background-color: var(--mc-yellow); color: var(--mc-black); padding: 0.7rem 1.2rem; border-radius: 8px; font-weight: bold;">
                    📋 <span id="pedidos-count"><?= count($pedidos ?? []) ?></span> pedido(s) pendente(s)
                </div>
                <div class="refresh-timer" style="color: var(--mc-yellow); font-size: 1.2rem; font-weight: bold; min-width: 180px; text-align: right;">
                    Atualizando em <span id="timer-display">15</span>s
                </div>
            </div>
        </div>
    </header>

    <main class="totem-main">
        <!-- Exibição de mensagens flash para feedbacks de conclusão -->
        <?php if (session()->getFlashdata('mensagem')): ?>
            <div class="alerta-sucesso" style="background-color: #4caf50; color: white; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-weight: bold; border: 3px solid black; text-align: center; font-size: 1.2rem; animation: pulse 1.5s infinite;">
                <?= session()->getFlashdata('mensagem') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('erro')): ?>
            <div class="alerta-erro" style="background-color: var(--mc-red); color: white; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-weight: bold; border: 3px solid black; text-align: center; font-size: 1.2rem;">
                <?= session()->getFlashdata('erro') ?>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>

    <script src="<?= base_url('js/cozinha.js') ?>"></script>
</body>
</html>
