#!/bin/bash

# Путь к файлу базы данных SQLite
database_path="self_logger.db"

# Проверяем, существует ли файл базы данных, и создаем его, если он не существует
if [ ! -e "$database_path" ]; then
    sqlite3 "$database_path" <<EOF
CREATE TABLE logs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user TEXT,
    date DATETIME
);
EOF
fi

# Получаем имя текущего пользователя
current_user=$(whoami)

# Записываем информацию о запуске в базу данных
sqlite3 "$database_path" <<EOF
INSERT INTO logs (user, date) VALUES ('$current_user', datetime('now'));
EOF

# Выводим информацию на экран
program_name=$(basename "$0")
total_runs=$(sqlite3 "$database_path" "SELECT COUNT(*) FROM logs;")
first_run=$(sqlite3 "$database_path" "SELECT MIN(date) FROM logs;")
echo "Имя программы: $program_name"
echo "Количество запусков: $total_runs"
echo "Первый запуск: $first_run"
echo "---------------------------------------------"
echo "User      | Date"
echo "--------------------------------------------"
sqlite3 "$database_path" "SELECT user, date FROM logs;" | while IFS="|" read -r user date; do
    printf "%-10s | %s\n" "$user" "$date"
done
