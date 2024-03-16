let colorStatus = 1;
let messageEstado = 0;

function addPostTable(data, estPost, estCategory, table){;
    let id = data.id,
    title = data.title,
    content = data.content.substring(0, 100),
    status = estPost,
    statusCategory = estCategory,
    category = data.category,
    estatusBooleanPost = data.status;
    if (colorStatus == 0){
        colorStatus = 1;
        var color = 'bg-write';
    } else {
        colorStatus = 0;
        var color = 'bg-gray-100';
    }

    const row = $('<tr></tr>').addClass("odd").attr("data-id", id);
    const idCell = $('<td></td>').addClass(`${color} text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto`).text(id);
    const titleCell = $('<td></td>').addClass(`${color} text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto`).text(title);
    const contentCell = $('<td></td>').addClass(`${color} text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto`).text(content);
    const estatusCell = $('<td></td>').addClass(`${color} font-bold text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto`).text(status);
    const estatusCategoryCell = $('<td></td>').addClass(`${color} font-bold text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto`).text(statusCategory);
    const categoryCell = $('<td></td>').addClass(`${color} text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto`).text(category);
    const actionCell = $('<td></td>').addClass(`${color} text-lg px-6 py-4 whitespace-no-wrap space-between w-1/4 sm:w-auto`);

    const editButton = $('<button></button>').addClass('hover:bg-blue-500 bg-transparent border-blue-500 text-blue-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]')
    .attr('data-id', data.id)
    .html('<i class="ri-edit-box-line"></i>');

    const deleteButton = $('<button></button>').addClass('hover:bg-red-500 bg-transparent border-red-500 text-red-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]')
    .attr('data-id', data.id)
    .html('<i class="ri-delete-bin-line"></i>');

    const statusButton = $('<button></button>')
    .attr('data-id', data.id);

    if (estPost == 'VISIBLE'){
        estatusCell.addClass("text-green-500");
        statusButton.addClass("hover:bg-gray-600 bg-transparent border-gray-600 text-gray-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]").html('<i class="ri-eye-off-fill"></i>');
    } else {
        estatusCell.addClass("text-red-500");
        statusButton.addClass("hover:bg-gray-600 bg-transparent border-gray-600 text-gray-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]").html('<i class="ri-eye-fill"></i>');
    }

    if (statusCategory == 'VISIBLE'){
        estatusCategoryCell.addClass("text-green-500");
    } else {
        estatusCategoryCell.addClass("text-red-500");
    }

    actionCell.append(editButton, deleteButton, statusButton);
    row.append(idCell, titleCell, contentCell, estatusCell, estatusCategoryCell, categoryCell, actionCell);

    table.append(row);

    editButton.on('click', function(){
        window.location.href = './addPost?idEdit=' + $(this).attr('data-id');
    });

    statusButton.on('click', function(){
        let newStatus = estatusBooleanPost == 1 ? 0 : 1;
        const formData = new FormData();
        formData.append('action', 'changeStatusPost');
        formData.append('id', $(this).attr('data-id'));
        formData.append('status', newStatus);
        $.ajax({
            url: '../db/peticiones/manage.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response){
                if (response.code == 0){
                    if (newStatus == 1){
                        statusButton.html('<i class="ri-eye-off-fill"></i>');
                        statusButton.removeClass('hover:bg-green-600 bg-transparent border-green-600 text-green-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]');
                        statusButton.addClass('hover:bg-gray-600 bg-transparent border-gray-600 text-gray-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]');
                        estatusCell.text('VISIBLE');
                        estatusCell.removeClass('text-red-500');
                        estatusCell.addClass('text-green-500');
                        estatusBooleanPost = 1;
                    } else {
                        statusButton.html('<i class="ri-eye-fill"></i>');
                        statusButton.removeClass('hover:bg-gray-600 bg-transparent border-gray-600 text-gray-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]');
                        statusButton.addClass('hover:bg-green-600 bg-transparent border-green-600 text-green-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]');
                        estatusCell.text('HIDDEN');
                        estatusCell.removeClass('text-green-500');
                        estatusCell.addClass('text-red-500');
                        estatusBooleanPost = 0;
                    }
                }
            },
            error: function(error){
                console.error(error);
            }
        });
    });

    deleteButton.on('click', function(){
        if (confirm('Are you sure to delete this post?')){
            const formData = new FormData();
            formData.append('action', 'deletePost');
            formData.append('id', $(this).attr('data-id'));
            $.ajax({
                url: '../db/peticiones/manage.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response){
                    if (response.code == 0){
                        row.remove();
                    } else {
                        if (!messageAlert(response.message, response.code)){
                            setTimeout(() => {
                                messageAlert(response.message, response.code);
                            }, 3500);
                        }
                    }
                },
                error: function(error){
                    console.error(error);
                }
            });
        }
    });
}

