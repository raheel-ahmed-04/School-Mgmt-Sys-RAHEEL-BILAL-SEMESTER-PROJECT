function openAddTeacherModal() {
    document.getElementById('teacherForm').reset();
    document.getElementById('_method').value = 'POST'; 
    document.getElementById('teacherForm').action = '/teacher/store'; 
    document.getElementById('modalTitle').textContent = 'Add Teacher';
    document.getElementById('teacherModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('teacherModal').style.display = 'none';
}

function openEditTeacherModal(id, teacher) {
    document.getElementById('_method').value = 'PUT'; 
    document.getElementById('modalTitle').textContent = 'Edit Teacher';
    document.getElementById('name').value = teacher.name;
    document.getElementById('email').value = teacher.email;
    document.getElementById('subject_expertise').value = teacher.subject_expertise;
    document.getElementById('contact_number').value = teacher.contact_number;
    document.getElementById('teacherForm').action = `/teacher/update/${id}`;
    document.getElementById('teacherModal').style.display = 'flex';
}