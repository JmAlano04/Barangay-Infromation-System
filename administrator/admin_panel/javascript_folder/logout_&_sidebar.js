    //  LOGOUT FUNCTION 
    function logout(){
        window.location.href = '../logout.php';
    };
    //  SIDE HAMBURDER SLIDE FUNCTION   
    let btn = document.querySelector("#btn_menu");
    let sidebar = document.querySelector(".sidebar");
        btn.onclick = function(){
        sidebar.classList.toggle("active");
    };