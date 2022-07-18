/*===================================================================
                                        modal load start
    ===================================================================*/

$("#myModal").on("show.bs.modal", function (e) {

    var link = $(e.relatedTarget);
    var content = $(this).find(".modal-content");

    if (content.html()) {

        content.load(link.attr("href"));

    }

});


$("#myModal").on("hidden.bs.modal", function (e) {  // remove modal data when exited
    
    var content = $(this).find(".modal-content");
    content.removeData();
    
});

