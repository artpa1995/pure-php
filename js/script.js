$(function() {
    let orinakTest = 0;
    $('#email').on('blur', function() {

        var email = $(this).val();
        var data1 = {
                'email': email
            }
            //console.log(data);
        $.ajax({

            url: 'emailValidate.php',
            method: 'post',
            data: data1,
            dataType: 'json',
            success: function(res) {
                // console.log(res);
                if (res) {
                    $('#error_email').html(res['error'])
                }
                if (res == null) {
                    $('#error_email').html(' ')
                }
            }
        })
    })


    $('#save_changes').on('click', function(event) {
        event.preventDefault();

        let form = $(this).parent();
        let data = form.serialize();
        $.ajax({
            url: 'editprofile.php',
            method: 'post',
            data: data,
            dataType: 'json',
            success: function(res) {
                $('#username').text(res['first_name'] + ' ' + res['last_name']);
                $('#editModal').modal('hide');
            }
        })
    })


    $('.grid').masonry({

    });

    $('.categories').on('click', function(event) {
        event.preventDefault();
        var catName = $(this).html();

        var data = {
            'category': catName,
        };

        $.ajax({
            url: '../user/postFilter.php',
            method: 'post',
            data: data,
            dataType: 'json',
            success: function(res) {
                if ($.trim(res)) {

                    $('#postContainer').empty();
                    var row = $('<div  class="row">');
                    for (let i = 0; i < res.length; i++) {
                        //  console.log(res[i]);
                        var post = $('<div  class="col-sm-3">');
                        var postimg = $('<img class="im">');
                        postimg.attr('src', '../uploads/' + res[i]['img']);
                        //console.log(postimg);
                        var postContent = $('<p>');
                        var subContent = res[i]['price'];
                        postContent.html(subContent);
                        var postTitle = $('<h3>').html(res[i]['description']);
                        post.append(postimg);
                        post.append(postTitle);
                        post.append(postContent);
                        //post.append(`<input type="number" value=".$_SESSION['cart'][$row['id']]`)
                        //post.append(`<input type="number" class="qanak" name="qanak">`)
                        post.append(`<a href="product.php?page=products&action=add&id=${res[i].id} >">Add to cart</a>`);
                        //post.append(`<input type="submit" href="product.php?page=products&action=add&id=${res[i].id} >">`);
                        row.append(post);
                        $('#postContainer').append(row);

                    }
                } else {
                    $('#postContainer').html('Nothing!');
                }

            }


        })

    });

    $('#postSearch').on('click', function(event) {
        event.preventDefault();
        var searchExp = $('#searchInp').val();
        var data = {
            'exp': searchExp
        };
        $.ajax({
            url: 'postSearch.php',
            method: 'post',
            data: data,
            dataType: 'json',
            success: function(res) {
                $('#postContainer').empty();
                var row = $('<div  class="row">');
                for (let i = 0; i < res.length; i++) {
                    // console.log(res[i]);
                    var post = $('<div  class="col-sm-3">');
                    var postimg = $('<img class="img-fluid">');
                    postimg.attr('src', '../uploads/' + res[i]['img']);
                    var postContent = $('<p>');
                    var subContent = res[i]['content'];
                    postContent.html(subContent);
                    var postTitle = $('<h3>').html(res[i]['name']);
                    post.append(postimg);
                    post.append(postTitle);
                    post.append(postContent);
                    post.append(`<a href="product.php?page=products&action=add&id=<?php echo $row['id'] ?>">Add to cart</a>`);

                    //post.append(`<a href="../user/fullPost?data=${res[i].id}" target='_blank' class="readMore btn btn-info text-light">Read More</a>`)
                    //post.append(`<a href="product.php?page=products&action=add&id=<?php echo $row['id'] ?>">Add to cart</a>`)
                    row.append(post);
                    $('#postContainer').append(row);
                }
                if (res.error) {
                    $('#postContainer').html(res.error);
                }

            }
        })
    });


    $('#searchInp').on('click', function() {
        var $that = $(this);
        $.ajax({
            url: 'postSearch.php',
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $that.autocomplete({
                    source: data
                });
            }
        })
    });




    $('.categories').first().trigger('click');

    /*
    		$('.pagid').on('click',function (event) {
    			event.preventDefault();
    			var pagid = $(this).attr('href');
    			$.ajax({
    	
    				url:'products.php?pageId='+pagid,
    				method:'get',
    				dataType:'html',
    				success:function (res) {
    					//console.log(res);
    					$('#main').html(res);
    				}
    			})
    		})
    */

});

$(document).ready(function() {
    $('#eng').trigger("click");

    let lang = localStorage.getItem('lang');
    //let lengs = ['rus', 'eng', 'arm'];


    if (lang == "rus") {
        var r = $('.localization').each(function() {
            var el = $(this);
            var key = (el.attr('caption'));
            if (el.is("input")) {
                el.attr('placeholder', rus[key])
            } else {
                el.text(rus[key]);
            }
            localStorage.setItem('lang', 'rus');
        });
    }
    if (lang == "eng") {
        var r = $('.localization').each(function() {
            var el = $(this);
            var key = (el.attr('caption'));
            if (el.is("input")) {
                el.attr('placeholder', eng[key])
            } else {
                el.text(eng[key]);
            }
            localStorage.setItem('lang', 'eng');
        });
    }

    if (lang == "arm") {
        var r = $('.localization').each(function() {
            var el = $(this);
            var key = (el.attr('caption'));
            if (el.is("input")) {
                el.attr('placeholder', arm[key])
            } else {
                el.text(arm[key]);
            }
            localStorage.setItem('lang', 'arm');
        });
    }



    $('.rus').on('click', function() {
        var r = $('.localization').each(function() {
            var el = $(this);
            var key = (el.attr('caption'));
            if (el.is("input")) {
                el.attr('placeholder', rus[key])
            } else {
                el.text(rus[key]);
            }
            localStorage.setItem('lang', 'rus');
        });
    });


    $('.eng').on('click', function() {
        var r = $('.localization').each(function() {
            var el = $(this);
            var key = (el.attr('caption'));
            if (el.is("input")) {
                el.attr('placeholder', eng[key])
            } else {
                el.text(eng[key]);
            }
            localStorage.setItem('lang', 'eng');
        });
    });

    $('.arm').on('click', function() {
        var r = $('.localization').each(function() {
            var el = $(this);
            var key = (el.attr('caption'));
            if (el.is("input")) {
                el.attr('placeholder', arm[key])
            } else {
                el.text(arm[key]);
            }
            localStorage.setItem('lang', 'arm');

        });
    });
});