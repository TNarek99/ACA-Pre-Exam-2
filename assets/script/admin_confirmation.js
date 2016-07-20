function confirmation(id){
    var ask=confirm("Delete Category?");
    if(ask){
        window.location=id;
    }
}