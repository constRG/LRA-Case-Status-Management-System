
function gear_button_menu() 
{       
    var log_out_wrapper = document.querySelector(".log_out_wrapper");
    log_out_wrapper.classList.toggle("log_out_wrapper_active");
}

function show_password() {
    var eye_open_btn = document.querySelector(".eye_open_btn");
    var login_user_password = document.querySelector(".login_user_password");
    if(login_user_password.type === "password")
    {
        login_user_password.type = "text";
        eye_open_btn.src="./assets/images/eye_close.png";
    }
    else 
    {
        login_user_password.type = "password";
        eye_open_btn.src="./assets/images/eye_open.png";
    }
}

function scroll_up_show_up() {
    const scroll_up_icon = document.querySelector(".arrow_up_icon");
    window.addEventListener("scroll", () => {
        scroll_up_icon.classList.toggle("arrow_up_icon_active", scrollY > 200);
    });

    scroll_up_icon.addEventListener("click", () => {
        window.scrollTo({
            top: 0 
        });
    });
}
scroll_up_show_up();


function change_case_number() {
    const update_case_number = document.querySelector(".update_case_number");
    update_case_number.classList.toggle("update_case_number_active");
}



// function pop_up_alert() {
//     const modal_wrapper = document.querySelector(".modal_wrapper");
//     modal_wrapper.classList.add("modal_wrapper_active");

//     const no_btn = document.querySelector(".no_btn");
//     no_btn.addEventListener("click", ()=> {
//         modal_wrapper.classList.remove("modal_wrapper_active");
//     })
// }
