function openAddSubjectModal() {
    document.getElementById('subjectForm').reset();
    document.getElementById('_method').value = 'POST'; 
    document.getElementById('subjectForm').action = '/subject/store'; 
    document.getElementById('modalTitle').innerText = 'Add Subject';
    document.getElementById('subjectModal').style.display = 'flex';
}

function openEditSubjectModal(id, subject) {
    document.getElementById('_method').value = 'PUT'; 
    document.getElementById('subjectForm').action = `/subject/update/${id}`; 
    document.getElementById('name').value = subject.name;
    document.getElementById('code').value = subject.code;
    document.getElementById('credit_hours').value = subject.credit_hours;
    document.getElementById('description').value = subject.description;
    document.getElementById('modalTitle').innerText = 'Edit Subject';
    document.getElementById('subjectModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('subjectModal').style.display = 'none';
}