/**
 * Skryje/ukáže heslo pre element s ID password
 */
function showHidePassword(){
    var password = document.getElementById("password");
    if (password.type === "password"){
        password.type = "text";
    } else{
        password.type = "password";
    }
}