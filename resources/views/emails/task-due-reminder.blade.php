<!DOCTYPE html>
<html>
<head>
    <title>Task Reminder</title>
</head>
<body>
<h1>Task Reminder</h1>
<p>Hello {{ $task->user->name }},</p>
<p>This is a reminder for the task:</p>
<p><strong>Title:</strong> {{ $task->title }}</p>
<p><strong>Description:</strong> {{ $task->description }}</p>
<p><strong>Due Date:</strong> {{ $task->due_date->format('Y-m-d H:i:s') }}</p>
</body>
</html>
