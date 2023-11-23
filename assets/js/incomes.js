$(document).on("click", ".btn-add-income", function () {
    jQuery("#createIncomeLabel").html("Agregar Ingreso");
    setIncomeModal();
})

$(document).on("click", ".btn-edit-income", function () {
    jQuery("#createIncomeLabel").html("Modificar Ingreso");
    let idIncome = jQuery(this).attr("data-income-id");
    getIncome(idIncome);
})

$(document).on("click", ".btn-delete-income", function () {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Deseas eliminar el ingreso",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Eliminar!",
        confirmButtonColor: "#f7666e",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            let idIncome = jQuery(this).attr("data-edit-id");
            deleteIncome(idIncome);
        }
    });
})

// Get the user information
function getIncome(idIncome) {
    $.ajax({
        url: base_url + 'Incomes/getIncome/' + idIncome,
        type: 'GET',
        success: function (data) {
            let response = JSON.parse(data);
            if (response.status)
            setIncomeModal(response.object);
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

// Delete income information
function deleteIncome(idIncome) {
    $.ajax({
        url: base_url + 'Incomes/delete/' + idIncome,
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

// Set the income information into de modal form fields
function setIncomeModal(income = null) {
    if(income){
        jQuery("#id-income").val(income.id_income);
        jQuery("#price-income").val(income.price);
        jQuery("#date-income").val(income.date);
        jQuery("#category-income").val(income.id_category);
        jQuery("#description-income").val(income.description);
        jQuery("#addIncomeModal").modal("show");
    }
    else{
        let now = new Date();
        let day = ("0" + now.getDate()).slice(-2);
        let month = ("0" + (now.getMonth() + 1)).slice(-2);
        let today = now.getFullYear()+"-"+(month)+"-"+(day) ;

        jQuery("#id-income").val("");
        jQuery("#date-income").val(today);
        jQuery("#price-income").val("");
        jQuery("#category-income").val("");
        jQuery("#description-income").val("");
        jQuery("#addIncomeModal").modal("show");
    }
}