
var id = 0;
$(".edit").click(function () {
    var $row = $(this).closest("tr"); // Find the row
    id = $row.find(".idEmp").text(); // Find the text
    var userdata = {
        'id': id
    };
    $.ajax({
        type: "POST",
        url: "select.php",
        data: userdata,
        success: function (data) {
            document.getElementById('content-modal-body').innerHTML = data;
            document.getElementById('content-modal-btn').innerHTML =
                `<button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="updateEmployee();">Update</button>`;
            document.getElementById('content-modal-title').innerHTML = 'Updateddd Employee';
        }
    });
});

function updateEmployee() {
    // var email = $("#inputEmail").val();
    // var name = $("#inputName").val();
    // var surname = $("#inputLast").val();
    // var job = $("#inputJob").val();
    // var department = $("#inputDept").val();
    // var image = $("#inputImg").val();
    // var userdata = {
    //     'id': id,
    //     'email': email,
    //     'name': name,
    //     'surname': surname,
    //     'job': job,
    //     'department': department,
    //     'image': image
    // };
    // $.ajax({
    //     type: "POST",
    //     url: "update.php",
    //     data: userdata,
    //     success: function (data) {
    //         window.location.reload(true);
    //     }
    // });
    alert();
}



// $(".new").click(function () {
//     document.getElementById('content-modal-body').innerHTML = ` <form class="row g-3">
//         <div class="col-12">
//             <label for="inputEmail" class="form-label">Email</label>
//             <input type="email" class="form-control" id="inputEmail" placeholder="Email" >
//         </div>
//         <div class="col-md-6">
//             <label for="inputName" class="form-label">Name</label>
//             <input type="text" class="form-control" id="inputName" placeholder="John" >
//         </div>
//         <div class="col-md-6">
//             <label for="inputEmail4" class="form-label">Last Name</label>
//             <input type="text" class="form-control" id="inputLast" placeholder="Doe" >
//         </div>
//         <div class="col-md-6">
//             <label for="exampleDataList" class="form-label">Job</label>
//             <input class="form-control" list="datalistJobs" id="inputJob" placeholder="Type to search..." >
//             <datalist id="datalistJobs">
           
//             </datalist>
//         </div>
//         <div class="col-md-6">
//             <label for="exampleDataList" class="form-label">Department</label>
//             <input class="form-control" list="datalistDept" id="inputDept" placeholder="Type to search..." >
//             <datalist id="datalistDept">
               
//             </datalist>
//         </div>
//         <div class="col-12">
//             <label for="inputEmail4" class="form-label">Image</label>
//             <input type="text" class="form-control" id="inputImg" placeholder="Image URL">
//         </div>
//     </form>`;
//     document.getElementById('content-modal-btn').innerHTML =
//         `<button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
//                         <button type="button" class="btn btn-primary" onclick="newEmployee();">Create</button>`;
//     document.getElementById('content-modal-title').innerHTML = 'New Employee';
//     $.ajax({
//         type: "POST",
//         url: "jobs.php",
//         success: function (data) {
//             document.getElementById('datalistJobs').innerHTML = data;
//         }
//     });
//     $.ajax({
//         type: "POST",
//         url: "departments.php",
//         success: function (data) {
//             document.getElementById('datalistDept').innerHTML = data;
//         }
//     });
// });

// function newEmployee() {
//     var email = $("#inputEmail").val();
//     var name = $("#inputName").val();
//     var surname = $("#inputLast").val();
//     var job = $("#inputJob").val();
//     var department = $("#inputDept").val();
//     var image = $("#inputImg").val();
//     var userdata = {
//         'email': email,
//         'name': name,
//         'surname': surname,
//         'job': job,
//         'department': department,
//         'image': image
//     };
//     $.ajax({
//         type: "POST",
//         url: "insert.php",
//         data: userdata,
//         success: function (data) {
//             window.location.reload(true);
//             // console.log(data);
//         }
//     });
// }


// var id = 0;
// $(".delete").click(function () {
//     var $row = $(this).closest("tr"); // Find the row
//     var $text = $row.find(".nr").text(); // Find the text
//     document.getElementById('content-modal-title').innerHTML = 'Delete Employee';
//     document.getElementById('content-modal-body').innerHTML =
//         `<p>Are you sure you want to delete <span class="fw-bolder">${$text}</span> employee?
//         All their data will be permanently removed. This action cannot be undone.</p>`;
//     document.getElementById('content-modal-btn').innerHTML =
//         `<button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
//     <button type="button" class="btn btn-danger" onclick="deleteEmployee();">Delete</button>`;
// });


// $(".delete").click(function () {
//     var $row = $(this).closest("tr"); // Find the row
//     id = $row.find(".idEmp").text(); // Find the text
// });

// function deleteEmployee() {
//     var userdata = {
//         'id': id
//     };
//     $.ajax({
//         type: "POST",
//         url: "delete.php",
//         data: userdata,
//         success: function (data) {
//             window.location.reload(true);
//             // console.log(data);
//         }
//     });
// }
