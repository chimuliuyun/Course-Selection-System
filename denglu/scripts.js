// scripts.js
document.getElementById('switch-to-student').onclick = function() {
    document.getElementById('student-login').style.display = 'block';
    document.getElementById('teacher-login').style.display = 'none';
};

document.getElementById('switch-to-teacher').onclick = function() {
    document.getElementById('student-login').style.display = 'none';
    document.getElementById('teacher-login').style.display = 'block';
};