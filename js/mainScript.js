$(document).ready(function() {

    $("#checkAll").on("change",function(){
        $(".checkRow").prop("checked",$(this).prop("checked"));
       $(".checkRow").on("change",function(){
           if($(this).prop("checked")==false){
               ("#checkAll").prop("checked",false)
           }
           else if($(".checkRow:checked").length==$(".checkbox").length){
               $("#checkAll").prop("checked",true)
           }   
       })
    })
    
        $(".pdf").on("click",function(){
            var doc = new jsPDF()
        doc.save('a4.pdf')
        })


    $('.user-img-wrap').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let userSetting = $('.user-setting-data');
        if (userSetting.css('display') == 'none') {
            userSetting.css('display', 'block');
        } else {
            userSetting.css('display', 'none');
        }
    });

    $('.main-nav-link').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let userSetting = $(this).next();

        if (userSetting.css('display') == 'none') {
            userSetting.css('display', 'block');
            $(this).css('border-color', '#fff');
        } else {
            userSetting.css('display', 'none');
            $(this).css('border-color', 'transparent');
        }
    });
    $('body').on('click', function() {
        $('.user-setting-data').hide();
        $('.sub-nav-link-wrapper').hide();
        $('.main-nav-link').css('border-color', 'transparent');

    });



    $('.mobile-menu-icon').on('click', function() {
        let mobileMenuDiv = $('.mobile-menu-container');
        if (mobileMenuDiv.css('display') == 'none') {
            $(this).children('img').attr('src', 'assets/images/close-menu.png');
            mobileMenuDiv.fadeIn();
            $('.mobile-menu-content').css('left', '0%');
        } else {
            $(this).children('img').attr('src', 'assets/images/menu-icon.png');
            mobileMenuDiv.fadeOut();
            $('.mobile-menu-content').css('left', '100%');
        }
        let mobileMenuWidth = $('.mobile-menu-content').innerWidth();
        $('.shadow-section').css('width', 'calc(100% - ' + mobileMenuWidth + 'px)');

    });

    $('.shadow-section').on('click', function() {
        $('.mobile-menu-icon').children('img').attr('src', 'assets/images/menu-icon.png');
        $('.mobile-menu-container').fadeOut();
        $('.mobile-menu-content').css('left', '100%');
    });
    $('.main-close').on('click', function() {
        $('.account-info').fadeOut(500);
        $('.saving').html(`<button type="button" class="save add">add</button>`)
        $('.add').on('click', function() {
            $('.account-info').fadeIn(500);
            $('.sup-account-info').fadeIn(500);
            $('.saving').html(`<button type="button" class="save">save</button>
			<button type="button" class="discard">discard</button>`)
            $('.form-container').slideDown(500)
            $('.main-collapse').html(`<i class="fas fa-minus"></i>`)
        })
    })

    $('.main-collapse').on('click', function() {
        if ($('.form-container').css('display') == ('block')) {
            $('.form-container').slideUp(500);
            $('.sup-account-info').slideUp(500);
            $(this).html(`<i class="fas fa-plus"></i>`)
        } else {
            $('.form-container').slideDown(500);
            $('.sup-account-info').slideDown(500);
            $(this).html(`<i class="fas fa-minus"></i>`)
        }
    })

    $(function() {
        $("#sortable").sortable();
        $("#sortable").disableSelection();
    });
    $('.close').on('click', function() {
        $('.sup-account-info').fadeOut(500);
    })
    $('.collapse').on('click', function() {
        if ($('.sup-form-container').css('display') == ('block')) {
            $('.sup-form-container').slideUp(500);
            $(this).html(`<i class="fas fa-plus"></i>`)
        } else {
            $('.sup-form-container').slideDown(500);
            $('.sup-account-info').slideDown(500);
            $(this).html(`<i class="fas fa-minus"></i>`)
        }
    })

    $('.add-line').on("click", function() {
        $(this).prev().append(`<tr class="accounts">
			<td>
				<select>
					<option>
						choose account
					</option>
					<option value="buildings">
						buildings
					</option>
					<option value="Cleints">
						Cleints
					</option>
					<option value="other-debtors">
						other debtors
					</option>
					<option value="current-assets">
						current assets
					</option>
					<option value="equity-capital">
						equity capital
					</option>
					<option value="shipping">
						shipping
					</option>
					<option value="other-expenses">
						other expenses
					</option>
					<option value="exp22">
						exp22
					</option>
					<option value="sales">
						sales
					</option>
					<option value="equity">
						equity
					</option>
				</select>
			</td>
			<td><input type="text" name="description"></td>
			<td><input type="number" name="debit" class="debit" placeholder="0.00"></td>
			<td><input type="number" name="credit" class="credit" placeholder="0.00">
				<button type="button" class="delete"><i class="fas fa-trash-alt"></i></button></td>
		</tr>`)
        $('.delete').on('click', function() {
            $(this).parents('tr').remove()
        })
        $(".debit").change(function() {
            var sum = 0;
            $('.debit').each(function(i, obj) {


                if ($.isNumeric(this.value)) {
                    sum += parseFloat(this.value);
                }

            })

            $('#bepit_total').text(sum);
        });
        $(".credit").change(function() {
            var sum = 0;
            $('.credit').each(function(i, obj) {


                if ($.isNumeric(this.value)) {
                    sum += parseFloat(this.value);
                }

            })

            $('#credit_total').text(sum);

        });
    })
    $(".validate").on("click", function(e) {
            if (parseFloat($("#bepit_total").text()) != parseFloat($("#credit_total").text())) {
                e.preventDefault()
                alert("depit not equal credit")
            }
        })
        // var addLine=document.querySelector(".add-line");
        // addLine.addEventListener("click",function(){

    // $(".debit").change(function() {
    // 	var total = 0;
    // 	//console.log(total);
    // 	var debits=[];

    // var i=0;
    // var sum;
    // var debit=$(".debit");
    // for(i=0;i<debit.length;i++){
    //  sum += parseInt(debit[i].value) ;
    // 	console.log(sum)
    // }
    // });

    //   });



    // $('#bepit_total').html()
    $('.discard').on('click', function() {
        $('input').val(null);
        $('select').val(null);
        $('textarea').val(null);
        $(".count").text("")
    });

    // $("#myInput").on("keyup", function myFunction() {
    //     var input, filter, table, tr, td, i, txtValue;
    //     input = document.getElementById("myInput");
    //     filter = input.value.toUpperCase();
    //     table = document.getElementById("myTable");
    //     tr = table.getElementsByTagName("tr");
    //     for (i = 0; i < tr.length; i++) {
    //         td = tr[i].getElementsByTagName("td")[0];
    //         if (td) {
    //             txtValue = td.textContent || td.innerText;
    //             if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //                 tr[i].style.display = "";
    //             } else {
    //                 tr[i].style.display = "none";
    //             }
    //         }
    //     }
    // })
    var $rows = $('#myTable tr');
    $('#myInput').keyup(function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
    $(".print").on("click", function() {
        window.print();
    })
    $(".date-pic").flatpickr();
    $(".datetime-pic").flatpickr({
        enableTime: true
    });
    $(".time-pic").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        minDate: "16:00",
        maxDate: "22:30",
    })
    $(".dateRange").flatpickr(
        {
            mode: "range",
            minDate: "today",
            dateFormat: "Y-m-d",
        }
    );
    $('.add-order').on("click", function() {
        $(this).prev().append(`<tr class="accounts">
			<td>
            <div>
            <input type="text" name="search-box" id="search-box" placeholder="item name">
            <div id="suggesstion-box">
            </div>
            </div>
			</td>
            <td><select>
                <option value="small" name="small">small</option>
                <option value="medium" name="medium">medium</option>
                <option value="large" name="large">large</option>
                <option value="xlarge" name="xlarge">x large</option>
            </select></td>
            <td><input type="number" name="quantity" class="debit" placeholder="0.00"></td>
            <td><select>
                <option value="small" name="small">small</option>
                <option value="medium" name="medium">medium</option>
                <option value="large" name="large">large</option>
                <option value="xlarge" name="xlarge">x large</option>
            </select></td>
            <td><input type="text" name="spcial-comment" class="credit" placeholder="comment"></input></td>
            <td style="display:flex;justify-content: space-between">
            <input type="checkbox" name="delevery">
                <button type="button" class="delete"><i class="fas fa-trash-alt"></i></button>
                </td>
        </tr>`)
        $('.delete').on('click', function() {
            $(this).parents('tr').remove()
        })
        $(".debit").change(function() {
            var sum = 0;
            $('.debit').each(function(i, obj) {


                if ($.isNumeric(this.value)) {
                    sum += parseFloat(this.value);
                }

            })

            $('#bepit_total').text(sum);
        });
        $(".credit").change(function() {
            var sum = 0;
            $('.credit').each(function(i, obj) {


                if ($.isNumeric(this.value)) {
                    sum += parseFloat(this.value);
                }

            })

            $('#credit_total').text(sum);

        });
        $(".validate").on("click", function(e) {
            if (parseFloat($("#bepit_total").text()) != parseFloat($("#credit_total").text())) {
                e.preventDefault()
                alert("depit not equal credit")
            }
        })
    })
    $('.add-invoice').on("click", function() {
        $(this).prev().append(`<tr class="accounts">
			<td>
            <div>
            <input type="text" name="search-box" id="search-box" placeholder="item name">
            <div id="suggesstion-box">
            </div>
            </div>
			</td>
            <td><select>
                <option value="small" name="small">small</option>
                <option value="medium" name="medium">medium</option>
                <option value="large" name="large">large</option>
                <option value="xlarge" name="xlarge">x large</option>
            </select></td>
            <td><input type="number" name="quantity" class="debit" placeholder="0.00"></td>
            <td>
                <input type="text" name="unit" class="unit" placeholder="unit">
            </td>
            <td><input type="text" name="total" class="credit" placeholder="0.00"></td>
            <td><input type="number" name="margin" class="margin" placeholder="0.00"></td>
            <td><input type="text" name="total-after-margin" class="total-after-margin" placeholder="0.00"></td>
            <td style="display:flex;justify-content: space-between">
            <input type="text" name="profit" class="profit" placeholder="0.00">
                <button type="button" class="delete"><i class="fas fa-trash-alt"></i></button>
                </td>
        </tr>`)
        $('.delete').on('click', function() {
            $(this).parents('tr').remove()
        })
        $(".debit").change(function() {
            var sum = 0;
            $('.debit').each(function(i, obj) {


                if ($.isNumeric(this.value)) {
                    sum += parseFloat(this.value);
                }

            })

            $('#bepit_total').text(sum);
        });
        $(".credit").change(function() {
            var sum = 0;
            $('.credit').each(function(i, obj) {


                if ($.isNumeric(this.value)) {
                    sum += parseFloat(this.value);
                }

            })

            $('#credit_total').text(sum);

        });
        $(".validate").on("click", function(e) {
            if (parseFloat($("#bepit_total").text()) != parseFloat($("#credit_total").text())) {
                e.preventDefault()
                alert("depit not equal credit")
            }
        })
        $(function () {
            $(".abcd").select2();
          });
    })

    $(".rate").on("click",function(){
        $(".feed").show();
    })
    $(".ok").on("click",function(){
        $(".feed").hide();
    })
    
    $("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readItems.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
    });
    
})

function selectItem(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
    }