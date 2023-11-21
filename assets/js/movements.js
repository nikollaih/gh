$(document).on("click", ".btn-add-movement", function () {
    if(jQuery(this).hasClass("buy")){
        jQuery("#type-movement").val("0");
        jQuery("#createMovementLabel").html("Agregar Compra");
    }

    if(jQuery(this).hasClass("pay")){
        jQuery("#type-movement").val("1");
        jQuery("#createMovementLabel").html("Agregar Abono");
    }
    let idUser = jQuery(this).attr("data-user-id");
    jQuery("#user-movement").val(idUser);
    jQuery("#addMovementModal").modal("show");
})

$(document).on("click", ".btn-edit-movement", function () {
    if(jQuery(this).hasClass("buy")){
        jQuery("#type-movement").val("0");
        jQuery("#createMovementLabel").html("Modificar Compra");
    }

    if(jQuery(this).hasClass("pay")){
        jQuery("#type-movement").val("1");
        jQuery("#createMovementLabel").html("Modificar Abono");
    }

    let idMovement = jQuery(this).attr("data-movement-id");

    getMovement(idMovement);
})

$(document).on("click", ".btn-delete-movement", function () {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Deseas eliminar el movimiento",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Eliminar!",
        confirmButtonColor: "#f7666e",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            let idMovement = jQuery(this).attr("data-edit-id");
            deleteMovement(idMovement);
        }
    });
})

// Get the user information
function getMovement(idMovement) {
    $.ajax({
        url: base_url + 'Movements/getMovement/' + idMovement,
        type: 'GET',
        success: function (data) {
            let response = JSON.parse(data);
            if (response.status)
            setMovementModal(response.object);
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

// Delete movement information
function deleteMovement(idMovement) {
    $.ajax({
        url: base_url + 'Movements/delete/' + idMovement,
        type: 'GET',
        success: function (data) {
            let response = JSON.parse(data);
            let icon = "danger";
            let title = "Error!";

            if (response.status) {
                icon = "success";
                title = "Exito!";
            }

            Swal.fire({
                title: title,
                text: response.message,
                icon: icon
            }).then(() => {
                location.reload();
            })
        }
    });
}

// Set the movement information into de modal form fields
function setMovementModal(movement = null) {
    console.log(movement)
    if(movement){
        jQuery("#id-movement").val(movement.id_movement);
        jQuery("#user-movement").val(movement.id_user);
        jQuery("#price-movement").val(movement.price);
        jQuery("#date-movement").val(movement.date);
        jQuery("#type-movement").val(movement.type);
        jQuery("#notes-movement").val(movement.notes);
        jQuery("#addMovementModal").modal("show");
    }
    else{
        jQuery("#id-movement").val("");
        jQuery("#user-movement").val("");
        jQuery("#price-movement").val("");
        jQuery("#date-movement").val("");
        jQuery("#type-movement").val("");
        jQuery("#notes-movement").val("");
    }
}