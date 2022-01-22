$(() => {

    let editBtn = document.getElementById('edit-category-btn'),
        newBtn = document.getElementById('new-category-btn'),
        editArea = document.getElementById('edit-category-area'),
        newArea = document.getElementById('new-category-area'),
        categoryNameEdit = document.getElementById('category-name-edit'),
        categoryIdEdit = document.getElementById('category-id-edit'),
        parentCategoryEdit = document.getElementById('parent-category-edit'),
        parentCategoryEditSelect = document.getElementById('parent-category-edit-select'),
        partFindBtn = document.getElementById('parts-find-btn'),
        partCodeSearch = document.getElementById('parts-code-search'),
        partListSearch = document.getElementById('parts-list-search');

    $(editArea).css('display', 'none')
    $(newArea).css('display', 'none')

    $(editBtn).on('click', function (){
        $(editArea).show("slow")
        $(newArea).hide("slow")
    });

    $(newBtn).on('click', function (){
        $(newArea).show("slow")
        $(editArea).hide("slow")
    });

    $(parentCategoryEditSelect).on('change', function (){
        let dataId = $(this).val()
        $.ajax({
            url: 'http://localhost/sgboilerplate/store/get/category-info/' + dataId,
            type: 'get',
            success: function (response){
                let data = JSON.parse(response);

                $(categoryNameEdit).val(data['category-name'])
                $(categoryIdEdit).val(data['id']);
                if (data['parent-category'] != 0){
                    $('#edit-select-option').val(data['parent-category']);
                    $('#edit-select-option').html(data['parent-category-name']["category-name"]);
                }
                $('#delete-category-btn').attr("href", "http://localhost/sgboilerplate/store/delete-store-category/" + data['id']);
            }
        })
    });

    $(partListSearch).on('change', function (){
            $('#parts-code-search').val($(this).val());
    });

    $(partFindBtn).on('click', function (){
        let partCode = document.getElementById('parts-code-search');
        if ($(partCode).val().length == 0 ){
            Swal.fire("Bir Değer Girin");
        }else{
            $.ajax({
                url: 'http://localhost/sgboilerplate/store/car-part-info/get/' + $(partCode).val(),
                type: 'get',
                success: function (response){
                    let parts = JSON.parse(response);
                    if (parts["error"] == "none"){
                        $('#parts-name-edit').val(parts["part"]["parts-name"]);
                        $('#parts-id-edit').val(parts["part"]["id"]);
                        $('#parts-code-edit').val(parts["part"]["parts-code"]);
                        $('#edit-select-option').attr('value', parts['part']['parts-category']);
                        $('#edit-select-option').html(parts['categoryName']["category-name"]);
                        $('#parts-stock-edit').val(parts['part']["parts-quantity"]);
                        $('#parts-price-edit').val(parts['part']["parts-price"]);
                    }else{
                        $('#parts-name-edit').val("");
                        $('#parts-id-edit').val("");
                        $('#parts-code-edit').val("");
                        $('#edit-select-option').attr('value', '');
                        $('#edit-select-option').html();
                        $('#parts-stock-edit').val("");
                        $('#parts-price-edit').val("");
                        Swal.fire(parts['error']);

                    }
                }
            })
        }
    });
});
