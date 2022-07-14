(function($) {
   "use strict";
   /* object js */
   var LikeForum = {
      init: function() {
         this. filter_home();
      },

   filter_home: function() {
      $(document).find(".quan_huyen").on('change, click', function(e) {
         e.preventDefault();
         alert('Vui lòng chọn tỉnh/thành phố trước');
         
      });
      $(document).find("#thanh_pho").on('change', function(e) {
         e.preventDefault();
         var that = $(this);
         var value = that.val();
         if  ( value == 'Hà Nội' ) {
            that.closest('.filter_home').find('#quan_huyen').hide();
            that.closest('.filter_home').find('#quan_huyen_hn').show();
            that.closest('.filter_home').find('#quan_huyen_hcm').hide();
            that.closest('.filter_home').find("#quan_huyen_hcm option[value='']").prop('selected','selected');
         } else if ( value == 'TPHCM' ) {
            that.closest('.filter_home').find('#quan_huyen').hide();
            that.closest('.filter_home').find('#quan_huyen_hcm').show();
            that.closest('.filter_home').find('#quan_huyen_hn').hide();
            that.closest('.filter_home').find("#quan_huyen_hn option[value='']").prop('selected','selected');
         } else {
            that.closest('.filter_home').find('#quan_huyen').show();
            that.closest('.filter_home').find('#quan_huyen_hcm').hide();
            that.closest('.filter_home').find('#quan_huyen_hn').hide();
            that.closest('.filter_home').find("#quan_huyen_hcm option[value='']").prop('selected','selected');
            that.closest('.filter_home').find("#quan_huyen_hn option[value='']").prop('selected','selected');
         }
      });
      var from = '';
      var to = '';
      $(document).find(".dt_from").on('input', function(e) {
         e.preventDefault();
         var that = $(this);
         from = that.val();
         that.closest('.filter_home').find(".dien_tich").val(`${from},${to}`);

      });
      $(document).find(".dt_to").on('input', function(e) {
         e.preventDefault();
         var that = $(this);
         to = that.val();
          that.closest('.filter_home').find(".dien_tich").val(`${from},${to}`);
      });



    },

};

   /* ready */
   $(document).ready(function() {
      LikeForum.init();
   });

})(jQuery);