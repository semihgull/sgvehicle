$(function (){
    let departmentEditInput = document.querySelector('#department-name-edit')
    let clearBtn = document.getElementById('clear-btn');
    clearBtn.setAttribute('disabled', 'disable')
    $(clearBtn).click( function () {
        $('#department-name-edit').val("")
        $('#department-id-edit').val("");
    })
})

function editFunction(departmentId){
    $.ajax({
        url: 'http://localhost/sgboilerplate/department/get/department-info',
        type: 'post',
        data: {"departmentId" : departmentId},
        success: function (response){
            let data = JSON.parse(response)
            $('#department-name-edit').val(data.name)
            $('#department-id-edit').val(data.id)
            let clearBtn = document.getElementById('clear-btn');
            clearBtn.removeAttribute('disabled')

        }
    })
}

function changeDepartmentEdit(){
    let departmentEditInput = document.getElementById('department-name-edit')
    let clearBtn = document.getElementById('clear-btn');
    if (departmentEditInput.value.length > 0){
        clearBtn.removeAttribute('disabled')
    }else{
        clearBtn.setAttribute('disabled', 'disable')
    }

}