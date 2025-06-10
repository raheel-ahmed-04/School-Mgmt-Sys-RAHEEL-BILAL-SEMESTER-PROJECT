function openAddTimetableModal() {
    document.getElementById('timetableForm').reset(); // Reset the form fields
    document.getElementById('_method').value = 'POST'; // Set the method to POST for adding a new timetable
    document.getElementById('timetableForm').action = '/timetable/store'; // Set the form action URL
    document.getElementById('modalTitle').textContent = 'Add Timetable'; // Set modal title
    document.getElementById('timetableModal').style.display = 'flex'; // Show the modal
}

function closeModal() {
    document.getElementById('timetableModal').style.display = 'none'; // Hide the modal
}

function openEditTimetableModal(id, timetable) {
    document.getElementById('_method').value = 'PUT'; // Set the method to PUT for updating
    document.getElementById('modalTitle').textContent = 'Edit Timetable'; // Set modal title
    
    // Set form values based on timetable object
    document.getElementById('class_subject_id').value = timetable.class_subject_id; // Set class and subject ID
    document.getElementById('teacher_id').value = timetable.teacher_id; // Set teacher ID
    document.getElementById('slot_id').value = timetable.slot_id; // Set slot ID
    document.getElementById('room_number').value = timetable.room_number || ''; // Set room number

    // Update form action to include timetable ID
    document.getElementById('timetableForm').action = `/timetable/update/${id}`;
    
    // Show the modal
    document.getElementById('timetableModal').style.display = 'flex';
}