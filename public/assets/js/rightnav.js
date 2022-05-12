//Right navbar for Video Content Page (videocontent.php)

let section1 = document.querySelector('#section1');
    let section2 = document.querySelector('#section2');
    let section3 = document.querySelector('#section3');
    let section4 = document.querySelector('#section4');

    

    window.addEventListener('scroll',()=>{
        var windowState = Math.floor(window.pageYOffset) + 1;

        if(section2.offsetTop <= windowState && section3.offsetTop > windowState){
            $('.right-sidebar-nav-item').removeClass('active');
             $('li.right-sidebar-nav-item:nth-child(2)').addClass('active');
        }
        else if(section3.offsetTop <= windowState && section4.offsetTop > windowState){
            $('.right-sidebar-nav-item').removeClass('active');
            $('li.right-sidebar-nav-item:nth-child(3)').addClass('active');
        }
        else if(section4.offsetTop <= windowState){
            $('.right-sidebar-nav-item').removeClass('active');
            $('li.right-sidebar-nav-item:nth-child(4)').addClass('active');
        }
        else{
            $('.right-sidebar-nav-item').removeClass('active');
            $('li.right-sidebar-nav-item:nth-child(1)').addClass('active');
        }
    })

    $(document).ready(function(){
        $('.right-sidebar-nav-item').click(function(){
            $('.right-sidebar-nav-item').removeClass('active');
            $(this).addClass('active');
        });
    })