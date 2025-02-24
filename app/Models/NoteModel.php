<?php


namespace App\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table = 'notes'; // Название таблицы
    protected $primaryKey = 'id'; // Первичный ключ
    protected $useAutoIncrement = true; // Автоинкремент для id
    protected $returnType = 'array'; // Возвращать данные как массив (можно изменить на 'object')
    protected $useSoftDeletes = false; // Мягкое удаление (не используем)

    // Разрешённые поля для записи
    protected $allowedFields = ['title', 'content', 'importance', 'created_at', 'updated_at'];

    // Автоматическое управление временными метками
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Правила валидации (опционально)
    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'content' => 'required|min_length[5]',
        'importance' => 'in_list[low,medium,high]',
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'Title is required.',
            'min_length' => 'Title must be at least 3 characters long.',
            'max_length' => 'Title cannot exceed 255 characters.',
        ],
        'content' => [
            'required' => 'Content is required.',
            'min_length' => 'Content must be at least 5 characters long.',
        ],
        'importance' => [
            'in_list' => 'Importance must be one of: low, medium, high.',
        ],
    ];

    // Метод для получения записей в порядке убывания по created_at
    public function getAllNotes()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}