function reloadTable(){
    let table = $('<table>').addClass('min-w-full divide-y divide-gray-200').attr('id', 'postsTable');
    let thead = $('<thead>');
    let tr = $('<tr>');
    let th1 = $('<th>').addClass('bg-gray-50 text-lg px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider').text('ID');
    let th2 = $('<th>').addClass('bg-gray-50 text-lg px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider').text('Títle');
    let th3 = $('<th>').addClass('bg-gray-50 text-lg px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider').text('Contet');
    let th4 = $('<th>').addClass('bg-gray-50 text-lg px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider').text('Status Post');
    let th5 = $('<th>').addClass('bg-gray-50 text-lg px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider').text('Status Category');
    let th6 = $('<th>').addClass('bg-gray-50 text-lg px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider').text('Category');
    let th7 = $('<th>').addClass('bg-gray-50 text-lg px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider').text('Actions');

    tr.append(th1, th2, th3, th4, th5, th6, th7);
    thead.append(tr);
    table.append(thead);

    let tbody = $('<tbody>').addClass('bg-white divide-y divide-gray-200');

    table.append(tbody);

    $('#container-table').html('');
    $('#container-table').append(table);

    const formData = new FormData();
    formData.append('action', 'getPosts');
    $.ajax({
        url: '../db/peticiones/manage.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response){
            if (response.code == 0){
                Object.values(response.data).forEach((post) => {
                    let estadoPost = post.status == 1 ? 'VISIBLE' : 'HIDDEN';
                    let estadoCategory = post.statusCategory == 1 ? 'VISIBLE' : 'HIDDEN';
                    addPostTable(post, estadoPost, estadoCategory, table);
                });
                $('#postsTable').DataTable();
            }
        },
        error: function(error){
            // agregamos una fila con un mensaje de error
            const errorRow = $("<tr></tr>").addClass("error");
            const errorCell = $("<td></td>").attr("colspan", "4").addClass("text-center text-red-500 font-bold text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto").text("An error occurred while trying to get the categories. Please try again later.");
            errorRow.append(errorCell);
            $("#categoriesTable").prepend(errorRow);
            console.log(error);
        }
    });
}

// Evento para el messageContainer
function messageAlert(message, estado) {
    if (messageEstado == 0) {
        messageEstado = 1;
        if (estado == 0) {
        // 0 = no hay error
        $(".messageContainer p").html(message);
        $(".messageContainer").addClass("active");
        setTimeout(() => {
        $(".messageContainer").removeClass("active");
        $(".messageContainer").addClass("hide");
        }, 3000);

        setTimeout(() => {
        $(".messageContainer").removeClass("hide");
        $(".messageContainer p").html("‎ ");
        messageEstado = 0;
        }, 3500);
        } else if (estado == 1) {
        $(".messageContainer p").html(message);
        $(".messageContainer").addClass("active");
        $(".messageContainer").removeClass("bg-green-500");
        $(".messageContainer").addClass("bg-red-500");
        setTimeout(() => {
        $(".messageContainer").removeClass("active");
        $(".messageContainer").addClass("hide");
        }, 3000);

        setTimeout(() => {
        $(".messageContainer").removeClass("hide");
        $(".messageContainer").removeClass("bg-red-500");
        $(".messageContainer").addClass("bg-green-500");
        $(".messageContainer p").html("‎ ");
        messageEstado = 0;
        }, 3500);

        // Scroll to top of the page
        } else if (estado == 2) {
        $(".messageContainer p").html(message);
        $(".messageContainer").addClass("active");
        $(".messageContainer").removeClass("bg-green-500");
        $(".messageContainer").addClass("bg-yellow-500");
        setTimeout(() => {
        $(".messageContainer").removeClass("active");
        $(".messageContainer").addClass("hide");
        }, 3000);

        setTimeout(() => {
        $(".messageContainer").removeClass("hide");
        $(".messageContainer").removeClass("bg-yellow-500");
        $(".messageContainer").addClass("bg-green-500");
        $(".messageContainer p").html("‎ ");
        messageEstado = 0;
        }, 3500);
        }
        return true;
    } else {
        return false;
    }
}

$(document).ready(function() {

    reloadTable();

});