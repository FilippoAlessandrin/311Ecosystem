$('#add-competenza').click( function() {

    $('<tr><td>'+$('#competenza input').val()+'</td><td><label class="badge badge-danger">Back-end</label></td><td><i class="ti-close btn-close"></i></td></tr>').insertBefore('.last-tr');
    $('#num-comp').text( parseInt($('#num-comp').text()) + 1 );

});

$('.btn-close').click( function() {

    $(this).parent().parent().remove();
    $('#num-comp').text( parseInt($('#num-comp').text()) - 1 );
});
