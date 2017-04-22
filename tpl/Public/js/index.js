$(function() {

    $('.ui-hide').hide();

    $('.view-init a').on('click',function () {

      $('.ui-hide').hide();
      $('img',this).show();
      return false;
    })
})
