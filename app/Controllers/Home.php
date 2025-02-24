<?php

namespace App\Controllers;

use App\Models\NoteModel;

class Home extends BaseController
{
    public function index(): string
    {
        // Создаём экземпляр модели
        $noteModel = new NoteModel();

        // Получаем все заметки из базы, отсортированные по убыванию created_at
        $data['notes'] = $noteModel->getAllNotes();

        // Передаём данные в VIEW
        return view('notebook/index', $data);
    }

    // Обработка формы с сохранением в базу данных
    public function store()
    {
        // Создаём экземпляр модели
        $noteModel = new NoteModel();

        // Получаем данные из POST-запроса
        $data = [
            'title'      => $this->request->getPost('title'),
            'content'    => $this->request->getPost('content'),
            'importance' => $this->request->getPost('importance'),
        ];

        // Пытаемся сохранить данные
        if ($noteModel->save($data)) {
            // Успешно сохранено, перенаправляем на главную с сообщением
            return redirect()->to('/')->with('message', 'Note added successfully!');
        } else {
            // Если сохранение не удалось, возвращаем форму с ошибками и старыми данными
            $errors = $noteModel->errors();
            return view('notebook/index', [
                'errors'   => $errors,
                'old_data' => $data,
                'notes'    => $noteModel->getAllNotes() // Передаём заметки даже при ошибке
            ]);
        }
    }

    // Фильтрация заметок по важности
    public function filter($importance = 'all')
    {
        $noteModel = new NoteModel();

        // Если выбран "all", показываем все заметки, иначе фильтруем
        if ($importance === 'all') {
            $data['notes'] = $noteModel->getAllNotes();
        } else {
            $data['notes'] = $noteModel->where('importance', $importance)
                ->orderBy('created_at', 'DESC')
                ->findAll();
        }

        // Передаём текущий фильтр для подсветки активной кнопки
        $data['current_filter'] = $importance;

        return view('notebook/index', $data);
    }
}