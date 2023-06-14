$(document).ready(function() {
    // Load employee list on page load
    loadEmployeeList();
    
    // Add employee
    $("#addForm").submit(function(event) {
        event.preventDefault();
        var name = $("#name").val();
        var position = $("#position").val();
        var salary = $("#salary").val();
        addEmployee(name, position, salary);
    });
    
    // Update employee
    $("#updateForm").submit(function(event) {
        event.preventDefault();
        var empId = $("#empId").val();
        var newName = $("#newName").val();
        var newPosition = $("#newPosition").val();
        var newSalary = $("#newSalary").val();
        updateEmployee(empId, newName, newPosition, newSalary);
    });
    
    // Delete employee
    $("#deleteForm").submit(function(event) {
        event.preventDefault();
        var deleteId = $("#deleteId").val();
        deleteEmployee(deleteId);
    });
});

// Load employee list
function loadEmployeeList() {
    $.ajax({
        url: "get_employees.php",
        type: "GET",
        success: function(response) {
            $("#employeeList").html(response);
        }
    });
}

// Add employee
function addEmployee(name, position, salary) {
    $.ajax({
        url: "add_employee.php",
        type: "POST",
        data: { name: name, position: position, salary: salary },
        success: function(response) {
            $("#addForm")[0].reset();
            loadEmployeeList();
        }
    });
}

// Update employee
function updateEmployee(empId, newName, newPosition, newSalary) {
    $.ajax({
        url: "update_employee.php",
        type: "POST",
        data: { empId: empId, newName: newName, newPosition: newPosition, newSalary: newSalary },
        success: function(response) {
            $("#updateForm")[0].reset();
            loadEmployeeList();
        }
    });
}

// Delete employee
function deleteEmployee(deleteId) {
    $.ajax({
        url: "delete_employee.php",
        type: "POST",
        data: { deleteId: deleteId },
        success: function(response) {
            $("#deleteForm")[0].reset();
            loadEmployeeList();
        }
    });
}
