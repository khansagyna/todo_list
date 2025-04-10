<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <script>
        async function loadTasks() {
            let token = localStorage.getItem('token');
            let response = await fetch('/api/tasks', { headers: { 'Authorization': `Bearer ${token}` } });
            let tasks = await response.json();
            document.getElementById('tasks').innerHTML = tasks.map(task => `
                <li>
                    ${task.title} - ${task.completed ? '✅' : '❌'}
                    <button onclick="toggleTask(${task.id}, ${!task.completed})">✔</button>
                    <button onclick="deleteTask(${task.id})">🗑</button>
                </li>
            `).join('');
        }

        async function addTask() {
            let title = document.getElementById('task').value;
            let token = localStorage.getItem('token');
            await fetch('/api/tasks', {
                method: 'POST',
                headers: { 'Authorization': `Bearer ${token}`, 'Content-Type': 'application/json' },
                body: JSON.stringify({ title })
            });
            loadTasks();
        }

        async function deleteTask(id) {
            let token = localStorage.getItem('token');
            await fetch(`/api/tasks/${id}`, { method: 'DELETE', headers: { 'Authorization': `Bearer ${token}` } });
            loadTasks();
        }

        window.onload = loadTasks;
    </script>
</head>
<body>
    <h2>To-Do List</h2>
    <input type="text" id="task" placeholder="Tambahkan tugas">
    <button onclick="addTask()">Tambah</button>
    <ul id="tasks"></ul>
</body>
</html>
