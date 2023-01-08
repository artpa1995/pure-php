$(document).ready(function(){


  $(".submenu > a").click(function(e) {
    e.preventDefault();
    var $li = $(this).parent("li");
    var $ul = $(this).next("ul");

    if($li.hasClass("open")) {
      $ul.slideUp(350);
      $li.removeClass("open");
    } else {
      $(".nav > li > ul").slideUp(350);
      $(".nav > li").removeClass("open");
      $ul.slideDown(350);
      $li.addClass("open");
    }
  });



  $('.approve').on('click',function (event) {
      event.preventDefault();
      var id = $(this).data('id');
     // $(this).parent().eq(3).addClass('aaaa');
      var $that = $(this);
      $.ajax({

       url:'approve.php?id='+id,
       method:'get',
       dataType:'json',
       success:function (data) {
          if(data){

              var a = $that.closest('tr');
              a.find('td').eq(3).html(data.status);
              $that.attr('disabled',true);

          }
       }


      })

  });
  $('.approve1').on('click',function (event) {
    event.preventDefault();
    var id = $(this).data('id');
   // $(this).parent().eq(3).addClass('aaaa');
    var $that = $(this);
    $.ajax({

     url:'approve1.php?id='+id,
     method:'get',
     dataType:'json',
     success:function (data) {
        if(data){

            var a = $that.closest('tr');
            a.find('td').eq(3).html(data.status);
            $that.attr('disabled',true);

        }
     }


    })

});
$('.approve2').on('click',function (event) {
  event.preventDefault();
  var id = $(this).data('id');
 // $(this).parent().eq(3).addClass('aaaa');
  var $that = $(this);
  $.ajax({

   url:'approve2.php?id='+id,
   method:'get',
   dataType:'json',
   success:function (data) {
      if(data){

          var a = $that.closest('tr');
          a.find('td').eq(3).html(data.status);
          $that.attr('disabled',true);

      }
   }


  })

});
	
	/*setTimeout(function() {
		$('#createCategoryMsg').hide();
	}, 2000)*/

	$('.pagid').on('click',function (event) {
        event.preventDefault();
        var pagid = $(this).attr('href');
        $.ajax({

            url:'gallery.php?pageId='+pagid,
            method:'get',
            dataType:'html',
            success:function (res) {
                //console.log(res);
                $('body').html(res);
            }
        })
    })
	/*
	$('#checkAll').on('click', function() {
		if(this.checked){
			$('.checkbox').prop('checked', true);
		}
		else {
			$('.checkbox').prop('checked', false);
		}
	})*/
	

  $("#frmCSVImport").on("submit", function () {

    $("#response").attr("class", "");
      $("#response").html("");
      var fileType = ".csv";
      var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
      if (!regex.test($("#file").val().toLowerCase())) {
            $("#response").addClass("error");
            $("#response").addClass("display-block");
          $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
          return false;
      }
      return true;
  });
});