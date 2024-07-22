jQuery( document ).ready(function() {
 /* Fix: modal pop-up scroll to top issue on mobile */
 jQuery(".fusion-modal").on("show", function () {
    jQuery("body").addClass("modal-open");
  }).on("hidden", function () {
    jQuery("body").removeClass("modal-open");
  });
  
/* Update button role of modal link */
jQuery('a[data-toggle="modal"]').attr({'role': 'button', 'aria-haspopup':'dialog'});
/* END Update button role of modal link */

/* aria-modal attribute for modal pop-up */
jQuery('.fusion-modal').attr('aria-modal', 'true');
/* END aria-modal attribute for modal pop-up */

 /* Open modal pop-up using Space key */
jQuery('a[data-toggle="modal"]').on("keyup", function(e) {
   var kcode = (e.keyCode ? e.keyCode : e.which);
   if(kcode == 32){
     e.preventDefault();
     jQuery(this).trigger('click');
   }
});
/* END Open modal pop-up using Space key */
/* Return focus to to the element that invoked the dialog */
jQuery('.fusion-modal').on('hidden.bs.modal', function() {
  var getAllClass = jQuery(this).attr('class');
  var splitClass = getAllClass.split(' ');
  var dataTargetAttr = '.'+splitClass[0]+'.'+splitClass[4];
  jQuery('[data-target="'+dataTargetAttr+'"]').focus();
});
/* END Return focus to to the element that invoked the dialog */

/* set close button focus on modal open */
jQuery('.fusion-modal').on('show.bs.modal', function() {
    setTimeout(function(){
        jQuery('.modal-header button.close').focus();
    }, 1000);     
  });
   /* END set close button focus on modal open */ 

});