$(document).on("click", ".btn-edit-user", function () {
    let idUser = jQuery(this).attr("data-edit-id");
    getUser(idUser);
})

// Attach the liveSearchForClients function to the input's keyup event
jQuery('#search').on('input', liveSearchForClients);

$(document).on("click", ".btn-delete-user", function () {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Deseas eliminar el cliente",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Eliminar!",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            let idUser = jQuery(this).attr("data-edit-id");
            deleteUser(idUser);
        }
    });
})

// Clean the add user modal form
$(document).on("click", ".addMembers-modal", function () {
    jQuery("#createMemberLabel").html("Nuevo Cliente");
    jQuery("#id-user").val("");
    jQuery("#fullname").val("");
    jQuery("#balance").val("");
    jQuery("#phone").val("");
    jQuery("#notes").val("");
    jQuery("#member-img").attr("src", base_url + "assets/images/users/user-dummy-img.jpg");
})

// Get the user information
function getUser(idUser) {
    $.ajax({
        url: base_url + 'Users/getUser/' + idUser,
        type: 'GET',
        success: function (data) {
            let response = JSON.parse(data);
            if (response.status)
                setUserModal(response.object);
            else {
                Swal.fire({
                    title: 'Error!',
                    text: response.message,
                    icon: 'danger'
                });
            }
        }
    });
}

// Delete user information
function deleteUser(idUser) {
    $.ajax({
        url: base_url + 'Users/delete/' + idUser,
        type: 'GET',
        success: function (data) {
            let response = JSON.parse(data);
            let icon = "danger";
            let title = "Error!";

            if (response.status) {
                jQuery("#client-" + idUser).remove();
                icon = "success";
                title = "Exito!";
            }

            Swal.fire({
                title: title,
                text: response.message,
                icon: icon
            });
        }
    });
}

// Set the user information into de modal form fields
function setUserModal(user) {
    jQuery("#id-user").val(user.id_user);
    jQuery("#fullname").val(user.fullname);
    jQuery("#balance").val(user.balance);
    jQuery("#phone").val(user.phone_number);
    jQuery("#notes").val(user.notes);
    jQuery("#createMemberLabel").html("Modificar Cliente");

    if (user.profile_image) jQuery("#member-img").attr("src", base_url + "uploads/users/profile/" + user.profile_image);
    else jQuery("#member-img").attr("src", base_url + "assets/images/users/user-dummy-img.jpg");

    jQuery("#addmemberModal").modal("show");
}

// Function to perform live search for clients
function liveSearchForClients() {
    const searchTerm = $('#search').val().toLowerCase();
    const filteredResults = $('.client-item').filter(function() {
      const h5Text = $(this).find('h5.client-name').text().toLowerCase();
      const pText = $(this).find('p.client-notes').text().toLowerCase();
      return h5Text.includes(searchTerm) || pText.includes(searchTerm);
    });
    $('.client-item').not(filteredResults).hide();
    filteredResults.show();
  }