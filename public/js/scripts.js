$(document).ready(function() {
  /* alert('loading sucessfull');*/
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
  $('#datetimepicker').datetimepicker();
  $('#country').change(function(){
    //alert('loading sucessfull');
    //$('#town').html("");
    loadTownByCountryId();
  });

  $('#town').change(function(){
    //alert('loading sucessfull');
    loadQuarterByTownId();
  });
  $('#category').change(function(){
    //alert('loading sucessfull');
    loadSub_categoryByCategoryId();
  });
  $('#agency').change(function(){
    //alert('loading sucessfull');
    loadChargeByAgencyId();
  });

  $('#charge').change(function(){
    setTotal();
  });

});

/**
 * Fill modal for sales update
 * */
function fillModal(receipt_no){
    alert($('#baseUrl').val()+"/dashboard/sales/update/"+receipt_no)
    $.ajax({
        type: "POST",
        url: $('#baseUrl').val()+"/dashboard/sales/update/"+receipt_no,
        success: function (html) {
            $("#form-body").html(html)
            // alert(html)
        },
        error: function (error) {
            $("#form-body").html(error)
            console.log(error)
        }
    });

}

function setTotal(){
  var temp = parseFloat($("#total_amount").val()) + parseFloat($("#charge").val());
  $("#Total").val(temp);
}

function loadTownByCountryId(){
  //alert('loading sucessfull');
  $.ajax({
    url: $("#baseUrl").val() + '/populate_fh_info/loadtown',
    data : {
      country_id : $('#country').val(),
      _token: $('meta[name="csrf-token"]').attr('content'),
    },
    datatype : "json",
    type: "get",
    success : function(result){
      var rs = JSON.parse(result);
      if(rs.state == "success"){
        $('#town').html(rs.towns);
      }
    },
    error : function(){
      alert("Error reaching server, please check log for details cc");
    }
  });
}

function loadQuarterByTownId(){
  //alert('loading quarter');
  $.ajax({
    url: $("#baseUrl").val() + '/populate_fh_info/loadquarter',
    data : {
      town_id : $('#town').val(),
      _token: $('meta[name="csrf-token"]').attr('content'),
    },
    datatype : "json",
    type: "get",
    success : function(result){
      var rs = JSON.parse(result);
      if(rs.state == "success"){
        $('#quarter').html(rs.quarters);
      }
    },
    error : function(){
      alert("Error reaching server, please check log for details");
    }
  });
}

function loadChargeByAgencyId(){
  //alert('loading charge');

  $.ajax({

    url: $("#baseUrl").val() + '/populate_fh_info/loadcharge',
    data : {
      agency_id : $('#agency').val(),
      _token: $('meta[name="csrf-token"]').attr('content'),
    },
    datatype : "json",
    type: "get",
    success : function(result){
      var rs = JSON.parse(result);
      if(rs.state == "success"){
        $('#charge').html(rs.charges);
        $("#charge").val($("#charge option:first").val());
        setTotal();
      }
    },
    error : function(){
      alert("Error reaching server, please check log for details");
    }
  });
}

