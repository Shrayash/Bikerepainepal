//Header Search Toggle

$(document).ready(function(){
    $('.search-from-header-icon-toggler').click(function(){
        $('.header-search-bar').toggleClass('active');
        $('.search-border').toggleClass('active');
        $('.header-search-bar input').focus();
        setTimeout(() => {
            $('.search-from-header-icon-toggler').css('display', 'none');
            $('.search-from-header-icon-button').css('display', 'inline-block');
        }, 500);
    });
    $('html').click(function(e) {  
        console.log(e)                  
        if(!$(e.target).hasClass('no-toggle-search'))
        {
            $('.header-search-bar').removeClass('active');     
            $('.search-border').removeClass('active');    
            setTimeout(() => {
                $('.search-from-header-icon-button').css('display', 'none'); 
                $('.search-from-header-icon-toggler').css('display', 'inline-block');
            }, 500);       
        }
     }); 
});

//login password show hide

$(document).ready(function(){
    $('.input-password-toggler').click(function(){
        $(this).toggleClass('show');
        var x = $(this).siblings('.input-type-password')[0];
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    })
});


//Toggle SIdebar

$(document).ready(function(){
    $('.sidebar-menu-toggler').click(function(){
        $('.page-with-both-sidebar>.page-wrapper>.left-sidebar').toggleClass('open');
    })
});

//Admin panel sidebar
$(document).ready(function(){
        $('.admin-nav-item.active').find('.admin-nav-arrow').attr('src', 'src/assets/images/icons/admin-arrow-blue.svg');
});
$(document).ready(function(){
    $('.admin-sidebar-menu-toggler').click(function(){
        $('.admin-page>.admin-page-wrapper>.admin-page-sidebar').toggleClass('open');
    })
});

//Admin site settings

$(document).ready(function(){
    $('.edit-site-pencil').click(function(){
        var x = $(this).siblings('.input-section')[0];
        $(x).children()[1].focus();
    })
});

//change user type

$(document).ready(function(){
    $('.select-user-type').change(function(){
        if(this.options[this.selectedIndex].value == 'admin'){
            changeUserTypeAlert('Successfully made Admin.');
        }
        if(this.options[this.selectedIndex].value == 'superadmin'){
            changeUserTypeAlert('Successfully made superadmin.');
        }
    });
});

function changeUserTypeAlert(msg){
    var msgToShow = document.createElement("div");
    var newSpan = document.createElement('span');
    var closeIcon = document.createElement('i');
    msgToShow.setAttribute("style","position:absolute;bottom:40px;right:20px;background-color:#18D068;border: 1px solid #18D068;border-radius: 14px;padding: 20px 30px;");
    newSpan.setAttribute("style","color:#fff;font-size:18px;");
    closeIcon.setAttribute("style","padding-left: 20px;cursor:pointer;");
    closeIcon.classList.add('fa');
    closeIcon.classList.add('fa-close');
    closeIcon.onclick = function(){
        this.parentElement.style.display='none';
    }

    newSpan.innerHTML = msg;
    msgToShow.appendChild(newSpan);
    msgToShow.appendChild(closeIcon);
    
    setTimeout(function(){
    msgToShow.parentNode.removeChild(msgToShow);
    },3000);
    document.body.appendChild(msgToShow);
}

//profile pic on click
$(function() {
    $('#profile-image').on('click', function() {
        $('#profile-image-upload').click();
    });
});

//create publication section
$(document).ready(function(){
    $('div.publication-file-upload').hide();
    $('div.publication-video-link').hide();
    $('.select-publication-category').change(function(){
        if(this.options[this.selectedIndex].value == 'docs'){
            $('div.publication-file-upload').show();
            $('div.publication-video-link').hide();
        }
        else if(this.options[this.selectedIndex].value == 'video'){
            $('div.publication-file-upload').hide();
            $('div.publication-video-link').show();
        }
    });
    // $('.custom-file-upload').click(function(){
    //     $('#file-uploader').click();
    // })
    // $('.custom-file-upload').on("click" , function () {
    //     $('#file-uploader').click();
    // });
});


//edit publication section
$(document).ready(function(){
    $('.select-publication-category-edit').change(function(){
        if(this.options[this.selectedIndex].value == 'docs'){
            $('div.publication-file-upload-edit').show();
            $('div.publication-video-link-edit').hide();
        }
        else if(this.options[this.selectedIndex].value == 'video'){
            $('div.publication-file-upload-edit').hide();
            $('div.publication-video-link-edit').show();
        }
    });
    // $('.custom-file-upload').click(function(){
    //     $('#file-uploader').click();
    // })
    $('.custom-file-upload').on("click" , function () {
        $('#file-uploader').click();
    });
});
