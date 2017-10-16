//add dasignation
  $('#infoForm').on('submit',function(e){
    event.preventDefault();
    //console.log('success');
    if($('#designation').val() == ''){
      alert("Designation is required")
    }else{
         $.ajax({
          url:"view/add_designation.php",
          method:"post",
          data:$('#infoForm').serialize(),
         
          success:function(data){
            //console.log(data);
            $('#infoForm')[0].reset();
            $('#myModal').modal('hide');
            $('#emp_table').html(data);
          }

    });
    }
  })
//add pay grade
//
$('#paygrade').on('submit',function(e){
    event.preventDefault();
    //console.log('success');
    if($('#payg_name').val() == ''){
      alert("Paygrade Name is required")
    }else if($('#salary_range').val() == ''){
      alert("Salary range is required")
    }else if($('#desig').attr('required', 'required')){
      alert("Designation is required")
    }else{
         $.ajax({
          url:"view/add_paygrade.php",
          method:"post",
          data:$('#paygrade').serialize(),
         
          success:function(data){
            //console.log(data);
            $('#paygrade')[0].reset();
            $('#myModal').modal('hide');
            $('#pay_table').html(data);
          }

    });
    }
  })

//add admin
//
$('#admin_add').on('submit',function(e){
    event.preventDefault();
    //console.log('success');
    if($('#username').val() == ''){
      alert("User Name is required")
    }else if($('#password').val() == ''){
      alert("Salary range is required")
    }else{
         $.ajax({
          url:"view/add_admin.php",
          method:"post",
          data:$('#admin_add').serialize(),
         
          success:function(data){
            //console.log(data);
            $('#admin_add')[0].reset();
            $('#myModal').modal('hide');
            $('#success').html(data);
            document.getElementById('success').innerHTML="<p class='alert alert-success text-center'>Data Save</p>";
          }

    });
    }
  })

//add payItem
//
$('#payItem').on('submit',function(e){
    event.preventDefault();
    //console.log('success');
    if($('#payitem_name').val() == ''){
      alert("PayItems Name is required")
    }else{
         $.ajax({
          url:"view/add_payitem.php",
          method:"post",
          data:$('#payItem').serialize(),
         
          success:function(data){
            //console.log(data);
            $('#payItem')[0].reset();
            $('#myModal').modal('hide');
            $('#payitems_table').html(data);
            //document.getElementById('success').innerHTML="<p class='alert alert-success text-center'>Data Save</p>";
          }

    });
    }
  })