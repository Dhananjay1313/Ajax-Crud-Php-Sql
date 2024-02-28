$(document).ready(function(){
  $("#submit").on("click", function(){
    let formData = new FormData(document.getElementById('formdata'));
    $.ajax({
      type: "POST",
      url: "insert.php",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success:
       function (data){
          listing();
          $('#mymodal').modal('hide');
          $('#formdata').trigger("reset");
      }
    });
  });

  $(document).on("click","#edit",function(){
    var id = $( this ).data( 'id' );
      $.ajax({
        type:"post",
        url: "edit.php",
        data: { id: id},
        success: function(response){  
          console.log(response);
          $('#mymodal').modal('show');
          var data = JSON.parse(response);
          $('#id').val(data['id']);
          $('#fullname').val(data['fullname']);
          $('#email').val(data['email']);
          $('input[type="radio"]').filter('[value=' + data['gender'] + ']').prop("checked", true);
          $('#animal').val(data['animal']); 
          let hobbiesArray = data['hobbies'].split(',');
          $('input[type="checkbox"]').filter(function() {
              return hobbiesArray.includes($(this).val());
          }).prop('checked', true);
          console.log(data['hobbies']);
        }
      });
  });
  listing();

  $("#mymodal").on("hidden.bs.modal", function() {
    $(this).find('form').trigger('reset');
    $('#formdata').trigger("reset");
  });
});

$(document).on('click', '.page-item', function(){
  var page = $(this).attr('id');
  $("#page").val(page);
  console.log(page);
  listing();
});

function listing(){
  var page = $("#page").val();
  var inputVal= $('#search').val();
  var name= $('#name').val();
  var type= $('#type').val();
  console.log(name);
  console.log(type);
  $.ajax({ 
    type: "post",
		url: "listing.php",
    data :{page:page,
      search:inputVal,
      name:name,
      type:type
      },
		success: function(data){
      var parseddata = JSON.parse(data);
      var tbody = parseddata['tbody'];
      var page1 = parseddata['pagination'];
      $("#tbody").html(tbody);
      $("#pagination").html(page1);
		}
	});
}

$(document).on("click",".up",function(){
   var name = $(this).attr('data-name');
   console.log(name);
    $("#name").val(name);
   var value = $(this).attr('data-value');
   console.log(value);
   $("#type").val(value);
   listing();
});

$(document).on("click",".down",function(){
  var name = $(this).attr('data-name');
   console.log(name);
    $("#name").val(name);
  var value = $(this).attr('data-value');
   console.log(value);
  $("#type").val(value);
  listing();
});

$(document).on("click","#delete",function(){
  var $delete = $(this).parent().parent();
		$.ajax({
			url: "delete.php",
			type: "post",
			cache: false,
			data:{
				id: $(this).attr("data-id")
			},
			success: function(response){
					$delete.fadeOut().remove();
			}
    });
});

$('#search').on('keyup', function() {
  listing();
});

function checkDelete(){
  return confirm('Are you sure that you want to delete?');
}