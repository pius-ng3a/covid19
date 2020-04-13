$(function(){
    $("#mobilemoneydiv").hide();
    $("#visadetailsdiv").hide();
});


function getAttendanceDate(obj){
    var attdate = obj.value;
    $.ajax({
        url: $('#baseUrl').val() + '/set/attendance/date',
        data: {
            attendanceDate: attdate
        },
        type: "get",
        success: function (result) {

            alert(result+'date set');
        },
        error: function (e) {
            console.log(e);
             alert("Error reaching server, please check log for details");
        }
    });
 }
function downloadAttendanceHistory(obj){
    $.ajax({
        url: $('#baseUrl').val() + '/download/attendance/history',
        type: "get",
        success: function (result) {
            alert(result);
        },
        error: function (e) {
            console.log(e);
            // alert("Error reaching server, please check log for details");
        }
    });
 }

//function to get sales of a given shop
function getSalesOfAShop(obj){
    var shop = $('#myshop').val();
    $.ajax({
        url: $('#baseUrl').val() + '/dashboard/show/all/shop/sales',
        data: {
            shop_id: shop
        },
        type: "get",
        success: function (result) {
            $('#pershopdiv').html(result);
        },
        error: function (e) {
            console.log(e);
             alert("Error reaching server, please check log for details");
        }
    });
}
//ajax function to retrieve users of a given category
function getSubscribersOfCategory(obj){
    var role_id = $('#user_type').val();
    $.ajax({
        url: $('#baseUrl').val() + '/newsletter/user/category',
        data: {
            role_id: role_id
        },
        type: "get",
        success: function (result) {
            $('#total_users').val(result);
        },
        error: function (e) {
            console.log(e);
            // alert("Error reaching server, please check log for details");
        }
    });
}
//function returns users who have a given privilege.
function getUsersWithPrivilege(obj){
    var privilege_id = $("#privilege_id").val();
   // alert(privilege_id);

    $.ajax({
        url: $('#baseUrl').val() + '/dashboard/get/users/with/privilege',
        data: {
            privilege_id: privilege_id
        },
        type: "get",
        success: function (result) {
            $('#users').html(result);
        },
        error: function (e) {
            console.log(e);
            // alert("Error reaching server, please check log for details");
        }
    });
}
//show division for payment using mobile money
function showMobileMoneyInputDiv(obj){
    $("#mobilemoneydiv").show();
    $("#visadetailsdiv").hide();
     /*$("#mobilemoneydiv").css("visibility",'visible');
     $("#visadetailsdiv").css("visibility",'hidden');;*/
}
function showVisaDetailsInputDiv(obj){
     $("#mobilemoneydiv").hide();
     $("#visadetailsdiv").show();
     /*$("#mobilemoneydiv").css("visibility",'hidden');
     $("#visadetailsdiv").css("visibility",'visible');*/
}


