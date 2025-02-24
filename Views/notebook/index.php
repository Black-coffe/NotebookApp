<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

    <!-- Подключаем помощник form -->
<?php helper('form'); ?>

    <!-- Сообщения и ошибки -->
<?php if (session()->has('message')): ?>
    <div class="row">
        <div class="col s12">
            <div class="card green lighten-4">
                <div class="card-content green-text">
                    <p><?= session('message') ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($errors)): ?>
    <div class="row">
        <div class="col s12">
            <div class="card red lighten-4">
                <div class="card-content red-text">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

    <!-- Форма -->
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">New Note</span>
                    <form method="post" action="<?= site_url('/store') ?>">
                        <div class="input-field">
                            <input id="title" type="text" name="title" value="<?= old('title', $old_data['title'] ?? '') ?>" required>
                            <label for="title" class="<?= old('title') ? 'active' : '' ?>">Title</label>
                        </div>
                        <div class="input-field">
                            <textarea id="content" class="materialize-textarea" name="content" required><?= old('content', $old_data['content'] ?? '') ?></textarea>
                            <label for="content" class="<?= old('content') ? 'active' : '' ?>">Content</label>
                        </div>
                        <div class="input-field">
                            <select id="importance" name="importance" required>
                                <option value="low" <?= old('importance', $old_data['importance'] ?? '') === 'low' ? 'selected' : '' ?>>Low Priority</option>
                                <option value="medium" <?= old('importance', $old_data['importance'] ?? '') === 'medium' ? 'selected' : '' ?>>Medium Priority</option>
                                <option value="high" <?= old('importance', $old_data['importance'] ?? '') === 'high' ? 'selected' : '' ?>>High Priority</option>
                            </select>
                            <label>Importance</label>
                        </div>
                        <button type="submit" class="btn waves-effect waves-light teal">Add Note</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Фильтрация -->
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Filter by Importance</span>
                    <a href="<?= site_url('/filter/all') ?>" class="btn-flat filter-btn <?= ($current_filter ?? 'all') === 'all' ? 'teal-text' : '' ?>" data-filter="all">All</a>
                    <a href="<?= site_url('/filter/low') ?>" class="btn-flat filter-btn <?= ($current_filter ?? 'all') === 'low' ? 'teal-text' : '' ?>" data-filter="low">Low</a>
                    <a href="<?= site_url('/filter/medium') ?>" class="btn-flat filter-btn <?= ($current_filter ?? 'all') === 'medium' ? 'teal-text' : '' ?>" data-filter="medium">Medium</a>
                    <a href="<?= site_url('/filter/high') ?>" class="btn-flat filter-btn <?= ($current_filter ?? 'all') === 'high' ? 'teal-text' : '' ?>" data-filter="high">High</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Список записей -->
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Notes</span>
                    <?php if (!empty($notes)): ?>
                        <?php foreach ($notes as $note): ?>
                            <div class="note-item" data-importance="<?= esc($note['importance']) ?>">
                                <div class="accordion-header">
                                    <?= esc($note['title']) ?>
                                    <span class="importance-chip <?= esc($note['importance']) ?>">
                                    <?= ucfirst($note['importance']) ?>
                                </span>
                                </div>
                                <div class="accordion-content"><?= esc($note['content']) ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No notes yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Инициализация Materialize Select -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            M.FormSelect.init(elems);
        });
    </script>

<?= $this->endSection() ?>