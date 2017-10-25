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
});


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