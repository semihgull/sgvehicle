$(function (){
    let VehiclesArea = document.getElementById('vehicles-area'),
        CustomerArea = document.getElementById('customer-area'),
        StepOneBtn = document.getElementById('step-one-btn'),
        StepTwoBtn = document.getElementById('step-two-btn'),
        CarBrand = document.getElementById('car-brand'),
        CarBrandEdit = document.getElementById('car-brand-edit'),
        CarModel = document.getElementById('car-model'),
        CarModelEdit = document.getElementById('car-model-edit'),
        CarSearchInfo = document.getElementById('car-search-info'),
        CarSearchInfoLength = document.getElementById('length-info'),
        CarSearchInfoError = document.getElementById('error-info'),
        EditArea = document.getElementById('edit-area');



    $(VehiclesArea).css('display', 'none');
    $(CarSearchInfoLength).css('display', 'none');
    $(CarSearchInfoError).css('display', 'none');
    $(EditArea).css('display', 'none');

    $(StepTwoBtn).on('click', function (){
        $(CustomerArea).hide(750);
        $(VehiclesArea).show(1000);
    });

    $(StepOneBtn).on('click', function (){
        $(CustomerArea).show(1000);
        $(VehiclesArea).hide(750);
    });

    $(CarBrand).on('change', function (){
        let brandId = $(this).val();
        $(CarModel)
            .find('option')
            .remove()
            .end()
            .append('<option value="0">Seçin</option>')
            .val('0');
        if (brandId > 0){
            $.ajax({
                url: 'http://localhost/sgboilerplate/car/get/brand/' + brandId,
                type: 'get',
                success: function (response){
                    let models = JSON.parse(response);
                    if (models['error']){
                        Swal.fire({
                            icon: 'error',
                            text: "Marka'ya Kayıtlı Model Bulunmuyor."
                        });
                    }else{
                        $.each(models, function (index, value){
                            $(CarModel).append($('<option>', {
                                value: value['id'],
                                text: value['title'],
                            }));
                        });
                    }
                }
            });
        }else{
            Swal.fire("Geçerli Marka Seçmelisiniz.");
        }
    });

    $(CarBrandEdit).on('change', function (){
        let brandIdEdit = $(this).val();
        $(CarModelEdit)
            .find('option')
            .remove()
            .end()
            .append('<option value="0">Seçin</option>')
            .val('0');
        if (brandIdEdit > 0){
            $.ajax({
                url: 'http://localhost/sgboilerplate/car/get/brand/' + brandIdEdit,
                type: 'get',
                success: function (response){
                    let models = JSON.parse(response);
                    if (models['error']){
                        Swal.fire({
                            icon: 'error',
                            text: "Marka'ya Kayıtlı Model Bulunmuyor."
                        });
                    }else{
                        $.each(models, function (index, value){
                            $(CarModelEdit).append($('<option>', {
                                value: value['id'],
                                text: value['title'],
                            }));
                        });
                    }
                }
            });
        }else{
            Swal.fire("Geçerli Marka Seçmelisiniz.");
        }
    });

    $(CarSearchInfo).on('keyup', function (){

        if ($(CarSearchInfo).val().length > 2){
            $(CarSearchInfoLength).hide(1000);

            $.ajax({
                url: 'http://localhost/sgboilerplate/car/get/info/' + $(CarSearchInfo).val(),
                get: 'get',
                success: function (response){
                    if (response == 0){
                        $(CarSearchInfoError).show(377);
                    }else{
                        $(CarSearchInfoError).hide(377);
                        let data = JSON.parse(response);
                        if (data["error"]){
                            $(EditArea).hide(377);
                            $(CarSearchInfoError).show(377);
                            $('#car-id-edit').val("")
                            $('#car-plate-edit').val("")
                            $('#car-chassis-number-edit').val("")
                            $('#car-brand-selected').val("999")
                            $('#car-brand-selected').html("Seçin");
                            $('#car-model-selected').val("999");
                            $('#car-model-selected').html("Seçin");

                        }else{
                            $(EditArea).show(377);
                            $('#car-id-edit').val(data["car"]['id']);
                            $('#car-plate-edit').val(data["car"]['car-plate']);
                            $('#car-chassis-number-edit').val(data["car"]['car-chassis-number']);
                            $('#car-brand-selected').val(data["car"]["car-brand"]);
                            $('#car-brand-selected').html(data["brandName"]);
                            $('#car-model-selected').val(data["car"]["car-model"]);
                            $('#car-model-selected').html(data["modelName"]);
                        }
                    }
                }
            });
        }else {
            $(CarSearchInfoLength).show(500);
            $(CarSearchInfoError).hide(377);
            $(EditArea).hide(377);
        }
    });

});