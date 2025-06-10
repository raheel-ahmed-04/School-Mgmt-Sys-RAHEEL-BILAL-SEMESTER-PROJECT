function openAddClassModal() {
    document.getElementById('classForm').reset();
    document.getElementById('_method').value = 'POST';
    document.getElementById('classForm').action = '/class/store';
    document.getElementById('modalTitle').innerText = 'Add Class';
    document.getElementById('classModal').style.display = 'flex';
}

function openEditClassModal(id, classData) {
    document.getElementById('_method').value = 'PUT';
    document.getElementById('classForm').action = `/class/update/${id}`;
    document.getElementById('name').value = classData.name;
    document.getElementById('teacher_id').value = classData.teacher_id;
    document.getElementById('modalTitle').innerText = 'Edit Class';
    document.getElementById('classModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('classModal').style.display = 'none';
}