function loadSub_categoryByCategoryId(){
  $.ajax({
    url: $("#baseUrl").val() + '/populate_fh_info/sub/category',
    data : {
      category_id : $('#category').val(),
    },
    type: "get",
    success : function(result){
      var rs = JSON.parse(result);
      if(rs.state == "success"){
        $('#sub_category').html(rs.sub_categories);
      }
    },
    error : function(){
      alert("Error reaching server");
    }
  });
}
function getOfCategory(obj){
    var role_id = $('#user_type').val();
    $.ajax({
        url: $('#baseUrl').val() + '/users/category',
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

function getItemCategory(obj){
    var item_id = $('#item_category').val();
    $.ajax({
        url: $('#baseUrl').val() + '/products/category',
        data: {
            item_id: item_id
        },
        type: "get",
        success: function (result) {
            $('#total_items').val(result);
        },
        error: function (e) {
            console.log(e);
            // alert("Error reaching server, please check log for details");
        }
    });
}
//Pius's script

function suggestProductCategory(obj){
  if(this.keyCode==13){
    return ;
  }
  $('#searchString').css("visibility","visible");

  var prod = obj.value;
  $.ajax({
    url: $("#baseUrl").val() + '/search/suggest',
    data : {
      category :  prod
    },
    type: "get",
    success : function(result){
      $('#searchString').html(result);
    },
    error : function(e){
      console.log(e);
      // alert("Error reaching server, please check log for details");
    }
  });

}
/*function getItemChoice(obj){
  $('#q').val($(obj).text());
  $('#searchString').html("");
  $('#search_go').click();
}*/

/*end  of suggestion search*/

/*function to filter categories*/


function suggestProductCategory(obj){
    if(this.keyCode==13){
        return ;
    }

    var prod = obj.value;
    $.ajax({
        url: $("#baseUrl").val() + '/search/suggest',
        data : {
            category :  prod
        },
        type: "get",
        success : function(result){
            $('#searchString').html(result);
        },
        error : function(e){
            console.log(e);
            // alert("Error reaching server, please check log for details");
        }
    });

}
function getItemChoice(obj){
    $('#q').val($(obj).text());
    $('#searchString').html("");
    $('#search_go').click();
}

/*end  of suggestion search*/

/*function to filter categories*/
function filterCategory(obj){
    var shop = obj.value;
    var rw =$("#stockorder > tbody > tr").length;
    $.ajax({
        url: $("#baseUrl").val() + '/dashboard/newstock/order',
        data: {
            shop_id: shop,
            row_count: rw
        },
        type: "get",
        success: function (result) {

            $(obj).closest('td').next().html(result);
        },
        error: function (e) {
            console.log(e);
            // alert("Error reaching server, please check log for details");
        }
    });
}
/*Function restricts entry of characters, only numbers
* */
function onlyNos(e, t) {

    if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
            // Allow: Ctrl+A
        (event.keyCode == 65 && event.ctrlKey === true) ||
            // Allow: home, end, left, right
        (event.keyCode >= 35 && event.keyCode <= 39)) {
        // let it happen, don't do anything
        return;
    }
    else {
        // Ensure that it is a number and stop the keypress
        if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode <= 100 || event.keyCode >= 105)) {
            event.preventDefault();
        }
    }

}
/*funtion to retrieve unit price based on category*/
var unitgetton;
function getUnitPrice(obj){
    var  item_id = obj.value;
    $.ajax({
        url: $("#baseUrl").val() + '/dashboard/category/unitprice',
        data:{
            id: item_id
        },
        type: "get",
        success: function(result){
            $(obj).closest('td').next().html(result);
        },
        error: function (e) {
            console.log(e);
            // alert("Error reaching server, please check log for details");
        }

    });
}
function getProjectDetails(obj){
    var  project_id = obj.value;
    var tr = $(obj).closest('tr');
    var rw =$("#stockorder > tbody > tr").length;
    $.ajax({
        url: $("#baseUrl").val() + '/dashboard/get/optionsof/project/details',
        data:{
            id: project_id,
            rowcount: rw
        },
        type: "get",
        success: function(result){
            tr.find('select').eq(2).html(result);
        },
        error: function (e) {
            console.log(e);
             alert("Error reaching server, please check log for details");
        }

    });
}
function getUnit(obj){
    var ide = obj;

    $.ajax({
        url: $("#baseUrl").val() + '/dashboard/category/categoryunit',
        data:{
            id: ide
        },
        type: "get",
        success: function(result){
            $(obj).closest('td').next().next().html(result);

        },
        error: function (e) {
            console.log(e);
            // alert("Error reaching server, please check log for details");
        }

    });


}
function computeSubTotal(obj){
    var tr = $(obj).closest('tr'),
        tds = tr.find('td');
    var  quantity =tr.find("input").eq(1).val();
    var price = tr.find("input").eq(0).val();
    tr.find("input").eq(2).val(quantity * price);
    tr.find("input").eq(2).text(quantity * price);
    var total =0;

    /*alert($('#stockorder > tbody > tr').find('input').eq(1).val());*/
    $('#stockorder > tbody > tr').each(function(evt) {
        var value =  $(this).find('input').eq(2).val()*1;
        total = total + value;
    });
    $("#totalcost").val(total);
    $("#totalcost").html(total);
}
function removeRow(obj){
    if(obj.id=='row1'){
        $("#deleteMessage").html('You cannot remove the first order');
        return ;
    }
    else{
        $("#deleteMessage").html("Row Removed")
        var rw =$("#stockorder > tbody > tr").length;
        rw--;
        $("#totalitems").val(rw);
        var tr = $(obj).closest('tr'),
            price = tr.find("input").eq(2).val()*1,
            total =   $("#totalcost").val()*1;
        total = total - price;
        $("#totalcost").val(total);
        $("#totalcost").html(total);
        var row = $(obj).closest('tr').remove();
    }
}
/*this function adds a new table row during goods purchase*/

