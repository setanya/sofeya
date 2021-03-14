
$(document).ready(function(){

    $(".gallery").click(function () {
            let id = $(this).attr("id");
            console.log(id);
            let modal = $("div[data-id="+id+"]");

        modal.prev().addClass('in');
        modal.show();
        $(".counter").hide();
    });

    $(document).on('click', ".closes", function () {
        closeModal();
    });


    function closeModal(){
        $(".overlay").removeClass('closes');
        $(".overlay").removeClass('in');
        $(".my-modal-container").hide();
        $(".counter").show();
    }
});


