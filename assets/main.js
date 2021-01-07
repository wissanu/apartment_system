/*===== SHOW NAVBAR  =====*/
const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('show2')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE  =====*/
const linkColor = document.querySelectorAll('.nav__link')

function colorLink(){
    if(linkColor){
        linkColor.forEach(l=> l.classList.remove('active'))
        this.classList.add('active')
    }
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

$(document).ready(function (e) {
    $('#month_state').on('change', function () {
        monthChange();
    });
});

function monthChange() {
    var month_change = $("#month_state").val();
    $.ajax({
        url: "status_profile.php",
        type: "POST",
        data: {
            month_status: month_change
        },
        async: true,
        dataType: "text",
        success: function (data) {
            console.log(JSON.parse(data)[0][0]['lease_id']);
            var result_bill = JSON.parse(data);
            $('#tblParticipantList > tr').remove();

            var newRowContent = '';
            var count = 0;

            for (var i = 0; i < result_bill[0].length; i++) {
              newRowContent += '<tr>';
              var disable = result_bill[0][i]['payment_status'] == 1 ? 'disabled': '';
              var link = result_bill[0][i]['payment_status'] == 1 ? 'button':  'a';
              newRowContent += '<input type="hidden" name="l_id[]" id="user_id" value="'+result_bill[0][i]['lease_id']+'"/>';
              newRowContent += '<input type="hidden" name="r_id[]" id="user_id" value="'+result_bill[0][i]['rent_id']+'"/>';
              newRowContent += '<th scope="row" class="text-center"><div class="custom-control custom-checkbox"><input type="checkbox" '+disable+' name="check['+result_bill[0][i]['rent_id']+']" class="custom-control-input" id="customCheck'+count+'"><label class="custom-control-label" for="customCheck'+count+'">'+result_bill[0][i]['room_number']+'</label></div></th>';
              newRowContent += '<td class="text-center">'+result_bill[0][i]['room_type']+'</td>';
              var payment_state = result_bill[0][i]['payment_status'] == 0 ? 'ค้างชำระ': 'ชำระเสร็จสิ้น';
              var color_status = result_bill[0][i]['payment_status'] == 0 ? 'danger': 'success'
              newRowContent += '<td class="btn-'+color_status+' text-center">'+payment_state+'</td>';
              newRowContent += '<td class="text-center">'+result_bill[0][i]['meter_l_p']+'</td>';
              newRowContent += '<td class="text-center">'+result_bill[0][i]['meter_w_p']+'</td>';
              newRowContent += '<td class="text-center">'+result_bill[0][i]['payment_amount']+'</td>';
              newRowContent += '<td><'+link+' class=" btn btn-success" href="edit_status.php?id='+result_bill[0][i]['rent_id']+'" '+disable+'>แก้ไข</'+link+'></td>';
              newRowContent += '</tr>';
              count += 1;
            }

            $("#tblParticipantList").append(newRowContent);
        },
        error: function (xhr, textStatus, errorThrown) {
            alert('โปรดเปิดการทำงานของ Xampp');
            return false;
        }
    }).responseJSON;
}
