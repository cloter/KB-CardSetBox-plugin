document.addEventListener('DOMContentLoaded', () => {
    // Add click event listener for task connect info links
    document.querySelectorAll('.task-connect-info').forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault();

            const taskId = link.getAttribute('data-task-id');
            if (taskId) {
                fetch(`/task/connect/${taskId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert(`Error: ${data.error}`);
                        } else {
                            alert(`User ID: ${data.user_id}\nProject ID: ${data.project_id}\nTask ID: ${data.task_id}\nUnix Time: ${data.unix_time}`);
                        }
                    })
                    .catch(err => alert('Error fetching task details: ' + err.message));
            } else {
                alert('Task ID is missing.');
            }
        });
    });
});

