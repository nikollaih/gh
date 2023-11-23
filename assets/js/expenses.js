$(document).on("click", ".btn-add-expense", function () {
    jQuery("#createExpenseLabel").html("Agregar Gasto");
    setExpenseModal();
})

$(document).on("click", ".btn-edit-expense", function () {
    jQuery("#createExpenseLabel").html("Modificar Gasto");
    let idExpense = jQuery(this).attr("data-expense-id");
    getExpense(idExpense);
})

$(document).on("click", ".btn-delete-expense", function () {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Deseas eliminar el gasto",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Eliminar!",
        confirmButtonColor: "#f7666e",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            let idExpense = jQuery(this).attr("data-edit-id");
            deleteExpense(idExpense);
        }
    });
})

// Get the user information
function getExpense(idExpense) {
    $.ajax({
        url: base_url + 'Expenses/getExpense/' + idExpense,
        type: 'GET',
        success: function (data) {
            let response = JSON.parse(data);
            if (response.status)
            setExpenseModal(response.object);
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

// Delete expense information
function deleteExpense(idExpense) {
    $.ajax({
        url: base_url + 'Expenses/delete/' + idExpense,
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

// Set the expense information into de modal form fields
function setExpenseModal(expense = null) {
    if(expense){
        jQuery("#id-expense").val(expense.id_expense);
        jQuery("#price-expense").val(expense.price);
        jQuery("#date-expense").val(expense.date);
        jQuery("#category-expense").val(expense.id_category);
        jQuery("#description-expense").val(expense.description);
        jQuery("#addExpenseModal").modal("show");
    }
    else{
        let now = new Date();
        let day = ("0" + now.getDate()).slice(-2);
        let month = ("0" + (now.getMonth() + 1)).slice(-2);
        let today = now.getFullYear()+"-"+(month)+"-"+(day) ;

        jQuery("#id-expense").val("");
        jQuery("#date-expense").val(today);
        jQuery("#price-expense").val("");
        jQuery("#category-expense").val("");
        jQuery("#description-expense").val("");
        jQuery("#addExpenseModal").modal("show");
    }
}