function addNewRow(obj){
    var
        categories =   $("#stockorder").find("tbody:last-child").find('select').eq(0).html(),
        units =   $("#stockorder").find("tbody:last-child").find('select').eq(1).html();
    var rw =$("#stockorder > tbody > tr").length;
    rw++;
    $("#totalitems").val(rw);
    var rwid ='tr'+rw;
    $("#stockorder").find("tbody:last-child").append('<tr id="'+ rwid +'"'+
        '><td style="width: 15%;"><select class="form form-control" name="item_id'+rw+'"'
        +' onchange="getUnitPrice(this)" onblur="computeSubTotal(this)">' + categories + '</select></td><td style="width: 15%;"> <input class="form form-control" style="width: 100%;" name="unit_price'+rw+'"'
        +' readonly type="text" id="1"/></td> <td style="width: 15%;" ><input class="form form-control" style="width: 100%;" name="quantity'+rw+'" id="2" onkeypress="onlyNos(event,this.value)" onKeyUp="computeSubTotal(this)"/><td style="width: 35%;"><input class="form form-control" readonly style="width: 100%;"name="sub_total'+rw+'"'+'id="3" value=""/></td><td style="width: 10%;"><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td> </tr>');

}

/*this function adds a new table row when assigning materials to a project*/
function addNewMaterialRow(obj){
    var
        projects = $("#stockorder").find("tbody:last-child").find('select').eq(0).html()
        categories =   $("#stockorder").find("tbody:last-child").find('select').eq(1).html(),
        tasks =   $("#stockorder").find("tbody:last-child").find('select').eq(2).html();
    var rw =$("#stockorder > tbody > tr").length;
    rw++;
    $("#totalitems").val(rw);
    var rwid ='tr'+rw;
    $("#stockorder").find("tbody:last-child").append('<tr id="'+ rwid +'"'+
        '><td style="width: 15%;"><select class="form form-control" name="project_id'+rw+'"onchange="getProjectDetails(this)"'+'>'+projects + '</td><td style="width: 20%;"><select class="form form-control" name="item_id'+rw+'"'
        +' onchange="getUnitPrice(this)" onblur="computeSubTotal(this)">' + categories + '</select></td><td style="width: 15%;"> <input class="form form-control"name="unit_price'+rw+'"'
        +' readonly type="text" id="1"/></td> <td style="width: 10%;" ><input class="form form-control" style="width: 100%;" name="quantity'+rw+'" id="2" onkeypress="onlyNos(event,this.value)" onKeyUp="computeSubTotal(this)"/>' +
        '<td style="width: 15%;"><input class="form form-control" readonly style="width: 100%;"name="sub_total'+rw+'"'+'id="3" value=""/></td>' +
        '<td style="width: 15%;"><select class="form form-control" name="milestone_id'+rw+'"> '+tasks + '</select></td>' +
        '<td style="width: 10%;"><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td> </tr>');

}
function addNewUserRow(obj){
    var
        projects = $("#stockorder").find("tbody:last-child").find('select').eq(0).html()
        users =   $("#stockorder").find("tbody:last-child").find('select').eq(1).html(),
     rw =$("#stockorder > tbody > tr").length;
    rw++;
    $("#totalitems").val(rw);
    var rwid ='tr'+rw;
    $("#stockorder").find("tbody:last-child").append('<tr id="'+ rwid +'"'+
        '><td style="width: 30%;"><select class="form form-control" name="project_id'+rw +'"'+'>'+projects + '</select></td><td style="width: 30%;"><select class="form form-control" name="user_id'+rw+'">'+
        users + '</select></td><td style="width:30%">  <input class="form form-control" name="dailypay'+rw +'"'+ 'style="width: 100%" type="text" placeholder="e.g 3500"/></td>'+
    '<td style="width: 10%;"><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td> </tr>');
}

function updateSelectedItems(){
    var checkedBoxes = $('input[name=totalcheckboxes]:checked').length;
    //alert(checkedBoxes);
    $("#selecteditems").html(checkedBoxes);
    var selected_items = "";
    var count = $("#count").val();
    for(i=1; i<=count; i++){
        var checkbox_id = "#checkbox"+i;
        if($(checkbox_id).is(':checked')){
            var item_id = "#item"+i;
            selected_items += $(item_id).val();
            if(i != (count))
                selected_items += ",";
        }
    }
    $("#selected_item_ids").val(selected_items);
}
