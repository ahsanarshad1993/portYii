
  $('.circle').circleProgress({
    // value: 0.35,
    size: 80,
    startAngle: 17.3,
    fill: {
      color: "#000"
    }
  });


 $(document).ready(function () {
            $('.collapse.in').prev('.panel-heading').addClass('active');
            $('#accordion, #bs-collapse')
                .on('show.bs.collapse', function (a) {
                    $(a.target).prev('.panel-heading').addClass('active');
                })
                .on('hide.bs.collapse', function (a) {
                    $(a.target).prev('.panel-heading').removeClass('active');
                });
        });



// $(function()
// {
//     var id = $('#projid').val();
//     var mb = '#modalButton';

//     $(mb.concat(id)).click(function ()
//     {
//         $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
//     });


// });

function callmodal(id, name){
    var mb = '#modalButton';
    var tag = mb.concat(id);
    $('#modal').modal('show').find('#modalContent').load($(tag).attr('value'));
    $('#modal').modal('show').find('#modalHeader').text(name);

}


// For menubar of homepage
$(function() {
    if(window.location.search == '?r=portfolio/index' || window.location.search == ""){
        $('nav').addClass('home-navbar');
    }
});


// slider for references

$(function() {
    $('.my-slider').unslider({
        // animation: 'vertical',
        // autoplay: true,
        infinite: true
        
        });
});

