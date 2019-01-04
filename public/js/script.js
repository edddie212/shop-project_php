
String.prototype.toPermalink = function(){
 return this.toString().trim().toLowerCase().replace(/\s/g, '-');

};

$('#sm-box').delay(3000).slideUp();

$('.add-to-cart-btn').on('click', function(){

$.ajax({

url: BASE_URL + 'shop/add-to-cart',
type:'GET',
dataType:'html',
data: {pid: $(this).data('id') },
success: function (res) {
window.location.reload();
}


});

});

$('.field-input-cms').on('focusin focusout ', function(){
 $(this).next().toggleClass('text-black').toggleClass('text-muted');

});

$('.original-text').on('focusout', function(){
 $('.target-text').val($(this).val().toPermalink());


});
