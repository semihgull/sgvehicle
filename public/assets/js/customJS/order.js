

$(function (){
    let CustomerArea = $('#customer-area'),
        VehiclesArea = $('#vehicles-area'),
        ServicesArea = $('#services-area'),
        StepOneBtn = $('#step-one-btn'),
        StepTwoBtnPrev = $('#step-two-btn-prev'),
        StepTwoBtnNext = $('#step-two-btn-next'),
        StepTreeBtn = $('#step-tree-btn'),
        CustomerInfoView = $('#customer-info-view'),
        VehiclesInfoView = $('#vehicles-info-view'),
        CustomerPhoneSearch = $('#customer-phone-number-search'),
        CustomerFindBtn = $('#customer-find-btn'),
        CarFindBtn = $('#car-find-btn'),
        OrderBtn = $('.btn-edit');

    VehiclesArea.hide();
    ServicesArea.hide();
    CustomerInfoView.hide();
    VehiclesInfoView.hide();

    CustomerPhoneSearch.inputmask({"mask": "(999) 999-9999"});

    StepTwoBtnNext.on('click', function (){
        CustomerArea.hide(300)
        CustomerInfoView.hide(300)
        VehiclesArea.show(300)
    });

    StepOneBtn.on('click', function (){
        CustomerArea.show(300)
        CustomerInfoView.show(300)
        CustomerArea.show(300)
        VehiclesInfoView.hide(300)
    });

    StepTreeBtn.on('click', function (){
        VehiclesArea.hide(300)
        VehiclesInfoView.hide(300)
        ServicesArea.show(300)
    });

    StepTwoBtnPrev.on('click', function (){
        ServicesArea.hide(300)
        VehiclesArea.show(300)
    })

    CustomerFindBtn.on('click', function (){

        let data = CustomerPhoneSearch.val().trim().replace('(','')
            .replace(')','')
            .replace('-',' ')

        $.ajax({
            url: 'http://localhost/sgboilerplate/customer/get/customer-info/'+ data,
            type: 'get',
            success: function (response){
                let data = JSON.parse(response)
                if (data["error"]){
                    CustomerInfoView.hide(600);
                    Swal.fire(data["error"])
                }else{
                    CustomerInfoView.show(600);
                    $('#customer-fullname').html(data[0]["customer-fullname"])
                    $('#customer-address').html(data[0]["customer-address"])
                    $('#customer-phone').html(data[0]["customer-phone"])
                    $('#customer-email').html(data[0]["customer-email"])
                    $('#customer-id-number').html(data[0]["customer-id-number"])
                    $('#customer-id-input').val(data[0]["id"])
                }
            }
        });
    });

    CarFindBtn.on('click', function (){
        let searchType = $('input[name="search-type"]:checked').val();
        let customerId = $('#customer-id-input').val(),
            data = $('#car-find-info');
        $.ajax({
            url: 'http://localhost/sgboilerplate/car/get/info/',
            type: 'post',
            data: {
                "data": data.val(),
                "customerId" : customerId,
                "searchType": searchType
            },
            success: function (response){
                let data = JSON.parse(response);
                if (data["error"] == 1){
                    swal.fire("Kayıtlı Araç Bulunamadı!");
                }else{
                    VehiclesInfoView.show(500);
                    $('#car-brand').html(data["carBrandName"])
                    $('#car-model').html(data["carModelName"])
                    $('#car-chassis-number').html(data["carChassisNumber"])
                    $('#car-plate').html(data["carPlate"])
                    $('#car-owner').html(data["carOwner"])
                    $('input[name="car-id-input"]').val(data["carId"])
                    $('input[id="customer-id-input"]').val(data["customerId"])
                }
            }
        });
    });

});