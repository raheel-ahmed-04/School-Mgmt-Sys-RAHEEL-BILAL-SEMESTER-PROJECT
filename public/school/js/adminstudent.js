function openAddStudentModal() {
    document.getElementById('modalTitle').innerText = 'Add Student';
    document.getElementById('studentForm').action = '/student/store';
    document.getElementById('_method').value = 'POST';
    document.getElementById('name').value = '';
    document.getElementById('roll').value = '';
    document.getElementById('class_id').value = '';
    document.getElementById('dob').value = '';
    document.getElementById('parentContact').value = '';
    document.getElementById('studentModal').style.display = 'flex';
}

function openEditStudentModal(studentId, studentData) {
    document.getElementById('modalTitle').innerText = 'Edit Student';
    document.getElementById('studentForm').action = `/student/update/${studentId}`;
    document.getElementById('_method').value = 'PUT';
    document.getElementById('name').value = studentData.name;
    document.getElementById('roll').value = studentData.roll_number;
    document.getElementById('class_id').value = studentData.class_id;
    document.getElementById('dob').value = studentData.date_of_birth;
    document.getElementById('parentContact').value = studentData.parent_contact;
    document.getElementById('studentModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('studentModal').style.display = 'none';
}