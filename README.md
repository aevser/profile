# User API Documentation

## 📌 Overview / Обзор

REST API для регистрации пользователей и получения профиля.  
REST API for user registration and profile retrieval.

---

## 🚀 Endpoints

### 1. **User Registration / Регистрация пользователя**

**Endpoint:** `POST /api/v1/registration`

**Description / Описание:**  
Регистрация нового пользователя в системе.  
Register a new user in the system.

**Request Body:**
```json
{
  "gender_id": 1,
  "email": "user@example.com",
  "password": "Password123!",
  "password_confirmation": "Password123!"
}
```

**Validation Rules / Правила валидации:**
- `gender_id`: required, must exist in genders table / обязательно, должен существовать в таблице полов
- `email`: required, valid email, unique / обязательно, корректный email, уникальный
- `password`: required, min 8 characters, confirmed / обязательно, минимум 8 символов, подтверждение

**Success Response / Успешный ответ:**
```json
{
  "success": true,
  "message": "Registration successful / Регистрация прошла успешно",
  "user": {
    "id": 1,
    "gender_id": 1,
    "email": "user@example.com",
    "created_at": "2025-11-27T12:00:00.000000Z",
    "updated_at": "2025-11-27T12:00:00.000000Z",
    "gender": {
      "id": 1,
      "name": "Male"
    }
  }
}
```
**Status Code:** `201 Created`

**Error Response / Ответ с ошибкой:**
```json
{
  "message": "The email has already been taken / Пользователь с таким email уже зарегистрирован",
  "errors": {
    "email": [
      "User with this email is already registered / Пользователь с таким email уже зарегистрирован"
    ]
  }
}
```
**Status Code:** `422 Unprocessable Entity`

---

### 2. **Get User Profile / Получить профиль пользователя**

**Endpoint:** `GET /api/v1/profile/{user_id}`

**Description / Описание:**  
Получение данных профиля пользователя по ID.  
Retrieve user profile data by ID.

**URL Parameters / Параметры URL:**
- `user_id` (integer, required) - ID пользователя / User ID

**Success Response / Успешный ответ:**
```json
{
  "success": true,
  "user": {
    "id": 1,
    "gender_id": 1,
    "email": "user@example.com",
    "created_at": "2025-11-27T12:00:00.000000Z",
    "updated_at": "2025-11-27T12:00:00.000000Z",
    "gender": {
      "id": 1,
      "name": "Male"
    }
  }
}
```
**Status Code:** `200 OK`

**Error Response / Ответ с ошибкой:**
```json
{
  "success": false,
  "message": "User not found / Пользователь не найден"
}
```
**Status Code:** `404 Not Found`

---

## 📝 Key Features / Ключевые особенности

✅ Bilingual error messages (EN/RU) / Двуязычные сообщения об ошибках  
✅ Password hashing / Хеширование паролей  
✅ Email uniqueness validation / Валидация уникальности email  
✅ Relationship loading (Gender) / Загрузка связей (Пол)  
✅ RESTful API design / RESTful дизайн API  
✅ Repository pattern / Паттерн Repository

---

## 📦 Installation / Установка
```bash
# Clone repository / Клонировать репозиторий
git clone <repository-url>

# Install dependencies / Установить зависимости
composer install

# Configure environment / Настроить окружение
cp .env.example .env
php artisan key:generate

# Run migrations / Запустить миграции
php artisan migrate --seed

# Start server / Запустить сервер
php artisan serve
```
