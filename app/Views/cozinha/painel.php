<?= $this->extend('layout/base') ?>

<?= $this->section('content') ?>

<div class="pedidos-cozinha-container">
    <?php if (empty($pedidos)): ?>
        <div class="sem-pedidos-container">
            <div class="sem-pedidos-icone">👨‍🍳🎉</div>
            <h2>Tudo sob controle!</h2>
            <p>Nenhum pedido pendente na fila no momento.</p>
        </div>
    <?php else: ?>
        <div class="pedidos-grid">
            <?php foreach ($pedidos as $pedido): ?>
                <div class="pedido-card">
                    <div class="pedido-card-header">
                        <span class="pedido-numero">#<?= str_pad($pedido['id'], 3, '0', STR_PAD_LEFT) ?></span>
                        <span class="pedido-hora">⏱️ <?= date('H:i', strtotime($pedido['created_at'])) ?></span>
                    </div>
                    <?php if (!empty($pedido['totem'])): ?>
                        <div class="pedido-totem-info" style="font-size: 0.85rem; color: #333; background: var(--mc-yellow); border: 2px solid var(--mc-black); display: inline-block; padding: 0.2rem 0.5rem; border-radius: 6px; font-weight: bold; margin-top: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px;">
                            📍 <?= esc($pedido['totem']) ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="pedido-divider"></div>
                    
                    <div class="pedido-itens-list">
                        <?php foreach ($pedido['produtos'] as $item): ?>
                            <div class="pedido-item-row">
                                <span class="item-quantidade"><?= $item['quantidade'] ?>x</span>
                                <span class="item-nome"><?= esc($item['produto_nome'] ?? 'Produto') ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="pedido-card-footer">
                        <a href="<?= base_url('cozinha/feito/' . $pedido['id']) ?>" class="btn-feito-pedido">
                            Pronto / Entregar
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
