$(document).ready(function() {
    
    // SELECT CITY AND STATES
    $("#businessState").on('change', function() {
        $("#businessCity").selectpicker();

        var stateID = $(this).val();
        if(stateID) {
            $.ajax({
                url: '/ajax/state/'+stateID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $("#businessCity").empty();
                    $.each(data, function(key, value) {
                        $("#businessCity").append('<option value="'+ value.id +'">'+ value.city_name +'</option>');
                    });
                    $("#businessCity").selectpicker('refresh');
                }
            });
        }else{
            $("#businessCity").empty();
        }
    });


    //SELECT CATEGORIES AND SUBCATEGORIES.
    $("#businessCategory").on('change', function() {
        $("#businessSubcategory").selectpicker();

        var categoryID = $(this).val();
        if(categoryID) {
            $.ajax({
                url: '/ajax/subcategory/'+categoryID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $("#businessSubcategory").empty();
                    $.each(data, function(key, value) {
                        $("#businessSubcategory").append('<option value="'+ value.scat_id +'">'+ value.scat_description +'</option>');
                    });
                    $("#businessSubcategory").selectpicker('refresh');
                }
            });
        }else{
            $("#businessSubcategory").empty();
        }
    });

    /**
     * FX for button search.
     *
     **/
    $("#filterButton").click(function(){
        
        var urlOriginal = window.location.href.split('?');
        // All parameters will be inside Q 
        if ($("#q").val() != "") {
            var urlSearch = replaceUrl(urlOriginal[1], "q", $("#q").val());

            if ($("#loc").val() != "") {
                // Add parameter loc.
                urlSearch = replaceUrl(urlSearch, "loc", $("#loc").val());
            } else {
                urlSearch = deleteURL(urlSearch, "loc");
            }

            if ($("#cat").val() != "") {
                // Add parameter cat.
                urlSearch = replaceUrl(urlSearch, "cat", $("#cat").val());
            } else {
                urlSearch = deleteURL(urlSearch, "cat");
            }
        }
        
        window.location.href = urlOriginal[0] + "?" + urlSearch;
           
    });

    /**
     * FX onchange of pagination.
     *
     **/
    $("#pagination").on('change', function() {
        // GEt the URL. 
        var urlOriginal = window.location.href.split('?');
        if ($("#pagination").val() != "") {
            var urlSearch = replaceUrl(urlOriginal[1], "pagination", $("#pagination").val());
        } else {
            var urlSearch = deleteURL(urlOriginal[1], "pagination");
        }

        window.location.href = urlOriginal[0] + "?" + urlSearch;
    });

    /**
     * FX onchange of OrderBy.
     *
     **/
    $("#order").on('change', function() {
        // GEt the URL. 
        var urlOriginal = window.location.href.split('?');
        if ($("#order").val() != "") {
            var urlSearch = replaceUrl(urlOriginal[1], "order", $("#order").val());
        } else {
            var urlSearch = deleteURL(urlOriginal[1], "order");
        }

        window.location.href = urlOriginal[0] + "?" + urlSearch;
    });
    
});

/**
 * REPLACE/ADD values in query string.
 *
 **/
function replaceUrl(urlSearch, key, value){
    key     = escape(key); 
    value   = escape(value);

    var queryString = urlSearch.split('&');

    var i= queryString.length; var x; while(i--) 
    {
        x = queryString[i].split('=');

        if (x[0] == key) {
            x[1] = value;
            queryString[i] = x.join('=');
            break;
        } 
    }

    if (i<0) {queryString[queryString.length] = [key,value].join('=');}

    //this will reload the page, it's likely better to store this until finished
    return queryString.join('&'); 
}

/**
 * DELETE values in query string.
 *
 **/
function deleteURL(urlSearch, key)
{   
    //Process Query string
    var queryString = urlSearch.split('&');

    for (var i = queryString.length - 1; i >= 0; i -= 1) {
        param = queryString[i].split("=")[0];
        if (param === key) {
            queryString.splice(i, 1);
        }
    }    
    
    return queryString.join("&");
}



function deleteBusiness(id) 
{
    if (confirm('Estas seguro que deseas eliminar este anuncio?')) {
        window.location.replace("/business/delete/"+id);
    } 
}

function deleteImages(id) 
{
    if (confirm('Estas seguro que deseas eliminar esta imagen?')) {
        window.location.replace("/business/imagenes/"+id+"/delete");
    } 
}

function inactivateBusiness(id) 
{
    if (confirm('Estas seguro que deseas desactivar este anuncio?')) {
        window.location.replace("/business/inactivate/"+id);
    } 
}

function activateBusiness(id) 
{
    if (confirm('Estas seguro que deseas activar este anuncio?')) {
        window.location.replace("/business/activate/"+id);
    } 
}
