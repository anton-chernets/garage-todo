-- 1. get all statuses, not repeating, alphabetically ordered
SELECT DISTINCT STATUS
FROM tasks
ORDER BY STATUS

-- 2. get the count of all tasks in each project, order by tasks count descending
SELECT project_id, COUNT(project_id)
FROM tasks
GROUP BY project_id
ORDER BY COUNT(project_id) DESC

-- 3. get the count of all tasks in each project, order by projects names
SELECT projects.name, COUNT(tasks.id)
FROM tasks
JOIN projects ON tasks.project_id = projects.id
GROUP BY projects.id
ORDER BY projects.name

-- 4. get the tasks for all projects having the name beginning with “N” letter
SELECT projects.name, tasks.name
FROM tasks
JOIN projects ON tasks.project_id = projects.id
WHERE projects.name LIKE 'N%'

-- 5. get the list of all projects containing the ‘a’ letter in the middle of
--    the name, and show the tasks count near each project. Mention that there can
--    exist projects without tasks and tasks with project_id=NULL
SELECT projects.name, COUNT(tasks.id)
FROM projects
JOIN tasks ON tasks.project_id = projects.id
WHERE projects.name LIKE '%a%'
ORDER BY projects.id

-- 6. get the list of tasks with duplicate names. Order alphabetically
SELECT tasks.name
FROM tasks
GROUP BY tasks.name
HAVING COUNT(tasks.id) > 1
ORDER BY tasks.name

-- 7. get the list of tasks having several exact matches of both name and
--    status, from the project ‘Garage’. Order by matches count
SELECT projects.name, tasks.name, tasks.STATUS, COUNT(tasks.id)
FROM projects
JOIN tasks ON tasks.project_id = projects.id AND tasks.name = tasks.STATUS
WHERE projects.name = 'Garage'
GROUP BY projects.name, tasks.name, tasks.STATUS
HAVING COUNT(tasks.id) > 1
ORDER BY COUNT(tasks.id)

-- 8. get the list of project names having more than 10 tasks in status ‘completed’.
--    Order by project_id
SELECT projects.id, projects.name, COUNT(tasks.id)
FROM tasks
JOIN projects ON projects.id = tasks.project_id
WHERE tasks.STATUS = 'completed'
GROUP BY projects.id, tasks.STATUS
ORDER BY projects.id
