function openAddSubjectModal() {
    const modalTitle = document.getElementById('modalTitle');
    const modal = document.getElementById('subjectModal');
    const subjectForm = document.getElementById('subjectForm');
    const methodInput = document.getElementById('_method');
    
    if (modalTitle && modal && subjectForm && methodInput) {
        modalTitle.innerText = 'Assign Subjects to Class';
        subjectForm.action = '/classwisesubject/store'; // Update the action URL as needed
        methodInput.value = 'POST';

        // Render the dropdown for assigning subjects
        renderSubjectDropdown('assign');

        modal.style.display = 'flex'; // Show the modal
    } else {
        console.error('Modal elements are not found in the DOM.');
    }
}

function renderSubjectDropdown(mode, selectedSubjects = null) {
    const subjectContainer = document.getElementById('subjectDropdownContainer');

    if (!subjectContainer) {
        console.error('Subject container element not found!');
        return;
    }

    let dropdownHTML = '';

    if (mode === 'assign') {
        dropdownHTML = `
            <div class="form-group">
                <label for="subjects">Select Subjects:</label>
                <select id="subjects" name="subjects[]" multiple="multiple" 
                        style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
        `;

        // Loop through the subjects array
        subjects.forEach(subject => {
            dropdownHTML += `<option value="${subject.id}">${subject.name}</option>`;
        });

        dropdownHTML += `
                </select>
            </div>
        `;
    } else if (mode === 'edit') {
        dropdownHTML = `
            <div class="form-group">
                <label for="subject_id">Subject:</label>
                <select id="subject_id" name="subject_id" required>
                    <option value="" disabled selected>Select a Subject</option>
        `;

        // Loop through the subjects array
        subjects.forEach(subject => {
            const selected = selectedSubjects == subject.id ? 'selected' : '';
            dropdownHTML += `<option value="${subject.id}" ${selected}>${subject.name}</option>`;
        });

        dropdownHTML += `
                </select>
            </div>
        `;
    }

    subjectContainer.innerHTML = dropdownHTML;
}



function closeModal() {
    const modal = document.getElementById('subjectModal');
    if (modal) {
        modal.style.display = 'none';
    } else {
        console.error('Modal element not found!');
    }
}
function openEditSubjectsModal(classSubjectId, classSubjectData) {
    const modalTitle = document.getElementById('modalTitle');
    const modal = document.getElementById('subjectModal');
    const subjectForm = document.getElementById('subjectForm');
    const methodInput = document.getElementById('_method');
    const classIdSelect = document.getElementById('class_id');

    if (modalTitle && modal && subjectForm && methodInput && classIdSelect) {
        modalTitle.innerText = 'Edit Assigned Subjects';
        subjectForm.action = `/classwisesubject/update/${classSubjectId}`; // Set the update action URL
        methodInput.value = 'PUT'; // For Laravel resource routes

        // Pre-select the class
        classIdSelect.value = classSubjectData.class_id; 

        // Render the subject dropdown with pre-selected subject
        renderSubjectDropdown('edit', classSubjectData.subject_id); // Now passing only the selected subject ID

        modal.style.display = 'flex'; // Show the modal
    } else {
        console.error('Edit modal elements are not found in the DOM.');
    }
}